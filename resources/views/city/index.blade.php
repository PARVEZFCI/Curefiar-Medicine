@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">City</h3>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item ">Cities</li>
                     </ol>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#cityModal"><em class="icon ni ni-plus"></em><span>Add New City</span></a></li>
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
	                        <th>Name</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                        @foreach ($cities as $key=>$city)
                        <tr>
	                        <th>{{ $key +1 }}</th>
	                        <th>{{ $city->city_name }}</th>
	                        <td>
                                <span class="badge badge-dot {{ $city->status == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{  $city->status == 0 ? 'Inactive' : 'Active' }}
                                </span>
	                        </td>
	                        <td>
	                            <form method="POST" action="{{ route('cities.destroy', $city->id) }}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure?')">
                                        <i class="icon ni ni-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('city.status', $city->id) }}">
                                    <button class="btn btn-sm btn-primary action-btn">
                                        <i class="icon ni ni-loader"></i>
                                    </button>
                                </a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#editModal" onclick="showEditModal({{ $city->id }})">
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
<div class="modal fade" id="cityModal" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add City</h5>
                <form action="{{ route('cities.store') }}" method="POST" class="pt-2">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">City <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" placeholder="e.g. Chayan" name="city_name" required>
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
                <h5 class="title">Edit City</h5>
                <form>
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">City <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" id="city_name" class="form-control" placeholder="e.g. Chayan" name="city_name" required>
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

@section('js')
<script>
    var cityId;
    function showEditModal(id)
    {   
        cityId = id;
        $.get('cities/' + id + '/edit', function (data) {
            $('#city_name').val(data.city_name);
        })
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#submit').click(function(e) {
        e.preventDefault();
        var city_name = $("#city_name").val();
        $.ajax({
            url: 'cities/' + cityId,
            type: "PUT",
            data: {
                city_name: city_name,
            },
            dataType: 'json',
            success: function (data) {
                location.href = '/admin/cities';
            },
            error: function (errors) {
                var errors = errors.responseJSON.errors;
                $.each(errors, function(key,value) {
                    iziToast.warning({
                    title: "Warning"
                    , message: value
                    , position: 'topRight'
                    , });
                });
            } 
        });
    })
</script>
@endsection