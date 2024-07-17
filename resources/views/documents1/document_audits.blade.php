@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documents Audit Trail</h1>
                </div>
                
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-5">
                <div class="table-responsive1">
                    <table class="table" id="document-table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>By Whom</th>
                                <th>Document URL</th>
                                <th>Document Category</th>
                                <th>Action Date</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n =1; @endphp
                            @foreach ($documents as $document)
                                
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td>{{ $document->title }}</td>
                                    {{-- <td>{{ $document->description }}</td> --}}
                                    <td>{{ $document->first_name ? $document->first_name. ' '.$document->last_name : '' }}</td>
                                    <td>{{ substr($document->document_url, 10) }}</td>
                                    
                                    <td>{{ $document->category_name ?? 'NILL' }}</td>
                                    <td>{{ $document->createdAt }}</td>
                                    <td>{{ $document->event }}</td>
                                    
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
            
            
           
            
        </div>
    </div>

@endsection
