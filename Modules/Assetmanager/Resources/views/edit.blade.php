@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="card-title">
                        Edit Asset
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($data, ['route' => ['assetmanager.update', $data->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    </div>


                </div>
            </div>

            <div class="card-footer" style="margin-bottom: 30px;">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('assetmanager.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
