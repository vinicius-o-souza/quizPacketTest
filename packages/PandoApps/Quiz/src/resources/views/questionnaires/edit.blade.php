@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('questionnaires.index') !!}">Questionário</a>
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
                              <strong>Editar Questionário</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($questionnaire, ['route' => ['questionnaires.update', $questionnaire->id], 'method' => 'patch']) !!}

                              @include('pandoapps::questionnaires.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
