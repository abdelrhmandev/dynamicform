<div class="w-100">
    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                    fill="currentColor" />
                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                    fill="currentColor" />
            </svg>
        </span>
        <div class="d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <h4 class="text-gray-900 fw-bold">برجاء الأنتباه الي</h4>
                <div class="fs-6 text-gray-700">    
                    خصائص أضافيه للحقل
                    | 
                    وضع قيود علي حقل الملف                    
                </div>
            </div>
        </div>
    </div>
    <p>
        <h4 class="text-gray-900 fw-bold">برجاء حدد نوع الملف</h4>
    </p>
    <div class="fv-row mt-5">
        <div class="row">
            <div class="col-lg-6">
                <input type="radio" class="btn-check" name="checkFileRules" value="images" checked="checked" id="FileRuleImages" />
                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="FileRuleImages">
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
                <input type="radio" class="btn-check" name="checkFileRules" value="documents" id="FileRuledocuments" />
                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="FileRuledocuments">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                    <span class="svg-icon svg-icon-3x me-5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                            fill="currentColor" />
                        <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
                        <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
                        <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                    </svg>
                    </span>
                    <span class="d-block fw-semibold text-start">
                        <span class="text-dark fw-bold d-block fs-4 mb-2">{{ __('site.docs') }}</span>
                        <span class="text-muted fw-semibold fs-6">{{ __('site.upload_only_docs') }}</span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>