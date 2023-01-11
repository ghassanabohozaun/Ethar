<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\testimonial;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    use GeneralTrait;

    //////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = __('menu.testimonials');
        $testimonials = testimonial::orderByDesc('created_at')->paginate();
        return view('admin.testimonials.index', compact('title', 'testimonials'));
    }
    /////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = __('menu.add_new_testimonial');
        return view('admin.testimonials.create', compact('title'));
    }
    /////////////////////////////////////////////////
    /// store
    public function store(TestimonialRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/testimonials');
            $photo_path = $this->saveResizeImage($image, $destinationPath,500,500);
        } else {
            $photo_path = '';
        }


        $lang_en = setting()->site_lang_en;

        testimonial::create([
            'photo' => $photo_path,
            'language' => 'ar_en',
            'opinion_ar' => $request->opinion_ar,
            'opinion_en' => $lang_en == 'on' ? $request->opinion_en : null,
            'name_ar' => $request->name_ar,
            'name_en' => $lang_en == 'on' ? $request->name_en : null,
            'age' => $request->age,
            'country' => $request->country,
            'gender' => $request->gender,
            'job_title_ar' => $request->job_title_ar,
            'job_title_en' => $lang_en == 'on' ? $request->job_title_en : null,
            'rating' => $request->rating,
        ]);


        return $this->returnSuccessMessage(__('general.add_success_message'));

    }

    /////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $testimonial = testimonial::find($id);
        if (!$testimonial) {
            return redirect()->route('admin.not.found');
        }
        $title = __('testimonials.update_testimonial');
        return view('admin.testimonials.update', compact('title', 'testimonial'));
    }

    /////////////////////////////////////////////////
    /// store
    public function update(TestimonialRequest $request)
    {


        $testimonial = testimonial::find($request->id);
        if (!$testimonial) {
            return redirect()->route('admin.not.found');
        }


        if ($request->hasFile('photo')) {
            if (!empty($testimonial->photo)) {

                $image_path =  public_path('\adminBoard\uploadedImages\testimonials\\') . $testimonial->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\testimonials\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath,500,500);

            } else {
                $image_path =  public_path('\adminBoard\uploadedImages\testimonials\\') . $testimonial->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\testimonials\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath,500,500);
            }
        } else {
            if (!empty($testimonial->photo)) {
                $photo_path = $testimonial->photo;
            } else {
                $photo_path = '';
            }
        }


        $lang_en = setting()->site_lang_en;
        $testimonial->update([
            'photo' => $photo_path,
            'language' => 'ar_en',
            'opinion_ar' => $request->opinion_ar,
            'opinion_en' => $lang_en == 'on' ? $request->opinion_en : null,
            'name_ar' => $request->name_ar,
            'name_en' => $lang_en == 'on' ? $request->name_en : null,
            'age' => $request->age,
            'country' => $request->country,
            'gender' => $request->gender,
            'job_title_ar' => $request->job_title_ar,
            'job_title_en' => $lang_en == 'on' ? $request->job_title_en : null,
            'rating' => $request->rating,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));

    }

    /////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {

                $testimonial = testimonial::find($request->id);

                if (!$testimonial) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($testimonial->photo)) {
                    $image_path =  public_path('\adminBoard\uploadedImages\testimonials\\') . $testimonial->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $testimonial->delete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch
        (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), '500');
        }
    }


    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $testimonial = testimonial::find($request->id);

        if ($request->switchStatus == 'false') {
            $testimonial->status = null;
            $testimonial->save();
        } else {
            $testimonial->status = 'on';
            $testimonial->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

}
