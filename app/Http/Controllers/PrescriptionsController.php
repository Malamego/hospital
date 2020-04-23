<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrescriptionsRequest;
use App\DataTables\PrescriptionsDataTable;
use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Medication;
use App\Models\Bed;
use App\Authorizable;


class PrescriptionsController extends Controller
{
   use Authorizable;
    private $viewPath = 'backend.prescriptions';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PrescriptionsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.prescription')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pat = Patient::all();
        $bed = Bed::all();
        $med = Medication::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.prescription'),
            'pat' => $pat,
            'bed' => $bed,
            'med' => $med,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrescriptionsRequest $request)
    {
        $requestAll = $request->all();

        $requestAll = $request->all();
        $requestAll['user_id'] = auth()->user()->id;
        $pre = Prescription::create($requestAll);
        if ($requestAll['med_id'])
        {
          $pre->med_relation()->attach($requestAll['med_id']);
        }

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('prescriptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pre = Prescription::where('id', $id)->with('pat_relation')->with('bed_relation')->first();
        $pre = Prescription::where('id', $id)->with('pat_relation')->first();
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.prescription') . ' : ' . $pre->id,
            'show' => $pre,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pre = Prescription::where('id', $id)->with('pat_relation', 'bed_relation', 'med_relation')->first();
        $pat = Patient::all();
        $bed = Bed::all();
        $med = Medication::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.prescription') . ' : ' . $pre->id,
            'edit' => $pre,
            'pat' => $pat,
            'bed' => $bed,
            'med' => $med,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrescriptionsRequest $request, $id)
    {
        $pre = Prescription::find($id);
        $pre->pat_id        =     $request->pat_id;
        $pre->bed_id        =     $request->bed_id;
        $pre->urea          =     $request->urea;
        $pre->creatinie     =     $request->creatinie;
        $pre->potassium     =     $request->potassium;
        $pre->alt           =     $request->alt;
        $pre->ast           =     $request->ast;
        $pre->bilirubin     =     $request->bilirubin;
        $pre->albumin       =     $request->albumin;
        $pre->dispensed     =     $request->dispensed;

        $pre->save();

        if ($request->med_id) {
                $pre->med_relation()->sync($request->med_id);
                 }
        session()->flash('success', trans('main.updated'));
        return redirect()->route('prescriptions.show', [$pre->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $redirect = true)
    {
        $pre = Prescription::findOrFail($id);
        $pre->delete();
        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('prescriptions.index');
        }
    }


    /**
     * Remove the multible resource from storage.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function multi_delete(Request $request)
    {
        if (count($request->selected_data)) {
            foreach ($request->selected_data as $id) {
                $this->destroy($id, false);
            }
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('prescriptions.index');
        }
    }
}
