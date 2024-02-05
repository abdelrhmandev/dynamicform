@extends('layouts.app')
@section('title', __($trans . '.plural') . ' - ' . __($trans . '.add'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
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
            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">
                            @foreach ($fields as $field)

                           
                      

                     

                            @if (in_array($field->type, ['textbox','numbers','date']))
                           {{-- <div class="fv-row fl">
                                <label class="required form-label" for="{{ $field->name }}">{{ $field->label }}</label>
                                <input type="text" id="{{ $field->name }}" name="{{ $field->name }}"
                                    class="form-control mb-2"
                                    placeholder="{{ $field->label }}" 
                                    {{ $field->required == 1 ? 'required':'' }}
                                    pattern="{{ $field->JsonExtractValidationRules('pattern') ?? '' }}"                                    
                                    data-fv-regexp___message="{{ $field->JsonExtractValidationRules('message') ?? '' }}"
                                    data-fv-not-empty___message="{{ $field->required == 1 ? $field->required_msg : 'هذا الحقل مطلوب' }}" />
                            </div> --}}
                            @endif

                            @endforeach

                            <div class="fv-row fl">
                                <label class="required form-label" for="id_number">الهوية</label>

                             
                            <input type="text"
                            name="id_number"
                            
                            id="id_number"
                            class="form-control"
                            required
                            data-fv-not-empty___message="رقم الهوية مطلوب"
                            pattern="^\d{10}$"
                            data-fv-regexp___message="رقم الهوية يقبل أرقام فقط"
                            data-fv-string-length="true"
                            data-fv-string-length___min="10"
                            data-fv-string-length___max="10"
                            data-fv-string-length___message="رقم الهوية مكون من 10 أرقام"
                            data-fv-callback="true"
                            data-fv-callback___callback="check_valid_id_number"
                            maxlength="10" minlength="10"
                     />
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

function check_valid_id_number(input,start,end) {
    
        var value = input.value;
        if (value.length == 10) {
           
            if (parseInt(value) > '2999999999') {
                return {
                    valid: false,
                    message: 'رقم الهوية لابد ان يبدأ (1|2)'
                }
            }
            
        }
    }

        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });
    </script>
@stop
