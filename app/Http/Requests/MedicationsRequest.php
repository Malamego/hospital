<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicationsRequest extends FormRequest
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
            'name'          => 'required',
            'desc'          => 'nullable',
            'concen'        => 'nullable|numeric',
            'med_id'        => 'required|exists:medicalforms,id',
        ];
    }


    public function attributes()
    {
        return [
            'name'        => trans('main.name'),
            'desc'        => trans('main.desc'),
            'concen'     => trans('main.concen'),
        ];
    }
}
