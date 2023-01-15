<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
        return [
            'photo' => 'required_without:hidden_photo|image|mimes:jpeg,jpg,png|max:1024',
            'name_ar' => 'required',
            'name_en' => 'required',
            'position_ar' => 'required',
            'position_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('teams.required'),
            'image' => trans('teams.image'),
            'mimes' => trans('teams.mimes'),
            'max' => trans('teams.image_max'),
            'photo.required_without' => trans('teams.photo_required'),
        ];
    }
}
