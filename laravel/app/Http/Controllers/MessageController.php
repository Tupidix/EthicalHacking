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
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' || Auth::user()->role === 'Lector') {
            $messages = Message::all();
        return view('message', compact('messages'));
        }
        else {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    }

    public function create()
    {   
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor') {
        return view('create-message');
        }
        else {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
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
