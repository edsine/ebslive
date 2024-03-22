<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path d="M2 2.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .354.146l3.5 3.5a.5.5 0 0 1 .146.354V13a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V2.5zM3 3v10h10V6.707L10.293 3H3z"/>
                    <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H9a.5.5 0 0 1-.5-.5V2H6v2.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5V1z"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title spicyj">Document Manager</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link" href="">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Dashboard </span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{route('documents_manager.documentsByUsers')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Assigned Documents </span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{route('documents_manager.index')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">All Documents </span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{route('documents_category.index')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Document Categories</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{route('documents_manager.audits')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Document Audit Trail </span>
            </a>
        </div>
        
    </div>
</div>