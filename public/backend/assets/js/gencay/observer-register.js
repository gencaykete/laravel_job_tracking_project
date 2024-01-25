"use strict";

$(function () {
    $('#submit-btn').prop('disabled', false)
})

var KTSigninGeneral = function () {
    var form, button, validation;
    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form")
            button = document.querySelector("#submit-btn")
            validation = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {message: "E-Posta adresi gereklidir"},
                            emailAddress: {message: "Geçersiz e-posta adresi !"}
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {message: "Parola alanı gereklidir"}
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {message: "Ad alanı gereklidir"}
                        }
                    },
                    surname: {
                        validators: {
                            notEmpty: {message: "Soyad alanı gereklidir"}
                        }
                    },
                    city_id: {
                        validators: {
                            notEmpty: {message: "İl alanı gereklidir"}
                        }
                    },
                    district_id: {
                        validators: {
                            notEmpty: {message: "İlçe alanı gereklidir"}
                        }
                    },
                    birthday: {
                        validators: {
                            notEmpty: {message: "Doğum tarihi alanı gereklidir"}
                        }
                    },
                    tc: {
                        validators: {
                            notEmpty: {message: "T.C. kimlik no alanı gereklidir"}
                        }
                    },
                    blood_group: {
                        validators: {
                            notEmpty: {message: "Kan grubu alanı gereklidir"}
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {message: "Cinsiyet gereklidir"}
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {message: "Telefon Numarası alanı gereklidir"}
                        }
                    },
                    bank: {
                        validators: {
                            notEmpty: {message: "Banka Adı alanı gereklidir"}
                        }
                    },
                    iban: {
                        validators: {
                            notEmpty: {message: "İban alanı gereklidir"}
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {message: "Adres alanı gereklidir"}
                        }
                    }
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
                                    'data': $('form').serialize(),
                                    dataType: "JSON",
                                    success: function (res) {
                                        if (res.status == 'error') {
                                            button.setAttribute("data-kt-indicator", "off")
                                            button.disabled = 0
                                            Swal.fire({
                                                text: res.message,
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Tamam",
                                                customClass: {confirmButton: "btn btn-primary"}
                                            })
                                        } else {
                                            button.removeAttribute("data-kt-indicator"), button.disabled = !1, Swal.fire({
                                                text: "Kaydınız başarıyla yapıldı. Hesabınız onaylanınca tarafınıza bilgilendirme sağlanacaktır.",
                                                icon: "success",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Tamam",
                                                customClass: {confirmButton: "btn btn-primary"}
                                            })

                                            setTimeout(function () {
                                                form.querySelector('[name="email"]').value = "", form.querySelector('[name="password"]').value = "";
                                                let i = form.getAttribute("data-kt-redirect-url");
                                                i && (location.href = i)
                                            }, 4000)
                                        }
                                    },
                                    error: function (res) {
                                        if (res.status == 422) {
                                            button.setAttribute("data-kt-indicator", "off")
                                            button.disabled = 0

                                                $('.response').html('');
                                            $('.response').removeClass('d-none');
                                            $.each(res.responseJSON.errors, function (key, value) {
                                                $('.response').append('<p>' + value + '</p>');
                                            });
                                            $("html, body").animate({ scrollTop: 0 }, "slow");
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
