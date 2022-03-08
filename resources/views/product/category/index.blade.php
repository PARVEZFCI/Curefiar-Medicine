@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Product Category</h3>
                <div class="nk-block-des text-soft">
                    <p>You have total {{$count}} Categories</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#addCategoryModal"><em class="icon ni ni-plus"></em><span>Add Category</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->


    <div class="nk-block">
        <div class="row g-gs">
            @foreach($productcategoeirs as $key => $productcategory)
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <a href="#" class="d-flex align-items-center">
                                <div class="sq">
                                    <img src="{{$productcategory->icon ? '/storage/uploads/product/category/'.$productcategory->icon : '/image.svg' }}" alt="icon" width="40">
                                </div>
                                <div class="ml-3">
                                    <h6 class="title mb-1">{{$productcategory->name}}</h6>
                                </div>
                            </a>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="{{url('admin/product-categories/'.$productcategory->id.'/edit')}}" ><em class="icon ni ni-edit"></em><span>Edit Category</span></a></li>

                                        <li>
                                            <a href="{{ route('products-categories.status', $productcategory->id) }}" ><i class="icon ni ni-loader"></i><span> {{ $productcategory->status == 1 ? "Active" : "Deactive" }} </span></a>
                                        </li>

                                        <li>
                                            <form method="POST" action="{{ route('product-categories.destroy', $productcategory->id) }}" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn " type="submit"   onclick="return confirm('Are you sure?')"><em class="icon ni ni-delete" ></em><span>Delete Category</span></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- banner -->
                        <img src="{{$productcategory->banner ? '/storage/uploads/product/category/'.$productcategory->banner : '/image.svg' }}" alt="banner" class="mb-2 h-90 w-100">
                       
                    </div>
                </div>
            </div>
            @endforeach
        </div>
     
    </div><!-- .nk-block -->

</div>


<!-- add category modal -->
@include('partials.modals.add-category-modal')

<!-- edit modal -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Edit Category</h5>
                <form action="#" class="pt-2">
                    <div class="form-group">
                        <label class="form-label" for="edit-full-name">Category Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="name" id="productcatname" >
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
                    {{-- <div class="form-group">
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
                    </div> --}}
                    <div class="form-group">
                        <button  type="submit" id="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/backend/js/product/productcategory.js"></script>
@endsection