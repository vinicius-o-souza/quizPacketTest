<?php

namespace PandoApps\Quiz\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use PandoApps\Quiz\Models\QuestionType;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir questionários
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class QuestionTypeController extends Controller
{

    /**
     * Retorna todos os questionários cadastrados
     */
    public function index()
    {
        $questionType = QuestionType::all();

        return view('pandoapps::question_type.index',compact('questionType'));
    }

    /**
     * Redireciona para a tela de cadastrar um questionário
     */
    public function create()
    {
        return view('pandoapps::question_type.create');
    }

    /**
     * Salva um questionário
     * @param QuestionTypeRequest $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $questionnaire_validation = Validator::make($input, QuestionType::$rules);
        if ($questionnaire_validation->fails()) {
            $errors = $questionnaire_validation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        QuestionType::create([
            'name'        => $input['name'],
            'answer_once' => isset($input['answer_once']) ? true : false
        ]);

        flash('Questionário criado com sucesso!')->success();

        return redirect(route('question_type.index'));
    }

    /**
     * Exibe o questionário para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $questionnaire = QuestionType::find($id);

        if(empty($questionnaire))
        {
            flash('Questionário não encontrado!')->error();

            return redirect(route('question_type.index', $questionnaire->id));
        }

        return view('pandoapps::question_type.edit', compact('questionnaire'));
    }

    /**
     * Atualiza um questionário
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $questionnaire = QuestionType::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('question_type.index'));
        }

        $input = $request->all();

        $questionnaire_validation = Validator::make($input, QuestionType::$rules);
        if ($questionnaire_validation->fails()) {
            $errors = $questionnaire_validation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        $questionnaire->update($input);

        flash('Questionário atualizado com sucesso!')->success();

        return redirect(route('question_type.index', $questionnaire->id));
    }

    /**
     * Exibe um questionário pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $questionnaire = QuestionType::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('question_type.index', $questionnaire->id));
        }

        return view('pandoapps::question_type.show', compact('questionnaire'));
    }

    /**
     * Deleta um questionário (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $questionnaire = QuestionType::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('question_type.index', $questionnaire->id));
        }

        $id = $questionnaire->id;
        $questionnaire->delete();

        flash('Questionário deletado com sucesso!')->success();

        return redirect(route('question_type.index', $id));
    }
}
