<div class="modal native-modal modal-blur" id="variant-list-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header sticky-top">
                <h5 class="modal-title font-weight-bold">
                    Hazır Varyantlar
                </h5>
                <button type="button" class="btn btn-danger btn-brand btn-icon btn-sm" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
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
                                       class="form-control form-control-solid border-info text-info ps-15" placeholder="Varyant Ara"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <div id="table-show_variants_process_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped- table-bordered table-hover dataTable no-footer custom-datatable" role="grid">
                                        <thead>
                                        <tr role="row">
                                            <th>Ürün Adı</th>
                                            <th>Varyant Adı</th>
                                            <th>Varyant Değeleri</th>
                                            <th class="sorting" tabindex="0"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($variants as $row)
                                            <tr role="row" class="odd">
                                                <td>{{$row->product->name ?? 'Silinmiş Ürün'}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    @foreach($row->options as $option)
                                                        {{$option->name}} ({{$option->price}} ₺)<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="showVariantProcessApply('{{$row->name}}', $(this))" data-variants='[
                                                        @foreach($row->options as $row)
                                                        {
                                                            "name": "{{$row->name}}",
                                                                "price": "{{$row->price}}"
                                                            }@if(!$loop->last),@endif
                                                    @endforeach
                                                        ]'>
                                                        <i class="fa fa-check"></i>
                                                        Uygula
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer sticky-bottom">
                <div class="buttons-wrap">
                    <div class="buttons buttons-right">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary btn-sm">
                            <span>
                                <i class="fa fa-times"></i>
                                <span>Vazgeç</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
