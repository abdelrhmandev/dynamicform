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
            data-form-agree-label="{{ __('site.agree') }}">
            @method('PUT')
            <input type="hidden" name="id" value="{{ $row->id }}" />

            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __($trans . '.info') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex flex-column gap-5">

                            <div class="fv-row fl">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    نوع الحقل
                                </label>
                                <input type="hidden" name="type" value="{{ $row->type }}" />
                                {{ $row->type }}
                            </div>


                            <div class="fv-row fl">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">الأسم الذي سيظر به الحقل</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="الأسم الذي سيظر به الحقل عند عرض الأستمارة"></i>
                                </label>
                                <input placeholder="مثال الأسم , رقم الهويه .... " type="text" id="label"
                                    name="label" class="form-control form-control-lg form-control-solid" required
                                    value="{{ $row->label }}"
                                    data-fv-not-empty___message="{{ __('site.required_field') }}" />
                            </div>

                            <div class="fv-row fl">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">الأسم البرمجي للحقل</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="الأسم البرمجي للحقل لا يظهر عند عرض الأستمارة"></i>
                                </label>
                                <input placeholder="" type="text" id="name" name="name"
                                    class="form-control form-control-lg form-control-solid" required
                                    value="{{ $row->name }}"
                                    data-fv-not-empty___message="{{ __('site.required_field') }}" />
                                <small class="fs-7 fw-semibold text-success">يكتب باللغه الأنجليزيه
                                    فقط</small>
                            </div>

                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <label class="fs-6 fw-semibold form-label">هل الحقل مطلوب ؟</label>
                                    <div class="fs-7 fw-semibold text-muted">يجب ملأ الحقل عند حفظ البيانات</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_required"
                                        {{ $row->is_required == '1' ? 'checked="checked"' : '' }} />
                                    <span class="form-check-label fw-semibold text-muted">نعم</span>
                                </label>
                                <!--end::Switch-->
                            </div>





                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>العرض</span>
                                </label>
                                <select name="width" class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true">
                                    <option value="33" {{ $row->width == '33' ? 'selected' : '' }}>33%</option>
                                    <option value="50" {{ $row->width == '50' ? 'selected' : '' }}>50%</option>
                                    <option value="66" {{ $row->width == '66' ? 'selected' : '' }}>66%</option>
                                    <option value="100" {{ $row->width == '100' ? 'selected' : '' }}>100%</option>
                                </select>
                            </div>

                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                            fill="currentColor" />
                                        <rect x="11" y="14" width="7" height="2" rx="1"
                                            transform="rotate(-90 11 14)" fill="currentColor" />
                                        <rect x="11" y="17" width="2" height="2" rx="1"
                                            transform="rotate(-90 11 17)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">برجاء الأنتباه الي</h4>
                                        <div class="fs-6 text-gray-700">
                                            خصائص أضافيه للحقل
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            
                            @if (in_array($row->type, ['textbox', 'textarea']))
                                <div class="d-flex flex-column mb-7 fv-row mt-5">
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span>الحد الأدني لعدد حروف الحقل</span>
                                    </label>
                                    <input type="text" id="minlength" maxlength="3" name="minlength"
                                        placeholder=" مثال 1" class="form-control form-control-lg form-control-solid"
                                        value="{{ $row->JsonExtractValidationRules('minlength') }}" />
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row mt-5">
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span>الحد الأقصي لعدد حروف الحقل</span>
                                    </label>
                                    <input type="text" id="maxlength" maxlength="3" name="maxlength"
                                        placeholder=" مثال 255" class="form-control form-control-lg form-control-solid"
                                        value="{{ $row->JsonExtractValidationRules('maxlength') }}" />
                                </div>

                            @elseif (in_array($row->type, ['radio', 'select','checkbox']))
                            <div class="d-flex flex-column mb-15 fv-row">
                                <div class="table-responsive">
                                    <table id="kt_create_new_custom_fields"
                                    class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800">
                                            <th>
                                                <div class="fv-row fl">
                                                    <label class="required form-label" for="fillable_display">الأسم
                                                        الذي سيظهر للعنصر المراد ملؤه </label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="fv-row fl">
                                                    <label class="required form-label" for="fillable_value">قيمه
                                                        العنصر المراد ملؤه </label>
                                                    <small class="fs-7 fw-semibold text-danger">({{ __('site.only_english') }})</small>
                                                </div>
                                            </th>
                                            <th class="pt-0 text-end">حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($row->fillables as $value)
                                        <tr class="{{ $value->id}}">
                                            <td>
                                                <input type="text" class="form-control form-control-lg" placeholder="مثال ذكر"
                                                    name="fillable_display[]" value="{{ $value->display }}" />
                            
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-lg" placeholder="مثال male"
                                                    name="fillable_value[]" value="{{ $value->value }}" />
                                            </td>
                                            <td class="text-end">
                                                {{ $value->id }}
                                                
                                                <button type="button" class="btn btn-icon btn-flex w-30px h-30px me-3"
                                                    id="delete_item" 
                                                    data-kt-table-filter="delete_row"
                                                    data-back-list-text="{{ __('site.back_to_list') }}"        
                                                    data-confirm-message = "{{ __('site.confirmDeleteMessage',['item'=>__('fillable.singular')]) }}"
                                                    data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
                                                    data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
                                                    data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
                                                    data-deleting-selected-items = "{{ __('site.deletingItemMessage',['item'=>__('fillable.singular')]) }}"
                                                    data-not-deleted-message = "{{ __('site.notdeletedMessage',['item'=>__('fillable.singular')]) }}"    
                                                    data-destroy-route="{{ route('fields.AjaxRemoveFieldFillable',$value->id )}}"
                                                    data-kt-action="field_remove">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
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
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <a href="#" class="btn btn-light-success me-auto btn-sm" id="kt_create_new_custom_fields_add">
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor">
                                            </rect>
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor">
                                            </rect>
                                        </svg>
                                    </span>
                                    أضف ملئ جديد</a>
                            </div>


                            @elseif($row->type == 'number')
                                وضع قيود علي حقل الأرقام
                                <div class="row g-12 mb-8 mt-5">
                                    <div class="col-md-4 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">أكبر عدد من الأرقام هو</label>
                                        <input type="textbox" id="numbers-minlength" name="NumbersMaxLength"
                                            class="form-control w-10"
                                            value="{{ $row->JsonExtractValidationRules('maxlength') }}">
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">أقل عدد من الأرقام هو</label>
                                        <input type="textbox" id="numbers-minlength" name="NumbersMinLength"
                                            class="form-control w-10"
                                            value="{{ $row->JsonExtractValidationRules('minlength') }}">
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">الرقم لابد ان يبدأ</label>
                                        <input type="textbox" id="NumbersPrefix" name="NumbersPrefix"
                                            class="form-control w-10"
                                            value="{{ $row->JsonExtractValidationRules('prefix') }}">
                                    </div>

                                </div>
                            @elseif($row->type == 'date')
                                <div class="d-flex flex-column mb-7 fv-row mt-4">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label">عدم السماح بأختيار تاريخ سابق ؟</label>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            name="is_min_date"
                                            {{ $row->JsonExtractValidationRules('is_min_date') == '1' ? 'checked="checked"' : '' }} />
                                        <span class="form-check-label fw-semibold text-muted">نعم</span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                            @elseif($row->type == 'date_range')
                                <div class="row g-12 mb-8 mt-5">
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">بدايه التاريخ</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                            <input placeholder="بدايه التاريخ"
                                                value="{{ $row->JsonExtractValidationRules('date_start') }}"
                                                type="text" id="date_range_min_date" name="date_range_min_date"
                                                class="form-control form-control-solid ps-12 flatpickr-input active"
                                                readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">نهاية التاريخ</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                                            <input placeholder="نهاية التاريخ" type="text"
                                                value="{{ $row->JsonExtractValidationRules('date_end') }}"
                                                id="date_range_max_date" name="date_range_max_date"
                                                class="form-control form-control-solid ps-12 flatpickr-input active"
                                                readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                            @elseif($row->type == 'file')
                                وضع قيود علي حقل الملف
                                <h4 class="text-gray-900 fw-bold">برجاء حدد نوع الملف</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="radio" class="btn-check" name="checkFileRules" value="images"
                                            {{ $row->JsonExtractValidationRules('file_type') == 'image' ? 'checked="checked"' : '' }}
                                            id="FileRuleImages" />
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10"
                                            for="FileRuleImages">
                                            <span class="svg-icon svg-icon-3x me-5">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3"
                                                        d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span class="d-block fw-semibold text-start">
                                                <span class="text-dark fw-bold d-block fs-4 mb-2">صور فقط</span>
                                                <span class="text-muted fw-semibold fs-6">
                                                    {{ __('site.upload_only_images') }}
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <!--begin::Option-->
                                        <input type="radio" class="btn-check" name="checkFileRules" value="documents"
                                            {{ $row->JsonExtractValidationRules('file_type') == 'document' ? 'checked="checked"' : '' }}
                                            id="FileRuledocuments" />
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                            for="FileRuledocuments">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                            <span class="svg-icon svg-icon-3x me-5">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3"
                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                                        fill="currentColor" />
                                                    <rect x="7" y="17" width="6" height="2" rx="1"
                                                        fill="currentColor" />
                                                    <rect x="7" y="12" width="10" height="2" rx="1"
                                                        fill="currentColor" />
                                                    <rect x="7" y="7" width="6" height="2" rx="1"
                                                        fill="currentColor" />
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="d-block fw-semibold text-start">
                                                <span
                                                    class="text-dark fw-bold d-block fs-4 mb-2">{{ __('site.docs') }}</span>
                                                <span
                                                    class="text-muted fw-semibold fs-6">{{ __('site.upload_only_docs') }}</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            @elseif($row->type == 'file_gallery')
                                <div class="w-100">
                                    <div
                                        class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                    rx="10" fill="currentColor" />
                                                <rect x="11" y="14" width="7" height="2" rx="1"
                                                    transform="rotate(-90 11 14)" fill="currentColor" />
                                                <rect x="11" y="17" width="2" height="2" rx="1"
                                                    transform="rotate(-90 11 17)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <div class="fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">برجاء الأنتباه الي أن</h4>
                                                <div class="fs-6 text-gray-700">
                                                    فقط *.png, *.jpg and *.jpeg امتدادات الصور المقبوله
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif



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
    <script src="{{ asset('assets/js/custom/fillable/append_edit_field.js') }}"></script>
  
  <script>  
        KTUtil.onDOMContentLoaded(function() {           
            handleFormSubmitFunc('Edit{{ $trans }}');
        });
    

        @if ($row->type == 'date_range')
            $('#date_range_min_date, #date_range_max_date').flatpickr({
                todayHighlight: true,
                orientation: "bottom left",
            });
        @endif




    </script>
@stop
