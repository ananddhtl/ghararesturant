<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;




class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = new User;
        $users = $users->whereIn('role', [0])->paginate(10);
        return view('resturant.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resturant.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User;
        $validate_data = $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]
        );
        $users->name = $request->name;
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->save();
        return redirect('admin/users')->with('success', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = new User;
        $users = $users->where('id', $id)->First();
        return view('resturant.admin.user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new User;
        $user = $user->where('id', $id)->First();
        return view('resturant.admin.user.edit', compact('user'));
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

        $user = new User;
        $user = $user->where('id', $id)->First();
        $validate_data = $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',
            ]
        );
        $user->name = $validate_data['name'];
        $user->address =$validate_data['address'];
        $user->phone = $validate_data['phone'];
        $user->email = $validate_data['email'];
        $user->role = $validate_data['role'];
        
        $user->save();
        return redirect('admin/users')->with('success', 'Your data is submitted ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = new User;
        $users = $users->where('id', $id)->first();
        $users->delete();
        return redirect('admin/users')->with('success', 'Your data has been deleted');
    }
}
