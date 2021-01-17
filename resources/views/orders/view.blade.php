@extends('layouts.admin')

@section('title', 'Detail Order')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Orders</li>
        <li class="breadcrumb-item active">View Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail Order

                                <div class="float-right">
                                    @if ($order->status == 1 && $order->payment->status == 0)
                                    <a href="{{ route('orders.approve_payment', $order->invoice) }}" class="btn btn-primary btn-sm">Accept Payment</a>
                                    @endif
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                              
                                <div class="col-md-6">
                                    <h4>Detail Customer</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Customer Name</th>
                                            <td>{{ $order->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telp</th>
                                            <td>{{ $order->customer_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Status</th>
                                            <td>{!! $order->status_label !!}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h4>Detail Payment</h4>
                                    @if ($order->status != 0)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Sender Name</th>
                                            <td>{{ $order->payment->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pay up</th>
                                            <td>{{ $order->payment->transfer_to }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transfer Date</th>
                                            <td>{{ $order->payment->transfer_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment's Proof</th>
                                            <td><a target="_blank" href="{{ asset('storage/payment/' . $order->payment->proof) }}">View</a></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{!! $order->payment->status_label !!}</td>
                                        </tr>
                                    </table>
                                    @else
                                    <h5 class="text-center">Unconfirmed Payment</h5>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <h4>Product Detail</h4>
                                    <table class="table table-borderd table-hover">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        @foreach ($order->details as $row)
                                        <tr>
                                            <td>{{ $row->product->name }}</td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection