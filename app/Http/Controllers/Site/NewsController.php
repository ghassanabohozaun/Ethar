<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function getNews(){
        $news = Article::orderByDesc('id')->where('status' ,'on')->paginate(8) ;
        if($news){
            return view('site.news.new' , compact('news'));
        }else{
            return redirect(route('index'));
        }

    }

    function detailNew($title){
         $title = returnSpaceBetweenString($title);
         $new= Article::orderByDesc('id')->where('title_'.Lang() ,$title)->where('status' ,'on')->first();
        if($new){
            $new->increment('views', 1);
            return view('site.news.new-details' , compact('new' ));
        }else{
            return redirect(route('index'));
        }
    }
}
