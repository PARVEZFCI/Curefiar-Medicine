@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Area</h3>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item ">Areas</li>
                     </ol>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
	    <div class="card card-preview">
	        <div class="card-inner">
                <form action="{{ route('areas.store') }}" method="POST" class="pt-2 pb-5">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email-address-1">City <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <select name="city" class="form-control">
                                        <option value="" selected disabled>--select city--</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Area <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="e.g. Dhanmondi" name="area_name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
	            <table class="datatable-init table">
	                <thead>
	                    <tr>
	                        <th>#</th>
	                        <th>City</th>
	                        <th>Area</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                        @foreach ($areas as $key=>$area)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $area->city ? $area->city->city_name : '' }}</td>
                            <td>{{ $area->area_name }}</td>
                            <td>
                                <span class="badge badge-dot {{ $area->status == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{  $area->status == 0 ? 'Inactive' : 'Active' }}
                                </span>
	                        </td>
	                        <td>
	                            <form method="POST" action="{{ route('areas.destroy', $area->id) }}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure?')">
                                        <i class="icon ni ni-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('area.status', $area->id) }}">
                                    <button class="btn btn-sm btn-primary action-btn">
                                        <i class="icon ni ni-loader"></i>
                                    </button>
                                </a>
                                <a href="{{ route('areas.edit', $area->id) }}">
	                                <button class="btn btn-sm btn-info action-btn">
	                                    <i class="icon ni ni-edit"></i>
	                                </button>
	                            </a>
	                        </td>
                        </tr>
                        @endforeach
	                </tbody>
	            </table>
	        </div>
	    </div><!-- .card-preview -->
	</div><!-- .nk-block -->
</div>

<!-- add sub category modal -->
<div class="modal fade" id="areaModal" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add area</h5>
                <form action="{{ route('areas.store') }}" method="POST" class="pt-2">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">area <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. Chayan" name="area_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" aria-modal="true" role="dialog" data-content="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Edit area</h5>
                <form>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">area <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" id="area_name" class="form-control" placeholder="e.g. Chayan" name="area_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection