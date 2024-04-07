<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->paginate(10);
        return view('resturant.admin.Orders.index', compact('orders'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = new order;
        $order = $order->where('id', $id)->First();
        return view('resturant.admin.Orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = new order;
        $order = $order->where('id', $id)->First();
        return view('resturant.admin.Orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orders = new order;
        $orders = $orders->where('id', $id)->First();
        $validate_data = $request->validate([
            'food_status' => 'required',
        ]);
        $orders->food_status = $validate_data['food_status'];

        $orders->update();
        return redirect('admin/orders')->with('success', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders = new order;
        $orders = $orders->where('id', $id)->First();
        $orders->delete();
        return redirect('admin/orders')->with('success', 'Your data have been deleted');
    }
}
