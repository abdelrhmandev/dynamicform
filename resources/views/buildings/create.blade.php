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
                           

                             

                            <div class="fv-row fl">
                                <div class="form-floating border rounded">
                                    <select class="form-select form-select-transparent" data-control="select2"
                                        data-placeholder="{{ __('buildingtype.select') }}" name="building_type_id"
                                        id="building_type_id">
                                        <option></option>
                                        @foreach ($buildingtypes as $buildingtype)
                                            <option value="{{ $buildingtype->id }}"
                                                data-kt-select2-buildingtype="{{ url(asset($buildingtype->image)) }}">
                                                {{ $buildingtype->title }}</option>
                                        @endforeach
                                    </select>
                                    <label for="buildingtype">{{ __('buildingtype.select') }}</label>
                                </div>                                                                                               
                            </div>

                            <div>
                                <div id="FormResposeFields"></div>
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
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script>
        "use strict";
        var KTFormsSelect2Demo = {
            init: function() {
                var e;
                (e = function(e) {
                    if (!e.id) return e.text;
                    var t = document.createElement("span"),
                        n = "";
                    return (n += '<img src="' + e.element.getAttribute("data-kt-select2-buildingtype") +
                        '" class="rounded-circle h-25px me-2" alt="image"/>'), (n += e.text), (t.innerHTML =
                        n), $(t);
                }),
                $("#building_type_id").select2({
                    templateSelection: e,
                    templateResult: e
                });
            },
        };

        ///////
        //  Start Ajax country and city 
        $('select[name="building_type_id"]').on('change', function() {
            var building_type_id = $(this).val();

            if (building_type_id > 0) {
                $.ajax({
                    url: "{{ route('AjaxFormdata') }}",
                    method: "POST",
                    data: {
                        building_type_id: building_type_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#FormResposeFields").html(data);
                    }
                });
            }
        });

        /////////////

        KTUtil.onDOMContentLoaded(function() {
            KTFormsSelect2Demo.init();
        });
    </script>
@stop
