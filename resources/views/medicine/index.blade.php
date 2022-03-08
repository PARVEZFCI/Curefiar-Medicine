@extends('layouts.app')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Medicines</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="#" data-target="addProduct" class="toggle btn btn-icon theme-btn d-md-none"><em class="icon ni ni-plus"></em></a>
                            <a href="#" data-target="addProduct" class="toggle btn theme-btn d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Medicine</span></a>
                        </li>
<!--                         <li class="nk-block-tools-opt">
                        	<form method="POST" action="{{ route('medicine.import') }}" enctype="multipart/form-data">
                        		@csrf
                        		<input type="file" name="import_file">
                            	<button class="btn theme-btn d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Import</span></button>
                        	</form>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->

<!-- list -->
<div class="nk-block">
    <div class="card card-preview">
        <div class="card-inner">
            <table class="table table-bordered" style="font-size: 13px">
                <thead>
                    <tr>
                    	<th>Image</th>
                        <th width="22%">Name</th>
                        <th>Dosage</th>
                        <th>Convertion Factor</th>
                        <th class="text-center" width="15%">Price</th>
                        <th>Status</th>
                        <th width="35%">Action</th>
                    </tr>
                </thead>
                <tbody
                	@foreach($medicines as $key=>$medicine)
                	<tr>
                    	<td>
                    		<img src="{{ $medicine->image ? '/storage/uploads/medicines/' . $medicine->image : '/image.svg'}}" alt="{{ $medicine->image }}" width="200">
                    	</td>
                        <td>
                        	<strong>{{ ucFirst($medicine->medicine_name )}} </strong><br>
                        	<div style="line-height: 25px; margin-top: 5px;">
                        		<span class="text-danger">Category:</span> {{ $medicine->category_id ? ucFirst($medicine->category->name) : '' }}<br>
	                        	<span class="text-danger">Generic:</span> {{ $medicine->generic_id ? ucFirst($medicine->generic->name) : '' }}<br>
	                        	<span class="text-danger">Manufacture:</span> {{ $medicine->manufacture_id ? ucFirst($medicine->manufacture->manufacture_name) : '' }}
                        	</div>
                        </td>
                        <td>
                        	{{ $medicine->dosage ?? '' }}
                        </td>
                        <td>
                        	{{ $medicine->convertion_factor }}
                        </td>
                        <td>
                        	<table class="table table-bordered" style="font-size: 13px;">
                        		<thead>
                        			<th>Unit</th>
                        			<th>Price</th>
                        			<th>Discount</th>
                        			<th>Discount Price</th>
                        		</thead>
                        		<tbody>
                        			@foreach($medicine->medicinePrices as $price)
                        			<tr>
                        				<td>{{ $price->unit_id ? $price->unit->unit_name : '' }}</td>
                        				<td>{{ $price->price ?? 0 }}</td>
                        				<td>{{ $price->discount }}</td>
                        				<td>{{ $price->discount_price }}</td>
                        			</tr>
                        			@endforeach
                        		</tbody>
                        	</table>
                        </td>
                        <td>
                        	<span class="badge badge-dot {{ $medicine->status == 1 ? 'badge-success' : 'badge-danger'}}">
                        		{{ $medicine->status == 1 ? 'Active' : 'Inactive' }}
                        	</span>
                        </td>
                        <td>
                        	<a href="{{ route('medicine.status', $medicine->id) }}">
                        		<button class="btn btn-sm btn-primary action-btn">
                        			<i class="icon ni ni-loader"></i>
                        		</button>
                        	</a>
                        	<a href="{{ route('medicines.edit', $medicine->id) }}">
                        		<button class="btn btn-sm btn-info action-btn">
                        			<i class="icon ni ni-edit"></i>
                        		</button>
                        	</a>
                        	 <form method="POST" action="{{ route('medicines.destroy', $medicine->id) }}" class="d-inline-block mt-2">
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

            <!-- pagiantion -->
            <div class="mt-5 flex justify-content-center align-items-center">
            	{{ $medicines->links() }}
            </div>
        </div>
    </div><!-- .card-preview -->
</div><!-- .nk-block -->

<!-- add medicine modal -->
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar style="width: 650px;">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Medicine</h5>
            <div class="nk-block-des">
                <p>Add information and add new medicine.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form method="POST" action="{{ route('medicines.store') }}" enctype="multipart/form-data">
        	@csrf
        	<div class="row g-3">
	            <div class="col-12 col-md-6">
	                <div class="form-group">
	                    <label class="form-label" for="product-title">Medicine Name <span class="text-danger">*</span></label>
	                    <div class="form-control-wrap">
	                        <input type="text" class="form-control" id="product-title" name="medicine_name" placeholder="Ex: Seclo" required>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-6">
	                <div class="form-group">
	                    <label class="form-label" for="product-title">Dosage<span class="text-danger">*</span></label>
	                    <div class="form-control-wrap">
	                        <input type="text" class="form-control" id="product-title" name="dosage" placeholder="Ex: 50mg" required>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group">
	                    <label class="form-label" for="product-title">Category <span class="text-danger">*</span></label>
	                    <div class="form-control-wrap">
                            <select class="form-select" data-search="on" name="category_id" required>
                                <option value=" " selected disabled>--select category--</option>
                                @foreach($categories as $category)
                                	<option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value=" " selected disabled>--select manufacture--</option>
                                @foreach($manufactures as $manufacture)
                                	<option value="{{ $manufacture->id }}">{{ $manufacture->manufacture_name }}</option>
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
                                <option value="" selected disabled>--select generic--</option>
                                @foreach($generics as $generic)
                                	<option value="{{ $generic->id }}">{{ $generic->name }}</option>
                                @endforeach
                            </select>
                        </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group">
	                    <label class="form-label" for="product-title">Primary Unit <span class="text-danger">*</span></label>
	                    <div class="form-control-wrap">
	                       <select class="form-control" name="primary_unit">
	                       		<option value="" selected disabled>--select primary unit--</option>
	                       		@foreach($units as $unit)
                                	<option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                @endforeach
	                       		
	                       </select>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group">
	                    <label class="form-label" for="product-title">Secondary Unit</label>
	                    <div class="form-control-wrap">
	                       <select class="form-control" name="secondary_unit" onchange="showConvertionFactor()">
	                       		<option value="" selected disabled>--select secondary unit--</option>
	                       		@foreach($units as $unit)
                                	<option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                @endforeach
	                       </select>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group d-none"  id="convertion">
	                    <label class="form-label">Convertion Factor</label>
	                    <div class="form-control-wrap">
	                        <input type="number" class="form-control" name="convertion_factor" placeholder="Ex: 10" value="1">
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group">
	                    <label class="form-label">Price <span class="text-danger">*</span></label>
	                    <div class="form-control-wrap">
	                        <input type="number" class="form-control" name="price" id="price">
	                        <span id="showMsg" class="text-danger"></span>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group">
	                    <label class="form-label">Discount <span class="text-danger">(%)</span></label>
	                    <div class="form-control-wrap">
	                        <input type="number" class="form-control" name="discount" onkeyup="calculateDiscount(this.value)"y>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-4">
	                <div class="form-group">
	                    <label class="form-label">Discount Price</label>
	                    <div class="form-control-wrap">
	                        <input type="number" class="form-control" id="discount_price" name="discount_price" readonly>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-md-12">
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
	            <div class="col-12 col-md-12">
	                <div class="form-group">
	                    <label class="form-label">Description <span class="text-danger">*</span></label>
	                    <div class="form-control-wrap">
	                        <textarea class="form-control" name="details">
	                        	
	                        </textarea>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12">
	                <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
	            </div>
	        </div>
        </form>
    </div><!-- .nk-block -->
</div>
@endsection

@section('js')
<script src="/backend/js/medicine/medicine.js"></script>
@endsection