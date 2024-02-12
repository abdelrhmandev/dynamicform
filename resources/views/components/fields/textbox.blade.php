 <h3 class="d-flex text-gray-900 fs-1hx fw-bold letter-spacing">
     <span class="ms-3 d-inline-flex position-relative">
         <span class="px-1 fw-bold text-primary">خصائص أضافيه للحقل </span>
         <img class="w-100 position-absolute bottom-0 mb-n2"
             src= "{{ asset('assets/media/misc/hero-home-title-underline.svg') }}" alt=""> </span>
 </h3>
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
