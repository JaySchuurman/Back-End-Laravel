<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        return view('messages.index',[
            'messages' => messages::all()
        ]);
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated= $request->validate([
        'user' => 'required|max:255',
        'message' => 'nullable',
    ]);
    

        // Create a new product
        Messages::create($validated);
        return redirect()->route('messages.index')->with('success', 'Message created successfully.');


    }
}