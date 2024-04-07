<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::paginate(5);
        return view('resturant.admin.Foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files= Files::paginate(9);
        return view('resturant.admin.Foods.create',compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $food = new Food;
        $validate_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sub_description' => 'required',
            'img' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);
        $food->name = $validate_data['name'];
        $food->description = $validate_data['description'];
        $food->sub_description = $validate_data['sub_description'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);
        // Save the image ID and image name to the database
        $food->file_id = $imageId;
        $food->img = $imageName;
        $food->price = $validate_data['price'];
        $food->type = $validate_data['type'];

        $food->save();
        return redirect('admin/foods')->with('success', 'Your data have been submitted');
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $food = new Food;
        $food = $food->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.Foods.show', compact('food','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $food = new Food;
        $food = $food->where('id', $id)->First();
        $files= Files::paginate();
        return view('resturant.admin.Foods.edit', compact('food','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $food = new Food;
        $food = $food->where('id', $id)->First();
        $validate_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sub_description' => 'required',
            'img' => 'required',
            'price' => 'required|numeric',
            'type' => 'required'
        ]);
        $food->name = $validate_data['name'];
        $food->description = $validate_data['description'];
        $food->sub_description = $validate_data['sub_description'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $food->file_id = $imageId;
        $food->img = $imageName;
        $food->price = $validate_data['price'];
        $food->type = $validate_data['type'];

        $food->update();
        return redirect('admin/foods')->with('success', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $food = new Food;
        $food = $food->where('id', $id)->First();
        $food->delete();
        return redirect('admin/foods')->with('success','Your data have been deleted');
    }
}
