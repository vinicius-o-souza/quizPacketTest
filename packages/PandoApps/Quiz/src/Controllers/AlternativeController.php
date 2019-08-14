<?php

namespace PandoApps\Quiz\Controllers;

use PandoApps\Quiz\Models\Alternative;
use PandoApps\Quiz\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use PandoApps\Quiz\DataTables\AlternativeDataTable;

/**
 *  Essa classe possui métodos para criar, atualizar, excluir e exibir alternativas
 *  @author Rauhann Chaves <rauhann2711@gmail.com>
 */
class AlternativeController extends Controller
{

    /**
     * Retorna todas as alternativas cadastradas
     */
    public function index(AlternativeDataTable $alternativeDataTable)
    {
        return $alternativeDataTable->render('pandoapps::alternatives.index');
    }

    /**
     * Redireciona para a tela de cadastrar uma alternativa
     */
    public function create()
    {
        $questions = Question::where('questionnaire_id', request()->questionnaire_id)->orderBy('title','asc')->pluck('title','id')->toArray();

        return view('pandoapps::alternatives.create', compact('questions'));
    }

    /**
     * Salva uma alternativa
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $alternativeValidation = Validator::make($input, Alternative::$rules);
        if ($alternativeValidation->fails()) {
            $errors = $alternativeValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        Alternative::create([
            'title'       => $input['title'],
            'body'        => $input['body'],
            'question_id' => $input['question_id'],
        ]);

        flash('Alternativa criada com sucesso!')->success();
    }

    /**
     * Exibe a alternativa para edição
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $alternative = Alternative::find($id);

        if(empty($alternative)) {
            flash('Alternativa não encontrada!')->error();

            return redirect(route('alternatives.index'));
        }

        return view('pandoapps::alternatives.edit', compact('alternative'));
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

        if(empty($alternative)) {
            flash('Alternativa não encontrada!')->error();

            return redirect(route('alternatives.index'));
        }

        $input = $request->all();

        $alternativeValidation = Validator::make($input, Alternative::$rules);
        if ($alternativeValidation->fails()) {
            $errors = $alternativeValidation->errors();
            $msg = '';
            foreach($errors->all() as $message) {
                $msg .= $message . '<br>';
            }
            flash($msg)->error();
            return redirect()->back()->withInput();
        }

        $alternative->update($input);

        flash('Alternativa atualizada com sucesso!')->success();

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

        if(empty($alternative)) {
            flash('Alternativa não encontrada!')->error();

            return redirect(route('alternatives.index'));
        }

        return view('pandoapps::alternatives.show', compact('alternative'));
    }

    /**
     * Deleta uma alternativa (softdelete)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $alternative = Alternative::find($id);

        if(empty($alternative)) {
            flash('Alternativa não encontrada!')->error();

            return redirect(route('alternatives.index'));
        }

        $id = $alternative->id;
        $alternative->delete();

        flash('Alternativa deletada com sucesso!')->success();

        return redirect(route('alternatives.index', $id));
    }
}
