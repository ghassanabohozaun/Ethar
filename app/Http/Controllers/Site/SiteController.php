<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\About;
use App\Models\AboutType;
use App\Models\Scopes\StatusScope;
=======
use App\Models\Projects;
>>>>>>> 9e0b06751611274a77a2c542a14b649cea2bd487
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
    public function about( $id){
         $about = AboutType::find($id)->about()->where('status', 'on')->first();
        if($about){
            return view('site.about', compact('about'));
        }else{
            return redirect()->back();
        }

    }

}
