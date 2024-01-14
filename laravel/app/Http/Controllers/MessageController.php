<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function index()
    {
        return view('message');
    }

    public function create()
    {
        return view('create-message');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Use the authenticated user's ID directly
        auth()->user()->messages()->create([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
        ]);
    
        return redirect()->route('create-message')->with('success', 'Message created successfully!');
    }
}
