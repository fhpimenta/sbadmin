@extends('layouts.dashboard')
@section('title', $title)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de {{ $title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @if (Session::has('flash_notification.message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-{{ Session::get('flash_notification.level') }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {{ Session::get('flash_notification.message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Visualização
                </div>
                <div class="panel-body">
                    @if(!is_null($pessoas))
                    <div class="dataTables_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pessoas as $p)
                                <tr class="odd gradeX">
                                    <td>{{$p->nome}}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-circle" title="mostrar" data-toggle="modal" data-target="#show-person{{ $p->id}}" ><i class="fa fa-eye"></i></a>
                                        <a type="button" class="btn btn-success btn-circle" title="editar" href="{{ url('/pessoas/edit/'.$p->id) }}"><i class="fa fa-edit"></i></a>
                                        <a type="button" class="btn btn-danger btn-circle" title="deletar" href="{{ url('/pessoas/delete/'.$p->id) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('pessoa.show', ['pessoa' => $p])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div>Sem {{ $title }} cadastrados!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection