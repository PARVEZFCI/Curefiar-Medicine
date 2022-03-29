@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Offer</h3>
                <div class="breadcrumb-list">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	                    <li class="breadcrumb-item ">Offers</li>
					 </ol>
	            </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#addOffer"><em class="icon ni ni-plus"></em><span>Add Offer</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">
            @foreach($productoffers as $productoffer)
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <a href="#" class="d-flex align-items-center">
                                <div class="">
                                    <h6 class="title mb-1">{{$productoffer->title}}</h6>
                                </div>
                            </a>
                            {{-- <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off">
                                <label class="custom-control-label" for="site-off"></label>
                            </div> --}}
                            {{-- <li>
                                
                            </li> --}}
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        {{-- <li><a href="#" data-toggle="modal" data-target="#modalEdit"><em class="icon ni ni-edit"></em><span>Edit Category</span></a></li> --}}
                                        <li>
                                            <a href="{{ route('offers.status', $productoffer->id) }}" ><i class="icon ni ni-loader"></i><span> {{ $productoffer->status == 1 ? "Active" : "Deactive" }} </span></a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('offers.destroy', $productoffer->id) }}" class="d-inline-block">
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
                        <img src="{{$productoffer->image ? '/storage/uploads/offer/'.$productoffer->image : '/image.svg' }}" alt="banner" class="mb-2 h-90 w-100">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div><!-- .nk-block -->
</div>

<div class="modal fade" id="addOffer">
    <div class="modal-dialog modal-lg" style="max-width: 750px;" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <form enctype="multipart/form-data" action="{{url('admin/offers')}}" method="post">
                @csrf
            <div class="modal-body modal-body-md">
                <h5 class="title">Add Offer</h5>
                <form action="#" class="pt-2">
                    <div class="form-group">
                        <label class="form-label" for="edit-full-name">Offer Title</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="edit-full-name" placeholder="offer title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thumb">Offer Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="offer_img">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div> 
                    <!-- Banner show -->
                    <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div>
                    {{-- <div class="form-group">
                        <label class="form-label">Product</label>
                        <div class="g w-100">
                            <div class="form-control-wrap">
                                <select class="form-select" onchange="OfferProductSrc(this.value)" data-search="on" name="category_id">
                                    <option value="default_option">Default Option</option>
                                    @foreach($product as $row)
                                     <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> --}}

                    <!-- selected product area show -->
                    {{-- <div class="table-responsive">
                    	<table class="table table-bordered">
			                <thead>
			                    <tr>
			                        <th>Image</th>
			                        <th>Product</th>
			                        <th>Price</th>
			                        <th>Discount</th>
		                            <th>DiscountPrice</th>
                                    <th>Action</th>

			                    </tr>
			                </thead>
                          
			                <tbody id="newrow">
			                 
			                </tbody>
                    
			            </table>

                    </div> --}}
                    <div class="form-group">
                        <button  type="submit" class="btn theme-btn">Save</button>
                    </div>
              
            </div>
        </form>
        </div>
    </div>
</div>

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
                            <input type="text" class="form-control" id="edit-full-name" value="Web Development">
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
<script src="/backend/js/product/productoffer.js"></script>
@endsection