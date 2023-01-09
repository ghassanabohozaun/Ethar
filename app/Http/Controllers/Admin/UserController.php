<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.users');
        $users = Admin::with('role')
            ->withoutTrashed()
            ->orderByDesc('created_at')
            ->where('id', '!=', \auth('admin')->user()->id)
            ->paginate(15);
        return view('admin.users.index', compact('title', 'users'));
    }

    /////////////////////////////////////////
    /// Get Trashed users index
    public function trashedUser()
    {
        $title = trans('menu.trashed_users');
        $trashedUsers = Admin::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.users.trashed-users', compact('title', 'trashedUsers'));
    }

    /////////////////////////////////////////
    ///  create
    public function create()
    {
        $title = trans('menu.add_new_user');
        $roles = Role::get();
        return view('admin.users.create', compact('title', 'roles'));
    }
    /////////////////////////////////////////
    ///  store
    public function store(UserRequest $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $photo_path = $request->file('photo')->store('Users');
            } else {
                $photo_path = '';
            }
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
                'photo' => $photo_path,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }

    /////////////////////////////////////////
    ///  edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $user = Admin::find($id);
        if (!$user) {
            return redirect()->route('admin.not.found');
        }
        $roles = Role::get();
        $title = trans('users.update_users');

        return view('admin.users.update', compact('title', 'user', 'roles'));
    }

    /////////////////////////////////////////
    ///  Update
    public function update(UserUpdateRequest $request)
    {
        try {
            $user = Admin::find($request->id);

            if ($request->hasFile('photo')) {
                if (!empty($user->photo)) {
                    Storage::delete($user->photo);
                    $photo_path = $request->file('photo')->store('Users');
                } else {
                    $photo_path = $request->file('photo')->store('Users');
                }
            } else {
                if (!empty($user->photo)) {
                    $photo_path = $user->photo;
                } else {
                    $photo_path = '';
                }
            }

            if (!empty($request->input('password'))) {
                $password = bcrypt($request->password);
            } else {
                $password = $user->password;
            }
            $user->update([
                'name' => $request->name,
                'password' => $password,
                'role_id' => $request->role_id,
                'photo' => $photo_path,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
            ]);

            return $this->returnSuccessMessage(trans('general.update_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }
    /////////////////////////////////////////
    ///  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = Admin::onlyTrashed()->find($request->id);
                if (!$user) {
                    return redirect()->route('admin.not.found');
                }
                $user->restore();
                return $this->returnSuccessMessage(trans('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }
    /////////////////////////////////////////
    ///  Destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = Admin::find($request->id);
                if (!$user) {
                    return redirect()->route('admin.not.found');
                }
                $user->delete();
                return $this->returnSuccessMessage(trans('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch

    }

    /////////////////////////////////////////
    ///  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = Admin::onlyTrashed()->find($request->id);
                if (!$user) {
                    return redirect()->route('admin.not.found');
                }
                if (!empty($user->photo)) {
                    Storage::delete($user->photo);
                }
                $user->forceDelete();

                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch

    }
    /////////////////////////////////////////
    /// change  status
    public function changeStatus(Request $request)
    {
        try {
            $admin = Admin::find($request->id);
            if ($request->switchStatus == 'false') {
                $admin->status = null;
                $admin->save();
            } else {
                $admin->status = 'on';
                $admin->save();
            }
            return $this->returnSuccessMessage(trans('general.change_status_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch

    }

    /////////////////////////////////////////
    /// User Growth Bar Chart
    public function barChart()
    {
        $users = Admin::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');


        $months = Admin::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        foreach ($months as $index => $month) {
            $datas[$month] = $users[$index];
        }
        return view('admin.users.bar-chart', compact('datas'));
    }
}
