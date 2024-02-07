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

                        

                            @if (in_array($field->type, ['textbox','numbers']))
                             {{--  <div class="fv-row fl">

                                
                                <label class="required form-label" for="{{ $field->name }}">{{ $field->label }}</label>
                                <input type="text" id="{{ $field->name }}" name="{{ $field->name }}"
                                    class="form-control mb-2"
                                    placeholder="{{ $field->label }}" 
                                    {{ $field->required == 1 ? 'required':'' }}
                                    pattern="{{ $field->JsonExtractValidationRules('pattern') }}"
                                    data-fv-regexp___message="{{ $field->JsonExtractValidationRules('message') ?? '' }}"
                                    data-fv-not-empty___message="{{ $field->required == 1 ? $field->required_msg : 'هذا الحقل مطلوب' }}"
                                    
                                    minlength="{{ $field->JsonExtractValidationRules('minlength') }}"
                                    maxlength="{{ $field->JsonExtractValidationRules('maxlength') }}"                         
                                    data-fv-string-length___message = "{{ $field->JsonExtractValidationRules('StringLengthMessage') }}"
                                    
                                    data-fv-callback="{{ $field->JsonExtractValidationRules('callback') ? 'true':'false' }}"
                                    data-fv-callback___callback="{{ $field->JsonExtractValidationRules('callback') ? $field->JsonExtractValidationRules('callback') :'' }}"


                                    data-fv-greater-than___inclusive="{{ $field->JsonExtractValidationRules('data_fv_greater_than_inclusive') }}"
                                    data-fv-greater-than___message="{{ $field->JsonExtractValidationRules('data_fv_greater_than_message') }}"
                                    max="{{ $field->JsonExtractValidationRules('max') }}"
                                    data-fv-less-than___inclusive="{{ $field->JsonExtractValidationRules('data_fv_less_than_inclusive') }}"
                                    data-fv-less-than___message="{{ $field->JsonExtractValidationRules('data_fv_less_than_message') }} "

                  
        

                                    
                                    
                                    
                                    />
                            </div>    --}}
                            @elseif (in_array($field->type, ['email']))
                             {{--  <div class="fv-row fl">                                
                                <label class="required form-label" for="{{ $field->name }}">{{ $field->label }}</label>
                                <input style="text-align: right" type="email" id="{{ $field->name }}" name="{{ $field->name }}"
                                    class="form-control mb-2"
                                    placeholder="{{ $field->label }}" 
                                    {{ $field->required == 1 ? 'required':'' }}
                                    data-fv-not-empty___message="{{ $field->required == 1 ? $field->required_msg : 'هذا الحقل مطلوب' }}"                                    
                                    data-fv-email-address___message="{{ $field->JsonExtractValidationRules('message') ?? '' }}"                                    
                                    />
                            </div>    --}}

                            @elseif (in_array($field->type, ['file']))
                            {{--  <div class="card card-flush">
                               
                                <div class="card-body text-center pt-1 mt-1 fl">
                                    <style>.image-input-placeholder { 
                                        background-image: url({{ asset('assets/media/svg/files/blank-image.svg')}}); 
                                        } [data-theme="dark"] .image-input-placeholder { 
                                            background-image: url({{ asset('assets/media/svg/files/blank-image.svg')}}); 
                                        }
                                        </style>
                                    @if(isset($image))
                                    <style>.image-input-placeholder {             
                                        background-image: url({{ asset($image)}}); 
                                        } [data-theme="dark"] .image-input-placeholder { 
                                            background-image: url({{ asset($image)}}); 
                                        }
                                        </style>
                                    @endif
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('site.change_image')}}">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input class="my-image-selector" type="file" name="image" id="image"
                                            required
                                            accept=".png, .jpg, .jpeg"
                                            data-fv-not-empty___message="{{ $field->required == 1 ? $field->required_msg : 'هذا الحقل مطلوب' }}"
                                            data-fv-file="true" 
                                            data-fv-file___extension="jpeg,jpg,png" 
                                            data-fv-file___type="image/jpeg,image/jpg,image/png" 
                                            data-fv-file___message="{{  __('validation.mimetypes',['attribute'=>'image','values'=>'*.png, *.jpg and *.jpeg']) }}"
                                            />
                                            <input type="hidden" name="image_remove" />
                                        </label>            
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" id="cancel_image" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('site.cancel') }}">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" id="remove_image" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('remove.cancel') }}">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="text-muted fs-7">{{ __('site.uploadOnlyImages')}}</div>
                                    @if(isset($image))
                                    <div class="mt-2 form-check form-check-custom form-check-danger form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="drop_image_checkBox" value="1" />
                                        <label class="form-check-label text-danger" for="">
                                           <i>{{ __('site.remove_image')}}</i>
                                        </label>
                                    </div>
                                    @endif
                                    @error('image')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>  --}}
                            
                            @elseif (in_array($field->type, ['date_range']))
                            <div class="fv-row fl">
                                <label class="required form-label"
                                    for="event_date_range">{{ __('event.date_range') }}</label>
                                <div class="position-relative d-flex align-items-center">
                                    <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                    <input placeholder="{{ __('event.date_range') }}" 
                                        type="text" id="event_date_range"
                                        name="event_date_range"
                                        class="form-control form-control-solid ps-12 flatpickr-input active"
                                        readonly="readonly" required
                                        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'event date range' . '&nbsp;']) }}" />
                                </div>
                            </div>

                            @endif
                            @endforeach

                         

                              
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


            $("#event_date_range").daterangepicker({           
            minDate:new Date(),
            separator: " - ",
            locale: {
                format: 'YYYY-MM-DD'
            }
          });
 

function Validate_SA_Id_Number(input) {    
        var value = input.value;
        var ValidateMessage  = '';        
        var IdNumber = parseInt(value);
        // Validate If Id Number is 10 length at the begining
        if (value.length == 10) {                       
            if (IdNumber > '2999999999' || IdNumber < '1000000000') {
                var ValidateMessage =  'عذرا رقم الهويه لابد ان يبدأ بالأرقام 1 أو 2 فقط';
                var validC = false;
            }else{
                var ValidateMessage =  '';
                var validC = true;
            }
            return {
                    valid: validC,
                    message: ValidateMessage
                }
        }
    }

        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });
    </script>
@stop
