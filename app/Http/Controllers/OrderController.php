<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer'])->orderBy('created_at', 'DESC');
        if (request()->q != '') {
            $orders =  $orders->where(function($q) {
                $q->where('customer_name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('invoice', 'LIKE', '%' . request()->q . '%');
            });
        }
        if (request()->status != '') {
            $orders = $orders->where('status', request()->status);
        }
        $orders = $orders->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->details()->delete();
        $order->payment()->delete();
        $order->delete();

        return redirect(route('orders.index'));
    }

    public function view($invoice)
    {
        $order = Order::with(['customer', 'payment', 'details.product'])->where('invoice', $invoice)->first();

        return view('orders.view', compact('order'));
    }

    public function acceptPayment($invoice)
    {
        $order = Order::with(['payment'])->where('invoice', $invoice)->first();
        $order->payment()->update(['status' => 1]);
        $order->update(['status' => 2]);

        return redirect(route('orders.view', $order->invoice));
    }


}
