<!--begin::Root-->
<div class="d-flex flex-column <!--flex-root-->">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                 data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Header top-->
                <div class="header-top d-flex align-items-stretch flex-grow-1">
                    <!--begin::Container-->
                    <div class="d-flex align-items-stretch admin-header" style="margin:0 auto;padding-top:30px">
                        <!--begin::Brand-->
                        <div class="d-flex align-items-center align-items-lg-stretch me-5 flex-row-fluid">
                            <!-- <button class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2" id="kt_header_navs_toggle">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
                                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </button> -->
                            <!--end::Heaeder navs toggle-->
                            <!--begin::Heaeder navs toggle-->

                            <button
                                class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2"
                                id="kt_header_navs_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
											<path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="currentColor"/>
											<path opacity="0.3"
                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                  fill="currentColor"/>
										</svg>
									</span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Heaeder navs toggle-->
                            <!--begin::Logo-->
                            <a href="{{route('admin.home')}}" class="d-flex align-items-center">
                                <img alt="Logo" src="/backend/assets/media\logo.png" class="h-40px h-lg-80px mt-3 mb-3"
                                     style="border-radius: 15px"/>
                            </a>
                            <!--end::Logo-->
                            <!--begin::Tabs wrapper-->
                            <div class="align-self-end overflow-auto" id="kt_brand_tabs">
                                <!--begin::Header tabs wrapper-->
                                <div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs"
                                     data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                     data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                                    <!--begin::Header tabs-->
                                    <ul class="nav flex-nowrap text-nowrap" id="headerNav">
                                        <li class="nav-item">
                                            <a class="nav-link @if(request()->routeIs('admin.home')) active @endif"
                                               data-bs-toggle="" href="{{route('admin.home')}}">Anasayfa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if(request()->routeIs('admin.project.*')) active @endif"
                                               data-bs-toggle="" href="{{route('admin.project.index',['status' => 1])}}">Proje İşlemleri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if(request()->routeIs('admin.developer.*')) active @endif"
                                               data-bs-toggle="" href="{{route('admin.developer.index')}}">Yazılımcı İşlemleri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if(request()->routeIs('admin.customer.*')) active @endif"
                                               data-bs-toggle="" href="{{route('admin.customer.index')}}">Müşteri İşlemleri</a>
                                        </li>

<!--                                        <li class="nav-item">
                                            <a class="nav-link @if(request()->routeIs('admin.setting.*')) active @endif"
                                               data-bs-toggle="tab" href="#settings_tab">Ayarlar</a>
                                        </li>-->
                                    </ul>
                                    <!--begin::Header tabs-->
                                </div>
                                <!--end::Header tabs wrapper-->
                            </div>
                            <!--end::Tabs wrapper-->
                        </div>
                        <!--end::Brand-->
                        <div class="d-flex align-items-center flex-row-auto">

                            <!--begin::Activities-->
                            @can('show logs')
                                <div class="d-flex align-items-center ms-1">
                                    <!--begin::Drawer toggle-->
                                    <div
                                        class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px"
                                        id="kt_activities_toggle">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
												<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor"/>
												<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                      fill="currentColor"/>
												<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor"/>
												<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor"/>
											</svg>
										</span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Drawer toggle-->
                                </div>
                        @endif
                        <!--end::Activities-->


                            <div class="d-flex align-items-center ms-1 d-none">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                   class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px"
                                   data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                   data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                    <i class="fonticon-sun fs-2"></i>
                                    <i class="fonticon-moon fs-2 d-none"></i>
                                </a>
                                <!--begin::Menu toggle-->
                                <!--begin::Menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-primary fw-bold py-4 fs-6 w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-1">
                                        <a href="#" class="menu-link px-3 active">
												<span class="menu-icon">
													<i class="fonticon-sun fs-2"></i>
												</span>
                                            <span class="menu-title">Light</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-1">
                                        <a href="#" class="menu-link px-3">
												<span class="menu-icon">
													<i class="fonticon-moon fs-2"></i>
												</span>
                                            <span class="menu-title">Dark</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Theme mode-->
                            <!--begin::User-->
                            <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                                <!--begin::User info-->
                                <div
                                    class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3"
                                    data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <!--begin::Name-->
                                    <div
                                        class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                                        <span
                                            class="text-white opacity-75 fs-8 fw-bold lh-1 mb-1">{{auth()->user()->name.' '.auth()->user()->surname}}</span>
                                        <span class="text-white fs-8 fw-bolder lh-1">Yönetici</span>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px symbol-md-40px">
                                        <img src="/backend/assets/media/logo.png" alt="image"/>
                                    </div>
                                    <!--end::Symbol-->
                                </div>
                                <!--end::User info-->
                                <!--begin::User account menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="/backend/assets/media/logo.png"/>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div
                                                    class="fw-bolder d-flex align-items-center fs-5">{{auth()->user()->name.' '.auth()->user()->surname}}
                                                </div>
                                                <a href="#"
                                                   class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="" class="menu-link px-5">Profilim</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <!--end::Menu item-->

                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="javascript:void(0)" onclick="$('#logout-form').submit()"
                                           class="menu-link px-5">Çıkış Yap</a>
                                    </div>
                                    <form action="{{route('admin.logout')}}" method="post" id="logout-form">@csrf</form>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                </div>
                                <!--end::User account menu-->
                            </div>
                            <!--end::User -->
                            <!--begin::Heaeder menu toggle-->
                            <!--end::Heaeder menu toggle-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0"
                     id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                     data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true" data-kt-swapper-mode="append"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
                    <div class="d-lg-flex container-xxl w-100">
                        <div class="d-lg-flex flex-column justify-content-lg-center w-100" id="kt_header_navs_wrapper">
                            <div class="tab-content" data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto"
                                 data-kt-scroll-offset="70px">


                                <div class="tab-pane fade @if(request()->routeIs('admin.setting.*')) active show @endif" id="settings_tab">
                                    <div class="header-menu flex-column align-items-stretch flex-lg-row">
                                        <div
                                            class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold align-items-stretch flex-grow-1"
                                            id="#kt_header_menu" data-kt-menu="true">

                                            <a href="{{route('admin.setting.global')}}">
                                                <div data-kt-menu-placement="bottom-start"
                                                     class="menu-item @if(request()->routeIs('admin.setting.global')) here show @endif menu-lg-down-accordion me-lg-1">
														<span class="menu-link py-3">
															<span class="menu-title">Site Ayarları</span>
															<span class="menu-arrow d-lg-none"></span>
														</span>
                                                </div>
                                            </a>

                                            <a href="{{route('admin.setting.order')}}">
                                                <div data-kt-menu-placement="bottom-start"
                                                     class="menu-item @if(request()->routeIs('admin.setting.order')) here show @endif menu-lg-down-accordion me-lg-1">
														<span class="menu-link py-3">
															<span class="menu-title">Sipariş Ayarları</span>
															<span class="menu-arrow d-lg-none"></span>
														</span>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end::Header tab content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header navs-->
            </div>
            <!--end::Header-->

            <!--begin::Activities drawer-->
            @can('show logs')
                <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
                     data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
                    <div class="card shadow-none rounded-0">
                        <!--begin::Header-->
                        <div class="card-header" id="kt_activities_header">
                            <h3 class="card-title fw-bolder text-dark">Log Tablosu</h3>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                                        id="kt_activities_close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                  transform="rotate(-45 6 17.3137)" fill="currentColor"/>
											<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                  transform="rotate(45 7.41422 6)" fill="currentColor"/>
										</svg>
									</span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body position-relative" id="kt_activities_body">
                            <!--begin::Content-->
                            <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5"
                                 data-kt-scroll="true" data-kt-scroll-height="auto"
                                 data-kt-scroll-wrappers="#kt_activities_body"
                                 data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                                 data-kt-scroll-offset="5px">
                                <!--begin::Timeline items-->
                                <div class="timeline">
                                    <!--begin::Timeline item-->
                                    @foreach(\Spatie\Activitylog\Models\Activity::latest()->get() as $row)
                                        <div class="timeline-item">
                                            <!--begin::Timeline line-->
                                            <div class="timeline-line w-40px"></div>
                                            <!--end::Timeline line-->
                                            <!--begin::Timeline icon-->
                                            <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                                <div class="symbol-label bg-light">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<path opacity="0.3"
                                                              d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                              fill="currentColor"/>
														<path
                                                            d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                            fill="currentColor"/>
													</svg>
												</span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                            </div>
                                            <!--end::Timeline icon-->
                                            <!--begin::Timeline content-->
                                            <div class="timeline-content mb-10 mt-n1">

                                                <!--begin::Timeline details-->
                                                <div class="overflow-auto pb-5">

                                                    <!--begin::Record-->
                                                    <div
                                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
                                                        <!--begin::Title-->
                                                        <a href="javascript:void(0)"
                                                           class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">{{$row->description}} </a>
                                                        <!--end::Title-->
                                                        <!--begin::Label-->

                                                        <!--end::Label-->
                                                        <!--begin::Users-->

                                                        <!--begin::Progress-->
                                                        <div class="min-w-125px">
                                                            {{$row->created_at->format('d.m.Y H:i')}}
                                                        </div>
                                                        <!--end::Progress-->
                                                        <!--begin::Action-->
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-sm btn-light btn-active-light-primary">
                                                            {{$row->causer ? $row->causer->name.' '.$row->causer->surname : 'Silinmiş Kullanıcı'}}
                                                        </a>
                                                        <!--end::Action-->
                                                    </div>
                                                    <!--end::Record-->
                                                </div>
                                                <!--end::Timeline details-->
                                            </div>
                                            <!--end::Timeline content-->
                                        </div>
                                @endforeach
                                <!--end::Timeline item-->
                                </div>
                                <!--end::Timeline items-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Body-->

                    </div>
                </div>
        @endcan
        <!--end::Activities drawer-->
        </div>
    </div>
</div>

