<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if (setting()->site_lang_en == 'on') {
            return [
                'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
                'opinion_ar' => 'required',
                'opinion_en' => 'required',
                'name_ar' => 'required',
                'name_en' => 'required',
                'age' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'rating' => 'required',
            ];
        } else {
            return [
                'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
                'opinion_ar' => 'required',
                'name_ar' => 'required',
                'age' => 'required',
                'country' => 'required',
                'gender' => 'required',
                'rating' => 'required',
            ];
        }

    }

    public function messages()
    {
        return [
            'required' => trans('testimonials.required'),
            'in' => trans('testimonials.in'),
            'image' => trans('testimonials.image'),
            'mimes' => trans('testimonials.mimes'),
            'max' => trans('testimonials.image_max'),
            'photo.required' => trans('testimonials.photo_required'),
        ];
    }
}
