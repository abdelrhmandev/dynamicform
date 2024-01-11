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
                    @if(count($fields))
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
                                        <label class="required form-label" for="status">{{ __('site.status') }}</label>
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
                                                <th>نوع للحقل</th>                                                
                                                <th class="w-400px">قيمه الحقل الأوليه</th>
                                                <th>الحقل مطلوب</th>
                                                <th>ملاحظات علي الحقل عند الربط</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fields as $field)
                                                <tr>
                                                    <td>                                                        
                                                        <div class="fv-row fl" id="{{ $field->id }}">                                                        
                                                            <label class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="field_id[]" value="{{ $field->id }}"
                                                                    id="field" required data-fv-not-empty___message="فضلا حدد علي الأقل حقل واحد">                                                                                                                        
                                                                <a href="{{ route('fields.edit',$field->id) }}" class="fw-bold">{{ $field->display }}</a>
                                                            </label>                                                            
                                                        </div>
                                                        @if($field->note)
                                                             <!--begin::Icon-->
                                                            <i class="ki-duotone ki-notification-bing fs-2hx text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                                                                
                                                                " {{ $field->note ?? ''}} "                                                        
                                                        @endif                                                       
                                                </td>        
                                                
                                                 <td>
                                                           {{ $field->type}}
                                                    </td> 

                                                    <td>                                                        
                                                        @php
                                                        $fillable = '';
                                                        if (count($field->FieldFillable)) {
                                                        foreach ($field->FieldFillable as $value) {
                                                        $fillable .= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
                                                        }
                                                        } else {
                                                        $fillable = "<div class=\"badge py-3 px-4 fs-7 badge-light-warning\">&nbsp;" . "<span class=\"text-warning\">لا يوجد</span></div>";
                                                        }
                                                        echo $fillable;
                                                        @endphp                                                        
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="1" name="required[{{ $field->id }}]"
                                                            id="required" /><label class="form-check-label" for="required">
                                                            <span>نعم</span></label></div>
                                                    </td>
                                                   <td class="text-end">
                                                            <textarea placeholder="أترك ملاحظاتك" style="height: 20px;" cols="20" id="note{{ $field->id }}" name="note[{{ $field->id }}]" class="form-control"></textarea>
                                                    </td>                                                        
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="d-flex flex-column py-10 px-10 px-lg-20 mb-10"> 
                        <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
                            <i class="ki-duotone ki-information-5 fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="fw-semibold">عذرا</h4>
                                <span>لا توجد حقول متاحه حتي تتمكن من أضافه أستمارة</span>
                            </div>
                        </div>                      
                            <a href="{{ route('fields.create') }}" class="btn btn-light-success me-auto" id="kt_create_new_custom_fields_add">
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
                            </span>أضف حقل جديد</a>                                                   
                            <div class="text-center pb-15 px-5">
                                <img src="{{ asset('assets/media/illustrations/sigma-1/4.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
                            </div>
                    </div>                    
                    @endif
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
