<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class CartFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (auth()->check()) {
            $user_id=auth()->user()->id;
            $cart=Cart::where('user_id',$user_id);
            $cart =$cart->with('food')->get();
            $settings=SiteConfig::all();
            return view('resturant.cart',compact('cart','settings'));
        }else{
            return redirect('/login')->with('error', 'Please log in first to Order');
        }
    }
}
