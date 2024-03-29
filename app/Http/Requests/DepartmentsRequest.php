<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentsRequest extends FormRequest
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
            'name'       => 'required',
            'desc'       => 'nullable',
            'status'     => 'required|in:open,close',
        ];
    }


    public function attributes()
    {
        return [
            'name'       => trans('main.name'),
            'desc'       => trans('main.desc'),
            'status'     => trans('main.status'),
        ];
    }
}
