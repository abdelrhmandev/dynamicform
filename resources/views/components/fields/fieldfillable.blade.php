<div class="card card-flush pt-3 mb-5 mb-lg-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2 class="fw-bold">Advanced Options</h2>
        </div>
        <!--begin::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Custom fields-->
        <div class="d-flex flex-column mb-15 fv-row">
            <!--begin::Label-->
            <div class="fs-5 fw-bold form-label mb-3">Custom fields
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Add custom fields to the billing invoice."></i></div>
            <!--end::Label-->
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_create_new_custom_fields" class="table align-middle table-row-dashed fw-semibold fs-6 gy-5">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="pt-0">Field Name</th>
                            <th class="pt-0">Field Value</th>
                            <th class="pt-0 text-end">Remove</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control form-control-solid" name="row-name" value="" />
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-solid" name="row-value" value="" />
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3" data-kt-action="field_remove">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end:Table-->
            </div>
            <!--end::Table wrapper-->
            <!--begin::Add custom field-->
            <button type="button" class="btn btn-light-primary me-auto" id="kt_create_new_custom_fields_add">Add custom field</button>
            <!--end::Add custom field-->
        </div>
        <!--end::Custom fields-->
        <!--begin::Invoice footer-->
        <div class="d-flex flex-column mb-10 fv-row">
            <!--begin::Label-->
            <div class="fs-5 fw-bold form-label mb-3">Invoice footer
            <i tabindex="0" class="cursor-pointer fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-html="true" data-bs-content="Add an addition invoice footer note."></i></div>
            <!--end::Label-->
            <textarea class="form-control form-control-solid rounded-3" rows="4"></textarea>
        </div>
        <!--end::Invoice footer-->
        <!--begin::Option-->
        <div class="d-flex flex-column mb-5 fv-row rounded-3 p-7 border border-dashed border-gray-300">
            <!--begin::Label-->
            <div class="fs-5 fw-bold form-label mb-3">Usage treshold
            <i tabindex="0" class="cursor-pointer fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-html="true" data-bs-delay-hide="1000" data-bs-content="Thresholds help manage risk by limiting the unpaid usage balance a customer can accrue. Thresholds only measure and bill for metered usage (including discounts but excluding tax). &lt;a href='#'&gt;Learn more&lt;/a&gt;."></i></div>
            <!--end::Label-->
            <!--begin::Checkbox-->
            <label class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" checked="checked" value="1" />
                <span class="form-check-label text-gray-600">Bill immediately if usage treshold reaches 80%.</span>
            </label>
            <!--end::Checkbox-->
        </div>
        <!--end::Option-->
        <!--begin::Option-->
        <div class="d-flex flex-column fv-row rounded-3 p-7 border border-dashed border-gray-300">
            <!--begin::Label-->
            <div class="fs-5 fw-bold form-label mb-3">Pro-rate billing
            <i tabindex="0" class="cursor-pointer fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-html="true" data-bs-delay-hide="1000" data-bs-content="Pro-rated billing dynamically calculates the remainder amount leftover per billing cycle that is owed. &lt;a href='#'&gt;Learn more&lt;/a&gt;."></i></div>
            <!--end::Label-->
            <!--begin::Checkbox-->
            <label class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
                <span class="form-check-label text-gray-600">Allow pro-rated billing when treshold usage is paid before end of billing cycle.</span>
            </label>
            <!--end::Checkbox-->
        </div>
        <!--end::Option-->
    </div>
    <!--end::Card body-->
</div>