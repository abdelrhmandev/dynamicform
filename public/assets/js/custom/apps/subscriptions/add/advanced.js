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
                })();
               
                    const deleteButtons = document.querySelectorAll('[data-kt-table-filter="delete_row"]');
                    const destroy = document.getElementById('delete_item');
                    deleteButtons.forEach(d => {
                    d.addEventListener('click', function (t) {
                        t.preventDefault();
                        const n = t.target.closest("tr");
                        const itemName = '';                   
                    Swal.fire({
                    html: destroy.getAttribute("data-confirm-message") + ' ' + itemName + '?',
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    showLoaderOnConfirm: true,
                    confirmButtonText: destroy.getAttribute("data-confirm-button-text"),
                    cancelButtonText: destroy.getAttribute("data-cancel-button-text"),
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-secondary"
                    },
                }).then(function(result) {
                    if (result.value) { // Yes Delete
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: destroy.getAttribute("data-destroy-route"),
                            data: {
                                '_method': 'delete',
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    html: destroy.getAttribute("data-deleting-selected-items") + ' ' + itemName + '',
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function (t) {
                                    
                                    if (response["status"] == true) {
                                        Swal.fire({
                                            text: response['msg'], // respose from controller
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: destroy.getAttribute("data-back-list-text"),
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function() {
                                            // delete row data from server and re-draw datatable

                                            document.location.href = window.location;

                                            // e.row($(n)).remove().draw();
                                        });
                                    } else if (response["status"] == false) {
                                        Swal.fire({
                                            html: response["msg"], // respose from controller
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: destroy.getAttribute("data-back-list-text"),
                                            customClass: {
                                                confirmButton: "btn btn-light-danger"
                                            }
                                        }) 
                                    }

                                });
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: destroy.getAttribute("data-not-deleted-message"),
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: destroy.getAttribute("data-confirm-button-textGotit"),
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                }); 
                    })
                    });
                
                
 
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {    
    KTSubscriptionsAdvanced.init();
});
