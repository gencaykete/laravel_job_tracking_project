<div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{route('admin.customer.update',$customer->id)}}" method="post" id="kt_modal_update_customer_form"
                  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">#{{$customer->id}} | Yazılımcı Güncelle</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->

                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                         data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">

                        <!--end::User toggle-->
                        <!--begin::User form-->
                        <div id="kt_modal_update_customer_user_info" class="collapse show">
                            <!--begin::Input group-->
                            <div class="row">
                                <div class="fv-row mb-7 col-md-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Ad</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="name"
                                           value="{{$customer->name}}"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Soyad</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="surname"
                                           value="{{$customer->surname}}"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row">
                                <div class="fv-row mb-7 col-md-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">E-Posta</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" placeholder="" name="email"
                                           value="{{$customer->email}}"/>
                                    <!--end::Input-->
                                </div>

                                <div class="fv-row mb-7 col-md-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Profil Resmi</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid" placeholder="" name="profile"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row">
                                <div class="fv-row mb-7 col-md-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Telefon</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" data-mask="phone" name="phone"
                                           value="{{$customer->phone}}"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6">
                                    <label class="required fs-5 fw-bold mb-2">Durum</label>
                                    <select name="status" class="form-select" data-placeholder="Durum" data-control="select2" data-hide-search="true" title="Durum">
                                        <option></option>
                                        <option value="0" @selected($customer->status==0)>Pasif</option>
                                        <option value="1" @selected($customer->status==1)>Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Parola</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" class="form-control form-control-solid"
                                       placeholder="Güncellemek istemiyorsanız boş bırakın." name="password" value=""/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::User form-->

                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3">İptal</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">Kaydet</span>
                        <span class="indicator-progress">Lütfen Bekleyin...
													<span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
