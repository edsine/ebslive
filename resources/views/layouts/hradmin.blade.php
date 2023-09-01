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
        <h1 class="text-black-50 pt-5">Human Resource :<b style="color: #000"> Overview</b></h1>
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
                      <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">{{$registered_employees}}</span>
                      <!--end::Value-->
                      <!--begin::Label-->
                     
                      <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Total Number Of Funds Staffs</span>
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
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Number Of Managements Staff</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-0">
                  <!--begin::Progress-->
                  <div class="d-flex align-items-center flex-column mt-3 w-100">
                    
                    
                  </div>
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
                     
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-400">Total Number Of Staff Per Departments(HR)</span>
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
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Number Of Departments Across The Fund</span>
                    <!--end::Subtitle-->
                  </div>
                  <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                  <!--begin::Title-->
                 
                  <!--end::Title-->
                  <!--begin::Users group-->
             
                  <!--end::Users group-->
                </div>
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
        <div class="col-xxl-6 mb-5 mb-xl-10">
          <!--begin::Maps widget 1-->
          <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header flex-nowrap pt-5">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">Industrial Relation and Staff Matters</span>
                <span class="text-gray-400 pt-2 fw-semibold fs-6">Graphical representations of Industrial Relation and Staff Matters</span>
              </h3>
              <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5 ps-6">
              <div id="kt_charts_widget_5" class="min-h-auto"></div>
            </div>
            <!--end::Body-->
          </div>
          <!--end::Maps widget 1-->
        </div>
        <!--end::Col-->
      </div>
      <!--end::Row-->


      <!--begin::Row-->
      <div class="row">
        <!--begin::Col-->
        <div class="col-xxl-12 col-md-12 mb-5 mb-xl-10">
          <!--begin::Maps widget 1-->
          <div class="card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header flex-nowrap pt-5">
              <!--begin::Title-->
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">Events Calendar</span>
                <span class="text-gray-400 pt-2 fw-semibold fs-6">All events and schedule</span>
              </h3>
              <div class="float-end">
                <button id="add-event-button" class="btn btn-primary py-3" data-toggle="modal" data-target="#event-modal">Add Event</button>
              </div>
              <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5 ps-6">
              <div class="p-5" id="calendar"></div>
            </div>
            <!--end::Body-->
          </div>
          <!--end::Maps widget 1-->
        </div>
        <!--end::Col-->

        <!-- Event Modal -->
        <!--begin::Modal - New Card-->
        <div id="event-modal" class="modal fade" tabindex="-1" aria-hidden="true" role="dialog" aria-hidden="true" data-backdrop="false">
          <!--begin::Modal dialog-->
          <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                <!--begin::Modal title-->
                <h1>Event Details</h1>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                  <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                      <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
              </div>
              <!--end::Modal header-->
              <!--begin::Modal body-->
              <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="event-form" class="kt_modal_new_card_form" method="POST">
                  @csrf
                  <input type="hidden" name="event_id" id="event_id">
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="title" class="required">Title</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify event's title"></i>
                    </label>
                    <input type="text" class="form-control form-control-solid" id="title" name="title">
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="start" class="required">Start Date and Time</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify start date and time"></i>
                    </label>
                    <input type="datetime-local" class="form-control form-control-solid" id="start" name="start">
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="title" class="required">End Date and Time</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify end date and time"></i>
                    </label>
                    <input type="datetime-local" class="form-control form-control-solid" id="end" name="end">
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="departments" class="required">Departments</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify event's departments"></i>
                    </label>
                    <select multiple class="form-control form-control-solid" id="departments1" name="department_ids[]">

                    </select>
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span for="rankings" class="required">Rankings</span>
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify event's ranking"></i>
                    </label>
                    <select multiple class="form-control form-control-solid" id="rankings1" name="ranking_ids[]">

                    </select>
                  </div>
                  <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                  <!--begin::Actions-->
                  <div class="text-center pt-15">
                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_new_card_submit" class="btn submit btn-primary">
                      <span class="indicator-label">Save</span>
                      <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                  </div>
                  <!--end::Actions-->
                </form>
                <!--end::Form-->
              </div>
              <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
          </div>
          <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Card-->

      </div>


     
      <!-- Begin::Row -->
    
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