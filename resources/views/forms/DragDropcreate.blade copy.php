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
<style>  
        .field_drag_area{  
            width:600px;  
            height:200px;  
            border:2px dashed #ccc;  
            color:#ccc;  
            line-height:200px;  
            text-align:center;  
            font-size:24px;  
        }  
        .field_drag_over{  
            color:#000;  
            border-color:#000;  
        }  
    </style>  
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">



        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}">
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
                  
  
                    <div class="container">  
                        
                            @foreach ($fields as $field)
                         
                         <div class="col-md-1">  
                              <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; cursor:move" align="center">  
                                   

                                <img width="20" src="{{ asset('assets/media/svg/files/blank-image.svg') }}" 
                                data-fieldid="{{ $field->id }}" class="field_drag" />  

                                   
                              </div>  
                         </div>  
                         @endforeach 
                        
                         <div style="clear:both"></div>  
                         <br />  
                         <div align="center">  
                              <div class="field_drag_area">Drop field Here</div>  
                         </div>  
                         <div id="dragable_fields">  
                         </div>  

                    </div>  
                    <br />  
                    /////////////////
                 



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



    {{-- <script src="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.js') }}"></script> --}}


    <script>
        
/////////////////////////////////
$(document).ready(function(data){  
      $('.field_drag_area').on('dragover', function(){  
           $(this).addClass('field_drag_over');  
           return false;  
      });  
      $('.field_drag_area').on('dragleave', function(){  
           $(this).removeClass('field_drag_over');  
           return false;  
      });  
      $('.field_drag').on('dragstart', function(e){  
           e.originalEvent.dataTransfer.setData("fieldid", $(this).data("fieldid"));  
 
      });  
      $('.field_drag_area').on('drop', function(e){  
           e.preventDefault();  
           $(this).removeClass('field_drag_over');  
           var field_id = e.originalEvent.dataTransfer.getData('fieldid');  
        
           var action = "add";  
           $.ajax({  
                url:"{{ route('forms.store')}}",  
                method:"POST",  
                data:{field_id:field_id,'_token':'{{ csrf_token()}}'},  
                success:function(data){  
                     $('#dragable_fields').html(data);  
                }  
           })  
      });  
    //   $(document).on('click', '.remove_field', function(){  
    //        if(confirm("Are you sure you want to remove this field?"))  
    //        {  
    //             var id = $(this).attr("id");  
    //             var action="delete";  
    //             $.ajax({  
    //                  url:"{{ route('forms.store')}}",  
    //                  method:"POST",  
    //                  data:{field_id:field_id,action:action,'_token':'{{ csrf_token()}}'},  
    //                  success:function(data){  
    //                       $('#dragable_fields').html(data);  
    //                  }  
    //             });  
    //        }  
    //        else  
    //        {  
    //             return false;  
    //        }  
    //   });  
 });  
 /////////////////



        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
            // KTJKanbanDemoColor.init();
        });
    </script>
@stop
