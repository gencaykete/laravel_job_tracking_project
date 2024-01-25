@extends('admin.layouts.master')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-0 mb-lg-n4 pt-5 mt-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Ürün Ekle</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{route('home')}}" class="text-gray-600 text-hover-primary">Anasayfa</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Ürünler</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-500">Ürün Ekle</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->

            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Form-->
            <form action="{{route('admin.product.store')}}" class="form d-flex flex-column flex-lg-row" method="post"
                  enctype="multipart/form-data" data-kt-redirect="">
            @csrf
            <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-250px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Resim</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3"
                                 data-kt-image-input="true"
                                 style="background-image: url(/backend/media/svg/files/blank-image.svg)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="İkonu Değiştir">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                        </div>
                        <!--end::Card body-->
                    </div>

                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Durum</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                     id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Durum Seçiniz" name="is_active" id="is_active">
                                <option></option>
                                <option value="1" selected="selected">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7"></div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="#service-detail">Ürün Bilgileri</a>
                        </li>
                        <!--                        <li class="nav-item">
                                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                                       href="#intro">İntro</a>
                                                </li>-->
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="service-detail" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Ürün Bilgileri</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-6 mb-10 fv-row">
                                                <label class="required form-label">Ürün Adı</label>
                                                <input type="text" name="name" class="form-control mb-2"
                                                       required placeholder="Ürün Adı" value=""/>
                                            </div>
                                            <div class="col-md-6 mb-10 fv-row">
                                                <label class="required form-label">Kategori</label>
                                                <select class="form-select mb-2" data-control="select2" data-placeholder="Kategori Seçiniz" name="category_id" id="category">
                                                    <option></option>
                                                    @foreach($categories as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="form-label">Anahtar Kelimeler</label>
                                            <input type="text" name="keywords" class="form-control mb-2 tagify"
                                                   value=""/>
                                            <div class="text-muted fs-7">Ürünün arama sonuçlarında çıkmasını istediğiniz
                                                anahtar kelimeler.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>

                                    <!--end::Card header-->
                                </div>

                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Fiyatlandırma</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">Ürün Fiyatı</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="price" class="form-control mb-2" placeholder="0.00"
                                                   value=""/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">İndirim Türü</label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9"
                                                 data-kt-buttons="true">
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label onclick="closeTabs()"
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
                                                        data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span
                                                            class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio"
                                                                   name="discount[type]" value="1" checked="checked"/>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">İndirim Yok</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label onclick="open_discount_percent_tab()"
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                        data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span
                                                            class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio"
                                                                   name="discount[type]" value="2"/>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span
                                                                class="fs-4 fw-bolder text-gray-800 d-block">Yüzde %</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label onclick="open_fixed_discount()"
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                        data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span
                                                            class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio"
                                                                   name="discount[type]" value="3"/>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">Sabit İndirim</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-none mb-10 fv-row" id="discount_percent_tab">
                                            <!--begin::Label-->
                                            <label class="form-label">İndirim Oranı</label>
                                            <!--end::Label-->
                                            <!--begin::Slider-->
                                            <div class="d-flex flex-column text-center mb-5">
                                                <div class="d-flex align-items-start justify-content-center mb-7">
                                                    <span class="fw-bolder fs-3x"
                                                          id="kt_ecommerce_add_product_discount_label">0</span>
                                                    <span class="fw-bolder fs-4 mt-1 ms-2">%</span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_discount_slider"
                                                     class="noUi-sm"></div>
                                                <input type="hidden" name="discount[percent]" id="discount_percent"
                                                       value="10">
                                            </div>
                                            <!--end::Slider-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Bu ürüne uygulanacak bir yüzde indirimi
                                                belirleyin.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-none mb-10 fv-row" id="fixed_discount_tab">
                                            <!--begin::Label-->
                                            <label class="form-label">Sabit İndirim Tutarı</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="discount[fixed_discount_amount]" class="form-control mb-2"
                                                   placeholder="0.00"/>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">İndirimli ürün fiyatını belirleyin. Üründe
                                                belirlenen sabit fiyattan indirim yapılacaktır.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>

                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title d-flex justify-content-between" style="width: 100%;">
                                            <h2>Varyantlar</h2>
                                            <div>
                                                <button type="button" data-toggle="modal" data-target="#variant-list-modal" class="btn btn-info btn-sm">
                                                    Varyant Kopyala <i class="fa fa-copy"></i>
                                                </button>
                                                <button type="button" onclick="createVariant()" class="btn btn-primary btn-sm">
                                                    Varyant Ekle <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="row" id="variants">

                                        </div>

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <div class="tab-pane fade" id="intro" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>İntro Bilgileri</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">

                                        <div class="row">

                                        </div>

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                            </div>
                        </div>
                        <!--begin::Tab pane-->

                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('admin.product.index')}}" id="kt_ecommerce_add_product_cancel"
                           class="btn btn-light me-5">İptal</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Kaydet</span>
                            <span class="indicator-progress">Lütfen Bekleyin...
											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
    @include('admin.product.search-variant-modal')
@endsection

@section('page-scripts')
    @include('global.custom-datatable')
    <script>
        let o = document.querySelector("#kt_ecommerce_add_product_discount_slider")
        let a = document.querySelector("#kt_ecommerce_add_product_discount_label")

        noUiSlider.create(o, {
            start: [10],
            connect: !0,
            range: {min: 1, max: 100}
        })
        o.noUiSlider.on("update", (function (e, t) {
            a.innerHTML = Math.round(e[t]), t && (a.innerHTML = Math.round(e[t]))

            $('#discount_percent').val(Math.round(e[t]))
        }));

        function closeTabs() {
            $('#discount_percent_tab').addClass('d-none');
            $('#fixed_discount_tab').addClass('d-none');
        }

        function open_discount_percent_tab() {
            $('#discount_percent_tab').removeClass('d-none');
            $('#fixed_discount_tab').addClass('d-none');
        }

        function open_fixed_discount() {
            $('#discount_percent_tab').addClass('d-none');
            $('#fixed_discount_tab').removeClass('d-none');
        }
    </script>

@endsection
