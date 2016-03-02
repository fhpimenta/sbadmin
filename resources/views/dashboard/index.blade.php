@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @if (Session::has('flash_notification.message'))
                    <div class="alert alert-{{ Session::get('flash_notification.level') }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {{ Session::get('flash_notification.message') }}
                    </div>
                @endif
            </div>
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $quantPessoas }}</div>
                            <div>Pessoas cadastradas</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    @foreach($arrQuant as $obj)
                        @foreach($obj as $funcao)
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="pull-left">{{ $funcao->funcao }}</span>
                                    <span class="pull-right">{{ $funcao->quant }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection