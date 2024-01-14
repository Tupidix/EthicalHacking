<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


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
        Message::create([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
            'userEmail' => Auth::user()->email,
        ]);
    
        return redirect()->route('create-message')->with('success', 'Message created successfully!');
    }
}
