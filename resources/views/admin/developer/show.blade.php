@extends('admin.layouts.master')

@section('title','Yazılımcı Detayı')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-0 mb-lg-n4 pt-5 mt-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Yazılımcı Detayı</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{route('home')}}" class="text-gray-600 text-hover-primary">Anasayfa</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Kullanıcılar</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Yazılımcı Detayı</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-2">

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
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{storage($developer->profile)}}" alt="image"/>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#"
                                   class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{$developer->full_name}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-bold text-muted mb-6">{{$developer->email}}</div>
                                <!--end::Position-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                     href="#kt_customer_view_details" role="button" aria-expanded="false"
                                     aria-controls="kt_customer_view_details">Bilgiler
                                    <span class="ms-2 rotate-180">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
													<span class="svg-icon svg-icon-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="black"/>
														</svg>
													</span>
                                        <!--end::Svg Icon-->
												</span></div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                      title="Kullanıcı Bilgilerini Güncelle">
													<a href="#" class="btn btn-sm btn-light-primary"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#kt_modal_update_customer">Güncelle</a>
												</span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Kullanıcı ID</div>
                                    <div class="text-gray-600">
                                        ID-{{$developer->id}}
                                        @if($developer->status)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Pasif</span>
                                        @endif
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">E-Posta Adresi</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$developer->email}}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Telefon Numarası</div>
                                    <div class="text-gray-600">
                                        {{$developer->phone}}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Cinsiyet</div>
                                    <div class="text-gray-600">{{$developer->gender == 0 ? 'Erkek' : 'Kadın'}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Kayıt Tarihi</div>
                                    <div
                                        class="text-gray-600">{{$developer->created_at->translatedFormat('d F Y H:i')}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Son Güncellenme Tarihi</div>
                                    <div
                                        class="text-gray-600">{{$developer->updated_at->translatedFormat('d F Y H:i')}}</div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="#active_projects">Aktif Projeler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#completed_projects">Tamamlanan Projeler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#canceled_projects">İptal Olan Projeler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                               href="#payments">Yapılan Ödemeler</a>
                        </li>
                        <!--end:::Tab item-->

                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="active_projects" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Aktif Projeler</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->

                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="datatable">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-125px">Proje</th>
                                            <th class="min-w-125px">Tutar</th>
                                            <th class="min-w-125px">Kalan Ödeme</th>
                                            <th class="min-w-125px">Başlangıç Tarihi</th>
                                            <th class="min-w-125px">Bitiş Tarihi</th>
                                            <th class="min-w-125px">İşlemler</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                        @forelse($projects->where('status',1) as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>{{formatPrice($row->calculateDeveloperPrice($developer->id)['total'])}}</td>
                                                <td>{{formatPrice($row->calculateDeveloperPrice($developer->id)['remain'])}}</td>
                                                <td>{{$row->start_date->translatedFormat('d F Y')}}</td>
                                                @if($row->end_date < now())
                                                    <td class="text-danger">{{$row->end_date->translatedFormat('d F Y')}}</td>
                                                @else
                                                    <td>{{$row->end_date->translatedFormat('d F Y')}}</td>
                                                @endif
                                                <td>{!! create_show_button(route('admin.project.show', $row->id)) !!}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Proje bulunamadı !</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                        <div class="tab-pane fade" id="completed_projects" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Tamamlanan Projeler</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->

                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="datatable">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-125px">Proje</th>
                                            <th class="min-w-125px">Tutar</th>
                                            <th class="min-w-125px">Kalan Ödeme</th>
                                            <th class="min-w-125px">Başlangıç Tarihi</th>
                                            <th class="min-w-125px">Bitiş Tarihi</th>
                                            <th class="min-w-125px">İşlemler</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                        @forelse($projects->where('status',2) as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>{{formatPrice($row->calculateDeveloperPrice($developer->id)['total'])}}</td>
                                                <td>{{formatPrice($row->calculateDeveloperPrice($developer->id)['remain'])}}</td>
                                                <td>{{$row->start_date->translatedFormat('d F Y')}}</td>
                                                @if($row->end_date < now())
                                                    <td class="text-danger">{{$row->end_date->translatedFormat('d F Y')}}</td>
                                                @else
                                                    <td>{{$row->end_date->translatedFormat('d F Y')}}</td>
                                                @endif
                                                <td>{!! create_show_button(route('admin.project.show', $row->id)) !!}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Proje bulunamadı !</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="tab-pane fade" id="canceled_projects" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>İptal Olan Projeler</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->

                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="datatable">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-125px">Proje</th>
                                            <th class="min-w-125px">Tutar</th>
                                            <th class="min-w-125px">Kalan Ödeme</th>
                                            <th class="min-w-125px">Başlangıç Tarihi</th>
                                            <th class="min-w-125px">Bitiş Tarihi</th>
                                            <th class="min-w-125px">İşlemler</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                        @forelse($projects->where('status',3) as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>{{formatPrice($row->calculateDeveloperPrice($developer->id)['total'])}}</td>
                                                <td>{{formatPrice($row->calculateDeveloperPrice($developer->id)['remain'])}}</td>
                                                <td>{{$row->start_date->translatedFormat('d F Y')}}</td>
                                                @if($row->end_date < now())
                                                    <td class="text-danger">{{$row->end_date->translatedFormat('d F Y')}}</td>
                                                @else
                                                    <td>{{$row->end_date->translatedFormat('d F Y')}}</td>
                                                @endif
                                                <td>{!! create_show_button(route('admin.project.show', $row->id)) !!}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Proje bulunamadı !</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <div class="tab-pane fade" id="payments" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Ödemeler</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->

                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="datatable">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-125px">Proje</th>
                                            <th class="min-w-125px">Tutar</th>
                                            <th class="min-w-125px">Ödeme Tipi</th>
                                            <th class="min-w-125px">Açıklama</th>
                                            <th class="min-w-125px">Tarih</th>
                                            <th class="min-w-125px">Dekont</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                        @forelse($projectDeveloperPayments as $row)
                                            <tr>
                                                <td>{{$row->projectDeveloper->project->name}}</td>
                                                <td>{{number_format($row->amount)}} TL</td>
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
                                                <td>{{$row->created_at->format('d.m.Y H:i')}}</td>
                                                <td>
                                                    @if($row->file)
                                                        <a href="{{storage($row->file)}}" target="_blank"
                                                           class="btn btn-primary btn-sm">Görüntüle</a>
                                                    @else
                                                        Dekont Yüklenmedi
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Proje bulunamadı !</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>

                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->

            @include('admin.developer.edit')

        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

