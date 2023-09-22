@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        {{-- Start::Sweet-alert --}}
        @include('flash::message')
        {{-- end::Sweet-alert --}}
        <!--begin::Row-->
        @if (auth()->user()->staff != null)
            @if(auth()->user()->staff->department_id == 2)
                @include('hradmin')
            @elseif(auth()->user()->staff->department_id == 6)
                @include('financeadmin')
            @elseif(auth()->user()->staff->department_id == 16)
                @include('claimsadmin')
            @elseif(auth()->user()->staff->department_id == 9)
                @include('complianceadmin')
            @elseif(auth()->user()->staff->department_id == 5)
                @include('itmadmin')
            @elseif(auth()->user()->staff->department_id == 17)
                @include('hseadmin')
                
            @elseif (auth()->user()->hasRole('minister'))
                @include('minister')
            @elseif (auth()->user()->hasRole('permsec'))
                @include('pamsec')

                
            @elseif(auth()->user()->staff->department_id == 4)
                @include('legaladmin')
            @elseif(auth()->user()->staff->department_id == 13)
                @include('estateadmin')
            @elseif(auth()->user()->staff->department_id == 10)
                @include('informalsectoradmin')
            @elseif(auth()->user()->staff->department_id == 3)
                @include('ictadmin')
            @elseif(auth()->user()->staff->department_id == 14)
                @include('socialsecurityadmin')
            @elseif(auth()->user()->staff->department_id == 7)
                @include('procurement')

            @elseif(auth()->user()->staff->department_id == 11)
                @include('fre')
            @elseif(auth()->user()->staff->department_id == 18)
                @include('copaffairs')
            @elseif(auth()->user()->staff->department_id == 12)
                @include('aprd')
            @else
                @include('defaultdashboard')
            @endif
        @else
            @include('defaultdashboard')
        @endif 


      
    </div>
    @endsection
    