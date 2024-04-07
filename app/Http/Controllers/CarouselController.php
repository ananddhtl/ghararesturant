<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Files;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::paginate(5);
        return view('resturant.admin.Carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files= Files::paginate(9);
        return view('resturant.admin.Carousels.create',compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carousel = new Carousel;
        $validate_data = $request->validate([
            'title' => 'required',
            'img' => 'required'
        ]);
        $carousel->title = $validate_data['title'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);
        // Save the image ID and image name to the database
        $carousel->file_id = $imageId;
        $carousel->img = $imageName;
        $carousel->save();
        return redirect('admin/carousels')->with('success', 'Your data have been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {  $carousels = new Carousel;
        $carousels = $carousels->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.Carousels.show', compact('carousels','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carousels = new Carousel;
        $carousels = $carousels->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.Carousels.edit', compact('carousels','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carousel = new Carousel;
        $carousel = $carousel->where('id', $id)->First();
        $validate_data = $request->validate([
            'title' => 'required',
            'img' => 'required'
        ]);
        $carousel->title = $validate_data['title'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);
        // Save the image ID and image name to the database
        $carousel->file_id = $imageId;
        $carousel->img = $imageName;

        $carousel->update();
        return redirect('admin/carousels')->with('success', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carousels = new Carousel;
        $carousels = $carousels->where('id', $id)->First();
        $carousels->delete();
        return redirect('admin/carousels')->with('success','Your data have been deleted');

    }
}
