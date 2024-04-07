<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Files;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::paginate(5);
        return view('resturant.admin.Reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resturant.admin.Reservation.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $reservation = new Reservation;

            $validate_data = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'dateandtime' => 'required',
                'noofpeople' => 'required',
                'specialrequest' => 'nullable',
                'table_id' => 'required'
            ]);
            $existingReservation = Reservation::where('dateandtime', $validate_data['dateandtime'])
                ->where('reservation_status', 'booked')
                ->first();

            if ($existingReservation) {
                // Set the status of the new reservation to "pending"
                $reservation->reservation_status = 'pending';
            } else {
                // Set the reservation_status of the new reservation to "booked"
                $reservation->reservation_status = 'booked';
            }
            $reservation->name = $validate_data['name'];
            $reservation->email = $validate_data['email'];
            $reservation->dateandtime = $validate_data['dateandtime'];
            $reservation->noofpeople = $validate_data['noofpeople'];
            $reservation->specialrequest = $validate_data['specialrequest'];
            $reservation->table_id = $validate_data['table_id'];

            $reservation->user_id = auth()->id();
            $reservation->save();
            // User is logged in, redirect to the menu
            return redirect('booking')->with('success', 'Your reservation have been made');
        } else {
            // User is not logged in, redirect to the login page
            return redirect('login')->with('error','User is not logged in');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = new Reservation;
        $reservation = $reservation->where('id', $id)->First();
        $files = Files::paginate(9);
        return view('resturant.admin.Reservation.show', compact('reservation', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservation = new Reservation;
        $reservation = $reservation->where('id', $id)->First();
        $files = Files::paginate(9);
        return view('resturant.admin.Reservation.edit', compact('reservation', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservation = new Reservation;
        $reservation = $reservation->where('id', $id)->First();
        $validate_data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dateandtime' => 'required',
            'noofpeople' => 'required',
            'specialrequest' => 'required'
        ]);
        $reservation->name = $validate_data['name'];
        $reservation->email = $validate_data['email'];
        $reservation->dateandtime = $validate_data['dateandtime'];
        $reservation->noofpeople = $validate_data['noofpeople'];
        $reservation->specialrequest = $validate_data['specialrequest'];

        $reservation->update();
        return redirect('/booking')->with('success', 'Your data have been submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = new Reservation;
        $reservation = $reservation->where('id', $id)->First();
        if ($reservation) {
            if ($reservation->reservation_status != 'pending' && $reservation->reservation_status != 'booked') {
                // Status is 'delivered', proceed with deletion
                $reservation->delete();
                return redirect('admin/reservation')->with(['success' => 'Reservation deleted successfully']);
            } else {
                // Status is not 'delivered', send an error message
                return redirect('admin/reservation')->with(['error' => 'Reservation is Booked or Pending. Cannot delete.']);
            }
        }
    }
    public function cancel(Request $request, $id)
    {
        // dd($request);
        $Reservation = Reservation::find($id);
        $Reservation->reservation_status = 'canceled';
        $Reservation->save();
        return redirect()->back()->with('success', 'Reservation is cancelled');
    }
}
