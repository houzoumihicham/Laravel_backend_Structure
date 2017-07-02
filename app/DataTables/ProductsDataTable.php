<?php

namespace App\DataTables;

use App\models\Products;
use Yajra\Datatables\Services\DataTable;

class ProductsDataTable extends DataTable
{

     protected $modName='products';
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'backend.'.$this->modName.'.table_button')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Products::query();

        return $this->applyScopes($query);
    }
    

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
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
                'name' => 'id',
                'data' => 'id',
                'title' => trans($this->modName.'.id'),
                'visible' => false,
                'orderable'=> false,
                'searchable'=> false
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans($this->modName.'.name'),
                'orderable'=> true,
                'searchable'=> true
            ],
            [
                'name' => 'default_image',
                'data' => 'default_image',
                'render' => '"<img src=\"/backend/models/products/img/"+data+"\" height=\"50\"/>"',
                'title' => trans($this->modName.'.image'),
                'orderable'=> false,
                'searchable'=> false
            ]
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'productsdatatables_' . time();
    }
}
