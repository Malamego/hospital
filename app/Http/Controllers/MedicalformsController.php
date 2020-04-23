<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedicalformsRequest;
use App\DataTables\MedicalformsDataTable;
use App\Models\Medicalform;
use App\Authorizable;

class MedicalformsController extends Controller
{
   use Authorizable;
    private $viewPath = 'backend.medicalforms';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicalformsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.medicalforms')
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->viewPath}.create", [
          'title' => trans('main.add') . ' ' . trans('main.medicalforms'),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalformsRequest $request)
    {
        $requestAll = $request->all();

        $med =  Medicalform::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('medicalforms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $med = Medicalform::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.medicalform') . ' : ' . $med->name,
          'show' => $med,
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
        $med = Medicalform::findOrFail($id);
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.medicalform') . ' : ' . $med->name,
          'edit' => $med,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalformsRequest $request, $id)
    {
        $med = Medicalform::find($id);
        $med->name = $request->name;
        $med->desc = $request->desc;
        $med->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('medicalforms.show', [$med->id]);
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
        $med = Medicalform::findOrFail($id);
        $med->delete();
        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('medicalforms.index');
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
            return redirect()->route('medicalforms.index');
        }
    }
}
