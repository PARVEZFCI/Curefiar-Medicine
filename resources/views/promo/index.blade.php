@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Promo</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#addPromo"><em class="icon ni ni-plus"></em><span>Add Promo</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-preview">
            <div class="card-inner">
                <table class="datatable-init table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>
                                <img src="/image.svg" alt="avatar-image" width="70">
                            </td>
                            <td>Tiger Nixon</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off">
                                    <label class="custom-control-label" for="site-off">Offline</label>
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0)">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="icon ni ni-loader"></i>
                                    </button>
                                </a>
                                <a href="javascript:void(0)">
                                    <button class="btn btn-sm btn-danger">
                                        <i class="icon ni ni-trash"></i>
                                    </button>
                                </a>
                                <a href="javascript:void(0)">
                                    <button class="btn btn-sm btn-info">
                                        <i class="icon ni ni-edit"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div><!-- .nk-block -->
</div>

<!-- add promo modal -->
<div class="modal fade" id="addPromo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add Promo</h5>
                <form action="#" class="pt-2">
                    <div class="form-group">
                        <label class="form-label" for="thumb">Promo Banner</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="promo_banner" required>
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Banner show -->
                    <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="thumb">Promo Url</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="text" name="promo_url" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button data-dismiss="modal" type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection