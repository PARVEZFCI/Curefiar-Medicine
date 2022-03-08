@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            
            <div class="nk-block-head-content">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Edit Category</h5>
                                </div>
                                <form method="post" action="{{url('admin/product-categories/'.$productCategory->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="email-address-1">Category</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" value="{{$productCategory->name}}" class="form-control" placeholder="Product Category">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="thumb">Image</label>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" multiple="" class="custom-file-input" id="customFile" name="image">
                                                            <label class="custom-file-label" for="thumb">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="avatar-image ">
                                                        <img src="{{url('storage/uploads/product/category/'.$productCategory->image) }}" alt="avatar-image" width="80">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="thumb">Category Banner</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_banner">
                                                        <label class="custom-file-label" for="thumb">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Banner show -->
                                        <div class="avatar-image banner-image">
                                            <img src="{{url('storage/uploads/product/category/'.$productCategory->banner) }}" alt="avatar-image">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="thumb">Category Icon</label>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_icon">
                                                            <label class="custom-file-label" for="thumb">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="avatar-image ">
                                                        <img src="{{url('storage/uploads/product/category/'.$productCategory->icon) }}" alt="avatar-image" width="80">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn theme-btn">
                                                Update Catgory
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6"></div>
                </div>
                    
                
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    

  

</div>


@endsection