<?php

namespace PandoApps\Quiz\Controllers;

use PandoApps\Quiz\Models\Alternative;
use PandoApps\Quiz\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Flash;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir alternativas
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class AlternativeController extends Controller
{

    /**
     * Retorna todas as alternativas cadastradas
     */
    public function index()
    {
        $alternatives = Alternative::whereHas('question_id',$this->question->id)->get();

        return view('alternatives::index',compact('alternatives'));
    }

    /**
     * Redireciona para a tela de cadastrar uma alternativa
     */
    public function create()
    {
        $questions = Question::where('questionnaire_id',$this->questionnaire->id)->orderBy('name','asc')->pluck('name','id')->toArray();

        return view('alternatives::create', compact('questions'));
    }

    /**
     * Salva uma alternativa
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
        'title'       => 'required',
        'body'        => 'max:255',
        'question_id' => 'required|exists:questions,id'
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        Alternative::create([
        'title'       => $data['title'],
        'body'        => isset($data['body']) ? $data['body'] : '',
        'question_id' => $data['question_id'],
        ]);

        $response_log['data_success'] = ['message' => 'Alternativa criada com sucesso!'];

        Flash::success('Alternativa criada com sucesso!');

        return $response_log;
    }

    /**
     * Exibe a alternativa para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $alternative = Alternative::find($id);

        if(empty($alternative))
        {
        Flash::error('Alternativa não encontrada!');

        return redirect(route('alternatives.index'));
        }

        return view('alternatives::edit', compact('alternative'));
    }

    /**
     * Atualiza uma alternativa
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $alternative = Alternative::find($id);

        if(empty($alternative))
        {
        Flash::error('Alternativa não encontrada!');

        return redirect(route('alternatives.index'));
        }

        $data = $request->all();

        $rules = [
        'title'       => 'required',
        'body'        => 'max:255',
        'question_id' => 'required|exists:questions,id'
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        $alternative->update($data);

        Flash::success('Alternativa atualizada com sucesso!');

        return redirect(route('alternatives.index'));
    }

    /**
     * Exibe uma alternativa pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $alternative = Alternative::find($id);

        if(empty($alternative))
        {
        Flash::error('Alternativa não encontrada!');

        return redirect(route('alternatives.index'));
        }

        return view('alternatives::show', compact('alternative'));
    }

    /**
     * Deleta uma alternativa (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $alternative = Alternative::find($id);

        if(empty($alternative))
        {
        Flash::error('Alternativa não encontrada!');

        return redirect(route('alternatives.index'));
        }

        $id = $alternative->id;
        $alternative->delete();

        Flash::success('Alternativa deletada com sucesso!');

        return redirect(route('alternatives.index', $id));
    }
}
