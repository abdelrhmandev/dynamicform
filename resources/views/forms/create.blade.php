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
    .product_drag_area{  
         width:600px;  
         height:200px;  
         border:2px dashed #ccc;  
         color:#ccc;  
         line-height:200px;  
         text-align:center;  
         font-size:24px;  
    }  
    .product_drag_over{  
         color:#000;  
         border-color:#000;  
    }  
    </style>
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
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __($trans . '.info') }}</h2>
                        </div>
                    </div>
 
                    /////////////////////
                 


                    <div id="kt_docs_jkanban_color"></div>




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



    <script src="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.js') }}"></script>


    <script>
        


        "use strict";

// Class definition
var KTJKanbanDemoColor = function() {
    // Private functions
    var exampleColor = function() {
        var kanban = new jKanban({
            element: '#kt_docs_jkanban_color',
            gutter: '0',
            widthBoard: '250px',
            boards: [{
                    'id': '_inprocess',
                    'title': 'In Process',
                    'class': 'primary',
                    'item': [{
                            'title': '<span class="field_drag" data-fieldid="1">name</span>',
                            'class': 'light-primary',
                        },
                        {
                            'title': '<span class="field_drag" data-fieldid="2">emai</span>',
                            'class': 'light-primary',
                        }
                    ]
                }, {
                    'id': '_working',
                    'title': 'Working',
                    'class': 'success',
                   
                } 
            ]
        });
    }

    return {
        // Public Functions
        init: function() {
            exampleColor();
        }
    };
}();

 




        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
            KTJKanbanDemoColor.init();
        });
    </script>
@stop
