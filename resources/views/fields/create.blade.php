@extends('layouts.app')
@section('title', __($trans . '.add'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a>
        </li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __($trans . '.add') }}</li>
    </ul>
@stop
@section('style')

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
 @stop
@section('content')

<form action="{{ route('fields.store') }}" method="post">
    @csrf 
    <input type="text">
    <input type="submit">
</form>
{{  dd() }}
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Stepper-->
        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10"
            id="kt_create_field_stepper">
            <!--begin::Aside-->
            <div
                class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                <!--begin::Wrapper-->
                <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                    <!--begin::Nav-->
                    <div class="stepper-nav">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">الحقل</h3>
                                    <div class="stepper-desc fw-semibold">تحديد نوع الحقل</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">خصائص الحقل</h3>
                                    <div class="stepper-desc fw-semibold">من حيث أسم الحقل</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                       
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                     
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">الأنتهاء</h3>
                                    <div class="stepper-desc fw-semibold">الحقل جاهز</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Aside-->
            <!--begin::Content-->
            <div class="card d-flex flex-row-fluid flex-center">
                <!--begin::Form-->


                
                <form class="card-body py-20 w-100 mw-xl-700px px-9" novalidate="novalidate" id="kt_create_field_form">
                 
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                           
                          
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">نوع الحقل</span>
                             </h3>
                            
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <!--begin::Row-->

                                <!--begin::Col-->
                                <x-fields.select />

                                <!--end::Col-->

                                <!--end::Row-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 2-->
                    <div data-kt-stepper-element="content">
                        <div class="w-100">

                            
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">خصائص الحقل</span>
                             </h3>
                            

                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">الأسم الذي سيظر به الحقل</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="الأسم الذي سيظر به الحقل عند عرض الأستمارة"></i>
                                </label>
                                <!--end::Label-->

                                <input placeholder="مثال الأسم , رقم الهويه .... " type="text" id="label"
                                    name="label" pattern="[a-zA-Z]"
                                    class="form-control form-control-lg form-control-solid" />

                            </div>

                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">الأسم البرمجي للحقل</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="الأسم البرمجي للحقل و لا يظهر عند الأستمارة"></i>
                                </label>
                                <!--end::Label-->
                                <input placeholder="مثال name,id_number .... " type="text" id="name"
                                    name="name" pattern="[a-zA-Z]"
                                    class="form-control form-control-lg form-control-solid" />
                                <small class="fs-7 fw-semibold text-danger">يكتب باللغه الأنجليزيه
                                    فقط</small>
                            </div>


                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <label class="fs-6 fw-semibold form-label">هل الحقل مطلوب ؟</label>
                                    <div class="fs-7 fw-semibold text-muted">يجب ملأ الحقل عند حفظ البيانات</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_required"
                                        checked="checked" />
                                    <span class="form-check-label fw-semibold text-muted">نعم</span>
                                </label>
                                <!--end::Switch-->
                            </div>

                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>العرض</span>
                                </label>
                                <select name="width" class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true">
                                    <option value="33">33%</option>
                                    <option value="50">50%</option>
                                    <option value="66">66%</option>
                                    <option value="100">100%</option>
                                </select>
                            </div>


                            <div id="ResponseFieldInfo"></div>





                        </div>
                        <!--end::Wrapper-->
                    </div>
 
                    <div data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                             
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div class="mb-0">
                                <!--begin::Text-->
                                 
                                <!--end::Text-->
                                <!--begin::Alert-->
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
                                        <i class="bi bi-patch-check fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">تمت الأنتهاء من اضافه الحقل</h4>
                                            
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                                <!--end::Alert-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 5-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-stack pt-10">
                        <!--begin::Wrapper-->
                        <div class="mr-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3"
                                data-kt-stepper-action="previous">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                <span class="svg-icon svg-icon-4 ms-1 me-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                            transform="rotate(-180 18 13)" fill="currentColor" />
                                        <path
                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->عوده</button>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Wrapper-->
                        <div>
                            <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                <span class="indicator-label">حفظ البيانات
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"></rect>
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></span>
                                <span class="indicator-progress">فضلا انتظر قليلا...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">التالي
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
                                            fill="currentColor"></rect>
                                        <path
                                            d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Actions-->
                </form>



                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Stepper-->
    </div>


@stop
@section('scripts')

    <script src="{{ asset('assets/js/custom/utilities/modals/fields/create-field.js') }}"></script>
    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>

    <script>
        function LoadFieldInfo(type) {
            $.ajax({
                url: "{{ route('loadFieldInfo') }}",
                method: "POST",
                data: {
                    type: type,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#ResponseFieldInfo").html(data);
                }
            });
        }

 
        function SaveFieldInfo() {

         
            let form = $('#kt_create_field_form')[0];
            let data = new FormData(form);


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });            
            $.ajax({
                url: "{{ route('fields.store') }}",
                type: "POST",
                data: {
                   
                    '_token': '{{ csrf_token() }}'
                },
                dataType:"JSON",
                processData : false,
                contentType:false,
            });
        }
      
    </script>
    
@stop
