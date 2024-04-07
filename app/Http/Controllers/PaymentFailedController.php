<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteConfig;

class PaymentFailedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id= auth()->id();
        $datas=Cart::query()->where('user_id',$id)->get();
        $settings=SiteConfig::all();

        return view('resturant.payment-failed', compact('datas','settings'));
    }
}
