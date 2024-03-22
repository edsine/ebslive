@extends('layouts.app')

@section('title', 'Document Categories')


@push('styles')
@endpush


@section('content')
@include('layouts.messages')
    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Document Categories</h3>
                <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('documents_category.create') }}" class="btn btn-primary float-end" ><em
                        class="fa fa-user-add"></em> <span>Add New Category</span></a>
                </div>
                </div>
            </div><!-- .nk-block-head-content -->
           <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner p-5">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Document Name</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody> @php
                        $no = 1;
                    @endphp
                        @foreach ($documents_categories as $documents_category)
                            <tr>
                                <td>@php
                                echo $no++;
                                @endphp</td>
                                <td>{{ $documents_category->name }}</td>
                                 <td>
                                    <a style="padding-right:10px;" href="{{ route('documents_category.edit', $documents_category->id) }}" title="Edit Document Category"><span
                                            class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span></a>
                                    {{-- <a data-id="{{ $documents_category->id }}"><span class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="icon ni ni-trash"></em></span>
                                            </a> --}}

                                    <a id="delete-documents-category" title="Terminate documents category" style="cursor: pointer;"
                                        onclick="event.preventDefault();
                                    document.getElementById('delete-documents-category-form').submit();"><span
                                            class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="icon ni ni-user-remove"></em></span>
                                    </a>
                                    <form id="delete-documents-category-form" action="{{ route('documents_category.destroy', $documents_category->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button onclick="return false" id="delete-service"
                                            class="btn btn-danger">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $documents_categories->links() }}
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#delete-documents-category').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //redirect to database
                    if (result.isConfirmed) {
                        $('#delete-documents-category-form').submit();
                    }
                    //handle through ajax
                    /* if (result.value) {
                        Swal.fire('Deleted!', 'Your selected item has been deleted.', 'success');
                    } */
                })
            });
        });
    </script>
    <!-- JavaScript -->
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
@endpush
