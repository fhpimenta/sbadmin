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
@endsection