<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class OrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = Auth()->id();
        $orders = Order::where('user_id', $id)->get();
        $settings=SiteConfig::all();
        return view('resturant.orders', compact('orders','settings'));
    }
}
