<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class UserFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        if (auth()->check()) {
            $user_id = Auth()->user()->id;
            $user = User::where('id', $user_id)->first();
            $settings = SiteConfig::all();
            return view('resturant.user-profile', compact('user', 'settings'));
        } else {
            return redirect('/login')->with('error', 'User not found.');
        }
    }
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        // If the user is not found, redirect with an error message
        if (!$user) {
            return redirect('user-info')->with('error', 'User not found.');
        }

        // Validate the form data
        $validate_data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6', // Allow the password to be nullable (optional)
        ]);

        // Update the user attributes
        $user->name = $validate_data['name'];
        $user->address = $validate_data['address'];
        $user->phone = $validate_data['phone'];
        $user->email = $validate_data['email'];

        // Update the password only if it is provided in the form
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Save the changes
        $user->save();

        // Redirect with a success message
        return redirect('/user-info')->with('success', 'Your data is submitted.');
    }
    public function passwordChange()
    {
        if (auth()->check()) {
            $user_id = Auth()->user()->id;
            $settings = SiteConfig::all();
            $user = User::where('id', $user_id)->first();
            return view('resturant.change-password', compact('settings', 'user'));
        } else {
            return redirect('/login')->with('error', 'User not found.');
        }
    }
}
