<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Publications;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
class PublicationController extends Controller
{
    function getPublications($type){
        if( LaravelLocalization::getCurrentLocale() == 'ar'){
        $publications = Publications::orderByDesc('id')->where('status' ,'on')->where('type' ,$type)->where(function ($q) {
            $q->where('language', 'ar')
                ->orWhere('language', 'ar_en');
        })->paginate(8) ;
        }else{
            $publications = Publications::orderByDesc('id')->where('status' ,'on')->where('type' ,$type)->where(function ($q) {
                $q->orWhere('language', 'ar_en');
            })->paginate(8) ;
        }
        if($publications){
            return view('site.publications.publication' , compact('publications' , 'type'));
        }else{
            return redirect(route('index'));
        }

    }

    function detailPublication($title){
         $title = returnSpaceBetweenString($title);
         $publication = Publications::orderByDesc('id')->where('title_'.Lang() ,$title)->where('status' ,'on')->first();
        //  $news =Article::orderByDesc('id')->where('status' ,'on')->limit(3)->get();

        if($publication){
            $publication->increment('views', 1);
            return view('site.publications.publication-details' , compact('publication' ));
        }else{
            return redirect(route('index'));
        }
    }
}
