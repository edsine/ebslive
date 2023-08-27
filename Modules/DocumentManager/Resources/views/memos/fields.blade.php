<!-- Title Field -->
<div class="form-group col-sm-12 mb-3">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Document Url Field -->
<div class="form-group col-sm-12 mb-5">
    {!! Form::label('file', 'Upload file:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input form-control']) !!}
        </div>
    </div>
</div>


