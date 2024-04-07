<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = new User;
        $admins = $admins->whereIn('role', [0, 1])->paginate(10);
        return view('Resturant.admin.Admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('resturant.ad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admins = new User;
        $validate_data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'password' => 'required',
                'role' => 'required',
            ]
        );
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->address = $request->address;
        $admins->password = $request->password;
        $admins->role = $request->role;
        $admins->save();
        return redirect('admin/admins')->with('success', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admins = new User;
        $admins = $admins->where('id', $id)->First();
        return view('resturant.admin.Admin.show', compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = new User;
        $admins = $admins->where('id', $id)->First();
        return view('resturant.admin.Admin.edit', compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $admins = new User;
        $admins = $admins->where('id', $id)->First();
        $validate_data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'role' => 'required',
            ]
        );
        $admins->name =  $validate_data['name'];
        $admins->email =  $validate_data['email'];
        $admins->address =  $validate_data['address'];
        $admins->phone =  $validate_data['phone'];
        $admins->role =  $validate_data['role'];
        $admins->update();
        return redirect('admin/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = new User;
        $admins = $admins->where('id', $id)->first();;
        $admins->delete();
        return redirect('admin/admins')->with('success', 'Your data has been deleted');
    }
}