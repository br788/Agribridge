<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = SupportMessage::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('support.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        SupportMessage::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'en_attente',
        ]);

        return redirect()->route('support')->with('success', 'Votre message a été envoyé. Nous vous répondrons dans les plus brefs délais.');
    }
}