<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixedTextsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules = [
            'project_details_ar' => 'required',
            'project_details_en' => 'required',
        ];

        return $rules;

    }

    public function messages()
    {
        return [
            'required' => __('fixedTexts.required'),
        ];
    }
}
