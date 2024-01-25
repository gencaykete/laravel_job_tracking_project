@extends('admin.layouts.master')

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
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#kt_ecommerce_sales_order_history">İşlemler</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    @if($project->status == 1)
                        <a href="javascript:void(0)"
                           onclick="confirmToSweetAlert('Projei tamamlamak istediğinize emin misiniz?','{{route('admin.project.status.change', [$project->id, 2])}}')"
                           class="btn btn-success btn-sm me-lg-n7">Projei Tamamla</a>
                    @endif

                    @if($project->status == 2 || $project->status == 3)
                        <a href="javascript:void(0)"
                           onclick="confirmToSweetAlert('Projei tekrar aktif etmek istediğinize emin misiniz?','{{route('admin.project.status.change', [$project->id, 1])}}')"
                           class="btn btn-success btn-sm me-lg-n7">Tekrar Aktif Et</a>
                    @endif

                    @if($project->status == 1)
                        <a href="javascript:void(0)"
                           onclick="confirmToSweetAlert('Projei iptal etmek istediğinize emin misiniz?','{{route('admin.project.status.change', [$project->id, 3])}}')"
                           class="btn btn-danger btn-sm me-lg-n7">Projei İptal Et</a>
                    @endif
                    <a href="{{route('admin.project.edit',$project->id)}}" class="btn btn-primary btn-sm me-lg-n7">Projei
                        Güncelle <i class="fa fa-pen"></i></a>
                    <!--end::Button-->
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
                                    <!--begin::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                Başlangıç Tarihi
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$project->start_date->translatedFormat('d F Y')}}</td>
                                    </tr>
                                    <!--end::Date-->
                                    <!--begin::Payment method-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--end::Svg Icon-->Bitiş Tarihi
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">{{$project->end_date->translatedFormat('d F Y')}}</td>
                                    </tr>
                                    <!--end::Payment method-->
                                    <!--begin::Payment method-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--end::Svg Icon-->Kalan Gün
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            @if (now() > $project->end_date)
                                                <b class="text-danger">-{{now()->diffInDays($project->end_date)}} Gün</b>
                                            @elseif (now()->diffInDays($project->end_date) <= 15)
                                                <b class="text-info">{{now()->diffInDays($project->end_date)}} Gün !</b>
                                            @else
                                                <b class="text-info">{{now()->diffInDays($project->end_date)}} Gün</b>
                                            @endif
                                        </td>
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
                    <!--begin::Customer details-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Müşteri Bilgileri</h2>
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
                                    <!--begin::Customer name-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                                              fill="black"/>
																		<path
                                                                            d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                                            fill="black"/>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->Ad & Soyad
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <!--begin::Name-->
                                                @if($project->customer_id)
                                                    <a href="{{route('admin.customer.edit',$project->customer_id)}}"
                                                       class="text-gray-600 text-hover-primary">{{$project->customer ? $project->customer->name.' '.$project->customer->surname : null}}</a>
                                            @else
                                                {{$project->customer ? $project->customer->name.' '.$project->customer->surname : null}}
                                            @endif
                                            <!--end::Name-->
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Customer name-->
                                    <!--begin::Customer email-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                              fill="black"/>
																		<path
                                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                            fill="black"/>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->E-Posta
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            {{$project->customer ? $project->customer->email : null}}
                                        </td>
                                    </tr>
                                    <!--end::Payment method-->
                                    <!--begin::Date-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                                <span class="svg-icon svg-icon-2 me-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z"
                                                                            fill="black"/>
																		<path opacity="0.3" d="M19 4H5V20H19V4Z"
                                                                              fill="black"/>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->Telefon
                                            </div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="tel:{{($project->customer?->phone)}}">{{formatPhone($project->customer?->phone)}}</a>
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
                    <!--end::Customer details-->
                    <!--begin::Documents-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>
                                    Ödeme Bilgileri
                                    <a href="{{route('admin.project-customer-payment.index',['project_id' => $project->id])}}"
                                       class="btn btn-primary btn-icon btn-sm">
                                        <i class="fa fa-list"></i>
                                    </a>
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
                                               class="text-gray-600 text-hover-primary">{{number_format($project->price)}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <!--end::Invoice-->
                                    <!--begin::Shipping-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center text-success">Alınan</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($project->customerPayments('received'))}}
                                                ₺</a>
                                        </td>
                                    </tr>
                                    <!--end::Shipping-->
                                    <!--begin::Rewards-->
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">Kalan</div>
                                        </td>
                                        <td class="fw-bolder text-end">
                                            <a href="#" target="_blank"
                                               class="text-gray-600 text-hover-primary">{{number_format($project->customerPayments('remain'))}}
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
                                        <h2>Yazılımcı Listesi</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                            <a href="{{route('admin.project-developer.create',['project_id'=>$project->id])}}">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_add_customer">Yazılımcı Ekle
                                                </button>
                                            </a>
                                            <!--end::Add customer-->
                                        </div>
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
                                                <th class="min-w-175px">Ad & Soyad</th>
                                                <th class="min-w-100px">Tutar</th>
                                                <th class="min-w-100px">Ödenen</th>
                                                <th class="min-w-100px">Ekleme</th>
                                                <th class="min-w-100px">Kesinti</th>
                                                <th class="min-w-100px">Kalan</th>
                                                <th class="min-w-100px">İşlemler</th>
                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                            <!--begin::Products-->
                                            @forelse($project->developers as $row)
                                                <tr>
                                                    <td>{{$row->developer ? $row->developer->name.' '.$row->developer->surname : 'Silinmiş Yazılımcı'}}</td>
                                                    <td>{{number_format($row->price)}} ₺</td>
                                                    <td class="text-warning">{{number_format($row->payments->where('type',0)->sum('amount'))}}
                                                        ₺
                                                    </td>
                                                    <td class="text-success">{{number_format($row->payments->where('type',1)->sum('amount'))}}
                                                        ₺
                                                    </td>
                                                    <td class="text-danger">{{number_format($row->payments->where('type',2)->sum('amount'))}}
                                                        ₺
                                                    </td>
                                                    <td class="text-info">{{number_format($row->price + $row->payments->where('type',1)->sum('amount') - $row->payments->where('type',0)->sum('amount') - $row->payments->where('type',2)->sum('amount'))}}
                                                        ₺
                                                    </td>
                                                    <td>
                                                        {!! html()->a(route('admin.project-developer-payment.index',['project_developer_id'=>$row->id]), html()->i('')->class('fa fa-list'))->class('btn btn-icon btn-brand btn-info btn-sm me-1 ') !!}
                                                        {!! html()->a(route('admin.project-developer.edit',$row->id), html()->i('')->class('fa fa-pen'))->class('btn btn-icon btn-brand btn-sm me-1 ') !!}
                                                        {!! html()->a(route('admin.project-developer.destroy',$row->id), html()->i('')->class('fa fa-trash'))->class('btn btn-icon btn-brand btn-danger btn-sm me-1 ') !!}
                                                    </td>
                                                </tr>

                                                @if($loop->last)
                                                    <tr>
                                                        <td colspan="7" class="text-end">Yapılan
                                                            Ödeme: {{number_format($project->payments('paid'))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" class="text-end">Kalan
                                                            Ödeme: {{number_format($project->payments('remain'))}}</td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Henüz yazılımcı atamadınız</td>
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

