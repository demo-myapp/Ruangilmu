<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use DB;
use App\Mail\CustomerRegisterMail;
use Mail;
use Cookie;

class CartController extends Controller
{
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('shop_carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }
    
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id'
        ]);

        $carts = $this->getCarts();
        if($carts && array_key_exists($request->product_id, $carts)){

            return redirect()->back(); //ini nanti diganti dengan nonaktif tombol cart
        } else {
            $product = Product::find($request->product_id);

            $carts[$request->product_id] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image
            ];
        }

        $cookie = cookie('shop_carts', json_encode($carts), 2880);

        return redirect()->back()->cookie($cookie);
    }

    public function listCart()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(['product_price']);

        return view('ecommerce.cart', compact('carts','subtotal'));
    }

    public function updateCart(Request $request)
    {
        $carts = $this->getCarts();
        foreach($request->product_id as $key => $row) {
            unset($carts[$row]);
        }

        $cookie = cookie('shop_carts', json_encode($carts), 2880);

        return redirect()->back()->cookie($cookie);
        // return $request->product_id;
    }

    public function checkout()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(['product_price']);

        return view('ecommerce.checkout', compact('carts', 'subtotal'));
    }

    public function processCheckout(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'string|max:100',
            // 'customer_phone' => 'required',
            'email' => 'email',
        ]);

        DB::beginTransaction();
        try {
            $referral = json_decode(request()->cookie('ri-referral'), true);
            $explodeReferral = explode('-', $referral);

            $customer = Customer::where('email', $request->email)->first();
            if (!auth()->guard('customer')->check() && $customer) {

                return redirect()->back()->with(['error' => 'Please Login First']);
            }

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(['product_price']);

            if (!auth()->guard('customer')->check()) {
                $password = Str::random(8);
                $customer = Customer::create([
                    'name' => $request->customer_name,
                    'email' => $request->email,
                    'password' => $password,
                    'phone_number' => $request->customer_phone,
                    'activate_token' => Str::random(30),
                    'status' => false
                ]);
            }

            $order = Order::create([
                'invoice' => Str::random(4) . '-' . time(),
                'customer_id' => $customer->id,
                'customer_name' => '',
                'customer_phone' => '',
                'subtotal' => $subtotal,
                'ref' => $referral != '' && $explodeReferral[0] != auth()->guard('customer')->user()->id ? $referral:NULL
            ]);

            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price']
                ]);
            }

            DB::commit();
            $carts = [];
            $cookie = cookie('shop_carts', json_encode($carts), 2880);

            Cookie::queue(Cookie::forget('ri-referral'));

            if (!auth()->guard('customer')->check()) {
                Mail::to($request->email)->send(new CustomerRegisterMail($customer, $password));
            }
            return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function checkoutFinish($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();

        return view('ecommerce.checkout_finish', compact('order'));
    }

}
