<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;
use App\Models\Slider;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class SlidersController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.sliders');
        $sliders = Slider::orderByDesc('created_at')->paginate(15);
        return view('admin.landing-page.sliders.index', compact('title', 'sliders'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_slider');
        return view('admin.landing-page.sliders.create', compact('title'));
    }

    // store
    protected function store(SlidersRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('\adminBoard\uploadedImages\sliders\\');
            $photo_path = $this->saveResizeImage($image, $destinationPath);
        } else {
            $photo_path = '';
        }

        $lang_en = setting()->site_lang_en;
        Slider::create([
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

        return $this->returnSuccessMessage(__('general.add_success_message'));

    }

    // edit
    public function edit($id = null)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }
        $title = __('sliders.slider_update');
        return view('admin.landing-page.sliders.update', compact('title', 'slider'));
    }


    /// update
    protected function update(SlidersRequest $request)
    {

        $slider = Slider::find($request->id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {

            $image_path = public_path("\adminBoard\uploadedImages\sliders\\") . $slider->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (!empty($article->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\sliders\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\sliders\\');
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
        $slider->update([
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

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    ////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
            if ($request->ajax()) {
                $slider = Slider::find($request->id);
                if (!$slider) {
                    return redirect()->route('admin.not.found');
                }
                if (!empty($slider->photo)) {
                    $image_path = public_path("\adminBoard\uploadedImages\sliders\\") . $slider->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $slider->delete();
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
    }

    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
            $slider = Slider::find($request->id);
            if ($request->switchStatus == 'false') {
                $slider->status = null;
                $slider->save();
            } else {
                $slider->status = 'on';
                $slider->save();
            }
            return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

}
