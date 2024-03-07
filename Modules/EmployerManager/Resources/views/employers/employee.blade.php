@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1>Employees under {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }} {{ '['.$employer->company_name.']' ?? '' }}</h1>
                </div>
                <div class="col-sm-4">
                    
                    <div class="dropdown float-end" style="margin-right: 50px;">
                        <button class="dropbtn"><i class="fas fa-caret-down" style="color: #fff"></i> Menu</button>
                        <div class="dropdown-content">
                          <a target="_blank" href="{{ route('employer.create-employees',  $employer->id) }}">Add New Employee</a>
                          <a target="_blank" href="{{ route('employer.payment.list', [$employer->id]) }}">Payment List</a>
                          @if (DB::table('employees')->where('employer_id', $employer->id)->count() > 0)
                          <a target="_blank" href="{{ route('new.ecs.employer.payment', [$employer->id]) }}">Make ECS Payment</a>
@endif
@php
                                    $payments = DB::table('payments')
    ->where('employer_id', $employer->id)
    ->where('payment_type', 4)
    ->where('payment_status', 1)
    ->selectRaw('SUM(contribution_months) AS contribution_months, contribution_period')
    ->groupBy('contribution_year', 'contribution_period')
    ->count();
                                @endphp
    @if($payments > 0)
@if (DB::table('certificates')->where('employer_id', $employer->id)->count() < 1 || DB::table('certificates')->where('employer_id', $employer->id)->latest()->value('payment_status')  == 0)
                          <a target="_blank" href="{{ route('employer.certificate', [$employer->id]) }}">Certificate</a>
@else
<a target="_blank" href="{{ route('employer.deathclaims', [$employer->id]) }}">Death Claims</a>
<a target="_blank" href="{{ route('employer.diseaseclaims', [$employer->id]) }}">Disease Claims</a>
<a target="_blank" href="{{ route('employer.accidentclaims', [$employer->id]) }}">Accident Claims</a>

                          @endif
                          @endif
                    
                        </div>
                      </div>

                    {{-- <a class="btn btn-default float-right"
                       href="{{ route('employers.index') }}">Back</a> --}}
                </div>

            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <form method="get" action="" class="navbar-search mr-4">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ \Request::get('search', '') }}"
                                class="form-control bg-light border-0 small" placeholder="@lang('Search Employees list..')" aria-label="Search"
                                aria-describedby="basic-addon2">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('employermanager::employers.employee_table')
        </div>
    </div>
<style>
/* Dropdown Button */
.dropbtn {
  background-color: #309241;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

</style>
@endsection
