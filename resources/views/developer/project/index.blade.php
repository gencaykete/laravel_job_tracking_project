@extends('developer.layouts.master')
@section('title','Proje Listesi')
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


                            <!--end::Add customer-->
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Proje No.</th>
                            <th>Müşteri</th>
                            <th>Fiyat</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Kalan Gün</th>
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
        let DATA_URL = "{{route('developer.project.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            {data: 'customer'},
            {data: 'price'},
            {data: 'start_date'},
            {data: 'end_date'},
            {data: 'day'},
            {data: 'action'},
        ];
    </script>
    <script src="/backend/assets/js/custom/datatable-init.js"></script>
@endsection
