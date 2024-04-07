<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xentixar\EsewaSdk\Esewa;

class EsewaPaymentController extends Controller
{
    public function pay(Request $request)
    {
        $carts = Cart::query()->where('user_id', '=', Auth::id())->get();
        $sum = 0;
        foreach ($carts as $cart) {
            $sum += $cart->quantity * $cart->food->price;
        }
        if ($sum > 0) {
            $esewa = new Esewa();
            $esewa->config(route('esewa.check'), route('esewa.check'), $sum);
            $esewa->init();
        }
    }

    public function check(Request $request)
    {
        $esewa = new Esewa();
        $data =  $esewa->decode();
        if ($data) {
            if ($data["status"] === 'COMPLETE') {
                $carts = Cart::query()->where('user_id', '=', Auth::id())->get();
                $msg = 'Payment succesful';
                foreach ($carts as $cart) {
                    Order::query()->create([
                        'user_id' => Auth::id(),
                        'food_id' => $cart->food_id,
                        'quantity' => $cart->quantity,
                        'esewa_status' => 'Payed',
                        'price_per_item' => $cart->food->price,
                        'total_amount' => $data['total_amount'],
                        'food_status' => 'ordered'
                    ]);
                    Payment::query()->create([
                        'user_id' => Auth::id(),
                        'transaction_code' => $data['transaction_code'],
                        'amount' => $cart->food->price,
                        'quantity' => $cart->quantity,
                        'food_id' => $cart->food_id,
                    ]);
                    $cart->delete();
                }
                $settings = SiteConfig::all();
                $id = Auth()->id();

                $transaction_code = $data['transaction_code'];
                $datas = Payment::query()->where('transaction_code', '=', $transaction_code)->paginate(15);
                $totalAmount = Payment::query()
                    ->where('transaction_code', '=', $transaction_code)
                    ->first() // Retrieve the first matching record
                    ->total_amount;
                return view('resturant.payment-success', compact('settings', 'datas', 'totalAmount'));
            }
        }
        return redirect()->route('payment-failed')->with('error', 'Ordered failed');
    }
}
