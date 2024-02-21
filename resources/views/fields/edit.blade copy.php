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
        <li class="breadcrumb-item text-dark">{{ __($trans . '.edit') }}</li>
    </ul>
@stop

@section('style')
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}">
            @method('PUT')
            <input type="hidden" name="id" value="{{ $row->id }}" />

            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __($trans . '.info') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="fv-row fl">
                                        <label class="required form-label" for="display">الأسم الذي سيظر به الحقل</label>
                                        <input placeholder="مثال الأسم , رقم الهويه .... " type="text" id="display"
                                            name="display" class="form-control form-control-lg" required
                                            value="{{ $row->display }}"
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card-body pt-0">
                                        <div>
                                            <div class="fv-row fl">
                                                <label class="form-label" for="name">الأسم البرمجي للحقل
                                                </label>
                                                <input type="hidden" name="name" value="{{ $row->name }}" />

                                                <div class="mt-5">
                                                    {{ $row->name }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card-body pt-0">
                                        <div>
                                            <div class="fv-row fl">
                                                <label class="form-label" for="type">{{ __('field.type') }}
                                                </label>
                                                <div class="mt-5">
                                                    {{ $row->type }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="card card-flush mb-5 mb-lg-10">
                                <div
                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold"> البيانات الأوليه للحقل المضافه من قبل</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table
                                        class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-7 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 border-bottom border-gray-200 py-4">
                                                <th>
                                                    أسم
                                                    العنصر
                                                    المراد ملؤه

                                                </th>
                                                <th>
                                                    قيمه
                                                    العنصر
                                                    المراد ملؤه
                                                    <small
                                                        class="fs-7 fw-semibold text-danger">({{ __('site.only_english') }})</small>

                                                </th>
                                                <th class="pt-0 text-end">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($row->fillables as $value)
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="field_fillable_id[]"
                                                            value="{{ $value->id }}">

                                                        <div class="fv-row fl">
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="أسم العنصر المراد ملؤه"
                                                                name="old_fillable_display[{{ $value->id }}]"
                                                                value="{{ $value->display }}" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fv-row fl">
                                                            <input type="text" class="form-control form-control-lg"
                                                                placeholder="قيمه العنصر المراد ملؤه"
                                                                name="old_fillable_value[{{ $value->id }}]"
                                                                value="{{ $value->value }}" />
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <button class="btn btn-light-danger me-auto" id="field_fillable"
                                                            data-id="{{ $value->id }}">
                                                            <i class="fa fa-trash-alt m-1 w-1 h-1 mr-1 rtl:ml-1"></i>
                                                            حذف</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                           ssss
                            

                            <div class="card card-flush pt-3 mb-5 mb-lg-10" id="fillable_div">
                                <div
                                    class="notice d-flex bg-light-info rounded border-info border border-dashed rounded-3 p-6">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">يرجي ملئ الحقل المختار بالبيانات الأوليه</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table id="kt_create_new_custom_fields"
                                        class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-7 gs-7">
                                        <thead>
                                            <tr class="fw-semibold fs-6 border-bottom border-gray-200 py-4">
                                                <th>
                                                    <div class="fv-row fl">
                                                        <label class="required form-label" for="fillable_display">أسم
                                                            العنصر المراد ملؤه </label>
                                                    </div>

                                                </th>
                                                <th>

                                                    <div class="fv-row fl">
                                                        <label class="required form-label" for="fillable_value">قيمه
                                                            العنصر المراد ملؤه </label>
                                                        <small
                                                            class="fs-7 fw-semibold text-danger">({{ __('site.only_english') }})</small>
                                                    </div>

                                                </th>
                                                <th class="pt-0 text-end">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="أسم العنصر المراد ملؤه" name="fillable_display[]" />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="قيمه العنصر المراد ملؤه" name="fillable_value[]" />
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                        data-kt-action="field_remove">
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.5"
                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.5"
                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" class="btn btn-light-success me-auto"
                                        id="kt_create_new_custom_fields_add">
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="5" fill="currentColor"></rect>
                                                <rect x="10.8891" y="17.8033" width="12" height="2"
                                                    rx="1" transform="rotate(-90 10.8891 17.8033)"
                                                    fill="currentColor"></rect>
                                                <rect x="6.01041" y="10.9247" width="12" height="2"
                                                    rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>أضف ملئ جديد</a>
                                </div>
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
    <script src="{{ asset('assets/js/custom/apps/subscriptions/add/advanced.js') }}"></script>
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Edit{{ $trans }}');
        });
        var $class1 = $('.checkbox');
        var $class2 = $('.select');
        var $class3 = $('#radio');
        // $("#fillable_div").addClass('d-none');

        // var e_value = '{{ $row->type }}';
        // arr = ["checkbox", "select", "radio"];
        // if (arr.includes(e_value)) {

        //     $("#fillable_div").removeClass('d-none');
        // } else {
        //     $("#fillable_div").addClass('d-none');
        // }
    </script>
@stop
