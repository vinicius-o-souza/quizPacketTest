<?php

namespace PandoApps\Quiz\DataTables;

use PandoApps\Quiz\Models\Alternative;
use PandoApps\Quiz\Services\DataTablesDefaults;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class AlternativeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\Datatables
     */
    public function dataTable()
    {
        $question_id = request()->question_id;
        $alternatives = Alternative::where('question_id', $question_id)->with('questions')->get();

        return Datatables::of($alternatives)
            ->addColumn('action' , 'pandoapps::alternatives.datatables_actions')
            ->addColumn('question', function(Alternative $alternative) {
                return $alternative->question->title;
            })
            ->rawColumns(['action', 'question']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->minifiedAjax()
            ->columns($this->getColumns())
            ->addAction(['width' => '75px', 'printable' => false, 'title' => 'Opções'])
            ->parameters(DataTablesDefaults::getParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'question'      => ['title' => 'Questão'],
            'title'         => ['title' => 'Título'],
            'body'          => ['title' => 'Descrição'],
            'value'         => ['title' => 'Valor'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'questionnairesdatatable_' . time();
    }
}
