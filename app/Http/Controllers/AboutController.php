<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Files;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::paginate(5);
        return view('resturant.admin.About_us.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files= Files::paginate(9);
        return view('resturant.admin.About_us.create',compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $about = new About;
        $validate_data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img' => 'required',
        ]);
        $about->title = $validate_data['title'];
        $about->description = $validate_data['description'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);
        // Save the image ID and image name to the database
        $about->file_id = $imageId;
        $about->img = $imageName;

        $about->save();
        return redirect('admin/about')->with('success', 'Your data have been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $about = new About;
        $about = $about->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.About_us.show', compact('about','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = new About;
        $about = $about->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.About_us.edit', compact('about','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about = new About;
        $about = $about->where('id', $id)->First();
        $validate_data = $request->validate([
            'img' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $about->title = $validate_data['title'];
        $about->description = $validate_data['description'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);
        // Save the image ID and image name to the database
        $about->file_id = $imageId;
        $about->img = $imageName;

        $about->update();
        return redirect('admin/about')->with('success', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = new About;
        $about = $about->where('id', $id)->First();
        $about->delete();
        return redirect('admin/about')->with('success','Your data have been deleted');
    }
}
