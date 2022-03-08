@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Invoice <strong class="text-primary small">#INV- {{ $order->order_code }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Created At: <span class="text-base">{{ \Carbon\Carbon::parse($order->created_at)->day}} {{ \Carbon\Carbon::parse($order->created_at)->monthName}} {{ \Carbon\Carbon::parse($order->created_at)->year}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="nk-block-head-content">
                <a href="{{ route('order.index') }}" class="btn btn-outline-light theme-btn d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="html/invoice-list.html" class="btn btn-icon btn-outline-light theme-btn d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>
    </div>
    <div class="nk-block">
        <div class="invoice">
            <div class="invoice-action">
                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="javascript:void(0)"  onclick="printDiv('printableArea')"><em class="icon ni ni-printer-fill"></em></a>
            </div><!-- .invoice-actions -->
            <div class="invoice-wrap" id="printableArea">
                <div class="invoice-brand text-center">
                    <img src="/logo.png" srcset="/logo.png 2x" alt="">
                </div>
                <div class="invoice-head">
                    <div class="invoice-contact">
                        <!-- <span class="overline-title">
	                        <div class="logo">
	                        	<img src="/logo.png" alt="Logo" width="200" />
	                        </div>
                        </span> -->
                        @php
                            $customerInfo = json_decode($order->shipping_address);
                        @endphp
                                
                        <div class="invoice-contact-info">
                            <h5 class="title mb-1">{{ $order->user_id ? $order->user->name : '' }}</h5>
                            <ul class="list-plain">
                                <li>
                                	<span>{{ $customerInfo->address }}</span>
                                </li>
                                <li>
                                	<span>{{ $order->user_id ? $order->user->phone : '' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-desc" style="width: 220px">
                        <!-- <h3 class="title">Invoice</h3> -->
                        <h5 class="mb-0">Invoice </h5 class="mb-0">
                        <ul class="list-plain">
                            <li class="invoice-id"><span>Invoice ID</span>:<span>{{ $order->order_code }}</span></li>
                            <li class="invoice-date"><span>Date</span>:<span>{{ \Carbon\Carbon::parse($order->created_at)->day}} {{ \Carbon\Carbon::parse($order->created_at)->monthName}}, {{ \Carbon\Carbon::parse($order->created_at)->year}}</span></li>
                        </ul>
                    </div>
                </div><!-- .invoice-head -->
                <div class="invoice-bills">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="w-150px">Item ID</th>
                                    <th class="w-150px">Product Type</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_type == 'medicine' ? 'Medicine' : 'Product' }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->quantity * $item->price }}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                {{-- <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"><b>Subtotal</b></td>
                                    <td>$435.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"><b>Processing fee</b></td>
                                    <td>$10.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"><b>TAX</b></td>
                                    <td>$43.50</td>
                                </tr> --}}
                                <tr>
                                    {{-- <td colspan="4"></td> --}}
                                    <td colspan="4" class="text-right"><b>Grand Total</b></td>
                                    <td>{{ $order->grand_total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div> --}}
                    </div>
                </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
        </div><!-- .invoice -->
    </div>
</div>
@endsection

@section('js')
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection