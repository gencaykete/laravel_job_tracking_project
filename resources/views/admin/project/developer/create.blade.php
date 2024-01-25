@extends('admin.layouts.master')

@section('title','Yazılımcı Ekle')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-5 mt-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Yazılımcı Ekle</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="" class="text-gray-600 text-hover-primary">Yazılımcı Listesi</a>
                    </li>
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Yazılımcı Ekle</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center">
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Careers - Apply-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-17">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="d-flex flex-column flex-lg-row mb-17">
                        <div class="flex-lg-row-fluid me-0 me-lg-20">
                            <form action="{{route('admin.project-developer.store',request()->all())}}" class="form mb-15" method="post"
                                  enctype="multipart/form-data"
                                  id="kt_careers_form">
                                @csrf

                                <div class="row mb-5">
                                    <div class="col-md-6 col-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Yazılımcı</label>
                                        <select name="developer_id" class="form-select" data-placeholder="Yazılımcı Seçiniz" data-control="select2" data-hide-search="true">
                                            <option></option>
                                            @foreach($developers as $row)
                                                <option value="{{$row->id}}">{{$row->name.' '.$row->surname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Tutar</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                               required name="price" value="{{old('price')}}"/>
                                    </div>

                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-12 col-12 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Notlar</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                               name="notes" value="{{old('notes')}}"/>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6 col-12 fv-row">
                                        <label class="fs-5 fw-bold mb-2 required">Başlangıç Tarihi</label>
                                        <input type="date" class="form-control form-control-solid" required name="start_date" value="{{old('start_date')}}"/>
                                    </div>
                                    <div class="col-md-6 col-12 fv-row">
                                        <label class="fs-5 fw-bold mb-2 required">Bitiş Tarihi</label>
                                        <input type="date" class="form-control form-control-solid" required name="end_date" value="{{old('end_date')}}"/>
                                    </div>
                                </div>

                                <!--begin::Submit-->
                                <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Kaydet</span>
                                    <span class="indicator-progress">Kaydediliyor
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator-->
                                </button>
                                <!--end::Submit-->
                            </form>
                            <!--end::Form-->

                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Layout-->


                </div>
                <!--end::Body-->
            </div>
            <!--end::Careers - Apply-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

