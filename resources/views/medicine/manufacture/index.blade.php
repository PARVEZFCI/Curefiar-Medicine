@extends('layouts.app')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Manufactures</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="#" data-target="addModal" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                            <a href="#" data-target="addModal" class="toggle btn theme-btn d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Manufacture</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->

<!-- Manufacture list -->
<div class="nk-block">
     <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manufactures as $key=>$manufacture)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $manufacture->manufacture_name }}</td>
                        <td>
                            {{ $manufacture->phone ?? 'Not Set' }}
                        </td>
                        <td>
                            {{ $manufacture->email ?? 'Not Set' }}
                        </td>
                        <td>
                            <span class="badge badge-dot {{ $manufacture->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                {{ $manufacture->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('manufactures.status', $manufacture->id) }}">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="icon ni ni-loader"></i>
                                </button>
                            </a>
                            <a href="javascript:void(0)" data-target="editModal" class="toggle" onclick="showEditModal({{ $manufacture->id }})">
                                <button class="btn btn-sm btn-info action-btn" >
                                    <i class="icon ni ni-edit"></i>
                                </button>
                            </a>
                            <form method="POST" action="{{ route('manufactures.destroy', $manufacture->id) }}" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure?')">
                                    <i class="icon ni ni-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div><!-- .nk-block -->

<!-- add modal -->
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addModal" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Manufacture</h5>
            <div class="nk-block-des">
                <p>Add information and add new Manufacture.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form method="POST" action="{{ route('manufactures.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Manufacture Name <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="product-title" name="manufacture_name" placeholder="Eg: Square">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Email</label>
                        <div class="form-control-wrap">
                            <input type="email" class="form-control" id="product-title" name="email" placeholder="Eg: a@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Phone</label>
                        <div class="form-control-wrap">
                            <input type="number" class="form-control" id="product-title" name="phone" placeholder="Eg: 5805306">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Address</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" name="address" placeholder="Eg:House No-16, Road No-02, Block-A"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn theme-btn"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>

<!-- edit modal -->
<div class="nk-add-product toggle-slide toggle-slide-right" id="editModal" data-content="editModal" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Edit Manufacture</h5>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="manufacture_edit">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Manufacture Name <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="manufacture_name" name="manufacture_name" placeholder="Eg: Square">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Email</label>
                        <div class="form-control-wrap">
                            <input type="email" class="form-control" id="manufacture_email" name="email" placeholder="Eg: a@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Phone</label>
                        <div class="form-control-wrap">
                            <input type="number" class="form-control" id="manufacture_phone" name="phone" placeholder="Eg: 5805306">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Address</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" id="manufacture_address" name="address" placeholder="Eg:House No-16, Road No-02, Block-A"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button id="submit" class="btn theme-btn"><em class="icon ni ni-plus"></em><span>Update</span></button>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
@endsection
@section('js')
<script src="/backend/js/medicine/manufacture.js"></script>
@endsection