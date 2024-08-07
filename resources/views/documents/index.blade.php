@extends('layouts.app')
@section('page_title')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Departmental Documents</h1>
            </div>
           {{--  @if(Auth::user()->hasRole('super-admin')) --}}
            <div class="col-sm-6">
                <a class="btn btn-primary float-end"
                   href="{{ route('documents_manager.create') }}">
                    Add New
                </a>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</section>
@endsection

@section('content')
    

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('documents.table')
        </div>
    </div>

@endsection
