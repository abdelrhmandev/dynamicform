<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
    <span class="menu-link menu-center">
        <span class="menu-icon me-0">
            <i class="bi bi-building fs-2x"></i>
        </span>
        <span class="menu-title">الأستمارات</span>
    </span>
    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
       
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"> الأستمارات</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('forms.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">الأستمارات</span>
                    </a>
                </div> 
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('forms.create')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">أضف أستمارة</span>
                    </a>
                </div> 
            </div>
        </div>
    </div>
</div>