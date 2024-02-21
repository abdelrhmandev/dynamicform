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
                                        title="الأسم البرمجي للحقل عند عرض الأستمارة"></i>
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
                                        value="" />
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row mt-5">
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span>الحد الأقصي لعدد حروف الحقل</span>
                                    </label>
                                    <input type="text" id="maxlength" maxlength="3" name="maxlength"
                                        placeholder=" مثال 255" class="form-control form-control-lg form-control-solid"
                                        value="" />
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row mt-10">
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label">هل الحقل يقبل حروف عربيه فقط ؟</label>
                                        <div class="fs-7 fw-semibold text-muted">يجب ملأ الحقل بكلمات عربيه ليست اي شيء أخر
                                        </div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->

                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="attribute"
                                            value="arabic_letters_only" />
                                        <span class="form-check-label fw-semibold text-muted">نعم</span>
                                    </label>
                                    <!--end::Switch-->
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
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Edit{{ $trans }}');
        });
    </script>
@stop
