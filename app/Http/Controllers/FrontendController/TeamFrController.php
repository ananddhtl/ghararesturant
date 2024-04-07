<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class TeamFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $teams = Team::all();
        $settings=SiteConfig::all();
        return view('resturant.team',compact('teams','settings'));
    }
}
