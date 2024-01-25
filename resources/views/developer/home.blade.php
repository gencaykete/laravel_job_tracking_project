@extends('developer.layouts.master')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">

            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

        <div class="content flex-row-fluid" id="kt_content">


            <div class="row g-6 g-xl-9">
                <div class="col-lg-6 col-xxl-4">
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">{{$activeProject}}</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Aktif Proje Sayısı </div>

                            <div class="d-flex">
                                <a href="{{route('developer.project.index')}}" class="btn btn-primary btn-sm me-3">Proje Listesi</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xxl-4">
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">{{$completedProject}}</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Tamamlanan Proje Sayısı </div>

                            <div class="d-flex">
                                <a href="{{route('developer.project.index')}}" class="btn btn-primary btn-sm me-3">Proje Listesi</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xxl-4">
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">{{$canceledProject}}</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">İptal Olan Proje Sayısı </div>

                            <div class="d-flex">
                                <a href="{{route('developer.project.index')}}" class="btn btn-primary btn-sm me-3">Proje Listesi</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <br><br><br><br>



            <div class="row g-6 g-xl-9">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">{{number_format($income)}} TL</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Toplam Gelir</div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                        <div class="bullet bg-primary me-3"></div>
                                        <div class="text-gray-400">Alınan Ödeme </div>
                                        <div class="ms-auto fw-bolder text-gray-700">{{number_format($remain)}} TL</div>
                                    </div>
                                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                        <div class="bullet bg-success me-3"></div>
                                        <div class="text-gray-400">Kalan Ödeme </div>
                                        <div class="ms-auto fw-bolder text-gray-700">{{number_format($income - $remain)}} TL</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">Son Hareketler</div>
                            <br>

                            @foreach($lastActions as $row)
                                <div class="fs-6 d-flex justify-content-between mb-4">
                                    <div class="fw-bold">
                                        {!! $row->projectDeveloper ? '<b class="text-primary">'.$row->projectDeveloper->project->name.'</b> Projesi' : 'Silinmiş Proje' !!} için
                                        @if($row->type == 0)
                                            <b class="text-success">Ödeme Yapıldı</b>
                                        @elseif($row->type == 1)
                                            <b class="text-info">Ekleme Yapıldı</b>
                                        @elseif($row->type == 2)
                                            <b class="text-danger">Kesinti Yapıldı</b>
                                        @endif
                                    </div>
                                    <div class="d-flex fw-bolder">
                                        {{number_format($row->amount)}} TL | {{$row->created_at->format('d.m.Y H:i')}}
                                    </div>
                                </div>

                                <div class="separator separator-dashed"></div>
                            @endforeach


                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection
@section('page-scripts')
    <script>
        let dates=[];
    </script>
@endsection
