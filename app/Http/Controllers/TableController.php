<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::paginate(5);
        return view('resturant.admin.Tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = Files::paginate(9);
        return view('resturant.admin.Tables.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table = new Table;
        $validate_data = $request->validate([
            'img' => 'required',
            'table_status' => 'nullable',
            'table_no' => 'required|unique:tables',
            'description' => 'required',
            'floor' => 'required',
        ]);
        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $table->file_id = $imageId;
        $table->img = $imageName;
        $table->table_status = $validate_data['table_status'];
        $table->table_no = $validate_data['table_no'];
        $table->description = $validate_data['description'];
        $table->floor = $validate_data['floor'];
        $table->save();
        return redirect('admin/tables')->with('success', 'Your data have been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $table = new table;
        $table = $table->where('id', $id)->First();
        $files = Files::paginate(9);
        return view('resturant.admin.tables.show', compact('table', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $table = new table;
        $table = $table->where('id', $id)->First();
        $files = Files::paginate(9);
        return view('resturant.admin.tables.edit', compact('table', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $table = new Table;
        $table = $table->where('id', $id)->First();
        $validate_data = $request->validate([
            'img' => 'required',
            'table_status' => 'nullable',
            'description' => 'required',
            'floor' => 'required',
        ]);

        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $table->file_id = $imageId;
        $table->img = $imageName;
        $table->table_status = $validate_data['table_status'];
        $table->description = $validate_data['description'];
        $table->floor = $validate_data['floor'];
        $table->save();
        return redirect('admin/tables')->with('success', 'Your data have been submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $table = Table::where('id', $id)->first();

        if ($table) {
            if ($table->table_status != 'booked') {
                // Status is 'delivered', proceed with deletion
                $table->delete();
                return redirect('admin/tables')->with(['success' => 'table deleted successfully']);
            } else {
                // Status is not 'delivered', send an error message
                return redirect('admin/tables')->with(['error' => 'table is Booked. Cannot delete.']);
            }
        }
    }
}
