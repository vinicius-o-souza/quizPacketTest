@extends('pandoapps::layouts.app')

@section('content_pandoapps')
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item">Questionários</li>
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
                            Questionários
                            <a class="pull-right" href="{!! route('questionnaires.create') !!}"><i class="fa fa-plus-square fa-lg text-success"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="mr-3">
                                @include('pandoapps::questionnaires.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="content-header">
        <h1 class="pull-left">Questionários</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('questionnaires.create') !!}">Adicionar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('pandoapps::flash-message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('pandoapps::questionnaires.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
