@if ((auth()->user()->staff->department_id==2) || auth()->user()->hasRole('super-admin'))
	

<div class="menu-item main-menu-item">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor"></path>
                    <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title spicyj">HRM System</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
       <!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Payroll Setup</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('setsalary.index') }}" class="menu-link {{ Request::is('setsalary.index*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Set Salary</span>
            </a>
            <!--end:Menu link-->
        </div>
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('payslip.index') }}" class="menu-link {{ Request::is('payslip*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Payslip</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
    </div>

</div> 
<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Leave Management Setup</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('leave.index') }}" class="menu-link {{ Request::is('leave*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Manage Leave</span>
            </a>
            <!--end:Menu link-->
        </div>
        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                                fill="currentColor" />
                            <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                            <path
                                d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Attendance</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('attendanceemployee.index') }}" class="menu-link {{ Request::is('attendanceemployee.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Mark Attendance</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('attendanceemployee.bulkattendance') }}" class="menu-link {{ Request::is('attendanceemployee.bulkattendance*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Bulk Attendance</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            
        </div> 
        <!--end:Menu item-->
    </div>
    
</div> 
<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Performance Setup</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
            <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('indicator.index') }}" class="menu-link {{ Request::is('indicator.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Indicator</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('appraisal_index.index') }}" class="menu-link {{ Request::is('appraisal_index.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Appraisal</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('goaltracking.index') }}" class="menu-link {{ Request::is('goaltracking.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Goal Tracking</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            
        <!--end:Menu item-->
    </div>
    
</div>
<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Training Setup</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
            <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('training.index') }}" class="menu-link {{ Request::is('training.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Training List</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('trainer.index') }}" class="menu-link {{ Request::is('trainer.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Trainer</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            
        <!--end:Menu item-->
    </div>
    
</div> 
<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Recruitment Setup</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
            <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('job.index') }}" class="menu-link {{ Request::is('job.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Jobs</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('job.create') }}" class="menu-link {{ Request::is('job.create*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Job Create</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('job-application.index') }}" class="menu-link {{ Request::is('job-application.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Job Application</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('job.application.candidate') }}" class="menu-link {{ Request::is('job.application.candidate*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Job Candidate</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('job.on.board') }}" class="menu-link {{ Request::is('job.on.board*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Job On-boarding</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('custom-question.index') }}" class="menu-link {{ Request::is('custom-question.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Custom Question</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('interview-schedule.index') }}" class="menu-link {{ Request::is('interview-schedule.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Interview Schedule</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ url('career/2/en') }}" class="menu-link {{ Request::is('career*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Career</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            
        <!--end:Menu item-->
    </div>
    
</div> 
<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">HR Admin Setup</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
            <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('award.index') }}" class="menu-link {{ Request::is('award.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Award</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('transfer.index') }}" class="menu-link {{ Request::is('transfer.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Transfer</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('resignation.index') }}" class="menu-link {{ Request::is('resignation.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Resignation</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('travel.index') }}" class="menu-link {{ Request::is('travel.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Trip</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('promotion.index') }}" class="menu-link {{ Request::is('promotion.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Promotion</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('complaint.index') }}" class="menu-link {{ Request::is('complaint.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Complains</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('warning.index') }}" class="menu-link {{ Request::is('warning.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Warning</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('termination.index') }}" class="menu-link {{ Request::is('termination.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Termination</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('announcement.index') }}" class="menu-link {{ Request::is('announcement.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Announcement</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('holiday.index') }}" class="menu-link {{ Request::is('holiday.index*') ? 'active' : '' }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Holidays</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                
                <!--end:Menu item-->
            
        <!--end:Menu item-->
    </div>
    
</div> 
<div class="menu-item">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <a href="{{ route('meeting.index') }}">
                <span class="menu-title">Meeting</span>
            </a>
    </span>
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <a href="{{ route('account-assets.index') }}">
                <span class="menu-title">Employees Asset Setup</span>
            </a>
    </span>
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <a href="{{ route('company-policy.index') }}">
                <span class="menu-title">Company Policy</span>
            </a>
    </span>
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <a href="{{ route('designation.index') }}">
                <span class="menu-title">HRM System Setup</span>
            </a>
    </span>
</div>
    </div> 

   
</div> 

@endif