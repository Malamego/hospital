<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BedsRequest;
use App\DataTables\BedsDataTable;
use App\Models\Department;
use App\Models\Bed;
use App\Authorizable;

class BedsController extends Controller
{
   use Authorizable;
    private $viewPath = 'backend.beds';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BedsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.beds')
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $dep   =  Department::all();
        return view("{$this->viewPath}.create", [
          'title' => trans('main.add') . ' ' . trans('main.beds'),
          'dep' => $dep,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedsRequest $request)
    {
        $requestAll = $request->all();
        if (Bed::where('dep_id', $request->dep_id)->where('number', $request->number)->exists()) {
          session()->flash('error', trans('main.bednumber'));
          return redirect()->back();
      }

        $bed =  Bed::create($requestAll);
        session()->flash('success', trans('main.added-message'));
        return redirect()->route('beds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bed = Bed::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.bed') . ' : ' . $bed->number,
          'show' => $bed,
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
        $bed = Bed::findOrFail($id);
        $dep  = Department::all();
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.bed') . ' : ' . $bed->number,
          'edit' => $bed,
          'dep'  => $dep,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BedsRequest $request, $id)
    {
        $bed = Bed::find($id);
        $bed->number = $request->number;
        $bed->desc = $request->desc;
        $bed->status = $request->status;
        $bed->dep_id = $request->dep_id;
        if (Bed::where('dep_id', $request->dep_id)->where('number', $request->number)->exists()) {
          session()->flash('error', trans('main.bednumber'));
          return redirect()->back();
          
        $bed->save();
        session()->flash('success', trans('main.updated'));
        return redirect()->route('beds.show', [$bed->id]);
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
        $bed = Bed::findOrFail($id);
        $bed->delete();
        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('beds.index');
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
            return redirect()->route('beds.index');
        }
    }
}
