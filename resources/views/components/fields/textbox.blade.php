 
 

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
                
                
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>



 <div class="d-flex flex-column mb-7 fv-row mt-5">
     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
         <span>الحد الأقصي لطول الحقل</span>
     </label>
     <input type="text" id="maxlength" maxlength="3" name="maxlength" placeholder=" مثال 255"
         class="form-control form-control-lg form-control-solid" />
 </div>



 <div class="d-flex flex-column mb-7 fv-row mt-10">
     <div class="me-5">
         <label class="fs-6 fw-semibold form-label">هل الحقل يقبل حروف عربيه فقط ؟</label>
         <div class="fs-7 fw-semibold text-muted">يجب ملأ الحقل بكلمات عربيه لسيت اي شيء أخر</div>
     </div>
     <!--end::Label-->
     <!--begin::Switch-->
     <label class="form-check form-switch form-check-custom form-check-solid">
         <input class="form-check-input" type="checkbox" name="attribute" value="^[\u0621-\u064A\u0660-\u0669 ]+$" />
         <span class="form-check-label fw-semibold text-muted">نعم</span>
     </label>
     <!--end::Switch-->
 </div>
