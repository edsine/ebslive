@extends('layouts.app')

@section('content')

<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
  <!--begin::Toolbar-->
  <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
      <!--begin::Page title-->
      <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="text-black-50 pt-5">Risk Management :<b style="color: #000"> Overview</b></h1>
        <!--end::Title-->
      </div>
      <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
  </div>
  <!--end::Toolbar-->
  <!--begin::Content-->
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
      <!--begin::Row-->
      <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6 mb-md-5 mb-xl-10">
          <!--begin::Row-->
          <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
              <!--begin::Card widget 8-->
              <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                  <!--begin::Statistics-->
                  <div class="mb-4 px-9">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center mb-2">
                      <!--begin::Value-->
                      <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">6754</span>
                      <!--end::Value-->
                      <!--begin::Label-->
                   
                      <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Total No. oF Risk Assigned To Users</span>
                    <!--end::Description-->
                  </div>
                  <!--end::Statistics-->
                  <!--begin::Chart-->
                  <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div>
                  <!--end::Chart-->
                </div>
                <!--end::Card body-->
              </div>
              <!--end::Card widget 8-->
              <!--begin::Card widget 5-->
              <div class="card card-flush h-md-50 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                  <!--begin::Title-->
                  <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                      <!--begin::Amount-->
                      <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">3</span>
                      <!--end::Amount-->
                      <!--begin::Badge-->
                     
                      <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Number Of Risked Transfered</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-0">
                  <!--begin::Progress-->
                 
                  <!--end::Progress-->
                </div>
                <!--end::Card body-->
              </div>
              <!--end::Card widget 5-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
              <!--begin::Card widget 9-->
              <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                  <!--begin::Statistics-->
                  <div class="mb-4 px-9">
                    <!--begin::Statistics-->
                    <div class="d-flex align-items-center mb-2">
                      <!--begin::Value-->
                      <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">473</span>
                      <!--end::Value-->
                      <!--begin::Label-->
                      <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->2.6%</span>
                      <!--end::Label-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Total Number Of Risk Avoided</span>
                    <!--end::Description-->
                  </div>
                  <!--end::Statistics-->
                  <!--begin::Chart-->
                  <div id="kt_card_widget_9_chart" class="min-h-auto" style="height: 125px"></div>
                  <!--end::Chart-->
                </div>
                <!--end::Card body-->
              </div>
              <!--end::Card widget 9-->
              <!--begin::Card widget 7-->
              <div class="card card-flush h-md-50 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                  <!--begin::Title-->
                  <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">458</span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Number Of Risk Count</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                
                <!--end::Header-->
                <!--begin::Card body-->
                
                <!--end::Card body-->
              </div>
              
              <!--end::Card widget 7-->
            </div>
            
            <!--end::Col-->
          </div>
          <!--end::Row-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
		<!--begin::Charts Widget 5-->
		<div class="card card-xl-stretch mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold fs-3 mb-1">Risk Analysis</span>
					<!-- <span class="text-muted fw-semibold fs-7">More than 500 new customers</span> -->
				</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-kt-buttons="true" data-kt-initialized="1">
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_year_btn">Year</a>
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_month_btn">Month</a>
					<!-- <a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 active" id="kt_charts_widget_5_week_btn">Week</a> -->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Chart-->
				<div id="kt_charts_widget_3_chart" style="height: 350px"></div>
				<!--end::Chart-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 5-->
	</div>
        <!--end::Col-->
      </div>
      <!--end::Row-->


      <!--begin::Row-->
      <div class="row">
        <!--begin::Col-->
        <div class="col-xl-4">
										<!--begin::Statistics Widget 5-->
										<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
												<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
														<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
														<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
														<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">250</div>
												<div class="fw-bold text-gray-400">Number Of Project Identified</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-4">
										<!--begin::Statistics Widget 5-->
										<a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
												<span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor" />
														<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor" />
														<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">+3000</div>
												<div class="fw-bold text-gray-100">Total Of Risk Champions</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-4">
										<!--begin::Statistics Widget 5-->
										<a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
												<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
														<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-white fw-bolder fs-2 mb-2 mt-5">23000</div>
												<div class="fw-bold text-white">Risk Notifications</div>
											</div>
										</a>
									</div>
									


    <!--end::Content container-->
  </div>
  <!--end::Content-->
</div>
<!--end::Content wrapper-->

@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush



