@extends('admin.layouts.master')
@section('title','Sipariş Ayarları')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bolder">Sipariş Ayarları</div>
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
                            <div class="col-md-6 col-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">Aktif Günler</label>
                                <div class="col-md-12 flex-column">
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Pazartesi]" @checked(in_array('Pazartesi',config('setting.activeDays'))) value="Pazartesi">&nbsp;&nbsp;&nbsp;&nbsp;Pazartesi
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Salı]" @checked(in_array('Salı',config('setting.activeDays'))) value="Salı">&nbsp;&nbsp;&nbsp;&nbsp;Salı
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Çarşamba]" @checked(in_array('Çarşamba',config('setting.activeDays'))) value="Çarşamba">&nbsp;&nbsp;&nbsp;&nbsp;Çarşamba
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Perşembe]" @checked(in_array('Perşembe',config('setting.activeDays'))) value="Perşembe">&nbsp;&nbsp;&nbsp;&nbsp;Perşembe
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Cuma]" @checked(in_array('Cuma',config('setting.activeDays'))) value="Cuma">&nbsp;&nbsp;&nbsp;&nbsp;Cuma
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Cumartesi]" @checked(in_array('Cumartesi',config('setting.activeDays'))) value="Cumartesi">&nbsp;&nbsp;&nbsp;&nbspCumartesi
                                    </label>
                                    <label class="form-check form-check-custom form-check-solid mb-2">
                                        <input type="checkbox" class="form-check-input" name="activeDays[Pazar]" @checked(in_array('Pazar',config('setting.activeDays'))) value="Pazar">&nbsp;&nbsp;&nbsp;&nbspPazar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 fv-row mb-5">
                                <div class="row mb-5">
                                    <div class="col-md-12 col-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Sipariş Durumu</label>
                                        <select name="order_status" data-control="select2" data-hide-search="true" class="form-select">
                                            <option value="1" @selected(config('setting.order_status'))>Aktif</option>
                                            <option value="0" @selected(!config('setting.order_status'))>Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-12 col-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Minimum Sipariş Tutarı</label>
                                        <input type="number" min="0" class="form-control form-control-solid" placeholder=""
                                               required name="min_order_amount" value="{{config('setting.min_order_amount') ?? 0}}"/>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-12 col-12 fv-row">
                                        <label class="required fs-5 fw-bold mb-2">Sipariş Teslim Süresi</label>
                                        <input type="text" min="0" class="form-control form-control-solid" placeholder="30-35 dakika"
                                               required name="delivery_time" value="{{config('setting.delivery_time')}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Teslimat Ücreti</label>
                                <input type="text" name="delivery_price" class="form-control form-control-solid" value="{{config('setting.delivery_price')}}">
                            </div>

                            <div class="col-md-6 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Ücretsiz Teslimat Limiti</label>
                                <input type="text" name="free_delivery_limit" class="form-control form-control-solid" value="{{config('setting.free_delivery_limit')}}">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Açılış Saati</label>
                                <input type="time" name="open_time" class="form-control form-control-solid" value="{{config('setting.open_time')}}">
                            </div>

                            <div class="col-md-6 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Kapanış Saati</label>
                                <input type="time" name="close_time" class="form-control form-control-solid" value="{{config('setting.close_time')}}">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-5 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Restoran Konumu (Lat)</label>
                                <input type="text" name="restaurant_location_lat" class="form-control form-control-solid" value="{{config('setting.restaurant_location_lat')}}">
                            </div>

                            <div class="col-md-5 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Restoran Konumu (Long)</label>
                                <input type="text" name="restaurant_location_long" class="form-control form-control-solid" value="{{config('setting.restaurant_location_long')}}">
                            </div>
                            <div class="col-md-2 col-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">&nbsp;</label>
                                <p>
                                    <button type="button" class="btn btn-primary" onclick="getLocation()"><i class="fa fa-map-marker-alt"></i></button>
                                    <a target="_blank" id="showMap" class="btn btn-info" href="https://www.google.com/maps/place/{{config('setting.restaurant_location_lat').','.config('setting.restaurant_location_long')}}"><i class="fa fa-map-marked"></i></a>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Bonus Puan (%)</label>
                                <input type="number" min="0" max="100" name="order_bonus" class="form-control form-control-solid" value="{{config('setting.order_bonus')}}">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12 col-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Restoran Adresi</label>
                                <input type="text" name="address" class="form-control form-control-solid" value="{{config('setting.address')}}">
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
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Konum aktif değil !");
            }
        }

        function showPosition(position) {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;

            $('input[name=restaurant_location_lat]').val(lat)
            $('input[name=restaurant_location_long]').val(long)
            $('#showMap').attr('href','https://www.google.com/maps/place/'+lat+','+long)
        }
    </script>
@endsection
