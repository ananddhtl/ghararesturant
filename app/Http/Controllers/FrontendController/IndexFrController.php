<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutFeature;
use App\Models\Carousel;
use App\Models\Food;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class IndexFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $foods = Food::limit(4)->get();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $carousels = Carousel::all();
        $about = About::query()->firstOrCreate([
            'img'=>'',
            'title'=>'Resturant bagaicha',
            'description'=>'Welcome to our resturant Bagaicha where You will feel at home'
        ]);
        $aboutFeature = AboutFeature::limit(4)->get();
        $teams = Team::limit(4)->get();
        $testimonials = Testimonial::all();
        $settings=SiteConfig::all();
        return view('resturant.index', compact('carousels', 'about', 'aboutFeature', 'foods', 'teams', 'testimonials','user_id','settings'));
    }
}
