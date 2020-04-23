<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BedsRequest extends FormRequest
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
            'number'     => 'required|numeric',
            'desc'       => 'nullable',
            'status'     => 'required|in:close,open',
            'dep_id'     => 'required|exists:departments,id',
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
