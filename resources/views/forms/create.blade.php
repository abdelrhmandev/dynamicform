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
    <link href="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')

    <div id="kt_content_container" class="container-xxl">
        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}">

            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">


                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">

                            <div class="row">
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label" for="title">{{ __('form.title') }}</label>
                                        <input placeholder="{{ __('form.title') }}" type="text" id="title"
                                            name="title" class="form-control mb-2" required
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label" for="mobile">{{ __('site.mobile') }}</label>
                                        <input placeholder="{{ __('site.mobile') }}" type="text" id="mobile"
                                            name="mobile" class="form-control mb-2" required
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label"
                                            for="id_number">{{ __('site.id_number') }}</label>
                                        <input placeholder="{{ __('site.id_number') }}" type="text" id="id_number"
                                            name="id_number" class="form-control mb-2" required
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label" for="region_id">المنطقه</label>
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-hide-search="false" data-placeholder="المنطقه" name="region_id">
                                            <option value="">المنطقه</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                <label class="form-label" for="address_info">العنوان</label>
                                <textarea class="form-control form-control-solid" rows="4" id="address_info" name="address_info"></textarea>
                            </div>

                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">الجنس
                                    <span class="ms-1" data-bs-toggle="tooltip" title="تحديد جنس صاحب الأستمارة">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span></label>
                                <!--End::Label-->
                                <!--begin::Row-->
                                <div class="row g-9" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button='true']">
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6"
                                            data-kt-button="true">
                                            <!--begin::Radio-->
                                            <span
                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                <input class="form-check-input" type="radio" name="gender" value="male"
                                                    />
                                            </span>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <span class="ms-5">
                                                <span class="fs-4 fw-bold text-gray-800 d-block">ذكر</span>
                                            </span>
                                            <!--end::Info-->
                                        </label>
                                        <!--end::Option-->
                                    </div>
       
                                    <div class="col">
                                        <!--begin::Option-->
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6"
                                            data-kt-button="true">
                                            <!--begin::Radio-->
                                            <span
                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="female" />
                                            </span>
                                            <!--end::Radio-->
                                            <!--begin::Info-->
                                            <span class="ms-5">
                                                <span class="fs-4 fw-bold text-gray-800 d-block">أنثي</span>
                                            </span>
                                            <!--end::Info-->
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                   
                                </div>
                                <!--end::Row-->
                            </div>
                        </div>
                    </div>

                </div>
                <x-btns.button />
            </div>
        </form>
    </div>



@stop
@section('scripts')

    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/handleFormSubmit.js') }}"></script>
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });
    </script>

@stop
