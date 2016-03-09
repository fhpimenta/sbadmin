@extends('layouts.dashboard')
@section('title', 'Cadastrar Pessoa')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Pessoa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            @if (Session::has('flash_notification.message'))
                                <div class="row">
                                    <div class="alert alert-{{ Session::get('flash_notification.level') }}" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        {{ Session::get('flash_notification.message') }}
                                    </div>
                                </div>
                            @endif

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {!! Form::open(['route' => ['pessoa.edit', $pessoa->id], 'method' => 'POST', 'role' => 'form']) !!}

                            <fieldset>
                                <legend>Dados Pessoais</legend>
                                <div class="form-group">
                                    {!! Form::label('nome', 'Nome') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                        {!! Form::text('nome', !empty($pessoa->nome) ? $pessoa->nome : old('nome'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        {!! Form::email('email', !empty($pessoa->email) ? $pessoa->email : old('email'), ['class' => 'form-control', 'aria-describedby' => 'sizing-addon3']) !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('cpf', 'CPF') !!}
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                                {!! Form::text('cpf', !empty($pessoa->cpf) ? $pessoa->cpf : old('cpf'), ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('data_nascimento', 'Data de Nascimento') !!}
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                {!! Form::text('data_nascimento', !empty($pessoa->data_nascimento) ? date('d-m-Y',strtotime($pessoa->data_nascimento)) : old('data_nascimento'), ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::label('telefones[]', 'Telefones') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    @for($i = 0; $i < 3; $i++)
                                        <div class="form-group col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                @if(isset($pessoa->telefones[$i]))
                                                    {!! Form::tel("telefones[$i]", !empty(old("telefones[$i]")) ? old("telefones[$i]") : $pessoa->telefones[$i]->numero, ['class' => 'form-control']) !!}
                                                @else
                                                    {!! Form::tel("telefones[$i]", old("telefones[$i]"), ['class' => 'form-control']) !!}
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                            </fieldset>
                            <br />
                            <fieldset>
                                <legend>Endereço</legend>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('rua', 'Rua') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                            {!! Form::text('rua', !empty($pessoa->endereco['rua']) ? $pessoa->endereco['rua'] : old('rua'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2">
                                        {!! Form::label('numero', 'Numero') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                            {!! Form::text('numero', !empty($pessoa->endereco['numero']) ? $pessoa->endereco['numero'] : old('numero'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        {!! Form::label('cep', 'CEP') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                            {!! Form::text('cep', !empty($pessoa->endereco['cep']) ? $pessoa->endereco['cep'] : old('cep'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-10">
                                        {!! Form::label('bairro', 'Bairro') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                            {!! Form::text('bairro', !empty($pessoa->endereco['bairro']) ? $pessoa->endereco['bairro'] : old('bairro'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Funções</legend>
                                @for($i = 1; $i <= count($funcoes); $i++)
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox("funcoes[$i]", $i, in_array($i,$funcoesPessoa) ? true : false) !!}<strong>{{ $funcoes[$i] }}</strong>
                                        </label>
                                    </div>
                                @endfor
                            </fieldset>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::button('<i class="fa fa-save"></i>&nbsp; Salvar Alterações',  ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::button('<i class="fa fa-eraser"></i>&nbsp; Limpar Formulário', ['type' => 'reset', 'class' => 'btn btn-danger']) !!}
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