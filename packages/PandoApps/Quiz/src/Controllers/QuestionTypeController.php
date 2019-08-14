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

        return view('pandoapps::question_types.index',compact('questionType'));
    }

    /**
     * Redireciona para a tela de cadastrar um questionário
     */
    public function create()
    {
        return view('pandoapps::question_types.create');
    }

    /**
     * Salva um questionário
     * @param QuestionTypeRequest $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $questionTypeValidation = Validator::make($input, QuestionType::$rules);
        if ($questionTypeValidation->fails()) {
            $errors = $questionTypeValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        QuestionType::create([
            'name'        => $input['name'],
            'description' => $input['description']
        ]);

        flash('Tipo de questão criado com sucesso!')->success();

        return redirect(route('question_types.index'));
    }

    /**
     * Exibe o questionário para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $questionType = QuestionType::find($id);

        if(empty($questionType))
        {
            flash('Tipo de questão não encontrado!')->error();

            return redirect(route('question_types.index', $questionType->id));
        }

        return view('pandoapps::question_types.edit', compact('questionType'));
    }

    /**
     * Atualiza um questionário
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $questionType = QuestionType::find($id);

        if(empty($questionType)) {
            flash('Tipo de questão não encontrado!')->error();

            return redirect(route('question_types.index'));
        }

        $input = $request->all();

        $questionTypeValidation = Validator::make($input, QuestionType::$rules);
        if ($questionTypeValidation->fails()) {
            $errors = $questionTypeValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        $questionType->update($input);

        flash('Tipo de questão atualizado com sucesso!')->success();

        return redirect(route('question_types.index'));
    }

    /**
     * Exibe um questionário pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $questionType = QuestionType::find($id);

        if(empty($questionType)) {
            flash('Tipo de questão não encontrado!')->error();

            return redirect(route('question_types.index', $questionType->id));
        }

        return view('pandoapps::question_types.show', compact('questionType'));
    }

    /**
     * Deleta um questionário (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $questionType = QuestionType::find($id);

        if(empty($questionType)) {
            flash('Tipo de questão não encontrado!')->error();

            return redirect(route('question_types.index', $questionType->id));
        }

        $id = $questionType->id;
        $questionType->delete();

        flash('Tipo de questão deletado com sucesso!')->success();

        return redirect(route('question_types.index'));
    }
}
