@extends('admin.layouts.master')
@section('title','Ürün Listesi')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                      transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                <path
                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                    fill="currentColor"/>
              </svg>
            </span>
                            <!--end::Svg Icon-->
                            <input type="text" id="datatable-search"
                                   class="form-control form-control-solid w-250px ps-15" placeholder="Ara"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--end::Menu 1-->
                            <!--                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                            &lt;!&ndash;begin::Svg Icon | path: icons/duotune/general/gen031.svg&ndash;&gt;
                                                            <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                              <path
                                                  d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                  fill="currentColor"/>
                                            </svg>
                                          </span>
                                                            &lt;!&ndash;end::Svg Icon&ndash;&gt;Filtre
                                                        </button>-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                                 id="kt-toolbar-filter">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-4 text-dark fw-bolder">Filtre Seçenekleri</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <form action="">
                                    <div class="px-7 py-5">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fs-5 fw-bold mb-3">Yaş:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="date" class="form-control" name="age_start"
                                                           value="{{request('age_start')}}"
                                                           placeholder="Başlangıç">
                                                </div>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" name="age_end"
                                                           value="{{request('age_end')}}"
                                                           placeholder="Bitiş">
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fs-5 fw-bold mb-3">Branş:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="branch_id" class="form-select form-select-solid fw-bolder"
                                                    data-kt-select2="true" data-placeholder="Seçin"
                                                    data-allow-clear="true" data-kt-customer-table-filter="month"
                                                    data-dropdown-parent="#kt-toolbar-filter">
                                                <option></option>

                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->


                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <a href="{{route('admin.product.index')}}"
                                               class="btn btn-light btn-active-light-primary me-2"
                                               data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">
                                                Temizle
                                            </a>
                                            <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                                    data-kt-customer-table-filter="filter">Filtrele
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                </form>
                                <!--end::Content-->
                            </div>
                            <!--end::Filter-->
                            <!--begin::Export-->
                            <!--                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                                                data-bs-target="#import_modal">
                                                            <i class="fa fa-upload"></i>
                                                            İçe Aktar
                                                        </button>
                                                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                                                data-bs-target="#export_modal">
                                                            <i class="fa fa-download"></i>
                                                            Dışa Aktar
                                                        </button>-->
                            <!--end::Export-->
                            <!--begin::Add customer-->

                            <a href="{{route('admin.product.create')}}">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_customer">Ürün Ekle
                                </button>
                            </a>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-customer-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger"
                                    data-kt-customer-table-select="delete_selected">Delete Selected
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Resim</th>
                            <th>Kategori</th>
                            <th>Ürün Adı</th>
                            <th>İndirimsiz Fiyat</th>
                            <th>İndirimli Fiyat</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->

        </div>
        <!--end::Page-->
    </div>
@endsection

@section('page-scripts')
    <script>
        let DATA_URL = "{{route('admin.product.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'image'},
            {data: 'category.name'},
            {data: 'name'},
            {data: 'without_discount_price'},
            {data: 'price'},
            {data: 'is_active'},
            {data: 'action'},
        ];
    </script>
    <script src="/backend/assets/js/custom/datatable-init.js"></script>
@endsection