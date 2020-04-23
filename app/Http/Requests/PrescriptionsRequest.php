<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionsRequest extends FormRequest
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
            'urea'        => 'required',
            'creatinie'   => 'required',
            'potassium'   => 'required',
            'alt'         => 'required',
            'ast'         => 'required',
            'bilirubin'   => 'required',
            'albumin'     => 'required',
            'dispensed'   => 'required|in:no,yes',
            'pat_id'      => 'sometimes|exists:patients,id',
            'bed_id'      => 'required|exists:beds,id',
            'med_id'      => 'required|exists:medications,id',
        ];
    }


    public function attributes()
    {
        return [
            'urea'              => trans('main.urea'),
            'creatinie'         => trans('main.creatinie'),
            'potassium'         => trans('main.potassium'),
            'alt'               => trans('main.alt'),
            'ast'               => trans('main.ast'),
            'bilirubin'         => trans('main.bilirubin'),
            'albumin'           => trans('main.albumin'),
            'dispensed'         => trans('main.dispensed'),
            'pat_id'            => trans('main.patient'),
            'bed_id'            => trans('main.bed'),
            'med_id'            => trans('main.medication'),
        ];
    }
}
