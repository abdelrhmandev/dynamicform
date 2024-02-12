var KTSubscriptionsAdvanced = (function () {
    var tx,
        ex,
        nx = function () {
            tx.querySelectorAll("tbody tr").forEach((tx, ex) => {
                const nx = tx.querySelector("td:first-child input"),
                    ox = tx.querySelector("td:nth-child(2) input"),
                    ix = nx.getAttribute("id"),
                    rx = ox.getAttribute("id");
                // n.setAttribute("name", ix + "-" + ex), o.setAttribute("name", rx + "-" + ex);
            });
        };
    return {
        init: function () {
            (tx = document.getElementById("kt_create_new_custom_fields")),
                (function () {
                    const ox = document.getElementById("kt_create_new_custom_fields_add"),
                        ix = tx.querySelector("tbody tr td:first-child").innerHTML,
                        rx = tx.querySelector("tbody tr td:nth-child(2)").innerHTML,
                        cx = tx.querySelector("tbody tr td:last-child").innerHTML;
                    var dx;
                    (ex = $(tx).DataTable({ info: !1, order: [], ordering: !1, paging: !1, lengthChange: !1 })),
                        ox.addEventListener("click", function (t) {
                            tx.preventDefault(), (dx = ex.row.add([ix, rx, cx]).draw().node()), $(dx).find("td").eq(2).addClass("text-end"), n();
                        });
                })(),
                nx();
                // KTUtil.on(tx, '[data-kt-action="field_remove"]', "click", function (tx) {
                //     tx.preventDefault();
                //     const nx = tx.target.closest("tr");
                //     Swal.fire({
                //         text: "  هل تريد حقا حذف هذا الملأ  ؟",
                //         icon: "warning",
                //         showCancelButton: !0,
                //         buttonsStyling: !1,
                //         confirmButtonText: "نعم حذف",
                //         cancelButtonText: "لا, الغ",
                //         customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" },
                //     }).then(function (tx) {
                //         tx.value
                //             ? Swal.fire({ text: "تم الحذف.", icon: "success", buttonsStyling: !1, confirmButtonText: "حسنا نعم", customClass: { confirmButton: "btn fw-bold btn-primary" } }).then(function () {
                //                   ex.row($(nx)).remove().draw();
                //               })
                //             : "cancel" === tx.dismiss && Swal.fire({ text: "لم يتم الحذف.", icon: "error", buttonsStyling: !1, confirmButtonText: "حسنا نعم", customClass: { confirmButton: "btn fw-bold btn-primary" } });
                //     });
                // });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSubscriptionsAdvanced.init();
});
