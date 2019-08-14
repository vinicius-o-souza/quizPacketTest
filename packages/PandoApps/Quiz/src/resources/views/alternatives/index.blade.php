@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Alternativas</li>
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
                            Alternativas
                            <a class="pull-right" href="{!! route('alternatives.create', ['questionnaire_id' => request()->questionnaire_id, 'question_id' => request()->question_id]) !!}"><i class="fa fa-plus-square fa-lg text-success"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="pull-right mr-3">
                                @include('pandoapps::alternatives.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection

