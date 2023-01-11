<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;
use App\Http\Requests\SlidersUpdateRequest;
use App\Http\Resources\SliderResource;
use App\Models\Article;
use App\Models\Slider;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.sliders');

        $sliders = Slider::orderByDesc('created_at')->paginate(15);
        return view('admin.landing-page.sliders.index', compact('title', 'sliders'));
    }


    ////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_slider');
        return view('admin.landing-page.sliders.create', compact('title'));
    }
    //////////////////////////////////////////////////////////////////////
    ///Store Slider function

    protected function store(SlidersRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/sliders');
            $photo_path = $this->saveResizeImage($image, $destinationPath);
        } else {
            $photo_path = '';
        }

        $lang_en = setting()->site_lang_en;
        Article::create([
            'photo' => $photo_path,
            'language' => 'ar_en',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'details_status' => $request->details_status,
            'button_status' => $request->button_status,
            'url_ar' => null,
            'url_en' => null,
            'order' => $request->order,
        ]);

        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    ////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('sliders.slider_update');
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.landing-page.sliders.update', compact('title', 'slider'));
    }


    //////////////////////////////////////////////////////////////////////
    /// update Slider function
    protected function update(SlidersUpdateRequest $request)
    {

        $slider = Slider::find($request->id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }


        if ($request->hasFile('photo')) {

            $image_path = public_path("\adminBoard\uploadedImages\articles\\") . $article->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (!empty($article->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\articles\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\articles\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath);
            }
        } else {
            if (!empty($article->photo)) {
                $photo_path = $article->photo;
            } else {
                $photo_path = '';
            }
        }

        $lang_en = setting()->site_lang_en;
        $slider::update([
            'photo' => $photo_path,
            'language' => 'ar_en',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'details_status' => $request->details_status,
            'button_status' => $request->button_status,
            'url_ar' => null,
            'url_en' => null,
            'order' => $request->order,
        ]);


        return $this->returnSuccessMessage(trans('general.update_success_message'));

    }

    ////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        try {
            if ($request->ajax()) {
                $slider = Slider::find($request->id);
                if (!$slider) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($slider->photo)) {
                    Storage::delete($slider->photo);
                }
                $slider->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }

    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {


        try {
            $slider = Slider::find($request->id);
            if ($request->switchStatus == 'false') {
                $slider->status = null;
                $slider->save();
            } else {
                $slider->status = 'on';
                $slider->save();
            }
            return $this->returnSuccessMessage(trans('general.change_status_success_message'));

        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch

    }

}
