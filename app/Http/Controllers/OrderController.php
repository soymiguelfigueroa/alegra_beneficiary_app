<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
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

    public function getOrders()
    {
        $orders = OrderResource::collection(Order::all());

        return $orders;
    }

    public function getOrder(Request $request)
    {
        return Order::find($request->id);
    }

    public function getOrdersCreated()
    {
        $orders = OrderResource::collection(Order::where('state_id', 1)->get());

        return $orders;
    }

    public function getOrdersPending()
    {
        $orders = OrderResource::collection(Order::where('state_id', 2)->get());

        return $orders;
    }

    public function getOrdersDelivered()
    {
        $orders = OrderResource::collection(Order::where('state_id', 3)->get());

        return $orders;
    }

    public function updateState(Request $request)
    {
        $order_id = $request->order_id;
        $state_id = $request->state_id;

        $order = Order::where('id', $order_id)->first();
        $order->state_id = $state_id;
        $order->save();

        return response('Order updated', 200);
    }
}
