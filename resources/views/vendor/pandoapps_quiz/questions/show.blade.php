@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('questions.index') !!}">Questões</a>
      </li>
      <li class="breadcrumb-item active">Detalhes</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        @include('flash::message')
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Detalhes</strong>
                                <a href="{!! route('questions.index') !!}" class="btn btn-primary ml-3">Voltar</a>
                            </div>
                            <div class="card-body">
                                @include('pandoapps::questions.show')
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
