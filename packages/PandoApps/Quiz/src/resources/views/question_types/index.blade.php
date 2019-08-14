@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Tipos de Questão</li>
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
                             Tipos de Questão
                             <a class="pull-right" href="{!! route('question_types.create') !!}"><i class="fa fa-plus-square fa-lg text-success"></i></a>
                         </div>
                         <div class="card-body">
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

