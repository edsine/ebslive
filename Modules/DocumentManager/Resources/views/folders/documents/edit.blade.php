@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Document
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($document, ['route' => ['documents.update', $document->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Folder Id Field -->
                    {!! Form::hidden('folder_id', $folder->id) !!}


                    <!-- Document Url Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('file', 'Upload file:') !!}
                        <div class="input-group">
                            <div class="custom-file">
                                {!! Form::file('file', ['class' => 'custom-file-input']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
