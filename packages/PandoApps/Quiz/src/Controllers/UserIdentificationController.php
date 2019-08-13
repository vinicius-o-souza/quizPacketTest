<?php

namespace PandoApps\Quiz\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Flash;
use PandoApps\Quiz\Models\UserIdentification;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir user_identification
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class UserIdentificationController extends Controller
{

    /**
     * Retorna todos os questionários cadastrados
     */
    public function index()
    {
        $userIdentification = UserIdentification::all();

        return view('user_identification::index',compact('userIdentification'));
    }

    /**
     * Redireciona para a tela de cadastrar um questionário
     */
    public function create()
    {
        return view('user_identification::create');
    }

    /**
     * Salva um questionário
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
        'name' => 'required',
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        UserIdentification::create([
            'name'        => $data['name'],
            'answer_once' => isset($data['answer_once']) ? $data['name'] : false
        ]);

        $response_log['data_success'] = ['message' => 'Questionário criado com sucesso!'];

        Flash::success('Questionário criado com sucesso!');

        return $response_log;
    }

    /**
     * Exibe o questionário para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $userIdentification = UserIdentification::find($id);

        if(empty($userIdentification))
        {
            Flash::error('Questionário não encontrado!');

            return redirect(route('user_identification.index', $userIdentification->id));
        }

        return view('user_identification::edit', compact('user$userIdentification'));
    }

    /**
     * Atualiza um questionário
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $userIdentification = UserIdentification::find($id);

        if(empty($userIdentification))
        {
        Flash::error('Questionário não encontrado!');

        return redirect(route('user_identification.index'));
        }

        $data = $request->all();

        $rules = [
        'name' => 'required',
        ];

        $validation = Validator::make($data, $rules);

        if($validation->fails())
        {
        $response_log["data_validation"] = ["message" => 'Requisição inválida', "errors" => $validation->errors()];

        return $response_log;
        }

        $userIdentification->update($data);

        Flash::success('Questionário atualizado com sucesso!');

        return redirect(route('user_identification.index', $userIdentification->id));
    }

    /**
     * Exibe um questionário pelo id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $userIdentification = UserIdentification::find($id);

        if(empty($userIdentification))
        {
        Flash::error('Questionário não encontrado!');

        return redirect(route('user_identification.index', $userIdentification->id));
        }

        return view('user_identification::show', compact('userIdentification'));
    }

    /**
     * Deleta um questionário (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $userIdentification = UserIdentification::find($id);

        if(empty($userIdentification))
        {
        Flash::error('Questionário não encontrado!');

        return redirect(route('user_identification.index', $userIdentification->id));
        }

        $id = $userIdentification->id;
        $userIdentification->delete();

        Flash::success('Questionário deletado com sucesso!');

        return redirect(route('user_identification.index', $id));
    }
}
