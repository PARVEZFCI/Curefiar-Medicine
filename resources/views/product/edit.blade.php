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
	            <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
	                <div class="row g-4">
	                    <div class="col-lg-8">
	                        <div class="form-group">
	                            <label class="form-label" for="full-name-1">Product Name <span class="text-danger">*</span></label>
	                            <div class="form-control-wrap">
	                                <input type="text" value="{{$product->name}}" class="form-control" id="full-name-1" name="name" required>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="full-name-1">Product Unit <span class="text-danger"></span></label>
	                            <div class="form-control-wrap">
	                                <input value="{{$product->product_unit}}" type="text" class="form-control" id="full-name-1" name="product_unit" placeholder="Ex: 10pcs">
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
				                                <option value="{{$product->category_id}}">{{$product->productCategories->name}}</option>
                                                @foreach($categories as $category)
				                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
				                            </select>
				                        </div>
	                                </div>
	                                {{-- <div class="g">
	                                    <button type="button" class="btn btn-icon btn-outline-light theme-btn" data-toggle="modal" data-target="#addCategoryModal"><em class="icon ni ni-plus"></em></button>
	                                </div> --}}
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
					                            <select class="form-select" onchange="forSubSubCategory()" data-search="on" id="sub_category_id" name="sub_category_id">
					                                <option value="{{$product->sub_category_id ? $product->sub_category_id : ""}}">{{$product->sub_category_id ? $product->productSubCategories->name : ""}}</option>
					                            </select>
					                        </div>
                                        </div>
                                        {{-- <div class="g">
                                            <button type="button" class="btn btn-icon btn-outline-light theme-btn" data-toggle="modal" data-target="#subCategoryModal"><em class="icon ni ni-plus"></em></button>
                                        </div> --}}
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
				                                <option value="{{$product->sub_sub_category_id ? $product->sub_sub_category_id : ""}}">{{$product->sub_sub_category_id ? $product->productSubSubCategories->name : "" }}</option>
				                                <option value="option_select_name">Option select name</option>
				                                <option value="option_select_name">Option select name</option>
				                            </select>
				                        </div>
                                    </div>
                                    {{-- <div class="g">
                                        <button type="button" class="btn btn-icon btn-outline-light theme-btn" data-toggle="modal" data-target="#subsubcategoryModal"><em class="icon ni ni-plus"></em></button>
                                    </div> --}}
                                </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Price</label>
	                            <div class="form-control-wrap">
	                                <input type="number" value="{{$product->price}}" class="form-control" id="price" name="price" required placeholder="Ex: 100">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Discount  <span class="text-danger">(%)</span></label>
	                            <div class="form-control-wrap">
	                                <input type="number" onkeyup="calculateDiscount(this.value)" value="{{$product->discount ? $product->discount : ""}}" class="form-control" id="pay-amount-1" id="discount" name="discount" >
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="discount_price">Discount Price</label>
	                            <div class="form-control-wrap">
	                                <input type="number" value="{{$product->discount_price ? $product->discount_price : ""}}" id="discount_price" class="form-control" id="discount_price" name="discount_price" readonly>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- <div class="col-lg-6">
	                        <div class="form-group">
	                            <label class="form-label" for="phone-no-1">Image</label>
	                            <div class="form-control-wrap">
	                                <input type="text" class="form-control" id="phone-no-1" name="image" required>
	                            </div>
	                        </div>
	                    </div> -->
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label class="form-label">Main Image<strong class="text-danger">*</strong></label>
	                            <div class="form-control-wrap">
	                                <div class="custom-file">
	                                    <input type="file" class="custom-file-input" id="customFile" name="photos[]">
	                                    <label class="custom-file-label" for="customFile">Choose file</label>
	                                </div>
	                            </div>
	                        </div>
	                        <div id="product-images">
                                @php 
                                  $image = json_decode($product->image);
                                @endphp 
                                
                                @foreach ($product->productimages as $singleimage)
                            
                                    <img src="{{url('storage/uploads/product/mainproduct/',$singleimage->image) }}" alt="avatar-image" width="150" height="100" style="position: relative;"> &nbsp;
                                    <a href="{{url('admin/deleteimage/'.$singleimage->id)}}" style="position: absolute;
                                    top: 85px;background:white;
                                    margin-left: -20px;"> <i class="fa fa-times text-dark" style="font-size:1rem"></i> </a>
                                    
	                        	
                                @endforeach
                              
                                
		                        
			                </div>
	                        <div class="text-right mt-2">
	                            <button type="button" class="btn btn-info mb-3" onclick="addMoreImage()">Add More</button>
	                        </div>
                    	</div>
                    	<div class="col-md-12">
	                        <div class="form-group">
	                            <label class="form-label">Thmbnail Image<strong class="text-danger">*</strong></label>
	                            <div class="form-control-wrap">
	                                <div class="custom-file">
	                                    <input type="file" value="{{$product->thumbnail_image}}" class="custom-file-input" id="customFile" name="thumbnail">
	                                    <label class="custom-file-label" for="customFile">Choose file</label>
	                                </div>
	                            </div>
	                        </div>
                            @if($product->thumbnail_image)
                            <img src="{{url('storage/uploads/product/'.$product->thumbnail_image) }}" alt="avatar-image" width="150" height="100">
                           @endif
                    	</div>
	                    <div class="col-lg-12">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Description</label>
	                            <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="description" class="tinymce-basic form-control">{{$product->description ? $product->description:"Hello, World!"}}</textarea>
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