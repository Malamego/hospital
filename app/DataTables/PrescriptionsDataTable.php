<?php

namespace App\DataTables;

use App\Models\Prescription;
use Yajra\DataTables\Services\DataTable;

class PrescriptionsDataTable extends DataTable
{
    use BuilderParameters;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('checkbox', '<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
        ->addColumn('show', 'backend.prescriptions.buttons.show')
        ->addColumn('edit', 'backend.prescriptions.buttons.edit')
        ->addColumn('delete', 'backend.prescriptions.buttons.delete')
        ->rawColumns(['checkbox','show','edit', 'delete'])
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\prescriptions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Prescription::query()->with('pat_relation', 'bed_relation')->select('prescriptions.*');
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
        ->parameters($this->getCustomBuilderParameters([1,2,3], [], GetLanguage() == 'ar'));

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
                'name' => "prescriptions.id",
                'data'    => 'id',
                'title'   => trans('main.preid'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => "prescriptions.created_at",
                'data'    => 'created_at',
                'title'   => trans('main.created_at'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => "pat_relation.name",
                'data'    => 'pat_relation.name',
                'title'   => trans('main.patname'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            [
                'name' => "bed_relation.number",
                'data'    => 'bed_relation.number',
                'title'   => trans('main.bedn'),
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
        return 'Prescriptions_' . date('YmdHis');
    }
}
