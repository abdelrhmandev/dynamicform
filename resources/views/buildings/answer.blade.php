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
                             <div class="fv-row fl">

                                
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
                            </div>  
                            @elseif (in_array($field->type, ['email']))
                             <div class="fv-row fl">                                
                                <label class="required form-label" for="{{ $field->name }}">{{ $field->label }}</label>
                                <input style="text-align: right" type="email" id="{{ $field->name }}" name="{{ $field->name }}"
                                    class="form-control mb-2"
                                    placeholder="{{ $field->label }}" 
                                    {{ $field->required == 1 ? 'required':'' }}
                                    data-fv-not-empty___message="{{ $field->required == 1 ? $field->required_msg : 'هذا الحقل مطلوب' }}"                                    
                                    data-fv-email-address___message="{{ $field->JsonExtractValidationRules('message') ?? '' }}"                                    
                                    />
                            </div>  

                            @elseif (in_array($field->type, ['file']))
                            {{-- <div class="form-group fv-row fl">
                                <label class="col-xs-3 control-label">Avatar</label>
                                <div class="col-xs-6">
                                    <input type="file" class="form-control" name="avatar"
                                        data-fv-notempty="true"
                                        data-fv-notempty-message="Please select an image"
                        
                                        data-fv-file="true"
                                        data-fv-file-extension="jpeg,jpg,png"
                                        data-fv-file-type="image/jpeg,image/png"
                                        data-fv-file-maxsize="2097152"
                                        data-fv-file-message="The selected file is not valid" />
                                </div>
                            </div> --}}

                            @endif

                            @endforeach

                         

                              
                        </div>
                    </div>
                </div>
                <x-btns.button />
            </div>
             
        </form>

        <form id="fileForm" class="form-horizontal" enctype="multipart/form-data"
   
        data-fv-icon-valid="glyphicon glyphicon-ok"
        data-fv-icon-invalid="glyphicon glyphicon-remove"
        data-fv-icon-validating="glyphicon glyphicon-refresh">
    
        <div class="form-group fv-row fl">
            <label class="col-xs-3 control-label">Avatar</label>
            <div class="col-xs-6">
                <input type="file" class="form-control" name="avatar"
                    data-fv-notempty="true"
                    data-fv-notempty-message="Please select an image"
    
                    data-fv-file="true"
                    data-fv-file-extension="jpeg,jpg,png"
                    data-fv-file-type="image/jpeg,image/png"
                    data-fv-file-maxsize="2097152"
                    data-fv-file-message="The selected file is not valid" />
            </div>
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


$('#fileForm').formValidation();
 

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
