@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Admins</h3>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item ">Admins</li>
                     </ol>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#adminModal"><em class="icon ni ni-plus"></em><span>Add New Admin</span></a></li>
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
                            <th>Name</th>
                            <th>Email</th>
	                        <th>Phone</th>
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
                            <td>Tiger Nixon</td>
	                        <td>Tiger Nixon</td>
	                        <td>
	                            <div class="custom-control custom-switch">
	                                <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off">
	                                <label class="custom-control-label" for="site-off">Offline</label>
	                            </div>
	                        </td>
	                        <td>
	                            <a href="javascript:void(0)">
	                                <button class="btn btn-sm action-btn btn-primary">
	                                    <i class="icon ni ni-loader"></i>
	                                </button>
	                            </a>
	                            <a href="javascript:void(0)">
	                                <button class="btn btn-sm action-btn btn-danger">
	                                    <i class="icon ni ni-trash"></i>
	                                </button>
	                            </a>
	                            <a href="javascript:void(0)">
	                                <button class="btn btn-sm action-btn btn-info">
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

<!-- add sub category modal -->
<div class="modal fade" id="adminModal" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add Admin</h5>
                <form action="#" class="pt-2">
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Admin Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. Chayan" name="admin_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Email</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. admin@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Phone</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. 019748802" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Password</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. Chayan" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Confirm Password</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. Chayan" name="confirm_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Admin Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. Chayan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thumb">Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_banner">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Banner show -->
                    <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div>
                    <div class="form-group">
                        <button data-dismiss="modal" type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Edit Category</h5>
                <form action="#" class="pt-2">
                    <div class="form-group">
                        <label class="form-label">Select Category</label>
                        <div class="form-control-wrap">
                            <select class="form-select" data-search="on" name="category_id">
                                <option value="default_option">Default Option</option>
                                <option value="option_select_name">Option select name</option>
                                <option value="option_select_name">Option select name</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thumb">Category Banner</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_banner">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Banner show -->
                    <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="thumb">Category Icon</label>
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_icon">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                            <!-- blank image -->
                            <div class="avatar-image">
                                <img src="/image.svg" alt="avatar-image" width="80">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subcategory</label>
                        <div class="d-flex gx-3 mb-3">
                            <div class="g w-100">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" value="Figma">
                                </div>
                            </div>
                            <div class="g">
                                <button class="btn btn-icon btn-outline-light"><em class="icon ni ni-cross"></em>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex gx-3 mb-3">
                            <div class="g w-100">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" value="Responsive Design">
                                </div>
                            </div>
                            <div class="g">
                                <button class="btn btn-icon btn-outline-light"><em class="icon ni ni-cross"></em>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex gx-3 mb-3">
                            <div class="g w-100">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" value="Adobe Photoshop">
                                </div>
                            </div>
                            <div class="g">
                                <button class="btn btn-icon btn-outline-light"><em class="icon ni ni-cross"></em>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex gx-3 mb-3">
                            <div class="g w-100">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="e.g. Web Development">
                                </div>
                            </div>
                            <div class="g">
                                <button class="btn btn-icon btn-outline-light"><em class="icon ni ni-plus"></em>
                                </button>
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