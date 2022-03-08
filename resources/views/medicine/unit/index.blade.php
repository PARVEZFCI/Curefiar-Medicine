@extends('layouts.app')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Units</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="#" data-target="addModal" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                            <a href="#" data-target="addModal" class="toggle btn theme-btn d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Unit</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->

<!-- Unit list -->
<div class="nk-block">
    <div class="card card-preview">
        <div class="card-inner table-responsive">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($units as $key=>$unit)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $unit->unit_name }}</td>
                        <td>{{ $unit->symbol ?? 'Not Set' }}</td>
                        <td>
                            <span class="badge badge-dot {{ $unit->status == 0 ? 'badge-danger' : 'badge-success' }}">
                                {{  $unit->status == 0 ? 'Inactive' : 'Active' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('units.status', $unit->id) }}">
                                <button class="btn btn-sm btn-primary action-btn">
                                    <i class="icon ni ni-loader"></i>
                                </button>
                            </a>
                            <a href="javascript:void(0)" data-target="editModal" class="toggle" onclick="showEditModal({{ $unit->id }})">
                                <button class="btn btn-sm btn-info action-btn" >
                                    <i class="icon ni ni-edit"></i>
                                </button>
                            </a>
                            <form method="POST" action="{{ route('units.destroy', $unit->id) }}" class="d-inline-block">
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
            <h5 class="nk-block-title">New Unit</h5>
            <div class="nk-block-des">
                <p>Add information and add new Unit.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form method="POST" action="{{ route('units.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Unit Name <span class="text-danger">*</span> </label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="product-title" name="unit_name" placeholder="E.g: Pices">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Unit Symbol</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="product-title" name="symbol" placeholder="E.g: pcs">
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
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="editModal" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Edit Unit</h5>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="unit_edit">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Unit Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="unit_name" name="unit_name">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Unit Symbol</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="symbol" name="symbol">
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
<script src="/backend/js/medicine/unit.js"></script>
@endsection