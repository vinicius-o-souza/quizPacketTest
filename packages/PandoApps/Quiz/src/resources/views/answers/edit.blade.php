@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"> Resposta</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('answers.index', request()->$parentName) !!}">Voltar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('pandoapps::flash-message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($answer, ['route' => ['answers.update', request()->$parentName, $answer->id], 'method' => 'patch']) !!}

                        @include('pandoapps::answers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
