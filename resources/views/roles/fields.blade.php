<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('permissions[]', 'Permissions:') !!}
    <div class="flex flex-wrap justify-start mb-4">
        <div class="row">
            @foreach ($permissions as $permission)
                <div class="col-6 mb-3">
                    {!! Form::checkbox('permissions[]', $permission->id, ['class' => 'form-control form-checkbox h-4 w-4', 'checked' => $permission->assigned]) !!}
                    <span class="">{{ $permission->name }}</span>
                </div>
            @endforeach
        </div>
    </div>

</div>
