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
    <div id="kt_content_container" class="container-xxl">
        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}">
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
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label"
                                            for="title">{{ __('site.form.name') }}</label>
                                        <input placeholder="{{ __('site.form.name') }}" type="text" id="title"
                                            name="title" class="form-control mb-2" required
                                            data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label" for="title">{{ __('site.status') }}</label>
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" name="status"
                                                id="status" />
                                            <label class="form-check-label" for="status">
                                                <span>{{ __('site.published') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div
                                    class="notice d-flex bg-light-success rounded border-success border border-dashed rounded-3 p-6">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">يرجي أختيار الحقول المراد ربطتها بالأستمارة
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table
                                        class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-7 gs-7">
                                        <thead>
                                            <tr class="table-primary fs-5 text-gray-900 fw-bold">                                                
                                                <th>الحقل</th>
                                                {{-- <th>الأسم الذي سيظر به الحقل</th>
                                                <th>نوع للحقل</th> --}}
                                                <th class="w-400px">قيمه العنصر الأوليه</th>
                                                <th>الحقل مطلوب</th>
                                                <th class="pt-0 text-end">ملاحظات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fields as $field)
                                                <tr>
                                                    <td>
                                                        <div class="fv-row fl" id="{{ $field->id }}">
                                                            <label class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="field_id[]" value="{{ $field->id }}"
                                                                    id="field{{ $field->id }}" required data-fv-not-empty___message="فضلا حدد علي الأقل حقل واحد">                                                                                                                        
                                                                <a href="{{ route('fields.edit',$field->id) }}">{{ $field->display }}</a>
                                                            </label>
                                                        </div>
                                                </td>                                                        
                                                    {{-- <td>{{ $field->type }}</td> --}}
                                                    {{-- <td>{{ $field->name }}</td> --}}
                                                    <td>                                                        
                                                        @php
                                                        $fillable = '';
                                                        if (count($field->FieldFillable)) {
                                                        foreach ($field->FieldFillable as $value) {
                                                        $fillable .= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
                                                        }
                                                        } else {
                                                        $fillable = "<div class=\"badge py-3 px-4 fs-7 badge-light-danger\">&nbsp;" . "<span class=\"text-danger\">لا يوجد</span></div>";
                                                        }
                                                        echo $fillable;
                                                        @endphp                                                        
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="1" name="required[]"
                                                            id="required" /><label class="form-check-label" for="required">
                                                            <span>نعم</span></label></div>
                                                    </td>
                                                    <td class="text-end">
                                                            <textarea placeholder="أترك ملاحظاتك" style="height: 20px;" cols="20" id="notices{{ $field->id }}" name="notices[]" class="form-control" /></textarea>
                                                    </td>                                                       
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });
    </script>
@stop
