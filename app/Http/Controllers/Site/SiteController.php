<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutType;
use App\Models\Scopes\StatusScope;
use App\Models\Slider;
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
            /// Slider
            $sliders = Slider::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(2)->get();
        } else {
            /// Slider
            $sliders = Slider::orderByDesc('id')->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })->take(2)->get();
        }






        return view('site.index', compact('title', 'sliders'));
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
