<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutFeature;
use App\Models\SiteConfig;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $about = About::query()->firstOrCreate([
            'img' => '',
            'title' => 'lorem20000000',
            'description' => 'This is so bad so bad it is sad so sad it makes you feel bad but in a good way.'
        ]);
        $aboutFeature = AboutFeature::limit(4)->get();
        $teams = Team::limit(4)->get();
        $settings=SiteConfig::all();
        return view('resturant.about', compact('about', 'aboutFeature', 'teams','settings'));
    }
}
