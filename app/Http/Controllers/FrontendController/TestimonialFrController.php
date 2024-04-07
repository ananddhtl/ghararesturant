<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\SiteConfig;

class TestimonialFrController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $testimonials=Testimonial::all();
        $settings=SiteConfig::all();
        return view('resturant.testimonial',compact('testimonials','settings'));
    }
}
