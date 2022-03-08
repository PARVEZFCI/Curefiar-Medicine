@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Product Childcategories</h3>
                <div class="nk-block-des text-soft">
                    {{-- <p>You have total 8 childcategories</p> --}}
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#subsubcategoryModal"><em class="icon ni ni-plus"></em><span>Add Childcategory</span></a></li>
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
                            <th>Banner</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
	                        <th>Child Category Name</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                        @foreach($subsubcategories as $key=>$subsubcategory)
	                    <tr>
	                        <td>{{ $key+1 }}</td>
                            <td>
                                <img src="{{ $subsubcategory->image ? '/storage/uploads/product/category/' . $subsubcategory->image : '/image.svg'}}" alt="avatar-image" width="70">
                            </td>
                            <td>
                                <img src="{{ $subsubcategory->banner ? '/storage/uploads/product/category/' . $subsubcategory->banner : '/image.svg'}}" alt="avatar-image" width="70">
                            </td>
                            <td>{{$subsubcategory->productCategories->name}}</td>
                            <td>{{$subsubcategory->productSubCategories->name}}</td>
	                        <td>{{$subsubcategory->name}}</td>
	                        <td>
                                <span class="badge badge-dot {{ $subsubcategory->status == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{  $subsubcategory->status == 0 ? 'Inactive' : 'Active' }}
                                </span>
	                        </td>
	                        <td>
                                <a href="{{ route('product-sub-subcategories.status', $subsubcategory->id) }}">
                                    <button class="btn btn-sm btn-primary action-btn">
                                        <i class="icon ni ni-loader"></i>
                                    </button>
                                </a>
                                <a href="{{url('admin/product-sub-subcategories/'.$subsubcategory->id.'/edit')}}">
                                    <button class="btn btn-sm btn-info action-btn">
                                        <i class="icon ni ni-edit"></i>
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('product-sub-subcategories.destroy', $subsubcategory->id) }}" class="d-inline-block">
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

<!-- add sub sub category modal -->
@include('partials.modals.add-chlid-category-modal')

@endsection

@section('js')
<script src="/backend/js/product/productsubsubcat.js"></script>
@endsection