@extends('layouts.app')
@section('title', __($trans . '.plural'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('home') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __($trans . '.plural') }}</li>
    </ul>
@stop
@section('style')
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div class="container-xxl" id="kt_content_container">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input type="text" name="search" id="search" data-kt-table-filter="search"
                            class="form-control form-control-solid w-210px ps-15"
                            placeholder="{{ __('site.search') }} {{ __($trans . '.plural') }} ......" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-table-toolbar="base">


                        <div id="buildingtypes_example_1_export" class="d-none"></div>
                        <!--end::Export buttons-->
                        <div>
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1"
                                            transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                        <path
                                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ __('site.export') }}
                            </button>
                            <!--begin::Menu-->

                            <div data-export-file-alert-msg="{{ __($trans . '.exportMessageSuccess') }}"
                                data-export-file-title="buildingtypes" id="buildingtypes_export_menu"
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                data-kt-menu="true">
                                <div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-export="copy">
                                        <span class="navi-icon">
                                            <i class="la la-copy fs-2x  text-dark"></i>
                                        </span> {{ __('site.copy') }}</a></div>
                                <div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-export="excel">
                                        <span class="navi-icon">
                                            <i class="la la-file-excel-o fs-2x  text-primary"></i>
                                        </span> {{ __('site.excel') }}</a></div>
                                <div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-export="csv">
                                        <span class="navi-icon">
                                            <i class="la la-file-text-o fs-2x  text-success"></i>
                                        </span> {{ __('site.csv') }}</a></div>
                                <div class="menu-item px-3"><a href="#" class="menu-link px-3" data-kt-export="pdf">
                                        <span class="navi-icon">
                                            <i class="la la-file-pdf-o fs-2x  text-danger"></i>
                                        </span> {{ __('site.pdf') }}</a></div>
                            </div>
                            <div id="buildingtypes_buttons" class="d-none"></div>
                        </div>




                        <a class="btn btn-primary" href="{{ $createRoute }}">
                            <span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z"
                                        fill="currentColor"></path>
                                    <rect x="11" y="19" width="10" height="2" rx="1"
                                        transform="rotate(-90 11 19)" fill="currentColor"></rect>
                                    <rect x="7" y="13" width="10" height="2" rx="1" fill="currentColor">
                                    </rect>
                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            {{ __($trans . '.add') }}</a>
                    </div>
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('site.selected') }}
                        </div>
                        <button type="button" class="btn btn-danger" id="destroyMultipleroute"
                            data-destroyMultiple-route = "{{ $destroyMultipleRoute }}"
                            data-kt-table-select="delete_selected" data-back-list-text="{{ __('site.back_to_list') }}"
                            data-confirm-message = "{{ __($trans . '.delete_selected') }}"
                            data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
                            data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
                            data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
                            data-delete-selected-records-text = "{{ __($trans . '.delete_selected') }}"
                            data-not-deleted-message = "{{ __($trans . '.not_delete_selected') }}"><i
                                class="fa fa-trash-alt"></i>{{ __('site.delete_selected') }}</button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-bordered fs-6 gy-5" id="buildingtypes">
                    <thead>
                        <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2 noExport">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input AA" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#buildingtypes .AA" value="1" />
                                </div>
                            </th>
                            <th>صورة تصنيف المبني</th>
                            <th>{{ __($trans . '.title') }}</th>
                            <th>لون مميز لتصنيف المبني</th>
                            <th>الأستمارة</th>
                            {{-- <th class="text-primary">{{ __('site.created_at') }}</th> --}}
                            <th class="text-end min-w-50px noExport">{{ __('site.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script src="{{ asset('assets/js/custom/pdfMake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pdfMake/vfs_load_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pdfMake/pdfhandle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    @include('datatable.Classicdatatables')
    <script>
        var dynamicColumns = [ //as an array start from 0
            {
                data: 'id',
                name: 'id',
                exportable: false
            },{
                data: 'image',
                name: 'image',
                orderable: false
            }, {
                data: 'title',
                name: 'title',
                orderable: false
            }, {
                data: 'color',
                name: 'color',
                orderable: false
            }, {
                data: 'form_id',
                name: 'form_id',
                orderable: false
            },{
                data: 'actions',
                name: 'actions',
                exportable: false,
                orderable: false,
                searchable: false
            },
        ];
        KTUtil.onDOMContentLoaded(function() {
            loadDatatable('buildingtypes', '{{ $listingRoute }}', dynamicColumns, '', '2');
        });
    </script>
@stop
