@extends('layouts.app')
@section('title', __($trans . '.edit'))
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
            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
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
                                <div class="col-xl">
                                    <div class="fv-row fl">
                                        <label class="required form-label"
                                            for="title">{{ __('site.form.name') }}</label>
                                        <input placeholder="{{ __('site.form.name') }}" type="text" id="title"
                                            name="title" class="form-control mb-2" required value="{{ $row->title }}"
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
                                                id="status"
                                                {{ isset($row->status) && $row->status == '1' ? "checked='checked'" : '' }} />
                                            <label class="form-check-label" for="status">
                                                <span>{{ __('site.published') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card card-flush pt-3 mb-5 mb-lg-10">

                                <h4 class="text-gray-900 fw-bold">الحقول المرتبطه هذه الأستمارة</h4>

//////////
<div class="card-header border-0 pt-6">
    <div class="card-title">
 
    </div>
    <div class="card-toolbar">
      <div class="d-flex justify-content-end" data-kt-table-toolbar="base">   

        {{-- @include('partials.modals._exportlisting') --}}
        {{-- <a class="btn btn-primary" href="wwwwwwww">
          <span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="currentColor"></path>
              <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="currentColor"></rect>
              <rect x="7" y="13" width="10" height="2" rx="1" fill="currentColor"></rect>
              <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
            </svg>
          </span>
          qqqqqqqqqqq</a> --}}
      </div>
      <div class="d-flex justify-content-end align-items-center" data-kt-table-toolbar="selected">
        <div class="fw-bold me-5">
        <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('site.selected') }}</div>          
 
      </div>
    </div>
  </div>

  /////////////


                                <div class="table-responsive mt-5">
                                    <table class="table align-middle table-row-bordered fs-6 gy-5" id="fields">
                                        <thead>
                                            <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2 noExport">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input AA" type="checkbox"
                                                            data-kt-check="true" data-kt-check-target="#fields .AA"
                                                            value="1" />
                                                    </div>
                                                </th>
                                                <th>الأسم الذي سيظهر به الحقل</th>
                                                {{-- <th>البيانات الأوليه للحقل</th>
                                            <th>الحقل مطلوب ؟</th>
                                            <th>الحقل مفعل أم لا ؟</th>  
                                            <th>هل الحقل هو حاصل مجموع ؟ </th>                                                                                      --}}

                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600">

                                            @foreach ($form_fields as $field)
                                                <tr id="{{ $field->id }}">
                                                    <td>

                                                        <div class="fv-row fl" id="{{ $field->id }}">
                                                            <label class="form-check form-check-inline">
                                                               
                                                                 

                                                                <input class="form-check-input AA" type="checkbox"
                                                                class="sub_chk"
                                                                    name="field_id[{{ $field->id }}]"
                                                                    value="{{ $field->id }}"
                                                                    {{ in_array($field->id, $row->fields->pluck('id')->toArray()) ? 'checked' : '' }}
                                                                    id="field{{ $field->id }}">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $field->display}}
                                                    </td>
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
 
 <script>
                var toggleToolbars      = function () {
                const container         = document.querySelector('#fields');
                const toolbarBase       = document.querySelector('[data-kt-table-toolbar="base"]');
                const toolbarSelected   = document.querySelector('[data-kt-table-toolbar="selected"]');
                const selectedCount     = document.querySelector('[data-kt-table-select="selected_count"]');
                const allCheckboxes     = container.querySelectorAll('tbody [class="form-check-input AA"][type="checkbox"]');
                let checkedState        = true;
                let count = 0;
                allCheckboxes.forEach(c => {
                    if (c.checked) {                        
                        count++;
                    }
                });
                if (checkedState) {
                    selectedCount.innerHTML = count;
                    toolbarBase.classList.add('d-none');
                    toolbarSelected.classList.remove('d-none');
                } 
              
            }
            toggleToolbars();
 </script>
@stop
