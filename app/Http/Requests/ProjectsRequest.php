<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsRequest extends FormRequest
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
                    'photo' => 'required_without:ph|image|mimes:jpeg,jpg,png|max:1024',
                    'title_ar' => 'required|unique:articles',
                    'title_en' => 'required|unique:articles',
                    'details_ar' => 'required',
                    'details_en' => 'required',
                    'date' => 'required',
                    'writer' => 'required',
                    'file'   => ['mimes:pdf']
                ];
            } else {
                return [
                    'photo' => 'required_without:ph|image|mimes:jpeg,jpg,png|max:1024',
                    'title_ar' => 'required|unique:articles',
                    'details_ar' => 'required',
                    'date' => 'required',
                    'writer' => 'required',
                    'file'   => ['mimes:pdf']
                ];
            }

    }
}
