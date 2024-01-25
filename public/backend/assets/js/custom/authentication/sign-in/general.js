"use strict";

$(function (){
    $('#kt_sign_in_submit').prop('disabled',false)
})

var KTSigninGeneral = function () {
    var form, button, validation;
    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form")
            button = document.querySelector("#kt_sign_in_submit")
            validation = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {message: "E-Posta adresi gereklidir"},
                            emailAddress: {message: "Geçersiz e-posta adresi !"}
                        }
                    }, password: {validators: {notEmpty: {message: "Parola alanı gereklidir"}}}
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({rowSelector: ".fv-row"})
                }
            })
            button.addEventListener("click", (function (n) {
                n.preventDefault(),
                    validation.validate().then((function (i) {
                        if (i == "Valid") {
                            button.setAttribute("data-kt-indicator", "on")
                            button.disabled = 1
                            setTimeout((function () {
                                $.ajax({
                                    'url': form.getAttribute("action"),
                                    "type": "POST",
                                    'data': {
                                        "_token": csrf_token,
                                        'email': $('input[name=email]').val(),
                                        'password': $('input[name=password]').val(),
                                    },
                                    dataType: "JSON",
                                    success: function (res) {
                                        if (res.status == 'error'){
                                            button.setAttribute("data-kt-indicator", "off")
                                            button.disabled = 0
                                            Swal.fire({
                                                text: res.message,
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Tamam",
                                                customClass: {confirmButton: "btn btn-primary"}
                                            })
                                        }else {
                                            button.removeAttribute("data-kt-indicator"), button.disabled = !1, Swal.fire({
                                                text: "Girilen bilgiler doğru yönlendiriliyorsunuz..",
                                                icon: "success",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Tamam",
                                                customClass: {confirmButton: "btn btn-primary"}
                                            })

                                            setTimeout(function (){
                                                form.querySelector('[name="email"]').value = "", form.querySelector('[name="password"]').value = "";
                                                let i = form.getAttribute("data-kt-redirect-url");
                                                i && (location.href = i)
                                            },500)
                                        }

                                    }
                                });

                            }), 100)
                        } else {
                            Swal.fire({
                                text: "Maalesef bazı hatalar tespit edildi, lütfen tekrar deneyin.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Tamam!",
                                customClass: {confirmButton: "btn btn-primary"}
                            })
                        }
                    }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTSigninGeneral.init()
}));
