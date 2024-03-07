@extends('layouts.app')

@section('title', 'Accident Claims')


@push('styles')
@endpush


@section('content')
@include('layouts.messages')
    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Disease Claim for {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }} {{ '['.$employer->company_name.']' ?? '' }}</h3>

            </div><!-- .nk-block-head-content -->
            <div class="row " >
                <div class="col-sm-12 " style="text-align: end"><a href="{{ route('employer.accidentclaims.create', [$employer->id]) }}" class="btn btn-primary"><em
                                        class="icon ni ni-sign-kobo"></em><span>New Accident
                                        Claim Request</span></a>
                           
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                           {{--  <th>Gender</th> --}}
                            <th>Claim Date</th>
                            <th>Approval Status</th>
                           {{--  <th>Manage</th> --}}
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($claims as $claim)
                            <tr>
                                <td>{{ $claim->last_name }} {{ $claim->first_name }} {{ $claim->middle_name }}</td>
                                {{-- <td>{{ $claim->employee->gender }}</td> --}}
                                <td>{{ date('M d, Y', strtotime($claim->created_at)) }}</td>
                                <td>
                                    <span class="tb-status text-{{$claim->status ==0 ? 'warning' : 'success'}}">{{$claim->status ? 'APPROVED' : 'PENDING'}}</span>
                                </td>
                                {{-- <td>
                                    @if (!$claim->request && $claim->status == 0)
                                        <a class="btn btn-primary"
                                            onclick="event.preventDefault();
                                        document.getElementById('process-claim-form').submit();">Initiate
                                            Processing</a>
                                        <form id="process-claim-form" action="/claim/accident/{{ $claim->id }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="id" value="{{ $claim->id }}">
                                        </form>
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ route('employer.accident.claims.show', ['id' => $claim->id]) }}" class="text-dark"><i class="fa fa-eye"></i> View Details</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection

@push('scripts')
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
@endpush
