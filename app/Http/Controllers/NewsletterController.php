<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index(){
        $newsletters=Newsletter::paginate(10);
        return view('resturant.admin.Newsletter.index',compact('newsletters'));
    }
    public function store(Request $request)
    {
        $newsletter=new Newsletter;
        $validate_data=$request->validate([
            'email'=>'nullable|email'
        ]);
        $newsletter->email = $validate_data['email'];
        $newsletter->save();
        return redirect('/')->with('success','We will send you our Updates');
    }
    public function show($id)
    {
        $newsletter = new Newsletter;
        $newsletter = $newsletter->where('id', $id)->First();
        return view('resturant.admin.Newsletter.show');
    }
    public function destroy($id)
    {
        $newsletter = new Newsletter;
        $newsletter = $newsletter->where('id', $id)->First();
        $newsletter->delete();
        return redirect('admin/foods')->with('success','Your data have been deleted');
    }
}
