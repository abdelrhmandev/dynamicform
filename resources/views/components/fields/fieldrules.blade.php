<div id="upload_extensions_restriction_div" class="card card-flush d-none">
    <h4 class="text-gray-900 fw-bold">وضع قيود علي حقل الملف</h4>
    <div class="fv-row">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-2 g-9">
            <div class="col">
                <label class="btn btn-outline btn-outline-dashed active d-flex text-start p-6"
                    data-kt-button="true">
                    <span
                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                        <input class="form-check-input" type="radio" name="checkFileRules"
                            value="images" checked="checked" />
                    </span>
                    <span class="ms-5">
                        <span class="fs-4 fw-bold text-gray-800 d-block">
                            {{ __('site.upload_only_images') }}
                        </span>
                    </span>
                </label>
            </div>
            <div class="col">
                <label class="btn btn-outline btn-outline-dashed d-flex text-start p-6"
                    data-kt-button="true">
                    <span
                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                        <input class="form-check-input" type="radio" name="checkFileRules"
                            value="documents" />
                    </span>
                    <span class="ms-5">
                        <span class="fs-4 fw-bold text-gray-800 d-block">
                            {{ __('site.docs') }} , {{ __('site.upload_only_docs') }}</span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>

<div id="textbox_restriction_div" class="card card-flush d-none">
    <h4 class="text-gray-900 fw-bold">وضع قيود علي حقل النص</h4>
    <div class="fv-row">
        <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2 g-9">
            <div class="col">
                <label class="btn btn-outline btn-outline-dashed active d-flex text-start p-6"
                    data-kt-button="true">
                    <span
                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                        <input class="form-check-input" type="checkbox" name="attribute"
                            value="^[\u0621-\u064A\u0660-\u0669 ]+$" />

                            <input type="hidden" name="rules"
                            value="قبول لغه عربيه فقط" />

                    </span>
                    <span class="ms-5">
                        <span class="fs-4 fw-bold text-gray-800 d-block">
                            قبول لغه عربيه فقط
                        </span>
                    </span>
                </label>
            </div>

        </div>
    </div>
</div>
<div id="number_restriction_div" class="card card-flush d-none">
    <h4 class="text-gray-900 fw-bold">وضع قيود علي حقل الأرقام</h4>
    <div class="fv-row">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9">
            <div class="col">
                <label class="btn btn-outline btn-outline-dashed active d-flex text-start p-6"
                    data-kt-button="true">
                    <span
                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                        <input class="form-check-input" type="checkbox" name="checkboxMaxLength"
                            value="1" />
                    </span>
                    <span class="ms-5">
                        <span class="fs-4 fw-bold text-gray-800 d-block">
                            أكبر عدد من الأرقام هو
                            <input type="textbox" id="numbers-minlength" name="NumbersMaxLength"
                                class="form-control w-10">
                        </span>
                    </span>
                </label>
            </div>
            <div class="col">
                <label class="btn btn-outline btn-outline-dashed active d-flex text-start p-6"
                    data-kt-button="true">
                    <span
                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                        <input class="form-check-input" type="checkbox" name="checkboxMinLength"
                            value="1" />
                    </span>
                    <span class="ms-5">
                        <span class="fs-4 fw-bold text-gray-800 d-block">
                            أقل عدد من الأرقام هو
                            <input type="textbox" id="numbers-minlength" name="NumbersMinLength"
                                class="form-control w-10">
                        </span>
                    </span>
                </label>
            </div>
            <div class="col">
                <label class="btn btn-outline btn-outline-dashed d-flex text-start p-6"
                    data-kt-button="true">
                    <span
                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                        <input class="form-check-input" type="checkbox" name="checkboxPrefix"/>
                    </span>
                    <span class="ms-5">
                        <span class="fs-4 fw-bold text-gray-800 d-block">

                            الرقم لابد ان يبدأ
                            <input type="textbox" id="NumbersPrefix" name="NumbersPrefix"
                                class="form-control w-10">
                        </span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>