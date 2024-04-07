<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::query()->paginate(10);
        return view('resturant.admin.Payments.index', compact('payments'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = new Payment;
        $payment = $payment->where('id', $id)->First();
        return view('resturant.admin.Payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $payment = new Payment;
    //     $payment = $payment->where('id', $id)->First();
    //     return view('resturant.admin.Payments.edit', compact('Payment'));
    // }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payments = new Payment;
        $payments = $payments->where('id', $id)->First();
        $payments->delete();
        return redirect('admin/payments')->with('success', 'Your data have been deleted');
    }
}
