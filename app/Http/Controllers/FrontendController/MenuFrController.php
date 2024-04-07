<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteConfig;

class MenuFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $foodsQr = Food::all();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $breakfast = Food::where('type', 'breakfast')->get();
        $lunch = Food::where('type', 'lunch')->get();
        $dinner = Food::where('type', 'dinner')->get();
        $drinks = Food::where('type', 'drinks')->get();
        $desert = Food::where('type', 'desert')->get();
        $teams = Team::limit(4)->get();
        $settings=SiteConfig::all();
        return view('resturant.menu', compact('desert', 'user_id', 'breakfast', 'lunch', 'dinner', 'drinks', 'foodsQr', 'teams','settings'));
    }
}
