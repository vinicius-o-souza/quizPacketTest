@extends('pandoapps::layouts.app')

@section('content_pandoapps')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('questions.index', ['questionnaire_id' => request()->questionnaire_id]) !!}">Questão</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit fa-lg"></i>
                            <strong>Editar Questão</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::model($question, ['route' => ['questions.update', request()->questionnaire_id, $question->id], 'method' => 'patch']) !!}

                                @include('pandoapps::questions.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
