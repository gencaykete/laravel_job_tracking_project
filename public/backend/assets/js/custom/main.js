$(function () {
    $("[data-mask=phone]").mask("0(999) 999 9999");
    $("[data-mask=tc]").mask("99999999999");
    $('.loader').hide();
})

$(".datepicker").flatpickr({altInput: !0, altFormat: "d F, Y", dateFormat: "Y-m-d"});

$(document).on('submit', '.ajax-submit', function (e) {
    e.preventDefault();

    let url = $(this).attr('action');
    let method = $(this).attr('method');
    let refreshDatatable = $(this).attr('data-refresh-datatable');

    $.ajax({
        url: url,
        type: method,
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            Swal.fire({
                text: res.message,
                icon: res.status,
                buttonsStyling: !1,
                confirmButtonText: "Tamam",
                customClass: {confirmButton: "btn btn-primary"}
            }).then((function (t) {
                $('.modal').modal('hide');
                if (refreshDatatable) {
                    table.ajax.reload(null, false);
                }
            }))
        }
    });

});

function areYouSure(url, text = "Bu veriyi silmek istediğinize emin misiniz?", method = '') {
    Swal.fire({
        title: 'İşlemi Onaylayın',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet',
        cancelButtonText: 'İptal',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": csrf_token,
                    '_method': method
                },
                success: function (res) {
                    Swal.fire({
                        icon: res.status,
                        text: res.text ? res.text : res.message,
                    })
                    if (res.status === 'success') {
                        table.ajax.reload(null, false);
                    }
                }
            });
        }
    })
}

$(document).on('click', '.delete-btn', function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    let text = $(this).attr('alert-text');
    areYouSure(url, text, 'delete');
})

$('#cities').on('change', function () {
    let city_key = $(this).val();
    getDistricts('#districts', city_key);
})

$('#categories').on('change', function () {
    let category_id = $(this).val();
    getCategoryBranches('#branches', category_id);
})

function getDistricts(container, city_key, active_key = 0) {
    $.ajax({
        url: "/ajax/get-districts",
        type: "post",
        data: {
            "_token": csrf_token,
            "city_key": city_key
        },
        dataType: "json",
        success: function (res) {
            $(container).html("<option></option>");
            $.each(res, function (key, value) {
                $(container).append("<option " + (active_key == value.key ? 'selected' : '') + " value='" + value.key + "'>" + value.name + "</option>");
            })
        }
    });
}

function getCategoryBranches(container, category_id, active_key = 0) {
    $.ajax({
        url: "/ajax/get-category-branches",
        type: "post",
        data: {
            "_token": csrf_token,
            "category_id": category_id
        },
        dataType: "json",
        success: function (res) {
            $(container).html("<option></option>");
            $.each(res, function (key, value) {
                $(container).append("<option " + (active_key == value.id ? 'selected' : '') + " value='" + value.id + "'>" + value.name + "</option>");
            })
        }
    });
}

function openTab(tab) {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function showDocument(url) {
    $('#open_document').modal('show');
    $('#open_document_frame').attr('src', url);
}

$('#open_document').on('hidden.bs.modal', function () {
    $('#open_document_frame').attr('src', null);
})

/* Lag Variant */
var lagVariantCreate_list = [];
var first = [];
let variant_index = $('.variant-box').length;

function createVariant() {
    $('#variants').append('<div class="col-md-6 mb-5 variant-box variant-box-' + variant_index + '">\n' +
        '    <div class="lag-variant-box lag-variant-box-' + variant_index + '">\n' +
        '        <div class="title">\n' +
        '            <input type="text" class="form-control m-input" placeholder="Başlık" name="variant[' + variant_index + '][name]" value="">\n' +
        '            <a href="javascript:;" onclick="lagVariantCreateAdd(\'.lag-variant-box.lag-variant-box-' + variant_index + '\', ' + variant_index + ')" data-toggle="tooltip" title="" class="btn btn-secondary btn-sm" data-original-title="Yeni Satır Ekle">\n' +
        '                <i class="fa fa-plus"></i>\n' +
        '            </a>\n' +
        '            <a href="javascript:;" onClick="removeVariant(\'.variant-box-' + variant_index + '\')" data-toggle="tooltip" title="" class="btn btn-danger btn-sm">' +
        '                <i class="fa fa-trash"></i> ' +
        '            </a> ' +
        '        </div>\n' +
        '        <div class="variants">\n' +
        '            <div class="values"></div>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '</div>');
    variant_index++;
}

function lagVariantCreate(variant_box, vindex, variants) {
    if (true) {
        try {
            if ($(variant_box + ' .values').html().trim() != "") {
                variants = variants.concat(JSON.parse($(variant_box + ' .values').html()));
            }
        } catch (e) {

        }
        first.push(variant_box);
    }

    variants = variants.filter(function (e) {
        return e != "";
    });

    lagVariantCreate_list[variant_box] = variants;

    $(variant_box + ' .values').html('');
    var view = '', variant;
    for (var i = 0; i < variants.length; i++) {
        variant = variants[i];
        view = '<div class="value">' +
            '<input type="text" name="variant[' + vindex + '][option][' + i + '][name]" class="form-control name" style="margin-right: 20px" placeholder="Seçenek Adı" value="' + (variant.name ?? '') + '" />' +
            '<input type="text" name="variant[' + vindex + '][option][' + i + '][price]" class="form-control price" style="margin-right: 20px" placeholder="Fiyat Farkı" value="' + (variant.price ?? '') + '" />' +
            '<div class="buttons">';

        if (i > 0) {
            view = view + '<a href="javascript:;" onclick="lagVariantMoveUp(' + i + ', ' + vindex + ', \'' + variant_box + '\')"><i class="fa fa-angle-up text-dark"></i></a>';
        }
        if (i < (variants.length - 1)) {
            view = view + '<a href="javascript:;" onclick="lagVariantMoveDown(' + i + ', ' + vindex + ', \'' + variant_box + '\')"><i class="fa fa-angle-down text-dark"></i></a>';
        }
        view = view + '<a href="javascript:;" onclick="lagVariantRemove(' + i + ', ' + vindex + ', \'' + variant_box + '\')"><i class="fa fa-times text-danger"></i></a>';

        view = view +
            '</div>' +
            '</div>';

        $(variant_box + ' .values').append(view);
    }
}

function lagVariantCreateRefresh(variant_box) {
    var variants = [];
    ($(variant_box + ' .values .value')).each(function (index, element) {
        variants[index] = {
            "name": $(this).find('input.name').val(),
            "price": $(this).find('input.price').val(),
        };
    });
    lagVariantCreate_list[variant_box] = variants;
}

function lagVariantCreateAdd(variant_box, vindex) {
    lagVariantCreateRefresh(variant_box);
    var variants = lagVariantCreate_list[variant_box];
    variants.push(' ');
    lagVariantCreate(variant_box, vindex, variants);
}

function lagVariantRemove(index, vindex, variant_box) {
    lagVariantCreateRefresh(variant_box);
    var variants = lagVariantCreate_list[variant_box];
    let lists = [], vr = '';
    for (var i = 0; i < variants.length; i++) {
        vr = variants[i];
        if (i != index) {
            lists.push(vr);
        }
    }
    variants = lists;
    lagVariantCreate(variant_box, vindex, variants);
}

function lagVariantMoveUp(index, vindex, variant_box) {
    lagVariantCreateRefresh(variant_box);
    var variants = lagVariantCreate_list[variant_box];
    if (index == 0) return false;
    var i1 = variants[index];
    var i2 = variants[index - 1];
    variants[index] = i2;
    variants[index - 1] = i1;
    lagVariantCreate(variant_box, vindex, variants);
}

function lagVariantMoveDown(index, vindex, variant_box) {
    lagVariantCreateRefresh(variant_box);
    var variants = lagVariantCreate_list[variant_box];
    if (index >= (variants.length - 1)) return false;

    var i1 = variants[index];
    var i2 = variants[index + 1];
    variants[index] = i2;
    variants[index + 1] = i1;
    lagVariantCreate(variant_box, vindex, variants);
}

function removeVariant(variant_box) {
    $(variant_box).remove();
}

function showVariantProcessApply(name, elem) {
    createVariant()
    let variants = elem.data("variants");
    let variant_box_index = variant_index - 1;

    lagVariantCreate(".lag-variant-box.lag-variant-box-" + variant_box_index, variant_box_index, variants);
    $(".lag-variant-box.lag-variant-box-" + variant_box_index).find('input').first().val(name);
    $("#variant-list-modal").modal("hide");
    $("[data-dismiss=modal]").trigger({type: "click"});

}

function confirmToSweetAlert(text, url) {
    Swal.fire({
        title: 'İşlemi Onaylayın',
        html: text,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet',
        cancelButtonText: 'Hayır',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url
        }
    })
}
