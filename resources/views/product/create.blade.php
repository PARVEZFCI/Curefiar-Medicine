@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Add New Product</h3>
                <div class="breadcrumb-list">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="https://emart.mediacity.co.in/demo/public/myadmin">Dashboard</a></li>
	                    <li class="breadcrumb-item ">Product</li>
	                    <li class="breadcrumb-item active">Add New Product</li>
					 </ol>
	            </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="{{ route('products.index') }}" class="btn theme-btn"><em class="icon ni ni-list"></em><span>Product List</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    <div class="nk-block">
	    <div class="card">
	        <div class="card-inner">
	            <div class="card-head">
	                <h5 class="card-title">Add Product</h5>
	            </div>
	            <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
	                <div class="row g-4">
	                    <div class="col-lg-8">
	                        <div class="form-group">
	                            <label class="form-label" for="full-name-1">Product Name <span class="text-danger">*</span></label>
	                            <div class="form-control-wrap">
	                                <input type="text" class="form-control" id="full-name-1" name="name" required>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="full-name-1">Product Unit <span class="text-danger"></span></label>
	                            <div class="form-control-wrap">
	                                <input type="text" class="form-control" id="full-name-1" name="product_unit" placeholder="Ex: 10pcs">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="email-address-1">Category</label>
	                            <div class="d-flex gx-3" >
	                                <div class="g w-100">
	                                    <div class="form-control-wrap">
				                            <select class="form-select" onchange="forSubCategory()"  data-search="on" id="category_id" name="category_id">
				                                <option value=" " selected disabled>--select category--</option>
                                                @foreach($categories as $category)
				                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
				                            </select>
				                        </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="email-address-1">SubCategory</label>
	                            <div class="form-control-wrap">
                                    <div class="d-flex gx-3" >
                                        <div class="g w-100">
                                            <div class="form-control-wrap">
					                            <select class="form-select" onchange="forSubSubCategory()" data-search="on" id="sub_category_id" name="sub_category_id">					         </select>
					                        </div>
                                        </div>
                                    </div>
                                </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="email-address-1">ChildCategory</label>
	                            <div class="d-flex gx-3" >
                                    <div class="g w-100">
                                        <div class="form-control-wrap">
				                            <select class="form-select" data-search="on" name="sub_sub_category_id">
				                            </select>
				                        </div>
                                    </div>
                                </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Price</label>
	                            <div class="form-control-wrap">
	                                <input type="number" class="form-control" id="price" name="price" required placeholder="Ex: 100">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Discount <span class="text-danger">(%)</span></label>
	                            <div class="form-control-wrap">
	                                <input type="number" onkeyup="calculateDiscount(this.value)" class="form-control"  id="discount" name="discount" >
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Discount Price</label>
	                            <div class="form-control-wrap">
	                                <input type="text" id="discount_price" class="form-control"  name="discount_price" readonly>
	                            </div>
	                        </div>
	                    </div>
                    	<div class="col-md-12">
	                        <div class="form-group">
	                            <label class="form-label">Main Image<strong class="text-danger">*</strong></label>
	                            <div class="form-control-wrap">
	                                <div class="custom-file">
	                                    <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
	                                    <label class="custom-file-label" for="customFile">Choose file</label>
	                                </div>
	                            </div>
	                        </div>
                    	</div>
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label class="form-label">Thumbnail Image<strong class="text-danger">*</strong></label>
	                            <div class="form-control-wrap">
	                                <div class="custom-file">
	                                    <input type="file" class="custom-file-input" id="customFile" name="photos[]">
	                                    <label class="custom-file-label" for="customFile">Choose file</label>
	                                </div>
	                            </div>
	                        </div>
	                        <div id="product-images">
		                        
			                </div>
	                        <div class="text-right mt-2">
	                            <button type="button" class="btn btn-info mb-3" onclick="addMoreImage()">Add More</button>
	                        </div>
                    	</div>
	                    <div class="col-lg-12">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Description</label>
	                            <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="description" class="tinymce-basic form-control">Hello, World!</textarea>
                                    </div>
                                </div>
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
	                        </div>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div><!-- .nk-block -->
</div>


<!-- add category modal -->
{{-- @include('partials.modals.add-category-modal') --}}

<!-- add sub category modal -->
{{-- @include('partials.modals.add-sub-category-modal') --}}

<!-- add sub sub category modal -->
{{-- @include('partials.modals.add-chlid-category-modal') --}}

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
@section('js')
<script src="/backend/js/tinymce.js?ver=2.8.0"></script>
<script src="/backend/js/editors.js?ver=2.8.0"></script>

<script src="/backend/js/product/productsubsubcat.js"></script>
<script src="/backend/js/product/product.js"></script>

<script>
    function addMoreImage(){
       var photoAdd =  '<div class="row">';
        photoAdd +=  '<div class="col-10 mt-2">';
        photoAdd +=  '<div class="form-control-wrap">';
        photoAdd +=  '<div class="custom-file">';
        photoAdd +=  '<input type="file" class="custom-file-input" id="customFile" name="photos[]">';
        photoAdd +=  ' <label class="custom-file-label" for="customFile">Choose file</label>';
        photoAdd +=  '</div>';
        photoAdd +=  '</div>';
        photoAdd +=  '</div>';
        photoAdd +=  '<div class="col-2 mt-2 text-center">';
        photoAdd +=  '<button type="button" onclick="deleteThisRow(this)" class="btn btn-sm btn-danger text-white"><i class="icon ni ni-minus-circle"></i></button>';
        photoAdd +=  '</div>';
        photoAdd +=  '</div>';
        $('#product-images').append(photoAdd);
    }
    function deleteThisRow(em){
        $(em).closest('.row').remove();
    }
</script>
@endsection