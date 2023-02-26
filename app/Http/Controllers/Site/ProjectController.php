<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Projects;
use App\Models\Scopes\StatusScope;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function getProjects($type){
        $projects = Projects::orderByDesc('id')->where('status' ,'on')->where('type' ,$type)->paginate(5) ;
        if($projects){
            return view('site.projects.project' , compact('projects'));
        }else{
            return redirect(route('index'));
        }

    }

    function detailProject($title){
         $title = returnSpaceBetweenString($title);
         $project = Projects::orderByDesc('id')->where('title_'.Lang() ,$title)->where('status' ,'on')->first();
         $news =Article::orderByDesc('id')->where('status' ,'on')->limit(3)->get();

        if($project){
            $project->increment('views', 1);
            return view('site.projects.project-details' , compact('project' ,'news'));
        }else{
            return redirect(route('index'));
        }
    }

    function getProjectPublications($name){
        $title = returnSpaceBetweenString($name);
        $project = Projects::orderByDesc('id')->where('title_'.Lang() ,$title)->where('status' ,'on')->first();
        if($project){
             $publications =  $project->publications;
            if($publications){
                return view('site.publications.advertisements' , compact('publications'));
            }else{
                return redirect(route('index'));
            }
        }else{
            return redirect(route('index'));
        }


    }
}
