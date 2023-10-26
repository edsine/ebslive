<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    {{-- <style>
        #aa a{
            display: none
}
    </style> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Custom Asset Start -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">



    <!-- Start::bootstrap-sweet-alert -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- end::bootstrap-sweet-alert -->


    <link rel="stylesheet" href="{{ asset('new_assets/assets/css/plugins/flatpickr.min.css') }}">
    <!-- Custom Asset end -->

    @stack('third_party_stylesheets')

    @stack('page_css')
    <style>
        .form-control, .custom-select,
.dataTable-selector,
.dataTable-input {
    display: block;
    width: 100%;
    padding: 0.575rem 1rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #293240;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 6px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
    .form-control, .custom-select,
    .dataTable-selector,
    .dataTable-input {
        transition: none;
    }
}

.form-control[type="file"], .custom-select[type="file"],
  .dataTable-selector[type="file"],
  .dataTable-input[type="file"] {
    overflow: hidden;
}

.form-control[type="file"]:not(:disabled):not([readonly]), .custom-select[type="file"]:not(:disabled):not([readonly]),
    .dataTable-selector[type="file"]:not(:disabled):not([readonly]),
    .dataTable-input[type="file"]:not(:disabled):not([readonly]) {
    cursor: pointer;
}

.form-control:focus, .custom-select:focus,
  .dataTable-selector:focus,
  .dataTable-input:focus {
    color: #293240;
    background-color: #ffffff;
    border-color: #51459d;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(81, 69, 157, 0.25);
}

.form-control::-webkit-date-and-time-value, .custom-select::-webkit-date-and-time-value,
  .dataTable-selector::-webkit-date-and-time-value,
  .dataTable-input::-webkit-date-and-time-value {
    height: 1.5em;
}

.form-control::-moz-placeholder, .custom-select::-moz-placeholder, .dataTable-selector::-moz-placeholder, .dataTable-input::-moz-placeholder {
    color: #6c757d;
    opacity: 1;
}

.form-control::placeholder, .custom-select::placeholder,
  .dataTable-selector::placeholder,
  .dataTable-input::placeholder {
    color: #6c757d;
    opacity: 1;
}

.form-control:disabled, .custom-select:disabled,
  .dataTable-selector:disabled,
  .dataTable-input:disabled {
    background-color: #e9ecef;
    opacity: 1;
}

.form-control::file-selector-button, .custom-select::file-selector-button,
  .dataTable-selector::file-selector-button,
  .dataTable-input::file-selector-button {
    padding: 0.575rem 1rem;
    margin: -0.575rem -1rem;
    -webkit-margin-end: 1rem;
    margin-inline-end: 1rem;
    color: #293240;
    background-color: #f8f9fd;
    pointer-events: none;
    border-color: inherit;
    border-style: solid;
    border-width: 0;
    border-inline-end-width: 1px;
    border-radius: 0;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
    .form-control::file-selector-button, .custom-select::file-selector-button,
      .dataTable-selector::file-selector-button,
      .dataTable-input::file-selector-button {
        transition: none;
    }
}

.form-control:hover:not(:disabled):not([readonly])::file-selector-button, .custom-select:hover:not(:disabled):not([readonly])::file-selector-button,
  .dataTable-selector:hover:not(:disabled):not([readonly])::file-selector-button,
  .dataTable-input:hover:not(:disabled):not([readonly])::file-selector-button {
    background-color: #ecedf0;
}
.dataTable-wrapper.no-header .dataTable-container {
	border-top: 1px solid #d9d9d9;
}

.dataTable-wrapper.no-footer .dataTable-container {
	border-bottom: 1px solid #d9d9d9;
}

.dataTable-top,
.dataTable-bottom {
	padding: 8px 10px;
}

.dataTable-top > nav:first-child,
.dataTable-top > div:first-child,
.dataTable-bottom > nav:first-child,
.dataTable-bottom > div:first-child {
	float: left;
}

.dataTable-top > nav:last-child,
.dataTable-top > div:last-child,
.dataTable-bottom > nav:last-child,
.dataTable-bottom > div:last-child {
	float: right;
}

.dataTable-selector {
	padding: 6px;
}

.dataTable-input {
	padding: 6px 12px;
}

.dataTable-info {
	margin: 7px 0;
}

/* PAGER */
.dataTable-pagination ul {
	margin: 0;
	padding-left: 0;
}

.dataTable-pagination li {
	list-style: none;
	float: left;
}

.dataTable-pagination a {
	border: 1px solid transparent;
	float: left;
	margin-left: 2px;
	padding: 6px 12px;
	position: relative;
	text-decoration: none;
	color: #333;
}

.dataTable-pagination a:hover {
	background-color: #d9d9d9;
}

.dataTable-pagination .active a,
.dataTable-pagination .active a:focus,
.dataTable-pagination .active a:hover {
	background-color: #d9d9d9;
	cursor: default;
}

.dataTable-pagination .ellipsis a,
.dataTable-pagination .disabled a,
.dataTable-pagination .disabled a:focus,
.dataTable-pagination .disabled a:hover {
	cursor: not-allowed;
}

.dataTable-pagination .disabled a,
.dataTable-pagination .disabled a:focus,
.dataTable-pagination .disabled a:hover {
	cursor: not-allowed;
	opacity: 0.4;
}

.dataTable-pagination .pager a {
	font-weight: bold;
}

/* TABLE */
.dataTable-table {
	max-width: 100%;
	width: 100%;
	border-spacing: 0;
	border-collapse: separate;
}

.dataTable-table > tbody > tr > td,
.dataTable-table > tbody > tr > th,
.dataTable-table > tfoot > tr > td,
.dataTable-table > tfoot > tr > th,
.dataTable-table > thead > tr > td,
.dataTable-table > thead > tr > th {
	vertical-align: top;
	padding: 8px 10px;
}

.dataTable-table > thead > tr > th {
	vertical-align: bottom;
	text-align: left;
	border-bottom: 1px solid #d9d9d9;
}

.dataTable-table > tfoot > tr > th {
	vertical-align: bottom;
	text-align: left;
	border-top: 1px solid #d9d9d9;
}

.dataTable-table th {
	vertical-align: bottom;
	text-align: left;
}

.dataTable-table th a {
	text-decoration: none;
	color: inherit;
}

.dataTable-sorter {
	display: inline-block;
	height: 100%;
	position: relative;
	width: 100%;
}

.dataTable-sorter::before,
.dataTable-sorter::after {
	content: "";
	height: 0;
	width: 0;
	position: absolute;
	right: 4px;
	border-left: 4px solid transparent;
	border-right: 4px solid transparent;
	opacity: 0.2;
}

.dataTable-sorter::before {
	border-top: 4px solid #000;
	bottom: 0px;
}

.dataTable-sorter::after {
	border-bottom: 4px solid #000;
	border-top: 4px solid transparent;
	top: 0px;
}

.asc .dataTable-sorter::after,
.desc .dataTable-sorter::before {
	opacity: 0.6;
}

.dataTables-empty {
	text-align: center;
}

.dataTable-top::after, .dataTable-bottom::after {
	clear: both;
	content: " ";
	display: table;
}
.dataTable-dropdown label {
    display: flex;
    align-items: center;
    white-space: nowrap;
}
.dataTable-dropdown label select.dataTable-selector1 {
    width: 75px;
    margin-right: 10px;
}
    </style>
</head>

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default" data-kt-app-sidebar-minimize="{{(auth()->user()->hasRole ('minister') || auth()->user()->hasRole ('permsec')) ? 'on' : 'off'}}" >
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('layouts.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('layouts.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    @include('layouts.content')
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    @include('layouts.footer')
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->



    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var hostUrl = "asset/";
    </script>

    <!-- Start::bootstrap-sweet-alert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <!-- end::bootstrap-sweet-alert -->


    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('js/events.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/apps/inbox/listing.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js - Copy/custom/widgets.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script> -->
    <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script src="{{ asset('assets/js/custom/utilities/modals/create-account.js') }}">
    </script>
    <script src="{{ asset('new_assets/assets/js/plugins/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/simple-datatables.js') }}"></script>

    <script>
         $(document).ready(function () {
    /* if ($(".datatable").length > 0) {
        const dataTable =  new simpleDatatables.DataTable(".datatable");
    } */

    //select2();
    //summernote();
    daterange();
    // loadConfirm();
});


function daterange() {
    if ($("#pc-daterangepicker-1").length > 0) {
        document.querySelector("#pc-daterangepicker-1").flatpickr({
            mode: "range"
        });
    }
}
        $(document).ready(function () {
        if ($(".datatable").length > 0) {
            const dataTable =  new simpleDatatables.DataTable(".datatable");
        }
    });
    </script>

    @stack('third_party_scripts')

    @stack('page_scripts')

</body>

</html>