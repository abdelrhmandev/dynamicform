<div class="card card-flush pt-3 mb-5 mb-lg-10">
  
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
                <tr>
                    <td>
                        <input type="text" class="form-control form-control-lg" placeholder="مثال ذكر"
                            name="fillable_display[]" />

                    </td>
                    <td>
                        <input type="text" class="form-control form-control-lg" placeholder="مثال male"
                            name="fillable_value[]" />
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-icon btn-flex w-30px h-30px me-3"
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
            </tbody>
        </table>
    </div>
    <a href="#" class="btn btn-light-success me-auto" id="kt_create_new_custom_fields_add">
        <span class="svg-icon svg-icon-3">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                    fill="currentColor"></rect>
                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                    transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor">
                </rect>
            </svg>
        </span>أضف ملئ جديد</a>
        
</div>
