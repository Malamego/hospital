<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedicationsRequest;
use App\DataTables\MedicationsDataTable;
use App\Models\Medicalform;
use App\Models\Medication;
use App\Authorizable;


class MedicationsController extends Controller
{
    use Authorizable;

    private $viewPath = 'backend.medications';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicationsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.medications')
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $medf   =  Medicalform::all();
        return view("{$this->viewPath}.create", [
          'title' => trans('main.add') . ' ' . trans('main.medications'),
          'medf' => $medf,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicationsRequest $request)
    {
        $requestAll = $request->all();

        $med =  Medication::create($requestAll);
        session()->flash('success', trans('main.added-message'));
        return redirect()->route('medications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $med = Medication::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.medication') . ' : ' . $med->name,
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
        $med = Medication::findOrFail($id);
        $medf  = Medicalform::all();
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.medication') . ' : ' . $med->name,
          'edit' => $med,
          'medf'  => $medf,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicationsRequest $request, $id)
    {
        $med = Medication::find($id);
        $med->name = $request->name;
        $med->desc = $request->desc;
        $med->concen = $request->concen;
        $med->med_id = $request->med_id;
        $med->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('medications.show', [$med->id]);
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
        $med = Medication::findOrFail($id);
        $med->delete();
        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('medications.index');
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
            return redirect()->route('medications.index');
        }
    }
}
