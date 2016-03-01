@extends('layouts.dashboard')
@section('title', 'Editar Perfil')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Perfil</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Perfil
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            {!! Form::open(['route' => 'user.update', 'method' => 'POST']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Nome') !!}
                                {!! Form::text('name', !empty(old('name')) ? old('name') : $user->name, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', !empty(old('email')) ? old('email') : $user->email , ['class' => 'form-control']) !!}
                            </div>

                            {!! Form::submit('Editar usuário', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection