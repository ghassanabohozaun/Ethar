<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use GeneralTrait;


    // teams Index
    public function index()
    {
        $title = trans('menu.team');
        $teams = Team::orderByDesc('created_at')->paginate();
        return view('admin.teams.index', compact('title', 'teams'));
    }


    // create
    public function create()
    {
        $title = trans('menu.add_new_team_member');
        return view('admin.teams.create', compact('title'));
    }


    // store team
    public function store(TeamRequest $request)
    {

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('\adminBoard\uploadedImages\teams\\');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }


        Team::create([
            'photo' => $photo_path,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'position_ar' => $request->position_ar,
            'position_en' => $request->position_en,
        ]);

        return $this->returnSuccessMessage(trans('general.add_success_message'));


    }


    // edit
    public function edit($id = null)
    {
        $title = trans('teams.update_team_member');
        $team = Team::find($id);
        if (!$team) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.teams.update', compact('title', 'team'));
    }

    // update team
    public function update(TeamRequest $request)
    {

        $team = Team::find($request->id);
        if (!$team) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($team->photo)) {

                $image_path = public_path('\adminBoard\uploadedImages\teams\\') . $team->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\teams\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);

            } else {
                $image_path = public_path('\adminBoard\uploadedImages\teams\\') . $team->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\teams\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            }
        } else {
            if (!empty($team->photo)) {
                $photo_path = $team->photo;
            } else {
                $photo_path = '';
            }
        }


        $team->update([
            'photo' => $photo_path,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'position_ar' => $request->position_ar,
            'position_en' => $request->position_en,
        ]);

        return $this->returnSuccessMessage(trans('general.update_success_message'));

    }


    //  destroy teams
    public function destroy(Request $request)
    {

        if ($request->ajax()) {
            $team = Team::find($request->id);
            if (!$team) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($team->photo)) {
                $image_path = public_path('\adminBoard\uploadedImages\teams\\') . $team->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $team->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }

    }


    // change Status
    public function changeStatus(Request $request)
    {
        $team = Team::find($request->id);

        if ($request->switchStatus == 'false') {
            $team->status = null;
            $team->save();
        } else {
            $team->status = 'on';
            $team->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

}
