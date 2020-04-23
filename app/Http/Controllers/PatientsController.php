<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PatientsRequest;
use App\DataTables\PatientsDataTable;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Bed;
use Helper;
use App\Authorizable;

class PatientsController extends Controller
{
   use Authorizable;
    private $viewPath = 'backend.patients';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PatientsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.patients')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Department::all();
        $bed = Bed::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.patients'),
            'dep' => $dep,
            'bed' => $bed,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientsRequest $request)
    {
        // To Make Sure my order doesn't duplicate..
        $requestAll = $request->all();

        // if (Patient::where('course_id', $request->course_id)->where('myorder', $request->myorder)->exists()) {
        //     session()->flash('error', trans('main.ordernumber'));
        //     return redirect()->back();
        // }

        $requestAll = $request->all();
       if ($request->hasfile('image')) {
        $requestAll['image'] = Helper::Upload('patients', $request->file('image'), 'checkImages');
         }

        $requestAll['user_id'] = auth()->user()->id;

        $pat = Patient::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pat = Patient::where('id', $id)->with('dep_relation')->with('bed_relation')->first();
        $pat = Patient::where('id', $id)->with('bed_relation')->first();
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.patient') . ' : ' . $pat->title,
            'show' => $pat,
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
        $pat = Patient::findOrFail($id);
        $dep = Department::all();
        $bed = Bed::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.patient') . ' : ' . $pat->name,
            'edit' => $pat,
            'dep' => $dep,
            'bed' => $bed,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientsRequest $request, $id)
    {
        $pat = Patient::find($id);

        $pat->name          =     $request->name;
        $pat->address       =     $request->address;
        $pat->age           =     $request->age;
        $pat->weight        =     $request->weight;
        $pat->dep_id        =     $request->dep_id;
        $pat->bed_id        =     $request->bed_id;
        $pat->email         =     $request->email;
        $pat->regdate       =     $request->regdate;
        $pat->sex           =     $request->sex;
        $pat->smoker        =     $request->smoker;
        $pat->hypertensive  =     $request->hypertensive;
        $pat->diabetic      =     $request->diabetic;
        $pat->history       =     $request->history;
        $pat->ecg           =     $request->ecg;
        $pat->echo          =     $request->echo;

        if ($request->hasFile('image')) {
            $pat->image = Helper::UploadUpdate($pat->image ?? null, 'patients', $request->file('image'), 'checkImages');
        }
        $pat->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('patients.show', [$pat->id]);
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
        $pat = Patient::findOrFail($id);
        if (file_exists(public_path('uploads/' . $pat->image))) {
            @unlink(public_path('uploads/' . $pat->image));
        }
        $pat->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('patients.index');
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
            return redirect()->route('patients.index');
        }
    }
}
