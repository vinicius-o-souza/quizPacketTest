<?php

namespace PandoApps\Quiz\Controllers;

use PandoApps\Quiz\Models\Alternative;
use PandoApps\Quiz\Models\Answer;
use PandoApps\Quiz\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Flash;
use PandoApps\Quiz\Models\Questionnaire;

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
        $answers = Answer::whereHas('question_id',$this->question->id)->get();

        return view('answers::index',compact('answers'));
    }

    /**
     * Redireciona para a tela de cadastrar uma resposta
     */
    public function create()
    {
        $alternatives = Alternative::where('question_id',$this->question->id)->orderBy('name','asc')->pluck('name','id')->toArray();

        return view('answers::create', compact('alternatives'));
    }

    /**
     * Salva uma resposta
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
        'title'       => 'required',
        'question_id' => 'required|exists:questions,id'
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        Answer::create([
        'title'       => $data['title'],
        'question_id' => $data['question_id'],
        ]);

        $response_log['data_success'] = ['message' => 'Resposta criada com sucesso!'];

        Flash::success('Resposta criada com sucesso!');

        return $response_log;
    }

    /**
     * Exibe a resposta para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $answer = Answer::find($id);

        if(empty($answer))
        {
        Flash::error('Resposta não encontrada!');

        return redirect(route('answers.index'));
        }

        return view('answers::edit', compact('answer'));
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

        if(empty($answer))
        {
        Flash::error('Resposta não encontrada!');

        return redirect(route('answers.index'));
        }

        $data = $request->all();

        $rules = [
        'title'       => 'required',
        'question_id' => 'required|exists:questions,id'
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        $answer->update($data);

        Flash::success('Resposta atualizada com sucesso!');

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

        if(empty($answer))
        {
        Flash::error('Resposta não encontrada!');

        return redirect(route('answers.index'));
        }

        return view('answers::show', compact('answer'));
    }

    /**
     * Deleta uma resposta (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);

        if(empty($answer))
        {
        Flash::error('Resposta não encontrada!');

        return redirect(route('answers.index'));
        }

        $id = $answer->id;
        $answer->delete();

        Flash::success('Resposta deletada com sucesso!');

        return redirect(route('answers.index', $id));
    }
}
