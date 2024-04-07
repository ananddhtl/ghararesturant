<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = SiteConfig::paginate(10);
        return view('resturant.admin.siteConfigs.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resturant.admin.siteConfigs.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setting= new SiteConfig;
        $validate_data= $request->validate([
            'siteKey'=>'required',
            'siteValue'=>'required'
        ]);
        $setting->siteKey=$validate_data['siteKey'];
        $setting->siteValue=$validate_data['siteValue'];
        $setting->save();
        return redirect('admin/settings')->with('success','Your data have been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $setting = new SiteConfig;
        $setting = $setting->where('id', $id)->First();
        return view('resturant.admin.siteConfigs.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = new SiteConfig;
        $setting = $setting->where('id', $id)->First();
        return view('resturant.admin.siteConfigs.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = SiteConfig::find($id);
    
        // If the record is not found, you might want to handle this case appropriately
        if (!$setting) {
            return redirect('admin/settings')->with('error', 'Setting not found');
        }
    
        // Validate the request data
        $validate_data = $request->validate([
            'siteValue' => 'required'
        ]);
    
        // Update the attribute and save the record
        $setting->update(['siteValue' => $validate_data['siteValue']]);
    
        return redirect('admin/settings')->with('success', 'Your data has been submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteConfig $siteConfig)
    {
        //
    }
}
