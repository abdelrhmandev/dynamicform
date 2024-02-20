@extends('layouts.app')
@section('title', __($trans . '.edit'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a>
        </li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __($trans . '.edit') }}</li>
    </ul>
@stop
@section('style')
    <style>
        [data-class="light-primary"] {
            pointer-events: none !important;
        }
        .toast-top-center {
            top: 12px;
            margin: 0 auto;
            left: 2%;
        }
    </style>

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card card-flush py-0">
            <div class="d-flex flex-column flex-md-row rounded  p-10">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6 min-w-lg-200px"
                    role="tablist">
                    <li class="nav-item w-100 me-0 mb-md-2" role="presentation">
                        <a class="nav-link w-100 btn btn-flex btn-active-light-success active" data-bs-toggle="tab"
                            href="#kt_vtab_pane_4" aria-selected="true" role="tab">

                            <i class="ki-outline ki-document fs-2 me-3"></i>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">الأستمارة</span>
                                <span class="fs-7">تعديل بيانات الأستمارة</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item w-100 me-0 mb-md-2" role="presentation">
                        <a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab"
                            href="#kt_vtab_pane_5" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-building fs-2 me-3"></i>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bold">المباني</span>
                                <span class="fs-7"> حقول مباني الأستمارة</span>
                            </span>
                        </a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active fade show w-900px" id="kt_vtab_pane_4" role="tabpanel">
                        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}"
                            class="form d-flex flex-column flex-lg-row"
                            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $row->id }}" />
                            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                                <div class="card card-flush py-0">
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-column gap-5">
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="fv-row fl">
                                                        <label class="required form-label"
                                                            for="title">{{ __('form.title') }}</label>
                                                        <input placeholder="{{ __('form.title') }}" type="text"
                                                            id="title" name="title" class="form-control mb-2" required
                                                            value="{{ $row->title }}"
                                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="fv-row fl">
                                                        <label class="required form-label"
                                                            for="mobile">{{ __('site.mobile') }}</label>
                                                        <input placeholder="{{ __('site.mobile') }}" type="text"
                                                            id="mobile" name="mobile" class="form-control mb-2"
                                                            value="{{ $row->mobile }}" required
                                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="fv-row fl">
                                                        <label class="required form-label"
                                                            for="id_number">{{ __('site.id_number') }}</label>
                                                        <input placeholder="{{ __('site.id_number') }}" type="text"
                                                            id="id_number" name="id_number" class="form-control mb-2"
                                                            required value="{{ $row->id_number }}"
                                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="fv-row fl">
                                                        <label class="required form-label" for="region_id">المنطقه</label>
                                                        <select class="form-select form-select-solid"
                                                            data-control="select2" data-hide-search="false"
                                                            data-placeholder="المنطقه" name="region_id">
                                                            <option value="">المنطقه</option>
                                                            @foreach ($regions as $region)
                                                                <option value="{{ $region->id }}"
                                                                    {{ $region->id == $row->region_id ? 'selected' : '' }}>
                                                                    {{ $region->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <label class="form-label" for="address_info">العنوان</label>
                                                <textarea class="form-control form-control-solid" rows="4" id="address_info" name="address_info">{{ $row->address_info }}</textarea>
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-semibold mb-2">الجنس
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="تحديد جنس صاحب الأستمارة">
                                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                    </span></label>
                                                <div class="row g-9" data-kt-buttons="true"
                                                    data-kt-buttons-target="[data-kt-button='true']">
                                                    <div class="col">
                                                        <label
                                                            class="btn btn-outline btn-outline-dashed {{ $row->gender == 'male' ? 'btn-active-light-primary' : '' }} {{ $row->gender == 'male' ? 'active' : '' }} d-flex text-start p-6"
                                                            data-kt-button="true">
                                                            <span
                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" value="male"
                                                                    {{ $row->gender == 'male' ? "checked='checked'" : '' }} />
                                                            </span>
                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">ذكر</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="col">
                                                        <label
                                                            class="btn btn-outline btn-outline-dashed {{ $row->gender == 'female' ? 'btn-active-light-primary' : '' }} {{ $row->gender == 'female' ? 'active' : '' }} d-flex text-start p-6"
                                                            data-kt-button="true">
                                                            <span
                                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" value="female"
                                                                    {{ $row->gender == 'female' ? "checked='checked'" : '' }} />
                                                            </span>
                                                            <span class="ms-5">
                                                                <span
                                                                    class="fs-4 fw-bold text-gray-800 d-block">أنثي</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <x-btns.button />
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="kt_vtab_pane_5" role="tabpanel">
                        <div id="AjaxResponsejKanban"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/handleFormSubmit.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.js') }}"></script>
    <script>
        // Class definition       
        function AjaxLoadjKanban(){
        $.ajax({
            url: "{{ route('forms.AjaxLoadjKanban') }}",
            method: "POST",
            data: {
                FormId: '{{ $row->id }}',
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                $("#AjaxResponsejKanban").html(data);
            }
        });
    }

        AjaxLoadjKanban();


        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Edit{{ $trans }}');
            KTJKanbanDemoFixedHeight.init();
        });
    </script>
@stop
