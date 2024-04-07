<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::paginate(8);
        return view('resturant.admin.Contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //   return view('resturant.admin.Contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $contact=new Contact;
       $validate_data=$request->validate([
        'name'=>'required',
        'email'=>'required',
        'subject'=>'required',
        'message'=>'required',
       ]);
       $contact->name = $validate_data['name'];
       $contact->email = $validate_data['email'];
       $contact->subject = $validate_data['subject'];
       $contact->message = $validate_data['message'];
       $contact->save();
       return redirect('contact')->with('success', 'Your message have been sent');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = new Contact;
        $contact = $contact->where('id', $id)->First();
        return view('resturant.admin.Contacts.show', compact('contact','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = new Contact;
        $contact = $contact->where('id', $id)->First();
        return view('resturant.admin.Contacts.edit', compact('contact','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact=new Contact;
        $contact = $contact->where('id', $id)->First();
        $validate_data=$request->validate([
         'name'=>'required',
         'email'=>'required',
         'subject'=>'required',
         'message'=>'required',
        ]);
        $contact->title = $validate_data['name'];
        $contact->description = $validate_data['email'];
        $contact->sub_description = $validate_data['subject'];
        $contact->message = $validate_data['message'];
        $contact->update();
        return redirect('admin/contacts')->with('success', 'Your data have been submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Contacts = new Contact;
        $Contacts = $Contacts->where('id', $id)->First();
        $Contacts->delete();
        return redirect('admin/contacts')->with('success','Your data have been deleted');
    }
}
