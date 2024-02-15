<div class="w-100">
    <!--begin::Heading-->

    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
        <!--begin::Icon-->
        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                    fill="currentColor" />
                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                    fill="currentColor" />
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
                    |
                    بدايه و نهايه التاريخ

                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>


    <div class="row g-12 mb-8 mt-5">




        <div class="col-md-6 fv-row">
            <label class="fs-6 fw-semibold mb-2">بدايه التاريخ</label>
            <div class="position-relative d-flex align-items-center">
                <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                <input placeholder="بدايه التاريخ" type="text" id="date_range_min_date" name="date_range_min_date"
                    class="form-control form-control-solid ps-12 flatpickr-input active" readonly="readonly">
            </div>
        </div>

        <div class="col-md-6 fv-row">
            <label class="fs-6 fw-semibold mb-2">نهاية التاريخ</label>
            <div class="position-relative d-flex align-items-center">
                <i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
                <input placeholder="نهاية التاريخ" type="text" id="date_range_max_date" name="date_range_max_date"
                    class="form-control form-control-solid ps-12 flatpickr-input active" readonly="readonly">
            </div>
        </div>
    </div>


</div>
<script>
    $('#date_range_min_date, #date_range_max_date').flatpickr({
        todayHighlight: true,
        orientation: "bottom left",
    });
</script>
