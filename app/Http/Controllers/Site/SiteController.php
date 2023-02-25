<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutType;

use App\Models\Projects;
use App\Models\QA;
use App\Models\Slider;
use App\Models\Team;
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

        }


        //founders
        $founders = Team::orderByDesc('id')->where('status', 'on')->where('type','founder')->get();


        return view('site.index', compact('title', 'sliders','projects','founders'));
    }

    // About
    public function about( $name){
        $name = returnSpaceBetweenString($name);
      return    $about = AboutType::where('name_'.Lang(),$name)->first();
    //   ->about()->where('status', 'on')->first();
        if($about){
            return view('site.about', compact('about'));
        }else{
            return redirect()->back();
        }
    }

    function qa(){
        $qas = QA::get();
        if($qas){
            return view('site.faq', compact('qas'));
        }else{
            return redirect()->back();
        }

    }

}
