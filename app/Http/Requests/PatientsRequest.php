<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientsRequest extends FormRequest
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
            'image'       => 'nullable|image',
            'name'        => 'required',
            'address'     => 'required',
            'history'     => 'required',
            'ecg'         => 'required',
            'echo'        => 'required',
            'age'         => 'required|integer',
            'weight'      => 'required',
            'phone'       => 'required|unique:patients',
            'dep_id'      => 'sometimes|exists:departments,id',
            'bed_id'      => 'required|exists:beds,id',
            'email'       => 'nullable|unique:users',
            'regdate'     => 'nullable|date',
            'sex'         => 'required|in:male,female',
            'smoker'      => 'required|in:yes,no',
            'hypertensive'      => 'required|in:yes,no',
            'diabetic'          => 'required|in:yes,no',
        ];
    }


    public function attributes()
    {
        return [
            'name'            => trans('main.name'),
            'address'         => trans('main.address'),
            'history'         => trans('main.history'),
            'ecg'             => trans('main.ecg'),
            'echo'            => trans('main.echo'),
            'age'             => trans('main.age'),
            'weight'          => trans('main.weight'),
            'phone'           => trans('main.phone'),
            'dep_id'          => trans('main.department'),
            'bed_id'          => trans('main.bed'),
            'email'           => trans('main.email'),
            'regdate'         => trans('main.regdate'),
            'sex'             => trans('main.sex'),
            'smoker'          => trans('main.smoker'),
            'hypertensive'    => trans('main.hypertensive'),
            'diabetic'        => trans('main.diabetic'),
            'image'           => trans('main.image'),
        ];
    }
}
