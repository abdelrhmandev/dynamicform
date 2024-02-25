@extends('layouts.app')
@section('title', __($trans . '.add'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">الحقول</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a>
        </li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">تعديل حقل </li>
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
                            <h2>بيانات الحقل</h2>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex flex-column gap-5">

                  
                            <div class="card">
                                <div class="card-header border-0 pt-6">
                                   
                                  <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-table-toolbar="base">   
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-table-toolbar="selected">
                                      <div class="fw-bold me-5">
                                      <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('site.selected') }}</div>          
                                      <button type="button" class="btn btn-danger" id="destroyMultipleroute"              
                                      data-destroyMultiple-route = "{{ $AjaxRemoveMultiFieldFillable }}"
                                      data-kt-table-select="delete_selected"             
                                      data-back-list-text="{{ __('site.back_to_list') }}"        
                                      data-confirm-message = "{{ __($transfillable.'.delete_selected') }}"
                                      data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
                                      data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
                                      data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
                                      data-delete-selected-records-text = "{{ __($transfillable.'.delete_selected') }}"
                                      data-not-deleted-message = "{{ __($transfillable.'.not_delete_selected') }}"
                                      ><i class="fa fa-trash-alt"></i>{{ __('site.delete_selected') }}</button>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body pt-0">
                                  <table class="table align-middle table-row-bordered fs-6 gy-5" id="fillable">         
                                    <thead>
                                      <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2 noExport">             
                                          <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input AA" type="checkbox" data-kt-check="true" data-kt-check-target="#fillable .AA" value="1" />
                                          </div>
                                        </th>            
                                        <th> الذي سيظهر للعنصر المراد ملؤه </th>
                                        <th> قيمه العنصر المراد ملؤه</th>                                                                                    
                                        <th class="w-15px noExport">حذف</th>  
                                      </tr>
                                    </thead>
                                    <tbody class="text-gray-600"> 
                                    </tbody>
                                  </table>
                                  
                                  
                                  <h2>يمكنك  أضافه ملأ جديد لهذا الحقل</h2>
                                  {{-- <div class="mt-5">
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
                                  </div> --}}


                              {{-- <a href="#" class="btn btn-light-success me-auto"
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
                                  </span>أضف ملئ جديد</a> --}}

                                   
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </form>
    </div>
@stop
@section('scripts')
    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
    <script src="{{ asset('assets/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
    <script src="{{ asset('assets/js/custom/pdfMake/pdfhandle.js')}}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/handleFormSubmit.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/fillable/append_edit_field.js') }}"></script> --}}
    
    @include('datatable.fillable')
    <script>
    var dynamicColumns = [ //as an array start from 0
        { data: 'id', name: 'id',exportable:false},         
        { data: 'fillable_display', name: 'fillable_display',exportable:false}, 
        { data: 'fillable_value', name: 'fillable_value',exportable:false}, 
        { data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},  
    
    ];
    KTUtil.onDOMContentLoaded(function () {
        loadDatatable('fillable','{{ $editRoute }}',dynamicColumns);
    });
    </script>
  <script>  
        // KTUtil.onDOMContentLoaded(function() {           
        //     handleFormSubmitFunc('Edit{{ $trans }}');
        // });
    

        // @if ($row->type == 'date_range')
        //     $('#date_range_min_date, #date_range_max_date').flatpickr({
        //         todayHighlight: true,
        //         orientation: "bottom left",
        //     });
        // @endif




    </script>
@stop
