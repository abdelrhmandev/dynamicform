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
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div id="kt_content_container" class="container-xxl">

            <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}"
                class="form d-flex flex-column flex-lg-row"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}">

                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">

                    <div class="card card-flush py-4">

                        <div class="card-body pt-2">

                            <div class="d-flex flex-column gap-5 gap-md-7">

                                <div class="fs-3 fw-bold mb-n2">أضافه حقول المباني</div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid fl">
                                        <label class="required form-label" for="display">أسم الحقل الذي سيظر به </label>
                                        <input placeholder="مثال مساحه المبني " type="text" id="display"
                                            name="display" class="form-control form-control-lg" required
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                    <div class="fv-row flex-row-fluid fl">
                                        <label class="required form-label" for="name">الأسم البرمجي للحقل
                                        </label>
                                        <input placeholder="مثال area " type="text" id="name"
                                            name="name"
                                            onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)"
                                            class="form-control form-control-lg" required
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="card card-flush">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="fw-bold">حدد نوع حقل المبني</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div id="kt_create_new_payment_method">
                                <x-fields.field />
                            </div>
                        </div>
                    </div>


                    <div class="card card-flush">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="fw-bold">وضع قيود علي الحقل</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div id="kt_create_new_payment_method">
                                <x-fields.fieldrules />
                            </div>
                        </div>
                    </div>


                    <div class="card card-flush">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="fw-bold">ملأ الحقل المحدد</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div id="kt_create_new_payment_method">
                                <x-fields.fieldfillable />
                            </div>
                        </div>
                    </div>




                    <!--end::Order details-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="../../demo6/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_edit_order_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
@stop
@section('scripts')
    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/handleFormSubmit.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/subscriptions/add/advanced.js') }}"></script>
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });
        var $class1 = $('.checkbox');
        var $class2 = $('.select');
        var $class3 = $('#radio');
        $("#fillable_div").addClass('d-none');
        $('input[name="type"]').click(function() {
            var e_value = ($("input[type='radio'][name=type]:checked", '#Addfield').val());
            arr = ["checkbox", "select", "radio"];


            $("#upload_extensions_restriction_div").addClass('d-none');
            $("#textbox_restriction_div").addClass('d-none');
            $("#number_restriction_div").addClass('d-none');


            if (arr.includes(e_value)) {
                $("#fillable_div").removeClass('d-none');
            } else {
                $("#fillable_div").addClass('d-none');
            }

            if (e_value == 'file') {
                $("#upload_extensions_restriction_div").removeClass('d-none');
            } else if (e_value == 'textbox') {
                $("#textbox_restriction_div").removeClass('d-none');
            } else if (e_value == 'numbers') {
                $("#number_restriction_div").removeClass('d-none');
            }


        });
    </script>
@stop
