<?php

namespace PandoApps\Quiz\DataTables;

use PandoApps\Quiz\Models\Question;
use PandoApps\Quiz\Services\DataTablesDefaults;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class QuestionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\Datatables
     */
    public function dataTable()
    {
        $questionnaire_id = request()->questionnaire_id;
        $questions = Question::where('questionnaire_id', $questionnaire_id)->with('question_type')->get();

        return Datatables::of($questions)
            ->addColumn('action' , 'pandoapps::questions.datatables_actions')
            ->addColumn('question_type', function(Question $question) {
                return $question->question_type->name;
            })
            ->editColumn('is_active', function(Question $question) {
                return $question->is_active ? 'Sim' : 'Não';
            })
            ->editColumn('is_required', function(Question $question) {
                return $question->is_required ? 'Sim' : 'Não';
            })
            ->rawColumns(['action', 'question_type', 'is_active', 'is_required']);
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
            'question_type'     => ['title' => 'Tipo da Questão'],
            'title'             => ['title' => 'Título'],
            'body'              => ['title' => 'Descrição'],
            'hint'              => ['title' => 'Dica'],
            'weight'            => ['title' => 'Peso'],
            'is_required'       => ['title' => 'Obrigatória'],
            'is_active'         => ['title' => 'Ativa']
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
