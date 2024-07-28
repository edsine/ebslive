@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid float-end">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> List Of Brands</h1>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#atp">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3 mt-5">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card mb-5">
            <div class="card-body p-5">
                {{-- <h5>Approval Type List</h5> --}}
                <hr>

                <table id="data" class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                    <tr>
                        <th class="px-2">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->description }}</td>
                            <td style="width: 120px">
                                {!! Form::open(['route' => ['brand.destroy', $type->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    {{-- <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a> --}}
                                    <a href="{{ route('brand.edit', [$type->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Are you sure?')",
                                    ]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-foot pb-5">{{ $types->links() }}</div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="atp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <label>NAME</label>
                            <input name="name" type="text" id="name" class=" form-control" required placeholder="<?php echo trans('lang.name');?>"/>
                        </div>

                        <div class="form-group mt-3">
                            <label>DESCRIPTION</label>
                            <textarea class="form-control" name="description" id="description" placeholder="<?php echo trans('description');?>"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script>
    // $(document).ready(function() {
    //     $('#data').DataTable();
    // });

    let table = new DataTable('#data');
</script>

@endsection
