@extends('layouts.ecommerce')

@section('title')
    <title>Checkout - Ruangilmu</title>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Informasi Pengiriman</h2>
					<div class="page_link">
            <a href="{{ url('/') }}">Home</a>
						<a href="#">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
            <h3>Informasi Pengiriman</h3>          
              @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
                        
              
            	<!-- REMOVE DULU VALUE ACTION-NYA JIKA INGIN MELIHATNYA DI BROWSER -->
            	<!-- KARENA ROUTE NAME front.store_checkout BELUM DIBUAT -->
              <form class="row contact_form" action="{{ route('front.store_checkout') }}" method="post" novalidate="novalidate">
                            @csrf
							@if (auth()->guard('customer')->check())
							<div class="col-md-6 form-group p_star">
								<label for="">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly':'' }}>
							</div>
							@else
							<div class="col-md-12 form-group p_star">
								<label for="">Nama Lengkap</label>
								<input type="text" class="form-control" id="first" name="customer_name" required>
								
								<!-- UNTUK MENAMPILKAN JIKA TERDAPAT ERROR VALIDASI -->
								<p class="text-danger">{{ $errors->first('customer_name') }}</p>
							</div>
							<div class="col-md-6 form-group p_star">
								<label for="">No Telp</label>
								<input type="text" class="form-control" id="number" name="customer_phone" required>
								<p class="text-danger">{{ $errors->first('customer_phone') }}</p>
							</div>
							<div class="col-md-6 form-group p_star">
								<label for="">Email</label>
								<input type="email" class="form-control" id="email" name="email" required>
								<p class="text-danger">{{ $errors->first('email') }}</p>
							</div>
							@endif

						
						
						{{-- <div class="col-md-12 form-group p_star">
							<label for="">Nama Lengkap</label>
							@if (auth()->guard('customer')->check())
							<input type="text" class="form-control" id="first" name="customer_name" value="{{ auth()->guard('customer')->user()->name }}" required {{ auth()->guard('customer')->check() ? 'readonly':'' }}>
							@else
								<input type="text" class="form-control" id="first" name="customer_name" required>
							@endif
                            <!-- UNTUK MENAMPILKAN JIKA TERDAPAT ERROR VALIDASI -->
                            <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
							<label for="">No Telp</label>
							@if (auth()->guard('customer')->check())
							<input type="text" class="form-control" id="number" name="customer_phone" value="{{ auth()->guard('customer')->user()->phone_number }}" required {{ auth()->guard('customer')->check() ? 'readonly':'' }}>
							@else
								<input type="text" class="form-control" id="number" name="customer_phone" required>
							@endif
                            
                            <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
							<label for="">Email</label>
							@if (auth()->guard('customer')->check())
								<input type="email" class="form-control" id="email" name="email" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly':'' }}>
							@else
								<input type="email" class="form-control" id="email" name="email" required>
							@endif
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div> --}}
                    
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Ringkasan Pesanan</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
                </li>
                @foreach ($carts as $cart)
								<li>
									<a href="#">{{ \Str::limit($cart['product_name'], 10) }}
                    <span class="last">Rp {{ number_format($cart['product_price']) }}</span>
									</a>
                </li>
                @endforeach
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
                    <span>Rp {{ number_format($subtotal) }}</span>
									</a>
								</li>
								<li>
									<a href="#">Total
										<span>Rp {{ number_format($subtotal) }}</span>
									</a>
								</li>
							</ul>
              <button class="main_btn">Bayar Pesanan</button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
@endsection