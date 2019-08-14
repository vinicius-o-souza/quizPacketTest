<?php

namespace PandoApps\Quiz\Controllers;

use PandoApps\Quiz\Models\Alternative;
use PandoApps\Quiz\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir respostas
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class AnswerController extends Controller
{

    /**
     * Retorna todas as respostas cadastradas
     */
    public function index()
    {
        $answers = Answer::whereHas('question_id', request()->question_id)->get();

        return view('pandoapps::answers.index',compact('answers'));
    }

    /**
     * Redireciona para a tela de cadastrar uma resposta
     */
    public function create()
    {
        $alternatives = Alternative::where('question_id', request()->question_id)->orderBy('name','asc')->pluck('name','id')->toArray();

        return view('pandoapps::answers.create', compact('alternatives'));
    }

    /**
     * Salva uma resposta
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $answerValidation = Validator::make($input, Answer::$rules);
        if ($answerValidation->fails()) {
            $errors = $answerValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        Answer::create([
            'title'       => $input['title'],
            'question_id' => $input['question_id'],
        ]);

        flash('Resposta criada com sucesso!')->success();

        return redirect(route('answer.index'));
    }

    /**
     * Exibe a resposta para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $answer = Answer::find($id);

        if(empty($answer)) {
            flash('Resposta não encontrada!')->error();

            return redirect(route('answers.index'));
        }

        return view('pandoapps::answers.edit', compact('answer'));
    }

    /**
     * Atualiza uma resposta
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $answer = Answer::find($id);

        if(empty($answer)) {
            flash('Resposta não encontrada!')->error();

            return redirect(route('answers.index'));
        }

        $input = $request->all();

        $answerValidation = Validator::make($input, Answer::$rules);
        if ($answerValidation->fails()) {
            $errors = $answerValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        $answer->update($input);

        flash('Resposta atualizada com sucesso!')->success();

        return redirect(route('answers.index'));
    }

    /**
     * Exibe uma resposta pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $answer = Answer::find($id);

        if(empty($answer)) {
            flash('Resposta não encontrada!')->error();

            return redirect(route('answers.index'));
        }

        return view('pandoapps::answers.show', compact('answer'));
    }

    /**
     * Deleta uma resposta (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);

        if(empty($answer)) {
            flash('Resposta não encontrada!')->error();

            return redirect(route('answers.index'));
        }

        $id = $answer->id;
        $answer->delete();

        flash('Resposta deletada com sucesso!')->success();

        return redirect(route('answers.index', $id));
    }
}
