<?php

namespace App\DataTables;

use App\Models\Bed;
use Yajra\DataTables\Services\DataTable;

class BedsDataTable extends DataTable
{
    use BuilderParameters;

    /**
     * Build DataTable class.
     *ي
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
      return datatables($query)
      ->addColumn('checkbox', '<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
      ->addColumn('show', 'backend.beds.buttons.show')
      ->addColumn('edit', 'backend.beds.buttons.edit')
      ->addColumn('delete', 'backend.beds.buttons.delete')
      ->rawColumns(['checkbox','show','edit', 'delete'])
      ;

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Bed $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
      $query = Bed::query()->with('dep_relation')->select('beds.*');
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
        ->parameters($this->getCustomBuilderParameters([1,2], [], GetLanguage() == 'ar'));

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
                'name' => "beds.number",
                'data'    => 'number',
                'title'   => trans('main.number'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '200px',
            ],
            [
                'name' => "dep_relation.name",
                'data'    => 'dep_relation.name',
                'title'   => trans('main.departmentname'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '200px',
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
        return 'Beds_' . date('YmdHis');
    }
}
