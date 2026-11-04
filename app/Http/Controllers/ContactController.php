<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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

        $contact = Contact::create($validated);

        // Kirim email notifikasi ke admin
        try {
            Mail::raw(
                "Halo Thoriq,\n\nAda pesan baru yang masuk dari formulir kontak portofolio:\n\n" .
                "Nama: " . $validated['name'] . "\n" .
                "Email: " . $validated['email'] . "\n" .
                "Waktu: " . now()->format('d M Y, H:i') . " WIB\n\n" .
                "Isi Pesan:\n" . $validated['message'] . "\n\n" .
                "----------------------------------------\n" .
                "Pesan ini juga telah tersimpan di Panel Admin Anda:\n" .
                url('/admin/messages/' . $contact->id),
                function ($mail) use ($validated) {
                    $mail->to('oiqgemink27@gmail.com')
                         ->replyTo($validated['email'], $validated['name'])
                         ->subject('Pesan Baru dari ' . $validated['name'] . ' (Portofolio)');
                }
            );
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim email kontak: ' . $e->getMessage());
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pesan kamu berhasil dikirim dan tersimpan di panel admin! Terima kasih.',
                'contact' => $contact,
            ]);
        }

        return redirect('/contact')->with('success', 'Pesan kamu berhasil dikirim dan tersimpan di panel admin! Terima kasih.');
    }
}
