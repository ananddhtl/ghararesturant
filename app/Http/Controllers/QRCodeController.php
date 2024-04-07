<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function __invoke(){
        $breakfast=Food::where('type', 'breakfast')->get();
        $lunch=Food::where('type', 'lunch')->get();
        $dinner=Food::where('type', 'dinner')->get();
        $drinks=Food::where('type', 'drinks')->get();
        $desert=Food::where('type', 'desert')->get();
        return view('resturant.Qr-scan',compact('desert','breakfast','lunch','dinner','drinks'));
    }
}
