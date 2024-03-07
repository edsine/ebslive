@extends('layouts.app')

@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h6 class="title">Add bulk employees for {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }} {{ '['.$employer->company_name.']' ?? '' }}</h6>

        </div><!-- .nk-block-head-content -->
       
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block nk-block-lg">
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <div class="row gy-4" style="padding: 20px;">
                    <div class="col-lg-6 col-sm-6">
                        <form action="{{ route('employer.employee.uploadbulk') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="default-06">Select bulk
                                    Employee file (Excel only: .xls, .xlsx) <a
                                        href="{{ url('employees.xlsx') }}" download>Download bulk Employee
                                        template</a></label>
                                <div class="form-control-wrap">
                                    <div class="form-file">
                                        
                                        <input type="hidden" name="employer_id" id="employer_id"
                                value="{{ $employer->id }}">
                                        <input type="file" multiple class="form-file-input" id="excel"
                                            name="excel" accept=".xlsx, .xls">
                                        
                                    </div>
                                </div>
                            </div><br/><br/>

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary"><em
                                        class="icon ni ni-upload-cloud me-2"></em> Upload Employees</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .card-preview -->
    
</div> <!-- nk-block -->
{{-- </div><!-- .components-preview --> --}}



@endsection