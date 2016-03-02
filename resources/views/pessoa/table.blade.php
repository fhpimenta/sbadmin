@extends('layouts.dashboard')
@section('title', $title)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de {{ $title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
                                        <a type="button" class="btn btn-primary btn-circle" href="#"><i class="fa fa-eye"></i></a>
                                        <a type="button" class="btn btn-success btn-circle" href="#"><i class="fa fa-edit"></i></a>
                                        <a type="button" class="btn btn-danger btn-circle" href="#"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
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