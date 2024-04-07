<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = new files;
        $files = $files->paginate(6);
        return view('resturant.admin.FileManager.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resturant.admin.FileManager.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = new files;
        $validate_data = $request->validate([
            'img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|max:100'
        ]);
        $fileName = Str::slug($request->title)  . '-' . time() . '.' . $request->img->extension();
        $request->img->move(public_path('uploads'), $fileName);
        $file->title = $request->title;
        $file->img = $fileName;

        $file->save();
        return redirect('/admin/fileManager')->with('success', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $file = new files;
        $file = $file->where('id', $id)->First();
        return view('resturant.admin.FileManager.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $file = new files;
        $file = $file->where('id', $id)->First();
        return view('resturant.admin.FileManager.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate_data = $request->validate([
            'img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|max:100'
        ]);
        $file = new files;
        $file = $file->where('id', $id)->First();
        $file->title = $request->title;
        if ($request->img != NULL) {
            $fileName = Str::slug($request->title) . "-" . time() . '.' . $request->img->extension();
            File::delete(public_path('uploads/' . $file->img));
            $request->img->move(public_path('uploads'), $fileName);
            $file->img = $fileName;
        }
        $file->update();
        return redirect('admin/fileManager')->with('success', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = files::find($id);
        if ($file) {
            // Check if the record is not used in any related table
            if (!$this->isUsedInRelatedTables($file)) {
                // If not used, delete the file and the record
                File::delete(public_path('uploads/' . $file->img));
                $file->delete();
    
                return redirect('/admin/fileManager')->with('success', 'Your data has been deleted');
            } else {
                // If used in any related table, show a message or redirect as needed
                return redirect('/admin/fileManager')->with('error', 'Cannot delete. Data is used in other tables.');
            }
        } else {
            // Handle the case where the record with the given ID is not found
            return redirect('/admin/fileManager')->with('error', 'Record not found');
        }
    }
    
    // Custom method to check if the record is used in any related table
    private function isUsedInRelatedTables($file)
    {
        // Check if the record is used in any related table
        return $file->about()->exists() ||
               $file->carousels()->exists() ||
               $file->foods()->exists() ||
               $file->teams()->exists();
    } 
}
