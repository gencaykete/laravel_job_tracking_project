@extends('admin.layouts.master')
@section('title','Site Ayarları')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bolder">Site Ayarları</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form id="kt_project_settings_form" method="post" action="{{route('admin.setting.update')}}" class="form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!--begin::Card body-->
                    <div class="card-body p-9">

                        <div class="row mb-5">
                            <div class="col-md-12 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Site Başlığı</label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                       required name="title" value="{{config('setting.title')}}"/>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 col-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">Logo <a href="{{storage(config('setting.logo'))}}" target="_blank">(Görüntüle)</a></label>
                                <input type="file" class="form-control form-control-solid"
                                       name="logo" value=""/>
                            </div>
                            <div class="col-md-6 col-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">Favicon <a href="{{storage(config('setting.favicon'))}}" target="_blank">(Görüntüle)</a></label>
                                <input type="file" class="form-control form-control-solid" name="favicon"
                                       value=""/>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12 col-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">Site Açıklaması</label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                       name="description" value="{{config('setting.description')}}"/>
                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Kaydet</button>
                    </div>
                    <!--end::Card footer-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('page-scripts')

@endsection
