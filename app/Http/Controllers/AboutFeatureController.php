<?php

namespace App\Http\Controllers;

use App\Models\AboutFeature;
use App\Models\Files;

use Illuminate\Http\Request;

class AboutFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = AboutFeature::paginate(5);
        return view('resturant.admin.AboutFeatures.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = Files::paginate(9);
        return view('resturant.admin.AboutFeatures.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $feature = new AboutFeature;

        // Validate the form data
        $validate_data = $request->validate([
            'feature' => 'required'
        ]);

       $feature->feature = $validate_data['feature'];
        $feature->save();
        return redirect('admin/about_features')->with('success', 'Your data has been submitted');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $feature = new AboutFeature;
        $feature = $feature->where('id', $id)->First();
        $files = Files::paginate(9);
        return view('resturant.admin.AboutFeatures.show', compact('feature', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feature = new AboutFeature;
        $feature = $feature->where('id', $id)->First();
        $files = Files::paginate(9);
        return view('resturant.admin.AboutFeatures.edit', compact('feature', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $feature = new AboutFeature;
        $feature = $feature->where('id', $id)->First();
        $validate_data = $request->validate([
            'feature' => 'required'
        ]);
       $feature->feature = $validate_data['feature'];
        $feature->update();
        return redirect('admin/about_features')->with('success', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = new AboutFeature;
        $feature = $feature->where('id', $id)->First();
        $feature->delete();
        return redirect('admin/about_features')->with('success', 'Your data have been deleted');
    }
}
