@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
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
    </div>
@endsection
