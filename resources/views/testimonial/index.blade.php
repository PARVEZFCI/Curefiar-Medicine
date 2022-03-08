@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Customer Review</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#addReview"><em class="icon ni ni-plus"></em><span>Add Customer Review</span></a></li>
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
                            <th>Review</th>
                            <th>Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientReviews as $key => $review)
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <td>
                                <img src="{{ $review->image ? '/storage/uploads/client/' . $review->image : '/image.svg'}}" alt="avatar-image" width="70">
                            </td>
                            <td>{{ $review->name }}</td>
                            <td>
                                {{$review->comment}}
                            </td>
                            <td>
                                <span class="badge badge-dot {{ $review->status == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{  $review->status == 0 ? 'Inactive' : 'Active' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('testimonials.status', $review->id) }}">
                                    <button class="btn btn-sm btn-primary action-btn">
                                        <i class="icon ni ni-loader"></i>
                                    </button>
                                </a>
                                {{-- <a href="javascript:void(0)" data-target="editModal" class="toggle" onclick="showEditModal({{ $review->id }})">
                                    <button class="btn btn-sm btn-info action-btn" >
                                        <i class="icon ni ni-edit"></i>
                                    </button>
                                </a> --}}
                                <form method="POST" action="{{ route('testimonials.destroy', $review->id) }}" class="d-inline-block">
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

</div>

<!-- edit modal -->
<div class="modal fade" id="addReview">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add Review</h5>
                <form action="{{ route('testimonials.store') }}" method="POST" class="pt-2" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="thumb">Client Name</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="text" multiple="" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Client Opinion</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" name="comment">
                                
                            </textarea>
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
@endsection