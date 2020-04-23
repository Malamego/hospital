<?php

namespace App\DataTables;

use App\Models\Patient;
use Yajra\DataTables\Services\DataTable;

class PatientsDataTable extends DataTable
{
    use BuilderParameters;

    /**
     * Build DataTable Patient.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('checkbox', '<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
        ->addColumn('dep_relation.name', function ($model) {
            return $model->dep_relation ? $model->dep_relation->name : 'N/A';
        })
        ->addColumn('bed_relation.name', function ($model) {
            return $model->bed_relation ? $model->bed_relation->name : 'N/A';
        })
        ->addColumn('show', 'backend.patients.buttons.show')
        ->addColumn('edit', 'backend.patients.buttons.edit')
        ->addColumn('delete', 'backend.patients.buttons.delete')
        ->rawColumns(['checkbox','show','edit', 'delete'])
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Patient $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Patient::query()->with('bed_relation','dep_relation')->select('patients.*');
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
         ->columns($this->getColumns())
         ->ajax('')
        ->parameters($this->getCustomBuilderParameters([1,2,3,4], [], GetLanguage() == 'ar'));

        return $html;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="select-all" onclick="select_all()">',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
            [
                'name' => "patients.name",
                'data'    => 'name',
                'title'   => trans('main.name'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => "dep_relation.name",
                'data'    => 'dep_relation.name',
                'title'   => trans('main.departmentname'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => "bed_relation.number",
                'data'    => 'bed_relation.number',
                'title'   => trans('main.number'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => "patients.phone",
                'data'    => 'phone',
                'title'   => trans('main.phone'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => 'show',
                'data' => 'show',
                'title' => trans('main.show'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ],
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('main.edit'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('main.delete'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ],

        ];
    }

    protected function filename()
    {
        return 'Patients_' . date('YmdHis');
    }
}
