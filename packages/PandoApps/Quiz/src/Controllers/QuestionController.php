<?php

namespace PandoApps\Quiz\Controllers;

use PandoApps\Quiz\Models\Question;
use PandoApps\Quiz\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Flash;
use PandoApps\Quiz\Models\Questionnaire;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir questões
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class QuestionController extends Controller
{

    /**
     * Retorna todas as questões cadastradas
     */
    public function index()
    {
        $questions = Question::where('questionnaire_id',$this->questionnaire->id)->get();

        return view('questions::index',compact('questions'));
    }

    /**
     * Redireciona para a tela de cadastrar uma questão
     */
    public function create()
    {
        $questionTypes = QuestionType::orderBy('name','asc')->pluck('name','id')->toArray();

        return view('questions::create', compact('questionTypes'));
    }

    /**
     * Salva uma questão
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
        'title'            => 'required',
        'body'             => 'required',
        'hint'             => 'max:100',
        'is_required'      => 'boolean',
        'questionnaire_id' => 'required|exists:questionnaires,id',
        'question_type_id' => 'required|exists:question_types,id'
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        Question::create([
        'title'            => $data['title'],
        'body'             => $data['body'],
        'hint'             => isset($data['hint']) ? $data['hint'] : '',
        'is_required'      => isset($data['is_required']) ? $data['is_required'] : '',
        'questionnaire_id' => $this->questionnaire->id,
        'question_type_id' => $data['question_type_id'],
        ]);

        $response_log['data_success'] = ['message' => 'Questão criada com sucesso!'];

        Flash::success('Questão criada com sucesso!');

        return $response_log;
    }

    /**
     * Exibe a questão para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $question = Question::find($id);

        if(empty($question))
        {
        Flash::error('Questão não encontrada!');

        return redirect(route('questions.index'));
        }

        return view('questions::edit', compact('question'));
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

        if(empty($question))
        {
        Flash::error('Questão não encontrada!');

        return redirect(route('questions.index'));
        }

        $data = $request->all();

        $rules = [
        'title'            => 'required',
        'body'             => 'required',
        'hint'             => 'max:100',
        'is_required'      => 'boolean',
        'questionnaire_id' => 'required|exists:questionnaires,id',
        'question_type_id' => 'required|exists:question_types,id'
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        $question->update($data);

        Flash::success('Questão atualizada com sucesso!');

        return redirect(route('questions.index'));
    }

    /**
     * Exibe uma questão pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $question = Question::find($id);

        if(empty($question))
        {
        Flash::error('Questão não encontrada!');

        return redirect(route('questions.index'));
        }

        return view('questions::show', compact('question'));
    }

    /**
     * Deleta uma questão (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if(empty($question))
        {
        Flash::error('Questão não encontrada!');

        return redirect(route('questions.index'));
        }

        $id = $question->id;
        $question->delete();

        Flash::success('Questão deletada com sucesso!');

        return redirect(route('questions.index', $id));
    }
}
