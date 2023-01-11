<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidersRequest extends FormRequest
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
                'title_ar' => 'required|unique:articles',
                'title_en' => 'required|unique:articles',
                'details_ar' => 'required',
                'details_en' => 'required',
            ];
        } else {
            return [
                'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required|unique:articles',
                'details_ar' => 'required',
            ];
        }



    }

    public function messages()
    {
        return [
            'required' => trans('sliders.required'),
            'in' => trans('sliders.in'),
            'numeric' => trans('sliders.numeric'),
            'image' => trans('sliders.image'),
            'unique' => trans('sliders.unique'),
            'mimes' => trans('sliders.mimes'),
            'max' => trans('sliders.image_max'),
            'photo.required' => trans('sliders.photo_required'),
        ];
    }
}
