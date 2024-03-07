@extends('layouts.app')

@section('title', 'Death Claims')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Disease Claim for {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }} {{ '['.$employer->company_name.']' ?? '' }}</h3>

            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview" style="padding: 30px;">
            <div class="card-inner">
                <form action="{{ route('employer.accidentclaims.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="preview-block">
                       
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label-outlined" for="outlined-select">Select Employee</label>
                                        <select class="form-select js-select2" data-ui="xl" id="employee_id"
                                            data-search="on" name="employee_id">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">
                                                    {{ $employee->last_name }}
                                                    {{ $employee->first_name }}
                                                    {{ $employee->middle_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <input type="hidden" class="form-control form-control-xl form-control-outlined"
                                            id="employer_id" name="employer_id" value="{{ $employer->id }}">
                                            <label class="form-label-outlined" for="accident_date">Date of Accident</label>
                                        <input type="date"
                                            class="form-control form-control-xl form-control-outlined date-picker" data-date-format="yyyy-mm-dd"
                                            id="accident_date" name="accident_date" value="{{ old('accident_date') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-clock"></em>
                                        </div>
                                        <label class="form-label-outlined" for="accident_time">Time of Accident</label>
                                        <input type="time"
                                            class="form-control form-control-xl form-control-outlined time-picker"
                                            id="accident_time" name="accident_time" value="{{ old('accident_time') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <label class="form-label-outlined" for="accident_town">Town of Accident</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="accident_town" name="accident_town" value="{{ old('accident_town') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <label class="form-label-outlined" for="state">State</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="state" name="state" value="{{ old('state') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <label class="form-label-outlined" for="lga">LGA</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="lga" name="lga" value="{{ old('lga') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <label class="form-label-outlined" for="accident_report_date">Date Employee
                                            Reported
                                            Accident</label>
                                        <input type="date"
                                            class="form-control form-control-xl form-control-outlined date-picker" data-date-format="yyyy-mm-dd"
                                            id="accident_report_date" name="accident_report_date"
                                            value="{{ old('accident_report_date') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-clock"></em>
                                        </div>
                                        <label class="form-label-outlined" for="accident_report_time">Time Accident
                                            Reported</label>
                                        <input type="time"
                                            class="form-control form-control-xl form-control-outlined time-picker"
                                            id="accident_report_time" name="accident_report_time"
                                            value="{{ old('accident_report_time') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-sign-kobo"></em>
                                        </div>
                                        <label class="form-label-outlined" for="employee_earning">Employee Earning at time
                                            of Accident</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="employee_earning" name="employee_earning"
                                            value="{{ old('employee_earning') }}">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="employee_task"> What
                                        task was the employee performing at the time of
                                        accident?
                                    </label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" id="employee_task" name="employee_task"
                                            placeholder="What task was the employee performing at the time of accident? ">{{ old('employee_task') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="nature_of_injury">
                                        State
                                        the nature of injury sustained (see options
                                        attached)
                                    </label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" id="nature_of_injury" name="nature_of_injury"
                                            placeholder="State the nature of injury sustained (see options attached)">{{ old('nature_of_injury') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12">
                                <div class="form-group">
                                    <label for=""> Was the accident in the course
                                        of
                                        his/her work? </label>
                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="cw_yes">Yes</label>
                                                <input type="radio" class="custom-control-input" name="course_of_work"
                                                    id="cw_yes" value="Yes">
                                                
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="cw_no">No</label>
                                                <input type="radio" class="custom-control-input" name="course_of_work"
                                                    id="cw_no" value="No">
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for=""> Was first aid given in this
                                        case?
                                    </label>
                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="fa_yes">Yes</label>
                                                <input type="radio" class="custom-control-input" name="first_aid_given"
                                                    id="fa_yes" value="Yes">
                                                
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="fa_no">No</label>
                                                <input type="radio" class="custom-control-input" name="first_aid_given"
                                                    id="fa_no" value="No">
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <hr class="preview-hr">
                        <span class="preview-title-lg overline-title">Medical practitioner
                            who treated the employee:
                            Details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <label class="form-label-outlined" for="medical_last_name">Surname Name</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="medical_last_name" name="medical_last_name"
                                            value="{{ old('medical_last_name') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <label class="form-label-outlined" for="medical_first_name">First Name</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="medical_first_name" name="medical_first_name"
                                            value="{{ old('medical_first_name') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-cc-alt"></em>
                                        </div>
                                        <label class="form-label-outlined" for="medical_practice_number">Practice
                                            Number</label>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="medical_practice_number" name="medical_practice_number"
                                            value="{{ old('medical_practice_number') }}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="default-06"> Employee
                                        Certified copy of Identity documents to be uploaded:
                                        (Pdf only: .pdf) </label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <label class="form-file-label" for="document">Choose file</label>
                                            <input type="file" multiple class="form-file-input" id="document"
                                                name="document" accept=".pdf">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="preview-hr">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                                            class="icon ni ni-send me-2"></em>
                                        Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection

@push('scripts')
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
