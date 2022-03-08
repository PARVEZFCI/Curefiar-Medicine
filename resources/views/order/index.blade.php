@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Orders</h3>
                <div class="breadcrumb-list">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	                    <li class="breadcrumb-item ">Orders</li>
					 </ol>
	            </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
	    <div class="card card-preview">
	        <div class="card-inner">
	        	<!-- order filter area -->
	        	<form action="{{ route('order.index') }}" method="GET">
		          	<div class="row mb-4 justify-content-center">
			            <div class="col-md-6 col-sm-6 col-lg-4">
			                <div class="form-group p-0">
			               		<label for="start_date">Start Date <span class="text-danger">*</span></label>
				                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-calendar"></em>
                                    </div>
                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="start_date" required autofocus> 
                                </div>
				            </div>
			            </div>
			            <div class="col-md-6 col-sm-6 col-lg-4">
			                <div class="form-group  p-0">
				                <label for="end_date">End Date <span class="text-danger">*</span></label>
				                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-calendar"></em>
                                    </div>
                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="end_date" required>
                                </div>
			                </div>
			            </div>
			            <div class="col-lg-12 text-center mt-3">
			                <button class="btn btn-success py-1 mr-2">Filter</button>
			                <a href="#" class="btn btn-info py-1">Reset</a>
			            </div>
			        </div>
		        </form>

	            <table class="datatable-init table">
	                <thead>
	                    <tr>
	                        <th>Order</th>
	                        <th>Date</th>
                            <th>Status</th>
                            <th>Customer</th>
	                        <th>Purchased</th>
	                        <th>Total</th>
	                        <th class="text-center">Update Order Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
                        @foreach ($orders as $key=>$order)
                        <tr>
	                        <th style="vertical-align: inherit">INV-{{ $order->order_code }}</th>
	                        <td style="vertical-align: inherit">
	                            {{ \Carbon\Carbon::parse($order->created_at)->day}}
	                            {{ \Carbon\Carbon::parse($order->created_at)->monthName}}
	                            {{ \Carbon\Carbon::parse($order->created_at)->year}}
	                        </td>
	                        <td style="vertical-align: inherit">
                            	<span class="dot bg-warning d-mb-none"></span>
                                @if ($order->order_status == 0)
                            	    <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">Pending</span>
                                @elseif ($order->order_status == 1)
                                    <span class="badge badge-sm badge-dot has-bg badge-primary d-none d-mb-inline-flex">In Progress</span>
                                @elseif ($order->order_status == 2)
                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Delivered</span>
                                @elseif ($order->order_status == 3)
                                    <span class="badge badge-sm badge-dot has-bg badge-danger d-none d-mb-inline-flex">Canceled</span>
                                @endif
                            </td>
                            <td style="vertical-align: inherit">
                                {{$order->user_id ? $order->user->name : ''}}
                            </td>

                            <td style="vertical-align: inherit">{{ $order->total_product }}</td>
	                        <td style="vertical-align: inherit">
	                            {{ $order->grand_total }}
	                        </td>
	                        <td style="vertical-align: inherit" class="text-center">
	                        	<div class="drodown mr-n1 show">
	                        		<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="true">
	                        			<em class="icon ni ni-more-h"></em>
	                        		</a>
	                        		<div class="dropdown-menu dropdown-menu-right">
	                        			<ul class="link-list-opt no-bdr">
	                        				<li>
	                        					<a href="{{route('order.status',['id'=>$order->id, 'status' => 0])}}">
                                                    <input type="text" value="0" hidden>
                                                    <span>Pending</span>
                                                </a>
	                        				</li>
	                        				<li>
	                        					<a href="{{route('order.status',['id'=>$order->id, 'status' => 1])}}">
                                                    <input type="text" value="1" hidden>
                                                    <span>In Progress</span>                                                    
                                                </a>
	                        				</li>
	                        				<li>
	                        					<a href="{{route('order.status',['id'=>$order->id, 'status' => 2])}}">
                                                    <input type="text" value="2" hidden>
                                                    <span>Delivered</span>
                                                </a>
	                        				</li>
	                        				<li>
	                        					<a href="{{route('order.status',['id'=>$order->id,'status'=>3])}}">
                                                    <input type="text" value="3" hidden>
                                                    <span>Canceled</span>
                                                </a>
	                        				</li>
	                        			</ul>
	                        		</div>
	                        	</div>
	                        </td>
	                        <td style="vertical-align: inherit">
                                <form method="POST" action="{{ route('order.destroy', $order->id) }}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure?')">
                                        <i class="icon ni ni-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('order.view', $order->order_code) }}">
                                    <button class="btn btn-sm btn-secondary action-btn">
                                        <i class="icon ni ni-eye"></i>
                                    </button>
                                </a>
	                            {{-- <a href="javascript:void(0)">
	                                <button class="btn btn-sm btn-info action-btn">
	                                    <i class="icon ni ni-printer-fill"></i>
	                                </button>
	                            </a> --}}
	                        </td>
	                    </tr>
                        @endforeach
	                    
	                </tbody>
	            </table>
	        </div>
	    </div><!-- .card-preview -->
	</div><!-- .nk-block -->
</div>


<!-- add modal -->
<div class="modal fade" id="modalCreate" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add Category</h5>
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
                        <label class="form-label">Select SubCategory</label>
                        <div class="form-control-wrap">
                            <select class="form-select" data-search="on" name="sub_category_id">
                                <option value="default_option">Default Option</option>
                                <option value="option_select_name">Option select name</option>
                                <option value="option_select_name">Option select name</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="full-name">ChildCategory Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name" placeholder="e.g. Web Development" name="sub_cate_name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="thumb">ChildCategory Banner</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="sub_cate_banner">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Banner show -->
                    <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div>

                    <div class="form-group">
                        <button data-dismiss="modal" type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
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