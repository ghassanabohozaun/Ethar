<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'year' => 'required',
            'type' => 'required',
            'file'   => ['required_without:hidden_file','mimes:pdf']
        ];
    }


    public function messages()
    {
        return [
            'required' => trans('reports.required'),
            'mimes' => trans('reports.mimes'),
            'file.required_without' => trans('reports.file_required'),
        ];
    }
}
