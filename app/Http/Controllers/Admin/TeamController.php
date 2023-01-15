<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use GeneralTrait;


    // teams Index
    public function team()
    {
        $title = trans('menu.team');
        $teams = Team::orderByDesc('created_at')->get();
        return view('admin.teams.index', compact('title','teams'));
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

    //  destroy teams
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $team = Team::find($request->id);
                if (!$team) {
                    return redirect()->route('admin.not.found');
                }
                if (!empty($team->team_image)) {
                    Storage::delete($team->team_image);
                }
                $team->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }


}
