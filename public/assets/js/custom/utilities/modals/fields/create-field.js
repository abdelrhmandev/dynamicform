var KTCreateField = (function () {
    var e,
        t,
        i,
        o,
        a,
        r,
        s = [];
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_create_field")) && new bootstrap.Modal(e),
                (t = document.querySelector("#kt_create_field_stepper")) &&
                    ((i = t.querySelector("#kt_create_field_form")),
                    (o = t.querySelector('[data-kt-stepper-action="submit"]')),
                    (a = t.querySelector('[data-kt-stepper-action="next"]')),
                    (r = new KTStepper(t)).on("kt.stepper.changed", function (e) {
                        2 === r.getCurrentStepIndex()
                            ? (o.classList.remove("d-none"), o.classList.add("d-inline-block"), a.classList.add("d-none"))
                            : 3 === r.getCurrentStepIndex()
                            ? (o.classList.add("d-none"), a.classList.add("d-none"))
                            : (o.classList.remove("d-inline-block"), o.classList.remove("d-none"), a.classList.remove("d-none"));
                    }),
                    r.on("kt.stepper.next", function (e) {
                        var Fs = $("input[name='field_type']:checked").val();                        
                        (1 == r.getCurrentStepIndex() ? LoadFieldInfo(Fs) :'');
                        
                        console.log("stepXXXXXXXXxxper.next");


                        var t = s[e.getCurrentStepIndex() - 1];
                        t
                            ? t.validate().then(function (t) {
                                  console.log("validated!"),
                                      "Valid" == t
                                          ? (e.goNext(), KTUtil.scrollTop())
                                          : Swal.fire({
                                                text: "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: { confirmButton: "btn btn-light" },
                                            }).then(function () {
                                                KTUtil.scrollTop();
                                            });
                              })
                            : (e.goNext(), KTUtil.scrollTop());
                    }),
                    r.on("kt.stepper.previous", function (e) {
                        console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop();
                    }),
                    s.push(
                        FormValidation.formValidation(i, {
                            fields: { field_type: { validators: { notEmpty: { message: "برجاء تحديد نوع الحقل" } } } },
                            plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                        })
                    ),
                    s.push(
                        FormValidation.formValidation(i, {
                            fields: {
                                 label: { validators: { notEmpty: { message: "برجاء تحديد الأسم الذي سيظر به الحقل" } } },
                                 name: { validators: { notEmpty: { message: "برجاء تحديد أسم الحقل" } } },
                            },
                            plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                        })
                    ),
                  
 
                    o.addEventListener("click", function (e) {
                        s[1].validate().then(function (t) {
                            console.log("validated!"),
                                "Valid" == t
                                    ? (e.preventDefault(),
                                      (o.disabled = !0),
                                      o.setAttribute("data-kt-indicator", "on"),
                                      setTimeout(function () {
                                          o.removeAttribute("data-kt-indicator"), (o.disabled = !1), r.goNext();
                                      }, 2e3))
                                    : Swal.fire({
                                        text: "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                                        icon: "error",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: { confirmButton: "btn btn-light" },
                                      }).then(function () {
                                          KTUtil.scrollTop();
                                      });
                        });
                    })
                    );
        },
    };
})();
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////  


KTUtil.onDOMContentLoaded(function () {
    KTCreateField.init();
});
