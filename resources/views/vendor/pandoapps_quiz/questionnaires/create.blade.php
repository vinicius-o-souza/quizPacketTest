@extends('pandoapps::layouts.app')

@section('content_pandoapps')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('questionnaires.index') !!}">Questionários</a>
      </li>
      <li class="breadcrumb-item active">Cadastrar</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    @include('flash::message')
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus-square-o fa-lg"></i>
                            <strong>Cadastrar Questionários</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'questionnaires.store']) !!}

                                @include('pandoapps::questionnaires.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
