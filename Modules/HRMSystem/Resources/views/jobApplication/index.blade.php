@extends('layouts.app')
@section('page-title')
    {{__('Manage Job Application')}}
@endsection
@php
    $logo=\Modules\Accounting\Models\Utility::get_file('uploads/avatar/');
    $profile=\Modules\Accounting\Models\Utility::get_file('uploads/job/profile/');
@endphp

@push('page_scripts')
    {{-- <script src="{{ asset('libs/dragula/dist/dragula.min.js') }}"></script>
    <script src="{{ asset('libs/autosize/dist/autosize.min.js') }}"></script> --}}
    <script src="{{ asset('new_assets/assets/js/plugins/dragula.min.js') }}"></script>

    <script>
        $(document).on('change', '#jobs', function () {

            var id = $(this).val();

            $.ajax({
                url: "{{ route('get.job.application') }}",
                type: 'POST',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    var job = JSON.parse(data);
                    // console.log(job)
                    var applicant = job.applicant;
                    var visibility = job.visibility;
                    var question = job.custom_question;

                    (applicant.indexOf("gender") != -1) ? $('.gender').removeClass('d-none') : $(
                        '.gender').addClass('d-none');
                    (applicant.indexOf("dob") != -1) ? $('.dob').removeClass('d-none') : $('.dob')
                        .addClass('d-none');
                    (applicant.indexOf("country") != -1) ? $('.country').removeClass('d-none') : $(
                        '.country').addClass('d-none');

                    (visibility.indexOf("profile") != -1) ? $('.profile').removeClass('d-none') : $(
                        '.profile').addClass('d-none');
                    (visibility.indexOf("resume") != -1) ? $('.resume').removeClass('d-none') : $(
                        '.resume').addClass('d-none');
                    (visibility.indexOf("letter") != -1) ? $('.letter').removeClass('d-none') : $(
                        '.letter').addClass('d-none');

                    $('.question').addClass('d-none');
                    // $('.question').removeAttr('required');

                    if (question.length > 0) {
                        question.forEach(function (id) {
                            $('.question_' + id + '').removeClass('d-none');
                        });
                    }


                }
            });
        });

        @can('move job application')
            !function (a) {
            "use strict";

            var t = function () {
                this.$body = a("body")
            };
            t.prototype.init = function () {
                // console.log(t);
                a('[data-plugin="dragula"]').each(function () {

                    //   console.log(t);
                    var t = a(this).data("containers"),

                        n = [];
                    if (t)
                        for (var i = 0; i < t.length; i++) n.push(a("#" + t[i])[0]);
                    else n = [a(this)[0]];
                    var r = a(this).data("handleclass");
                    r ? dragula(n, {
                        moves: function (a, t, n) {
                            return n.classList.contains(r)
                        }
                    }) : dragula(n).on('drop', function (el, target, source, sibling) {
                        var order = [];
                        $("#" + target.id + " > div").each(function () {
                            order[$(this).index()] = $(this).attr('data-id');
                        });

                        var id = $(el).attr('data-id');

                        var old_status = $("#" + source.id).data('status');
                        var new_status = $("#" + target.id).data('status');
                        var stage_id = $(target).attr('data-id');


                        $("#" + source.id).parent().find('.count').text($("#" + source.id +
                            " > div").length);
                        $("#" + target.id).parent().find('.count').text($("#" + target.id +
                            " > div").length);
                        $.ajax({
                            url: '{{ route('job.application.order') }}',
                            type: 'POST',
                            data: {
                                application_id: id,
                                stage_id: stage_id,
                                order: order,
                                new_status: new_status,
                                old_status: old_status,
                                "_token": $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                show_toastr('success', 'Job-application successfully updated',
                                    'success');
                            },
                            error: function (data) {
                                data = data.responseJSON;
                                show_toastr('error', data.error, 'error')
                            }
                        });
                    });
                })
            }, a.Dragula = new t, a.Dragula.Constructor = t
        }(window.jQuery),
            function (a) {
                "use strict";

                a.Dragula.init()

            }(window.jQuery);
        @endcan
    </script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Job Application')}}</li>
@endsection

@section('action-btn')
   
@endsection

@section('content')
@include('layouts.messages')
<style>
    .btn-sm1, .btn-group-sm > .btn {
    --bs-btn-padding-y: 0.25rem;
    --bs-btn-padding-x: 0.5rem;
    --bs-btn-font-size: 0.76563rem;
    --bs-btn-border-radius: 4px;
}
.btn1 {
    --bs-btn-padding-x: 1.3rem;
    --bs-btn-padding-y: 0.575rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 0.875rem;
    --bs-btn-font-weight: 500;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: #293240;
    --bs-btn-bg: transparent;
    --bs-btn-border-width: 1px;
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: 6px;
    --bs-btn-hover-border-color: transparent;
    --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.2rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
    display: inline-block;
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    color: var(--bs-btn-color);
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: var(--bs-btn-bg);
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    transition: color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}
.mx-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
}
.action-btn {
    width: 29px;
    height: 28px;
    color: rgb(255, 255, 255);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
    border-radius: 9.3552px;
}
.bg-danger {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
}
.ms-2 {
    margin-left: 0.5rem !important;
}
.btn1 i {
    display: inline-flex;
    font-size: 1rem;
    padding-right: 0.rem;
    vertical-align: middle;
    line-height: 0;
}
</style>
<link rel="stylesheet" href="{{ asset('new_assets/assets/css/plugins/dragula.min.css') }}" id="main-style-link">
    <div class="row">
        <div class="col-md-12">
            <div class="float-end">
                {{--        <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" data-bs-toggle="tooltip" title="{{__('Filter')}}">--}}
                {{--            <i class="fa fa-filter"></i>--}}
                {{--        </a>--}}
        
                @can('create job application')
                    <a href="#" data-size="lg" data-url="{{ route('job-application.create')}}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Job Application')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
        
            </div>
        </div>
        <div class="col-sm-12">
            <div class="mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('route' => array('job-application.index'),'method'=>'get','id'=>'applicarion_filter')) }}

                        <div class="row d-flex align-items-center justify-content-end">

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mr-2">
                                <div class="btn-box">
                                    {{Form::label('start_date',__('Start Date'),['class'=>'form-label'])}}
                                    {{Form::date('start_date',$filter['start_date'],array('class'=>'month-btn form-control '))}}
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mr-2">
                                <div class="btn-box">
                                    {{Form::label('end_date',__('End Date'),['class'=>'form-label'])}}
                                    {{Form::date('end_date',$filter['end_date'],array('class'=>'month-btn form-control '))}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="btn-box">
                                    {{ Form::label('job', __('Job'),['class'=>'form-label']) }}
                                    {{ Form::select('job', $jobs,$filter['job'], array('class' => 'form-control select')) }}
                                </div>
                            </div>
                            <div class="col-auto float-end ms-2 mt-4">

                                <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('applicarion_filter').submit(); return false;" data-bs-toggle="tooltip" data-original-title="{{__('apply')}}">
                                    <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                </a>
                                <a href="{{ route('job-application.index') }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                   title="{{ __('Reset') }}">
                                    <span class="btn-inner--icon"><i class="fa fa-trash-off text-white-off "></i></span>
                                </a>
                            </div>

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card overflow-hidden mt-0">
        <div class="container-kanban">
            @php

                $json = [];
                foreach ($stages as $stage){
                    $json[] = 'task-list-'.$stage->id;
                }
            @endphp
            <div class="row kanban-wrapper horizontal-scroll-cards" data-plugin="dragula" data-containers='{!! json_encode($json) !!}'>
                @foreach($stages as $stage)
                    @php $applications = $stage->applications($filter) @endphp

                    <div class="col">
                        <div class="card">

                            <div class="card-header">
                                <div class="float-end">
                                    <span class="btn btn-sm btn-primary btn-icon count">
                                        {{count($applications)}}
                                    </span>
                                </div>
                                <h4 class="mb-0">{{$stage->title}}</h4>
                            </div>

                            <div class="card-body kanban-box" id="task-list-{{$stage->id}}" data-id="{{$stage->id}}">
                                @foreach($applications as $application)
                                    <div class="card" data-id="{{$application->id}}">
                                        <div class="pt-3 ps-3">
                                        </div>
                                        <div class="card-header border-0 pb-0 position-relative">
                                            <h5><a href="{{ route('job-application.show',\Crypt::encrypt($application->id)) }}">{{$application->name}}</a></h5>
                                            <div class="card-header-right">
                                                @if(Auth::user()->type != 'client')
                                                    <div class="btn-group card-option">
                                                        <button type="button" class="btn dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa fa-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            @can('show job application')

                                                                <a class="dropdown-item" href="{{ route('job-application.show',\Crypt::encrypt($application->id)) }}" class="dropdown-item"> <i class="fa fa-bookmark"></i>{{__('View')}}</a>

                                                            @endcan
                                                            @can('delete job application')
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['job-application.destroy', $application->id],'id'=>'delete-form-'.$application->id]) !!}
                                                                <a href="#!" class="dropdown-item bs-pass-para"><i class="fa fa-archive"></i>
                                                                    <span> {{__('Delete')}} </span>
                                                                </a>
                                                                {!! Form::close() !!}
                                                            @endcan


                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <ul class="list-inline mb-0 mt-0">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <span class="static-rating static-rating-sm d-block">
                                                            @for($i=1; $i<=5; $i++)
                                                                    @if($i <= $application->rating)
                                                                        <i class="star fas fa-star voted"></i>
                                                                    @else
                                                                        <i class="star fas fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <small class="text-md">{{ !empty($application->jobs)?$application->jobs->title:'' }}</small><br>


                                                    <li class="list-inline-item d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{__('Product')}}">
                                                        <i class="fa fa-clock me-1" data-ajax-popup="true" data-title="{{__('Applied at')}}"></i>{{\Auth::user()->dateFormat($application->created_at)}}

                                                    </li>

                                                    <li class="list-inline-item d-inline-flex align-items-center" data-bs-toggle="tooltip" title="{{__('Source')}}">
                                                    </li>
                                                </ul>
                                                <div class="user-group">

                                                    {{--                                                    <img @if($application->profile) src="{{asset('/storage/uploads/job/profile/'.$application->profile)}}" --}}
                                                    {{--                                                         @else src="{{asset('/storage/uploads/avatar/avatar.png')}}" @endif class="hweb">--}}

                                                    <img src="{{ !empty($application->profile) ?$profile . ($application->profile) : $logo."avatar.png" }}"
                                                         class="hweb" >


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span class="empty-container" data-placeholder="Empty"></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
