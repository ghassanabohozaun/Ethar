<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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

    public function rules()
    {
        if (setting()->site_lang_en == 'on') {
            return [
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required',
                'title_en' => 'required',
                'abstract_ar' => 'required',
                'abstract_en' => 'required',
                'publish_date' => 'required',
                'publisher_name' => 'required',
            ];
        } else {
            return [
                'photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required',
                'abstract_ar' => 'required',
                'publish_date' => 'required',
                'publisher_name' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'language.required' => trans('articles.language_required'),
            'title_ar.required' => trans('articles.title_ar_required'),
            'title_en.required' => trans('articles.title_en_required'),
            'abstract_ar.required' => trans('articles.abstract_ar_required'),
            'abstract_en.required' => trans('articles.abstract_en_required'),
            'publish_date.required' => trans('articles.publish_date_required'),
            'publisher_name.required' => trans('articles.publisher_name_required'),

            'in' => trans('articles.in'),
            'numeric' => trans('articles.numeric'),
            'image' => trans('articles.image'),
            'title_ar.unique' => trans('articles.unique_ar'),
            'title_en.unique' => trans('articles.unique_en'),
            'mimes' => trans('articles.mimes'),
            'max' => trans('articles.image_max'),
            'photo.required' => trans('articles.photo_required'),
        ];
    }
}
