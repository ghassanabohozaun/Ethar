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

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('ArticlesPhotos');
        } else {
            $photo_path = '';
        }


        if (setting()->site_lang_en == 'on') {
            Projects::create([
                'photo'         => $photo_path,
                'language'      => 'ar_en',
                'details_ar'    => $request->details_ar,
                'details_en'    =>$request->details_en,
                'title_ar'      => $request->title_ar,
                'title_en'      => $request->title_en,
                'status'        => $request->status,
                'file'          => $request->file,
                'date'          => $request->date,
                'writer'        => $request->writer,
                'type'          =>$request->type,
            ]);
        } else {
            Projects::create([
                'photo'         => $photo_path,
                'language'      => 'ar_en',
                'details_ar'    => $request->details_ar,
                'details_en'    => null,
                'title_ar'      => $request->title_ar,
                'title_en'      => null,
                'status'        => $request->status,
                'file'          => $request->file,
                'date'          => $request->date,
                'writer'        => $request->writer,
                'type'          => $request->type,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }
}
