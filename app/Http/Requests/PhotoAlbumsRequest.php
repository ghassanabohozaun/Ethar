<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoAlbumsRequest extends FormRequest
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
                'language' => 'required|in:ar,ar_en',
                'title_ar' => 'required',
                'title_en' => 'required',
                'main_photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
            ];
        } else {
            return [
                'language' => 'required|in:ar,ar_en',
                'title_ar' => 'required',
                'main_photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',

            ];
        }

    }

    public function messages()
    {
        return [
            'required' => trans('photoAlbums.required'),
            'in' => trans('photoAlbums.in'),
            'image' => trans('photoAlbums.image'),
            'mimes' => trans('photoAlbums.mimes'),
            'max' => trans('photoAlbums.image_max'),
            'photo.required' => trans('photoAlbums.photo_required'),
        ];
    }
}
