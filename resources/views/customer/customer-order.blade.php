@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title"><i class="icon ni ni-user-alt mr-2"></i>Students / <strong class="text-primary small">Chayan</strong></h3>
            </div>
            <div class="nk-block-head-content">
                <a href="html/lms/students.html" class="btn btn-outline-light theme-btn d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="html/lms/students.html" class="btn btn-icon btn-outline-light theme-btn d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="tab-content">
                        <div class="tab-pan active" id="personal">
                            <div class="nk-block-head">
                                <div class="nk-block-between d-flex justify-content-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Customer Orders</h4>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
							    <div class="card card-preview">
							        <div class="card-inner p-0">
							            <table class="datatable-init table">
							                <thead>
							                    <tr>
							                        <th>#</th>
							                        <th>Product</th>
						                            <th>Price</th>
						                            <th>Quantity</th>
							                        <th>Sub Total</th>
							                        <th>Total</th>
							                    </tr>
							                </thead>
							                <tbody>
							                    <tr>
							                        <th>1</th>
							                        <td>
							                        	
							                        </td>
							                        <td>
						                            	<span class="dot bg-warning d-mb-none"></span>
						                            	<span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">On Hold</span>
						                            </td>
						                            <td>Tiger Nixon</td>

						                            <td>Tiger Nixon</td>
							                        <td>
							                            100
							                        </td>
							                    </tr>
							                </tbody>
							            </table>
							        </div>
							    </div><!-- .card-preview -->
							</div><!-- .nk-block -->
                        </div><!-- .tab-pan -->
                    </div><!-- .tab-content -->
                </div><!-- .card-inner -->
                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                        <div class="card-inner">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <img src="/image.svg" alt="avatar-image" alt="50">
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                    <span class="sub-text">info@softnio.com</span>
                                </div>
                            </div><!-- .user-card -->
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="user-account-info py-0">
                                <h6 class="overline-title-alt">Total Bill</h6>
                                <div class=" h5 text-primary"> Paid <span>19</span> <small class="currency currency-btc">USD</small></div>
                                <div class="text-danger">Due <span>10 <span class="currency currency-btc">USD</span></span></div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <ul class="link-list-menu">
                                <li>
                                    <a class="active" href="#"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.orders') }}"><em class="icon ni ni-book-fill"></em><span>Orders</span></a>
                                </li>
                                <!-- <li>
                                    <a href="html/lms/students-details-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a>
                                </li> -->
                            </ul>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="user-account-info py-0">
                                <h6 class="overline-title-alt">Last Login</h6>
                                <p>06-29-2020 02:39pm</p>
                            </div>
                        </div><!-- .card-inner -->
                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 551px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .card-inner-group -->
                </div><!-- .card-aside -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
@endsection