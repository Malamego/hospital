<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentsRequest;
use App\DataTables\DepartmentsDataTable;
use App\Models\Department;
use App\Authorizable;

class DepartmentsController extends Controller
{
    use Authorizable;
    private $viewPath = 'backend.departments';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.departments')
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
          'title' => trans('main.add') . ' ' . trans('main.departments'),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentsRequest $request)
    {
        $requestAll = $request->all();

        $dep =  Department::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dep = Department::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.department') . ' : ' . $dep->name,
          'show' => $dep,
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
        $dep = Department::findOrFail($id);
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.department') . ' : ' . $dep->name,
          'edit' => $dep,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentsRequest $request, $id)
    {
        $dep = Department::find($id);
        $dep->name = $request->name;
        $dep->desc = $request->desc;
        $dep->status = $request->status;
        $dep->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('departments.show', [$dep->id]);
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
        $dep = Department::findOrFail($id);

        $dep->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('departments.index');
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
            return redirect()->route('departments.index');
        }
    }
}
