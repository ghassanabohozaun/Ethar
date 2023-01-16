<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QARequest extends FormRequest
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

                'title_ar' => 'required|unique:articles',
                'title_en' => 'required|unique:articles',
                'details_ar' => 'required',
                'details_en' => 'required',
            ];
        } else {
            return [

                'title_ar' => 'required|unique:articles',
                'details_ar' => 'required',
            ];
        }
    }
}
