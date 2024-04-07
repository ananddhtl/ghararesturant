<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Files;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(5);
        return view('resturant.admin.TeamMembers.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files= Files::paginate(9);
        return view('resturant.admin.TeamMembers.create',compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = new Team;
        $validate_data = $request->validate([
            'name' => 'required',
            'post' => 'required',
            'description' => 'required',
            'sub_description' => 'required',
            'img' => 'required',
            'qualification' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
        ]);
        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $team->file_id = $imageId;
        $team->img = $imageName;
        $team->name = $validate_data['name'];
        $team->post = $validate_data['post'];
        $team->description = $validate_data['description'];
        $team->sub_description = $validate_data['sub_description'];
        $team->qualification = $validate_data['qualification'];
        $team->instagram = $validate_data['instagram'];
        $team->facebook = $validate_data['facebook'];
        $team->twitter = $validate_data['twitter'];
        $team->save(); 

        return redirect('admin/team_members')->with('success', 'Your data have been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = new Team;
        $team = $team->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.TeamMembers.show', compact('team','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = new Team;
        $team = $team->where('id', $id)->First();
        $files= Files::paginate(9);
        return view('resturant.admin.TeamMembers.edit', compact('team','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $team = new Team;
        $team = $team->where('id', $id)->First();
        $validate_data = $request->validate([
            'name' => 'required',
            'post' => 'required',
            'description' => 'required',
            'sub_description' => 'required',
            'img' => 'required',
            'qualification' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'twitter' => 'required'
        ]);
        $team->name = $validate_data['name'];
        $team->post = $validate_data['post'];
        $team->description = $validate_data['description'];
        $team->sub_description = $validate_data['sub_description'];
        list($imageId, $imageName) = explode('|', $validate_data['img']);

        // Save the image ID and image name to the database
        $team->file_id = $imageId;
        $team->img = $imageName;
        $team->qualification = $validate_data['qualification'];
        $team->instagram = $validate_data['instagram'];
        $team->facebook = $validate_data['facebook'];
        $team->twitter = $validate_data['twitter'];

        $team->update();
        return redirect('admin/team_members')->with('success', 'Your data have been submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = new Team;
        $team = $team->where('id', $id)->First();
        $team->delete();
        return redirect('admin/team_members')->with('success','Your data have been deleted');
    }
}
