@if ($query->form->fields()->count())
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- {{ $query->form->fields()->get() }} --}}
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            @for ($i = 0; $i < 5; $i++)
                هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول
                هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول هنا الحقول
            @endfor
        </div>
        <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
            <div data-theme="light" class="card card-flush pt-3 mb-0 border-0" data-kt-sticky="true"
                data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}"
                data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px"
                data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                <div class="mb-2">
                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">بطاقه تعريف صاحب الأستمارة
                        <br />
                        <span class="fw-bolder">{{ $query->form->title }}</span>
                    </h1>
                    <div class="py-10 text-center">
                        <img src="{{ asset('assets/media/svg/illustrations/easy/1.svg') }}"
                            class="theme-light-show w-100px" alt="" />
                        <img src="{{ asset('assets/media/svg/illustrations/easy/1-dark.svg') }}"
                            class="theme-dark-show w-100px" alt="" />
                    </div>

                </div>
                <div class="card-body pt-5">

                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2">رقم الجوال</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">{{ $query->form->mobile }}</span>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2">رقم الهويه</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">{{ $query->form->id_number }}</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-3"></div>
                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2">المنطقه</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">{{ $query->form->region->title }}</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-3"></div>
                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2">العنوان</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">{{ $query->form->address_info }}</span>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-3"></div>
                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2">الجنس</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">
                            {!! $query->form->gender == 'male' ? '<span class="text-success">ذكر</span>':'<span class="text-danger">أنثي</span>'  !!}
                            
                            
                        </div>
                    </div>

                    <div class="separator separator-dashed my-3"></div>
                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2"> حقول المباني</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">{{ $query->form->fields()->count() }}</span>
                        </div>
                    </div>


                    <div class="separator separator-dashed my-3"></div>
                    <div class="d-flex flex-stack">
                        <div class="text-gray-700 fw-semibold fs-6 me-2">تاريخ الانشاء</div>
                        <div class="d-flex align-items-center">
                            <span class="text-gray-900 fw-bolder fs-6">
                                {{ \Carbon\Carbon::parse($query->form->created_at)->diffForHumans() }}
                                
                                {{-- {{ $query->form->created_at }} --}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
@else
    <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
        <i class="ki-duotone ki-information-5 fs-5tx text-danger mb-5"><span class="path1"></span><span
                class="path2"></span><span class="path3"></span></i>
        <div class="text-center">
            <h1 class="fw-bold mb-5">هذا التصنيف من المباني غير مرتبط بأي أستمارة</h1>
            <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
            <div class="d-flex flex-center flex-wrap">
                <a href="#" class="btn btn-outline btn-outline-danger btn-active-danger m-2">ألغاء</a>
                <a href="#" class="btn btn-danger m-2">طلب الدعم الفني</a>
            </div>
        </div>
    </div>
@endif
