@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Edit Medicine</h3>
                <div class="breadcrumb-list">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	                    <li class="breadcrumb-item active">Medicine List</li>
					 </ol>
	            </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="{{ route('medicines.index') }}" class="btn theme-btn"><em class="icon ni ni-list"></em><span>Medicine List</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    <div class="nk-block">
	    <div class="card">
	        <div class="card-inner">
	            <form method="POST" action="{{ route('medicines.update', $medicine->id) }}" enctype="multipart/form-data">
	            	@csrf
	            	@method("PUT")
	                <div class="row g-4 align-items-center">
	                    <div class="col-lg-8">
	                        <div class="form-group">
			                    <label class="form-label" for="product-title">Medicine Name <span class="text-danger">*</span></label>
			                    <div class="form-control-wrap">
			                        <input type="text" class="form-control" id="product-title" name="medicine_name" placeholder="Ex: Seclo" required value="{{ $medicine->medicine_name }}">
			                    </div>
			                </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
			                    <label class="form-label" for="product-title">Dosage<span class="text-danger">*</span></label>
			                    <div class="form-control-wrap">
			                        <input type="text" class="form-control" id="product-title" name="dosage" placeholder="Ex: 50mg" value="{{ $medicine->dosage }}" required>
			                    </div>
			                </div>
	                    </div>
	                    <div class="col-lg-4">
	                        <div class="form-group">
	                            <label class="form-label" for="email-address-1">Category</label>
	                            <div class="form-control-wrap">
		                            <select class="form-select" data-search="on" name="category_id" required>
		                                @foreach($categories as $category)
		                                	<option value="{{ $category->id }}" {{ $category->id == $medicine->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>
	                        </div>
	                    </div>
	                     <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label" for="product-title">Manufacture</label>
								<div class="form-control-wrap">
		                            <select class="form-select" data-search="on" name="manufacture_id">
		                                @foreach($manufactures as $manufacture)
		                                	<option value="{{ $manufacture->id }}" {{ $manufacture->id == $medicine->manufacture_id ? 'selected' : '' }}>{{ $manufacture->manufacture_name }}</option>
		                                @endforeach
		                            </select>
		                        </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label" for="product-title">Generic</label>
			                    <div class="form-control-wrap">
		                            <select class="form-select" data-search="on" name="generic_id">
		                                @foreach($generics as $generic)
		                                	<option value="{{ $generic->id }}" {{ $generic->id == $medicine->generic_id ? 'selected' : '' }}>{{ $generic->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label" for="product-title">Primary Unit <span class="text-danger">*</span></label>
			                    <div class="form-control-wrap">
			                       <select class="form-control" name="primary_unit">			                       		@foreach($units as $unit)
			                       			@if(count($medicine->medicinePrices) > 0)
		                                		<option value="{{ $unit->id }}" {{ ( $medicine->medicinePrices[0]->unit_id == $unit->id ) ? 'selected' : '' }}>{{ $unit->unit_name }}</option>
		                                	@else
			                                	<option value="{{ $unit->id }}">
		                                		{{ $unit->unit_name }}
		                                		</option>
		                                	@endif
		                                @endforeach
			                       		
			                       </select>
			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label" for="product-title">Secondary Unit</label>
			                    <div class="form-control-wrap">
			                       <select class="form-control" name="secondary_unit">
			                       		<option value="" selected disabled>--select secondary unit--</option>
			                       		@foreach($units as $unit)
			                       			@if(count($medicine->medicinePrices) > 0 && count($medicine->medicinePrices) > 1)
		                                		<option value="{{ $unit->id }}" {{ ( $medicine->medicinePrices[1]->unit_id == $unit->id ) ? 'selected' : '' }}>{{ $unit->unit_name }}</option>
		                                	@else
			                                	<option value="{{ $unit->id }}">
		                                		{{ $unit->unit_name }}
		                                		</option>
		                                	@endif
		                                @endforeach
			                       </select>
			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4" id="convertion">
			                <div class="form-group">
			                    <label class="form-label">Convertion Factor</label>
			                    <div class="form-control-wrap">
			                        <input type="number" class="form-control" name="convertion_factor" placeholder="Ex: 10" value="{{ $medicine->convertion_factor }}">
			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label">Price <span class="text-danger">*</span></label>
			                    <div class="form-control-wrap">
			                    	@if(count($medicine->medicinePrices) > 0)
			                       		<input type="number" class="form-control" name="price" id="price" required value="{{ $medicine->medicinePrices[0]->type == 'primary' ? $medicine->medicinePrices[0]->price : $medicine->medicinePrices[1]->price }}">
			                        	<span id="showMsg" class="text-danger"></span>
			                        @else
			                         	<input type="number" class="form-control" name="price" id="price" required>
			                       		<span id="showMsg" class="text-danger"></span>
			                        @endif
			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label">Discount <span class="text-danger">(%)</span></label>
			                    <div class="form-control-wrap">
			                    	@if(count($medicine->medicinePrices) > 0)
			                        	<input type="number" class="form-control" name="discount" value="{{ $medicine->medicinePrices[0]->discount ?? ''  }}" onkeyup="calculateDiscount(this.value)">
			                        @else 
			                        	<input type="number" class="form-control" name="discount" onkeyup="calculateDiscount(this.value)">
			                        @endif

			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-4">
			                <div class="form-group">
			                    <label class="form-label">Discount Price</label>
			                    <div class="form-control-wrap">
			                    	@if(count($medicine->medicinePrices) > 0)
			                        	<input type="number" class="form-control" id="discount_price" name="discount_price" value="{{ $medicine->medicinePrices[0]->discount_price ?? ''  }}" readonly>
			                        @else
			                         	<input type="number" class="form-control" id="discount_price" name="discount_price" readonly>
			                        @endif
			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-6">
			                <div class="form-group">
			                    <label class="form-label">Medicine Image <span class="text-danger">*</span></label>
			                    <div class="form-control-wrap">
			                        <div class="custom-file">
			                            <input type="file" class="custom-file-input" id="customFile" name="image">
			                            <label class="custom-file-label" for="customFile">Choose file</label>
			                        </div>
			                    </div>
			                </div>
			            </div>
			            <div class="col-12 col-md-6">
			            	<div class="imge-preview">
			            		<img src="{{ $medicine->image ? '/storage/uploads/medicines/'.$medicine->image : '/image.svg' }}" alt="{{ $medicine->medicine_name }}" width="150" height="150">
			            	</div>
			            </div>
	                    <div class="col-lg-12">
	                        <div class="form-group">
	                            <label class="form-label" for="pay-amount-1">Description</label>
	                            <textarea class="form-control" name="details">{{ $medicine->details }}</textarea>
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="form-group">
	                            <button type="submit" class="btn btn-lg theme-btn">Update</button>
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
<script src="/backend/js/medicine/medicine.js"></script>
@endsecion