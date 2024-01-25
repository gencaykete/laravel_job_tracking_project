@extends('developer.layouts.master')

@section('title','Proje Bilgileri | #'.$project->name)

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-5 mt-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Proje Bilgileri</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="" class="text-gray-600 text-hover-primary">Projeler</a>
                    </li>
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Proje Bilgileri</li>
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
            <!--begin::Order details page-->
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-lg-n2 me-auto">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="#kt_ecommerce_sales_order_summary">Proje Bilgileri</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->

                        <!--end:::Tab item-->
                    </ul>

                </div>
                <!--begin::Order summary-->
                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                    <!--begin::Order details-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Proje Bilgileri (#{{$project->name}})</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                Proje Adı
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$project->name}}</td>
                                    </tr>
                                    <!--begin::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                Başlangıç Tarihi
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$developer->start_date->translatedFormat('d F Y')}}</td>
                                    </tr>
                                    <!--end::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--end::Svg Icon-->Kalan Gün
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            @if (now() > $developer->end_date)
                                                <b class="text-danger">-{{now()->diffInDays($developer->end_date)}} Gün</b>
                                            @elseif (now()->diffInDays($developer->end_date) <= 15)
                                                <b class="text-info">{{now()->diffInDays($developer->end_date)}} Gün !</b>
                                            @else
                                                <b class="text-info">{{now()->diffInDays($developer->end_date)}} Gün</b>
                                            @endif
                                        </td>
                                    </tr>
                                    <!--begin::Payment method-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--end::Svg Icon-->Bitiş Tarihi
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$developer->end_date->translatedFormat('d F Y')}}</td>
                                    </tr>
                                    <!--end::Payment method-->
                                    <!--begin::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--end::Svg Icon-->Durum
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            {!! $project->status('html') !!}
                                        </td>
                                    </tr>
                                    <!--end::Date-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Order details-->
                    <!--begin::Documents-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>
                                    Ödeme Bilgileri
                                </h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <!--begin::Invoice-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">Tutar</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($developer->price)}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center text-success">Alınan</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($developer->payments->where('type',0)->sum('amount'))}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">Ekleme</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($developer->payments->where('type',1)->sum('amount'))}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">Kesinti</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($developer->payments->where('type',2)->sum('amount'))}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">Kalan</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($developer->price + $developer->payments->where('type',1)->sum('amount') - $developer->payments->where('type',0)->sum('amount') - $developer->payments->where('type',2)->sum('amount'))}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <!--end::Rewards-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Documents-->
                </div>
                <!--end::Order summary-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                        <!--begin::Orders-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Ödeme Listesi</h2>
                                    </div>

                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th>Tutar</th>
                                                <th>Tür</th>
                                                <th>Açıklama</th>
                                                <th>Dekont</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                            <!--begin::Products-->
                                            @forelse($developer->payments as $row)
                                                <tr>
                                                    <td>{{$row->amount}}</td>
                                                    <td>
                                                        @if ($row->type == 0)
                                                            {!! html()->span("Ödeme Yapıldı")->class('badge badge-success') !!}
                                                        @endif

                                                        @if ($row->type == 1)
                                                            {!! html()->span("Ekleme Yapıldı")->class('badge badge-info') !!}
                                                        @endif

                                                        @if ($row->type == 2)
                                                            {!! html()->span("Kesinti Yapıldı")->class('badge badge-danger') !!}
                                                        @endif
                                                    </td>
                                                    <td>{{$row->description}}</td>
                                                    <td>
                                                        @if($row->file)
                                                            <a href="{{storage($row->file)}}" target="_blank" class="btn btn-primary btn-sm">Görüntüle</a>
                                                        @else
                                                            Dekont Yüklenmedi
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Henüz ödeme eklenmedi</td>
                                                </tr>
                                            @endforelse


                                            <!--end::Grand total-->
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Product List-->
                        </div>
                        <!--end::Orders-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_sales_order_history" role="tab-panel">
                        <!--begin::Orders-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::Order history-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>İşlem Geçmişi</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-100px">İşlem</th>
                                                <th class="min-w-175px">Tarih</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                            {{--@forelse($project->actions as $row)
                                                <tr>
                                                    <td>{{$row->text}}</td>
                                                    <td>{{$row->created_at->translatedFormat('d F Y H:i')}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center">Henüz işlem yapılmadı.</td>
                                                </tr>
                                            @endforelse--}}
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Order history-->
                        </div>
                        <!--end::Orders-->
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Order details page-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

