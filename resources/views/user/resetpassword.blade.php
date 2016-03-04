@extends('layouts.dashboard')
@section('title', 'Trocar Senha')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Trocar Senha</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    @if(Session::has('flash_notification.message'))
        <div class="row">
            <div class="alert alert-{{ Session::get('flash_notification.level') }}" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ Session::get('flash_notification.message') }}
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Trocar Senha
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {!! Form::open(['route' => 'user.reset', 'method' => 'POST', 'role' => 'form']) !!}

                            <div class="form-group">
                                {!! Form::label('old_password', 'Senha Atual') !!}
                                {!! Form::password('old_password', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Nova Senha') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirmar Senha') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {!! Form::submit('Trocar Senha', ['class' => 'btn btn-success form-control']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection