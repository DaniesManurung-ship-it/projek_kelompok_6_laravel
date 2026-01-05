<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:5',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'subscribe' => $request->has('subscribe'), // true jika dicentang
        ]);

        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim.');
    }

    public function index()
{
    // Mengambil semua data pesan dari yang terbaru
    $messages = \App\Models\Contact::latest()->get();
    
    // Mengarahkan ke file blade baru yang akan kita buat
    return view('contact_list', compact('messages'));
}
}
