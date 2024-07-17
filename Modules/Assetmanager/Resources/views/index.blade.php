@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid float-end">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Asset List</h1>
                </div>
                <div class="col-sm-6">
                    <button type="button" title="add asset" class="btn btn-primary float-end" data-toggle="modal"
                        data-target="#atp">
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
                            {{-- <th class="px-2">#</th> --}}
                            <th>Serial</th>
                            <th>Staff Assigned</th>
                            <th> Department Assigned</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td>{{ $type->serial}}</td>
                                {{-- <td>
                                    <img src="{{ asset('storage/' . $type->picture) }}" class="file" alt="">
                                </td> --}}

                                <td>{{$type->user?$type->user->first_name . ' ' .$type->user->last_name : 'All Staff'}}</td>
                                <td>{{$type->department?$type->department->name: 'All Staff'}}</td>
                                {{-- <td>{{ $type->assettag }}</td> --}}
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->brand ? $type->brand->name : '' }}</td>
                                <td>{{ $type->assettype ? $type->assettype->name : '' }}</td>
                                <td>{{ $type->branch ? $type->branch->branch_name : '' }}</td>
                                <td style="width: 120px">
                                    {!! Form::open(['route' => ['assetmanager.destroy', $type->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        {{-- <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a> --}}
                                        {{-- <a href="{{ route('assetmanager.edit', [$type->id]) }}"
                                            class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a> --}}
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
    <div class="modal fade" id="atp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('assetmanager.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" id="name" class="form-control" required
                                placeholder="<?php echo trans('name of assets'); ?>" />
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label>Asset Tag</label>
                                    <input type="text" required name="assettag" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                {!! Form::label('Suppliers', 'Suppliers', ['form-label']) !!}
                                {!! Form::select('supply_id', $supply, null, ['class' => 'form-control form-select','required'=>'true']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label>Location</label>
                                    {!! Form::select('branch_id', $location, null, ['class' => 'form-control form-select','required'=>'true']) !!}
                                </div>
                            </div>
                            <div class="col-6">
                                {!! Form::label('brand_id', 'Brand', ['form-label']) !!}
                                {!! Form::select('brand_id', $brand, null, ['class' => 'form-control form-select','required'=>'true']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label>Serial</label>
                                    <input type="text" required name="serial" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                {!! Form::label('assettype_id', 'Asset Type', ['form-label']) !!}
                                {!! Form::select('assettype_id', $asset, null, ['class' => 'form-control form-select','required'=>'true']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label>Cost</label>
                                    <input type="number" required name="cost" class="form-control" required id="">
                                </div>
                            </div>
                            <div class="col-6">
                                {!! Form::label('purchase_date', 'Purchase Date', ['form-label']) !!}
                                <input type="date" name="purchasedate" required class="form-control date" id="">
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label>Warranty</label>
                                    <input type="number" required name="warranty" class="form-control"
                                        placeholder="Month(s)" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                {!! Form::label('status', 'Status', ['form-label']) !!}
                                <select name="status" id="editstatus" required class="form-control">
                                    <option value=""><?php echo trans('status'); ?></option>
                                    <option value="1"><?php echo trans('readytodeploy'); ?></option>
                                    <option value="2"><?php echo trans('pending'); ?></option>
                                    <option value="3"><?php echo trans('archived'); ?></option>
                                    <option value="4"><?php echo trans('broken'); ?></option>
                                    <option value="5"><?php echo trans('lost'); ?></option>
                                    <option value="6"><?php echo trans('outofrepair'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['form-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control textarea']) !!}
                        </div>



                        <div class="form-group">
                            {!! Form::label('picture', 'Picture', ['form-label']) !!}
                            {!! Form::file('picture', ['class' => 'form-control file']) !!}
                        </div>

                        <div class="row">

                            <div class="form-group my-2">
                                <input name="check" value="1" type="checkbox" class=" checkbox" id="showDiv">
                                <label for=""> Assign Asset To a Staff</label>



                            </div>
                        </div>

                        <div id="dynamicDiv" class="row" style="display: none;">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label> Select Department</label>
                                        {!! Form::select('department_id', $dept, null, ['class' => 'form-control form-select', 'id' => 'departmentSelect']) !!}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label>Select Staff</label>
                                        {!! Form::select('user_id', $user, null, ['class' => 'form-control form-select', 'id' => 'userSelect']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('showDiv');
            const dynamicDiv = document.getElementById('dynamicDiv');

            checkbox.addEventListener('change', function() {
                dynamicDiv.style.display = this.checked ? 'block' : 'none';
            });
        });

        // function getusersbydepart(departmentId) {
        //     $.ajax({
        //         url: '/theuser/' + departmentId,
        //         type: 'GET',
        //         success: function(response) {
        //             // Populate the user select dropdown with fetched users
        //             $('#user_id').empty(); // Clear previous options
        //             $.each(response, function(key, user) {
        //                 $('#user_id').append($('<option>', {
        //                     value: user.id,
        //                     text: user.first_name
        //                 }));
        //             });
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // }

        $('#departmentSelect').on('change', function() {
            const selectedDepartmentId = $(this).val();
            var homeUrl = window.location.origin;
            if (selectedDepartmentId) {
                $.get(`${homeUrl}/units/staff/${selectedDepartmentId}`, function(users) {
                    $('#userSelect').empty().append('<option value="">Select The Staff</option>');
                    var u = JSON.stringify(users);

                    $.each(users, function(index, user) {
                        $('#userSelect').append(
                            `<option value="${user.id}">${user.first_name} ${user.last_name}</option>`
                            );
                    });

                });
            } else {
                $('#userSelect').empty().append('<option value="">Select The Staff</option>');
            }
        });

        let table = new DataTable('#data');
    </script>
@endsection
