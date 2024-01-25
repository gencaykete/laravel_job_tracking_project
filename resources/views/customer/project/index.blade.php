@extends('customer.layouts.master')
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

                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Proje No.</th>
                            <th>Fiyat</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
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
        let DATA_URL = "{{route('customer.project.datatable')}}";
        let DATA_COLUMNS = [
            {data: 'id'},
            {data: 'price'},
            {data: 'start_date'},
            {data: 'end_date'},
            {data: 'action'},
        ];
    </script>
    <script src="/backend/assets/js/custom/datatable-init.js"></script>
@endsection
