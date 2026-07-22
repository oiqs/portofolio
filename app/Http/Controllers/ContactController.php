<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000',
        ]);

        // Sementara data belum dikirim ke mana-mana / disimpan.
        // Nanti bisa ditambahkan: Mail::send(...) atau simpan ke database.

        return redirect('/contact')->with('success', 'Pesan kamu berhasil dikirim. Terima kasih!');
    }
}