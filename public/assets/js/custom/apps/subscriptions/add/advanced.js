"use strict";
var KTSubscriptionsAdvanced = (function () {
    var t,
        e,
        n = function () {
            t.querySelectorAll("tbody tr").forEach((t, e) => {
                const n = t.querySelector("td:first-child input"),
                    o = t.querySelector("td:nth-child(2) input"),
                    i = n.getAttribute("id"),
                    r = o.getAttribute("id");
                // n.setAttribute("name", i + "-" + e), o.setAttribute("name", r + "-" + e);
            });
        };
    return {
        init: function () {
            (t = document.getElementById("kt_create_new_custom_fields")),
                (function () {
                    const o = document.getElementById("kt_create_new_custom_fields_add"),
                        i = t.querySelector("tbody tr td:first-child").innerHTML,
                        r = t.querySelector("tbody tr td:nth-child(2)").innerHTML,
                        c = t.querySelector("tbody tr td:last-child").innerHTML;
                    var d;
                    (e = $(t).DataTable({ 
                        info: !1, 
                        order: [], 
                        ordering: !1, 
                        paging: !1, 
                        lengthChange: !1,

                        oLanguage: {
                            "sEmptyTable": 'لا توجد بيانات متاحه',
                        },



                     })),
                        o.addEventListener("click", function (t) {
                            t.preventDefault(), (d = e.row.add([i, r, c]).draw().node()), $(d).find("td").eq(2).addClass("text-end"), n();
                        });
                })(),
                n(),
                KTUtil.on(t, '[data-kt-action="field_remove"]', "click", function (t) {
                    t.preventDefault();
                    const n = t.target.closest("tr");
                    Swal.fire({
                        text: "حذف هذا الملأ ؟",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "نعم",
                        cancelButtonText: "لا",
                        customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" },
                    }).then(function (t) {
                        t.value
                            ? Swal.fire({ text: "تم الحذف!.", icon: "success", buttonsStyling: !1, confirmButtonText: "موافق", customClass: { confirmButton: "btn fw-bold btn-primary" } }).then(function () {
                                  e.row($(n)).remove().draw();
                              })
                            : "cancel" === t.dismiss && Swal.fire({ text: "لم يتم الحذف.", icon: "error", buttonsStyling: !1, confirmButtonText: "موافق", customClass: { confirmButton: "btn fw-bold btn-primary" } });
                    });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSubscriptionsAdvanced.init();
});
