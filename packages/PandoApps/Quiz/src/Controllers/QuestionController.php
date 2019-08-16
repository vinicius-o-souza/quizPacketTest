<?php

namespace PandoApps\Quiz\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use PandoApps\Quiz\Models\Question;
use PandoApps\Quiz\Models\QuestionType;
use PandoApps\Quiz\DataTables\QuestionDataTable;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir questões
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class QuestionController extends Controller
{

    /**
     * Retorna todas as questões cadastradas
     */
    public function index(QuestionDataTable $questionDataTable)
    {
        return $questionDataTable->render('pandoapps::questions.index');
    }

    /**
     * Redireciona para a tela de cadastrar uma questão
     */
    public function create()
    {
        $questionsType = QuestionType::orderBy('name','asc')->pluck('name','id')->toArray();

        return view('pandoapps::questions.create', compact('questionsType'));
    }

    /**
     * Salva uma questão
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $questionValidation = Validator::make($input, Question::$rules);
        if ($questionValidation->fails()) {
            $errors = $questionValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        Question::create([
            'title'            => $input['title'],
            'body'             => $input['body'],
            'hint'             => isset($input['hint']) ? $input['hint'] : '',
            'is_required'      => isset($input['is_required']) ? true : '',
            'questionnaire_id' => request()->questionnaire_id,
            'question_type_id' => $input['question_type_id'],
        ]);

        flash('Questão criada com sucesso!')->success();

        return redirect(route('questions.index', request()->questionnaire_id));
    }

    /**
     * Exibe a questão para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $question = Question::find($id);

        $questionsType = QuestionType::orderBy('name','asc')->pluck('name','id')->toArray();

        if(empty($question)) {
            flash('Questão não encontrada!')->error();

            return redirect(route('questions.index'));
        }

        return view('pandoapps::questions.edit', compact('question', 'questionsType'));
    }

    /**
     * Atualiza uma questão
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $question = Question::find($id);

        if(empty($question)) {
            flash('Questão não encontrada!')->error();

            return redirect(route('questions.index'));
        }

        $input = $request->all();

        $questionValidation = Validator::make($input, Question::$rules);
        if ($questionValidation->fails()) {
            $errors = $questionValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        $question->update($input);

        flash('Questão atualizada com sucesso!')->success();

        return redirect(route('questions.index', request()->questionnaire_id));
    }

    /**
     * Exibe uma questão pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $question = Question::find($id);

        if(empty($question)) {
            flash('Questão não encontrada!')->error();

            return redirect(route('questions.index'));
        }

        return view('pandoapps::questions.show', compact('question'));
    }

    /**
     * Deleta uma questão (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if(empty($question)) {
            flash('Questão não encontrada!')->error();

            return redirect(route('questions.index'));
        }

        $id = $question->id;
        $question->delete();

        flash('Questão deletada com sucesso!')->success();

        return redirect(route('questions.index', request()->questionnaire_id));
    }
}
