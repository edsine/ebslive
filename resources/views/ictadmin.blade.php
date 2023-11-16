@extends('layouts.app')

@section('content')
<h1 class="text-black-50 pt-5">ICT:<b style="color: #000"> Overview</b></h1>
<br>

<!--begin::Row-->
<div class="row g-5 g-xl-8">
@include('clokin')
    <div class="col-sm-6 col-xl-4">
    <button id="showButton" onclick="showCards()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10" />
        <line x1="12" y1="8" x2="12" y2="16" />
        <line x1="8" y1="12" x2="16" y2="12" />
    </svg>
</button>
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-success card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5"></div>
                </span>
                <a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">Total Number ICT Staff</a>

                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">{{$ictstaff}}</span>
                    <span class="fw-semibold text-muted fs-7"></span>
                </div>
                {{-- <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
    <div class="col-sm-6 col-xl-4">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-warning card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-white fw-bold fs-2 mb-2 mt-5"></div>
                </span>
                <a href="#" class="card-title fw-bold text-warning fs-5 mb-3 d-block">Total Number Of Staff With Work Tools</a>
                <div class="py-1">
                    <span class="text-white fs-1 fw-bold me-2">50</span>
                    <span class="fw-semibold text-muted fs-7"></span>
                </div>
                {{-- <div class="progress h-7px bg-white bg-opacity-50 mt-7">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
    <div class="col-sm-6 col-xl-4">
        <!--begin: Statistics Widget 6-->
        <div class="card  shadow bg-light-primary card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body my-3">
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5"></div>
                </span>
                <a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">Total Number Of Staff Without Work Tools</a>
                <div class="py-1">
                    <span class="text-dark fs-1 fw-bold me-2">100</span>
                    <span class="fw-semibold text-muted fs-7"></span>
                </div>
                {{-- <div class="progress h-7px bg-secondary bg-opacity-50 mt-7">
                    <div class="progress-bar bg-secondry" role="progressbar" style="width: 76%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
            </div>
            <!--end:: Body-->
        </div>
        <!--end: Statistics Widget 6-->
    </div>
</div>
<!--end::Row-->
<div class="row g-5 g-xl-8 pt-5">
    <div class="col-sm-6 col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor"></rect>
                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor"></rect>
                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor"></rect>
                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor"></rect>
                    </svg>
                </span>
                <span class="float-end">
                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Number Of Staff with worktools but Not Functional </div>
                </span>
                <!--end::Svg Icon-->
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">40</div>
                <div class="fw-semibold text-gray-400"></div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>

    <div class="col-sm-6 col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-light-success hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                <span class="svg-icon svg-icon-dark-100 svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                        <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                        <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="float-end">
                    <div class="text-success fw-bold fs-2 mb-2 mt-5">Other ICT Equipment</div>
                </span>
                <div class="text-dark  fw-bold fs-2 mb-2 mt-5">25</div>
                <div class="fw-semibold text-gray-100"></div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-sm-6 col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card shadow bg-green hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                <span class="svg-icon svg-icon-dark-100 svg-icon-3x ms-n1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                        <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                        <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="float-end">
                    <div class="text-success fw-bold fs-2 mb-2 mt-5">Total Number Of New Systems</div>
                </span>
                <div class="text-dark  fw-bold fs-2 mb-2 mt-5"></div>
                <div class="fw-semibold text-gray-100"></div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>


   
<!--begin::Card widget 6-->
<div class="card card-flush h-md-50 mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Currency-->
                {{-- <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span> --}}
                <!--end::Currency-->
                <!--begin::Amount-->
                {{-- <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">2,420</span> --}}
                <!--end::Amount-->
                <!--begin::Badge-->
                {{-- <span class="badge badge-success fs-base"> --}}
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                {{-- <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                    </svg>
                </span> --}}
                {{-- <!--end::Svg Icon-->2.6%</span> --}}
                <!--end::Badge-->
            </div>
            <!--end::Info-->
            <!--begin::Subtitle-->
            <span class="text-gray-400 pt-1 fw-bold fs-6">Corrective Action Request</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end px-0 pb-0">
        <!--begin::Chart-->
        <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
        <!--end::Chart-->
    </div>
    <!--end::Card body-->
</div>
</div>

<!--end::Card widget 6-->

@endsection