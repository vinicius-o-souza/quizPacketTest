@extends('pandoapps::layouts.app')

@section('content_pandoapps')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Resposta</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                @include('flash::message')
                @include('pandoapps::flash-message')
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Resposta
                            <a class="pull-right" href="{!! route('answers.create', ['questionnaire_id' => request()->questionnaire_id, 'question_id' => request()->question_id]) !!}"><i class="fa fa-plus-square fa-lg text-success"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="pull-right mr-3">
                                @include('pandoapps::answers.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection

