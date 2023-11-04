<?php

namespace App\DataGrids;

use Illuminate\Support\Facades\DB;
use App\config\DataGrid;

class TicketsDataGrid extends DataGrid
{
    /**
     * Index column for the tickets table.
     *
     * @var string
     */
    protected $index = 'id';

    /**
     * Sort order for the datagrid.
     *
     * @var string
     */
    protected $sortOrder = 'desc';

    /**
     * Prepare query builder to retrieve data from the tickets table.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('tickets')
            ->select('id', 'ticketId', 'status');

        $this->setQueryBuilder($queryBuilder);
    }

    /**
     * Define columns for the datagrid.
     *
     * @return void
     */
    public function addColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => 'ID',
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'ticketId',
            'label'      => 'Ticket ID',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => 'Status',
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($value) {
                return $value->status == 1 ? 'Active' : 'Inactive';
            },
        ]);
    }
}