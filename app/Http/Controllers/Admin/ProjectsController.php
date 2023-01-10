<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsRequest;
use App\Models\Projects;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    use GeneralTrait ;
    public function index()
    {
        return view('admin.projects.index');
    }

    public function create()
    {
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
            $file = $this->saveImage($request->hasFile('file'), 'adminBoard/uploadedFiles/project');
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
}
