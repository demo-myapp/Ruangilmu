<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Customer;
use App\Order;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);

        return view('ecommerce.index', compact('products'));
    }

    public function product()
    {
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->paginate(12);

        return view('ecommerce.product', compact('products'));
    }

    public function categoryProduct($slug)
    {
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);

        return view('ecommerce.product', compact('products'));
    }

    public function show($slug)
    {
        $product = product::with(['category'])->where('slug', $slug)->first();
        if (Product::whereSlug($slug)->exists()) {

            return view('ecommerce.show', compact('product'));
        }
        return redirect('/');
    }

    public function verifyCustomerRegistration($token)
    {
        $customer = Customer::where('activate_token', $token)->first();
        if ($customer) {
            $customer->update([
                'activate_token' => null,
                'status' => 1
            ]);

            return redirect(route('customer.login'))->with('success', 'Verification is Successfull, Please Login');
        }
        return redirect(route('customer.login'))->with('error', 'Invalid Token Verification');
    }

    public function customerSettingForm()
    {
        $customer = auth()->guard('customer')->user();

        return view('ecommerce.setting', compact('customer'));
    }

    public function customerUpdateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone_number' => 'required|max:15',
            'password' => 'nullable|string|min:6'
        ]);

        $user = auth()->guard('customer')->user();
        $data = $request->only('name', 'phone_number');
        if ($request->password != '') {
            $data['password'] = $request->password;
        }

        $user->update($data);
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function referralProduct($user, $product)
    {
        $code = $user . '-' . $product;
        $product = Product::find($product);
        $cookie = cookie('ri-referral', json_encode($code), 2880);

        return redirect(route('front.show_product', $product->slug))->cookie($cookie);
    }

    public function listCommission()
    {
        $user = auth()->guard('customer')->user();
        $orders = Order::where('ref', $user->id)->where('status', 2)->paginate(10);

        return view('ecommerce.referral', compact('orders'));
    }


}
