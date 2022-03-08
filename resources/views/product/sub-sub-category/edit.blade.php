@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            
            <div class="nk-block-head-content">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Edit Child Category</h5>
                                </div>
                                <form method="post" action="{{url('admin/product-sub-subcategories/'.$productSubSubCategory->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                         <div class="row g-4">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="email-address-1"> Category </label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" onchange="forSubCategory()" id="category_id" data-search="on" name="category_id">
                                                            <option value="{{$productSubSubCategory->category_id}}" selected>{{$productSubSubCategory->productCategories->name}}</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="email-address-1"> Sub Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" data-search="on" name="sub_category_id">
                                                            <option value="{{$productSubSubCategory->sub_category_id}}">{{$productSubSubCategory->productSubCategories->name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="email-address-1">Child Category Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" value="{{$productSubSubCategory->name}}" class="form-control" placeholder="Product Category">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="thumb">Image </label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" multiple="" class="custom-file-input" id="customFile" name="image">
                                                        <label class="custom-file-label" for="thumb">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- image show --}}
                                        <div class="avatar-image" style="height: 200px">
                                            @if($productSubSubCategory->image)
                                            <img src="{{url('storage/uploads/product/category/'.$productSubSubCategory->image) }}" alt="avatar-image" class="img-fluid h-100">
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="thumb">Child Category Banner</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" multiple="" class="custom-file-input" id="customFile" name="sub_cate_banner">
                                                        <label class="custom-file-label" for="thumb">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Banner show -->
                                        <div class="avatar-image banner-image">
                                            @if($productSubSubCategory->banner)
                                            <img src="{{url('storage/uploads/product/category/'.$productSubSubCategory->banner) }}" alt="avatar-image">
                                            @endif
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn theme-btn">Save</button>
                                        </div>
                                          
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4"></div>
                </div>
                    
                
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    

  

</div>


@endsection

@section('js')
<script src="/backend/js/product/productsubsubcat.js"></script>
@endsection