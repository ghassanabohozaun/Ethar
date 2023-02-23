<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Article;
=======
use App\Models\About;
use App\Models\AboutType;

>>>>>>> 1c7e9cc4d3f409afc2c31ece264e71363e8579e4
use App\Models\Projects;
use App\Models\Slider;
use App\Models\Team;
use App\Models\testimonial;
use App\Traits\GeneralTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SiteController extends Controller
{
    use GeneralTrait;


    ///index
    public function index()
    {
        if (Lang() == 'ar') {
            $title = setting()->site_name_ar;
        } else {
            $title = setting()->site_name_en;
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////
        /// Arabic
        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            // Slider
            $sliders = Slider::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(2)->get();

            // projects
            $projects = Projects::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(4)->get();

            // last articles
            $lastArticles = Article::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(4)->get();




        } else {
            // Slider
            $sliders = Slider::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })->take(2)->get();

            //  projects
            $projects = Projects::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })->take(4)->get();

            // last articles
            $lastArticles = Article::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })->take(4)->get();

        }


        //founders
        $founders = Team::orderByDesc('id')->where('status', 'on')->where('type', 'founder')->get();
        $testimonials = testimonial::orderByDesc('id')->where('status', 'on')->get();

        return view('site.index', compact('title', 'sliders', 'projects', 'founders', 'lastArticles','testimonials'));
    }

    // About
    public function about( $id){
         $about = AboutType::find($id)->about()->where('status', 'on')->first();
        if($about){
            return view('site.about', compact('about'));
        }else{
            return redirect()->back();
        }

    }

}
