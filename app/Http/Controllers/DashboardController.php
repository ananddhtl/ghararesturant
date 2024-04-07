<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\SiteConfig;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $files = Files::count();
        $order = Order::count();
        $reservation = Reservation::count();
        $newsletter = Newsletter::count();
        $settings = SiteConfig::all();
        $payments = Payment::latest()->limit(8)->get();
        $totalAmount = Payment::sum('amount');
        return view('resturant.admin.index', compact('files', 'order', 'reservation', 'newsletter', 'settings', 'payments', 'totalAmount'));
    }
}
