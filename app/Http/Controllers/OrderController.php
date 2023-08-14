<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate();

        return view('order.index', compact('orders'));
    }
    
    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'required|integer',
        ]);

        $order = new Order();
        $order->date = now();
        $order->quantity = $data['quantity'];
        $order->user_id = auth()->user()->id;
        $order->state_id = 1; // 1 = Created
        if ($order->save())
            return redirect()->route('order.index')->with('success', __('Order created'));
        else
            return redirect()->route('order.index')->with('error', __('There was and error trying to create the order'));
    }
}
