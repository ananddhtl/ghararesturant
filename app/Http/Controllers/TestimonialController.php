<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(5);
        return view('resturant.admin.Testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files= Files::paginate(9);
        return view('resturant.admin.Testimonials.create',compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial;
        $validate_data = $request->validate([
            'img' => 'required',
            'name' => 'required',
            'profession' => 'required',
            'description' => 'required',
        ]);
        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $testimonial->file_id = $imageId;
        $testimonial->img = $imageName;
        $testimonial->name = $validate_data['name'];
        $testimonial->profession = $validate_data['profession'];
        $testimonial->description = $validate_data['description'];

        $testimonial->save();
        return redirect('admin/testimonials')->with('success', 'Your data have been submitted');
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testimonial = new Testimonial;
        $testimonial = $testimonial->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.Testimonials.show', compact('testimonial','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = new Testimonial;
        $testimonial = $testimonial->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.Testimonials.edit', compact('testimonial','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = new Testimonial;
        $testimonial = $testimonial->where('id', $id)->First();
        $validate_data = $request->validate([
            'img' => 'required',
            'name' => 'required',
            'profession' => 'required',
            'description' => 'required'
        ]);
        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $testimonial->file_id = $imageId;
        $testimonial->img = $imageName;
        $testimonial->name = $validate_data['name'];
        $testimonial->profession = $validate_data['profession'];
        $testimonial->description = $validate_data['description'];

        $testimonial->update();
        return redirect('admin/testimonials')->with('success', 'Your data have been submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = new Testimonial;
        $testimonial = $testimonial->where('id', $id)->First();
        $testimonial->delete();
        return redirect('admin/testimonials')->with('success','Your data have been deleted');
    }
}
