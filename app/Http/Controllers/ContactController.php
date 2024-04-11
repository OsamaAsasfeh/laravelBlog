<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function store(ContactRequest $request){
        $data = $request->validated();
        Contact::create($data);
         return back()->with('status','Subsrived Successfully');
        //dd($request);
        // $data = $request->validate([
        //     'email' => 'required|email|unique:subscribers,email',
        //     'name' => 'required|string|max:255', // Assuming 'name' should be a required string with a maximum length of 255 characters.
        //     'subject' => 'required ', // Assuming 'subject' is also a required string, max length 255.
        //     'message' => 'required  ', // 'message' is required but might be longer, so we're not setting a max length here.
        // ]);
        //  Contact::create($data);
        //  return back()->with('status','Subsrived Successfully');//stauts help with the staus of the request in the sisson
     }
}
