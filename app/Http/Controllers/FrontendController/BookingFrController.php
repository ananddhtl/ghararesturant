<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\reservation;
use App\Models\SiteConfig;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingFrController extends Controller
{
    /* Handle the incoming request.
    */
    public function index(Request $request)
    {
        $settings = SiteConfig::all();
        return view('resturant.booking', compact('settings'));
    }


    public function book(Request $request)
    {
        if (auth()->check()) {

            $validate_data = $request->validate([
                'dateandtime' => 'required|date_format:Y-m-d\TH:i'
            ]);
            $dateTime = $validate_data['dateandtime'];
            $userDateTime = strtotime($validate_data['dateandtime']);
            $tables = Table::with('reservations')->get();
            $settings = SiteConfig::all();
            $final_tables = [];
            $booked_tables = [];

            foreach ($tables as $table) {
                $isTableAvailable = true;

                if ($table->reservations) {
                    foreach ($table->reservations as $reservation) {
                        $start_time = strtotime($reservation->dateandtime);
                        $end_time = $start_time + 5400;

                        if (($userDateTime >= $start_time && $userDateTime < $end_time) || ($userDateTime + 5400 > $start_time && $userDateTime + 5400 < $end_time)) {
                            if ($reservation->reservation_status == 'booked' || $reservation->reservation_status == 'pending') {
                                $isTableAvailable = false;
                                break;
                            }
                        }
                    }
                }

                if ($isTableAvailable) {
                    $final_tables[] = $table;
                }else{
                    $booked_tables[] = $table;
                }
            }

            $tables = $final_tables;

            return view('resturant.bookin-main', compact('settings', 'tables', 'dateTime','booked_tables'));
        } else {
            return redirect('login')->with('error','Please Log in first to Book');
        }
    }
}
