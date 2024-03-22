<div class="card-body p-5">
    <div class="table-responsive1">
        <table class="table" id="document-table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Document URL</th>
                    <th>Document Category</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $n =1; @endphp
                @foreach ($documents as $document)
                    
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $document->title }}</td>
                        {{-- <td>{{ $document->description }}</td> --}}
                        <td>{{ $document->createdBy ? $document->createdBy->first_name. ' '.$document->createdBy->last_name : '' }}</td>
                        <td><a target="_blank" href="{{ asset($document->document_url) }}">{{ substr($document->document_url, 10) }} </a>
                        </td>
                        
                        <td>{{ $document->category->name ?? 'NILL' }}</td>
                        <td>{{ $document->created_at->format('d/m/Y') }}</td>
                        <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Click to view options
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="z-index: 9999;" aria-labelledby="dropdownMenuButton">
                                        <a target="_blank" href="{{ asset($document->document_url) }}"
                                            class='btn btn-default btn-xs dropdown-item'>
                                            <i class="far fa-eye"></i> View
                                        </a>
                                        
                                        <a href="{{ route('documents_manager.edit', [$document->id]) }}" class='btn btn-default btn-xs dropdown-item'>
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="fa fa-share-alt"></i> Share</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="{{ asset($document->document_url) }}" download><i class="fa fa-download"></i> Download</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="fa fa-download"></i> Upload New Version File</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="fa fa-history"></i> Version History</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="fa fa-message"></i> Comment</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="fa fa-bell"></i> Add Reminder</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="far fa-envelope"></i> Send Email</a>
                                        <a class="btn btn-default btn-xs dropdown-item" href="#"><i class="far fa-trash-alt"></i> Delete</a>
                                        {{-- {!! Form::open(['route' => ['documents_manager.destroy', $document->id], 'method' => 'delete']) !!}
                            
                                {!! Form::button('<a class="dropdown-item" href="#"><i class="far fa-trash-alt"></i> Delete</a>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                            {!! Form::close() !!} --}}
                                        <!-- Add more options as needed -->
                                    </div>
                                </div>
                            
                           {{--  {!! Form::open(['route' => ['documents_manager.destroy', $document->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('documents_manager.show', [$document->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                
                                <a href="{{ route('documents_manager.edit', [$document->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!} --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $documents])
        </div>
    </div>
</div>


@include('documentmanager::memos.assign_to_departments_modal')
@include('documentmanager::memos.assign_to_users_modal')


@push('page_scripts')
    {{-- @if ($errors->has('subject') || $errors->has('answer_1') || $errors->has('answer_2') || $errors->has('answer_3'))
        <script>
            $('#feedbackModal').modal();
        </script>
    @endif --}}

    <script>
        $(document).on("click", ".open-modal-users", function() {
            let memoId = $(this).data('memo');
            $(".modal-body #user_memo_id").val(memoId);
        });

        $(document).on("click", ".open-modal-departments", function() {
            let memoId = $(this).data('memo');
            $(".modal-body #department_memo_id").val(memoId);
        });
    </script>
@endpush
