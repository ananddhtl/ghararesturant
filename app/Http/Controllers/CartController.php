<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        // dd($request);
        if (Auth::check()) {
            $validate_data = $request->validate([
                'user_id' => 'required',
                'quantity' => 'required',
                'food_id' => 'required',
            ]);

            // Check if the combination of user_id and food_id already exists in the cart
            $existingCartItem = Cart::where('user_id', $validate_data['user_id'])
                ->where('food_id', $validate_data['food_id'])
                ->first();

            if ($existingCartItem) {
                // If the combination exists, update the quantity
                $existingCartItem->quantity += $validate_data['quantity'];
                $existingCartItem->save();
            } else {
                // If the combination doesn't exist, create a new record
                $newCartItem = new Cart;
                $newCartItem->user_id = $validate_data['user_id'];
                $newCartItem->quantity = $validate_data['quantity'];
                $newCartItem->food_id = $validate_data['food_id'];
                $newCartItem->save();
            }

            // Redirect to the menu with a success message
            return redirect('menu')->with('success', 'Your order has been added to the cart');
        } else {
            // User is not logged in, redirect to the login page
            return redirect('login')->with('error', 'Please log in to add items to the cart');
        }
    }
    public function destroy($id)
    {
        $Cart = new Cart;
        $Cart = $Cart->where('id', $id)->First();
        $Cart->delete();
        return redirect('cart')->with('success', 'Your data have been deleted');
    }



    public function verifyPayment(Request $request)
    {
        $token = $request->token;

        $args = http_build_query(array(
            'token' => $token,
            'amount'  => 1000
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $secret_key = config('app.khalti_secret_key');

        $headers = ["Authorization: Key $secret_key"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

       
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }

    public function storePayment(Request $request)
{
    $carts = Cart::query()->where('user_id', '=', Auth::id())->get();
    $msg = 'Payment successful';
    foreach ($carts as $cart) {
       
        $order = Order::query()->create([
            'user_id' => Auth::id(),
            'food_id' => $cart->food_id,
            'quantity' => $cart->quantity,
            'esewa_status' => 'Paid',
            'price_per_item' => $cart->food->price,
            'total_amount' => $cart->quantity * $cart->food->price,
            'food_status' => 'ordered'
        ]);

        $transaction_code = $this->generateTransactionCode(); 
        Payment::query()->create([
            'user_id' => Auth::id(),
            'transaction_code' => $transaction_code,
            'amount' => $cart->food->price * $cart->quantity,
            'quantity' => $cart->quantity,
            'food_id' => $cart->food_id,
            'order_id' => $order->id 
        ]);

       
        $cart->delete();
    }


    $transaction_code = $this->generateTransactionCode();
    $totalAmount = Payment::query()->where('transaction_code', '=', $transaction_code)->sum('amount');


    $settings = SiteConfig::all();

    $datas = Payment::query()->where('transaction_code', '=', $transaction_code)->paginate(15);

    return view('resturant.payment-success', compact('settings', 'datas', 'totalAmount'));
}


private function generateTransactionCode()
{
   
    return uniqid(); 

}
}
