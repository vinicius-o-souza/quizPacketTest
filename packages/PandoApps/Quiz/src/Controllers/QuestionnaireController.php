<?php

namespace PandoApps\Quiz\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use PandoApps\Quiz\Models\Questionnaire;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir questionários
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class QuestionnaireController extends Controller
{

    /**
     * Retorna todos os questionários cadastrados
     */
    public function index()
    {
        $questionnaires = Questionnaire::all();

        return view('pandoapps::questionnaires.index',compact('questionnaires'));
    }

    /**
     * Redireciona para a tela de cadastrar um questionário
     */
    public function create()
    {
        return view('pandoapps::questionnaires.create');
    }

    /**
     * Salva um questionário
     * @param QuestionnaireRequest $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $questionnaire_validation = Validator::make($input, Questionnaire::$rules);
        if ($questionnaire_validation->fails()) {
            $errors = $questionnaire_validation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        Questionnaire::create([
            'name'        => $input['name'],
            'answer_once' => isset($input['answer_once']) ? true : false
        ]);

        flash('Questionário criado com sucesso!')->success();

        return redirect(route('questionnaires.index'));
    }

    /**
     * Exibe o questionário para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('questionnaires.index', $questionnaire->id));
        }

        return view('pandoapps::questionnaires.edit', compact('questionnaire'));
    }

    /**
     * Atualiza um questionário
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $questionnaire = Questionnaire::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('questionnaires.index'));
        }

        $input = $request->all();

        $questionnaire_validation = Validator::make($input, Questionnaire::$rules);
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

        return redirect(route('questionnaires.index', $questionnaire->id));
    }

    /**
     * Exibe um questionário pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('questionnaires.index', $questionnaire->id));
        }

        return view('pandoapps::questionnaires.show', compact('questionnaire'));
    }

    /**
     * Deleta um questionário (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $questionnaire = Questionnaire::find($id);

        if(empty($questionnaire)) {
            flash('Questionário não encontrado!')->error();

            return redirect(route('questionnaires.index', $questionnaire->id));
        }

        $id = $questionnaire->id;
        $questionnaire->delete();

        flash('Questionário deletado com sucesso!')->success();

        return redirect(route('questionnaires.index', $id));
    }
}
