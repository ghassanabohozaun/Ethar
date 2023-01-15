<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutsRequest extends FormRequest
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
                'photo' => 'image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required|unique:articles',
                'title_en' => 'required|unique:articles',
                'details_ar' => 'required',
                'details_en' => 'required',
                'type_id' =>['required','exists:about_types,id']
            ];
        } else {
            return [
                'photo' => 'image|mimes:jpeg,jpg,png|max:1024',
                'title_ar' => 'required|unique:articles',
                'details_ar' => 'required',
                'type_id' =>['required','exists:about_types,id']
            ];
        }
    }
}
