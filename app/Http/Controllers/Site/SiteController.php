<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\About;
use App\Models\AboutType;
use App\Models\Partner;
use App\Models\Projects;
use App\Models\QA;
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
                })->get();

            // projects
            $lastProjects = Projects::orderByDesc('id')->where('status', 'on')
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
                })->get();

            //  projects
            $lastProjects = Projects::orderByDesc('id')->where('status', 'on')
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

        $partners = Partner::orderByDesc('id')->where('status', 'on')->get();

        return view('site.index', compact('title', 'sliders', 'lastProjects', 'founders', 'lastArticles','testimonials','partners'));
    }

    // About
    public function about( $name){
        // return current name 
        $name = returnSpaceBetweenString($name);

         $about_type = AboutType::where('name_'.Lang(),$name)->first();
         if(!$about_type){
            return redirect(route('index'));
         }
          $about = About::status()->where('about_type_id' , $about_type->id) ->first();
        if($about){
            return view('site.about', compact('about'));
        }else{
            return view('site.about' , compact('about_type'));
        }
    }

    function qa(){
        $qas = QA::orderByDesc('id')->get();
        if($qas){
            return view('site.faq', compact('qas'));
        }else{
            return redirect()->back();
        }

    }

}