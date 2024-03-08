@extends('layouts.app')
@section('content')
    <div class="row g-5 g-xl-8 pt-5">
        <h1 class="text-black-50 pt-5"> ASSET MANAGEMENT DASHBOARD{{--  for <b style="color: #000">Registration Unit</b> --}}</h1>
        <div class="col-xl-4">
            <!--begin::Statistics Widget 3-->
            <div class="card mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <div class="d-flex flex-stack flex-grow-1 card-p">
                        <div class="d-flex flex-column me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Total Asset Assigned To Me
                            </a>
                            <span class="text-muted fw-semibold mt-1">
                            </span>
                        </div>
                        <span class="symbol symbol-50px">
                            <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $myasset }}</span>
                        </span>
                    </div>
                    <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning"
                        style="height: 50px"></div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Body-->
        </div>



        <div class="col-xl-4">
            <!--begin::Statistics Widget 3-->
            <div class="card mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <div class="d-flex flex-stack flex-grow-1 card-p">
                        <div class="d-flex flex-column me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Total Departmental
                                Asset</a>
                            <span class="text-muted fw-semibold mt-1">
                            </span>
                        </div>
                        <span class="symbol symbol-50px">
                            <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $mydept }}</span>
                        </span>
                    </div>
                    <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success"
                        style="height: 50px"></div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Body-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 3-->
            <div class="card mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <div class="d-flex flex-stack flex-grow-1 card-p">
                        <div class="d-flex flex-column me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Total Asset</a>
                            <span class="text-muted fw-semibold mt-1">
                            </span>
                        </div>
                        <span class="symbol symbol-50px">
                            <span
                                class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $data->count() }}</span>
                        </span>
                    </div>
                    <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning"
                        style="height: 50px"></div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 3-->
        </div>
    </div>
    <div class="row g-5 g-xl-8 pt-5">
        {{-- <h1 class="text-black-50 pt-5"> ASSET MANAGEMENT DASHBOARD for <b style="color: #000">Registration Unit</b></h1> --}}
        <div class="col-xl-4">
            <!--begin::Statistics Widget 3-->
            <div class="card mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <div class="d-flex flex-stack flex-grow-1 card-p">
                        <div class="d-flex flex-column me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Total Staff
                            </a>
                            <span class="text-muted fw-semibold mt-1">
                            </span>
                        </div>
                        <span class="symbol symbol-50px">
                            <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $totalstaff }}</span>
                        </span>
                    </div>
                    <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning"
                        style="height: 50px"></div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Body-->
        </div>



        <div class="col-xl-4">
            <!--begin::Statistics Widget 3-->
            <div class="card mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <div class="d-flex flex-stack flex-grow-1 card-p">
                        <div class="d-flex flex-column me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Total Suppliers
                                Asset</a>
                            <span class="text-muted fw-semibold mt-1">
                            </span>
                        </div>
                        <span class="symbol symbol-50px">
                            <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $totalsupply }}</span>
                        </span>
                    </div>
                    <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success"
                        style="height: 50px"></div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Body-->
        </div>

        <div class="col-xl-4">
            <!--begin::Statistics Widget 3-->
            <div class="card mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <div class="d-flex flex-stack flex-grow-1 card-p">
                        <div class="d-flex flex-column me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Total Brand</a>
                            <span class="text-muted fw-semibold mt-1">
                            </span>
                        </div>
                        <span class="symbol symbol-50px">
                            <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{ $totalbrand }}</span>
                        </span>
                    </div>
                    <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="warning"
                        style="height: 50px"></div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 3-->
        </div>
    </div>

    <!--end::Row-->

    <!--start ::row-->

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Asset By Type</h4>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Asset By Title</h4>
                <canvas id="doughnutChart"></canvas>
              </div>
            </div>
          </div>
    </div>
    <!--end ::row-->




</div>




    <!--end::Tables Widget 12-->
    </div>
@endsection
