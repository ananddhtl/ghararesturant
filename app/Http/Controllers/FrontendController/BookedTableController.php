<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\reservation;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class BookedTableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = Auth()->id();
        $reservations = reservation::where('user_id', $id)->get();
        $settings=SiteConfig::all();
        return view('resturant.booked-table', compact('reservations','settings'));
    }
}
