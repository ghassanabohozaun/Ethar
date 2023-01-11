<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsRequest;
use App\Models\Projects;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    use GeneralTrait ;
    public function index()
    {
        $projects = Projects::paginate(15);
        $title = __('menu.projects');
        return view('admin.projects.index' , compact('projects' , 'title'));
    }

    public function create()
    {
        $title = __('menu.add_new_project');
        return view('admin.projects.create');
    }

    public function store(ProjectsRequest $request){

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/projects');
            $photo_path = $this->saveResizeImage($image,$destinationPath);

        } else {
            $photo_path = '';
        }

        // save File

        if ($request->hasFile('file')) {

           $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/project');
        } else {
            $file = '';
        }



        $lang_en =setting()->site_lang_en ;

            Projects::create([
                'photo'         => $photo_path,
                'language'      => 'ar_en',
                'details_ar'    => $request->details_ar,
                'details_en'    => $lang_en == 'on'?$request->details_en:null,
                'title_ar'      => $request->title_ar,
                'title_en'      => $lang_en == 'on'?$request->title_en:null,
                'file'          => $file,
                'date'          => $request->date,
                'writer'        => $request->writer,
                'type'          => $request->type,
            ]);

        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }

    public function edit( $id){
        $project = Projects::findOrFail($id);
        return view('admin.projects.update', compact('project'));
    }

    public function update(ProjectsRequest $request){
        // return $request->all();
        $project = Projects::findORFail($request->id);

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/projects');
            $photo_path = $this->saveResizeImage($image,$destinationPath);
        } else {
            $photo_path = $project->photo;
        }

        // save File

        if ($request->hasFile('file')) {

            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/project');
         } else {
             $file = $project->file;
         }

        $lang_en =setting()->site_lang_en ;
           $project->update([
                'photo'         => $photo_path,
                'language'      => 'ar_en',
                'details_ar'    => $request->details_ar,
                'details_en'    => $lang_en == 'on'?$request->details_en:null,
                'title_ar'      => $request->title_ar,
                'title_en'      => $lang_en == 'on'?$request->title_en:null,
                'file'          => $file,
                'date'          => $request->date,
                'writer'        => $request->writer,
                'type'          => $request->type,
            ]);

        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    public function trashed()
    {
        $title = trans('menu.trashed_articles');
        $projects = Projects::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.projects.trashed-project', compact('title', 'projects'));
    }


     ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $project = Projects::find($request->id);
                if (!$project) {
                    return redirect()->route('admin.not.found');
                }
                $project->delete();
                return $this->returnSuccessMessage(trans('general.move_to_trash'));
            }
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
                $project = Projects::onlyTrashed()->find($request->id);
                if (!$project) {
                    return redirect()->route('admin.not.found');
                }
                $project->restore();
                return $this->returnSuccessMessage(trans('general.restore_success_message'));
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

                $project = Projects::onlyTrashed()->find($request->id);

                if (!$project) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($project->photo)) {
                    $image_path = public_path("\adminBoard\uploadedImages\projects\\") . $project->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $project->forceDelete();

                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch

    }


    public function changeStatus(Request $request)
    {

        $project = Projects::find($request->id);

        if ($request->switchStatus == 'false') {
            $project->status = 'hide';
            $project->save();
        } else {
            $project->status = 'show';
            $project->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }
}
