<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Contact $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Contact $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus!');
    }

    public function reply(Request $request, Contact $message)
    {
        $validated = $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string',
        ]);

        $mailSent = false;

        try {
            \Illuminate\Support\Facades\Mail::raw($validated['reply_message'], function ($mail) use ($message, $validated) {
                $mail->to($message->email)
                    ->subject($validated['reply_subject']);
            });
            $mailSent = true;
        } catch (\Throwable $e) {
            // Log or catch mail exception if SMTP is not configured on local machine
            $mailSent = false;
        }

        $message->update([
            'is_replied' => true,
            'reply_message' => $validated['reply_message'],
            'replied_at' => now(),
        ]);

        if ($mailSent) {
            return redirect()->route('admin.messages.show', $message)->with('success', 'Balasan pesan berhasil dikirim via Email ke ' . $message->email . '!');
        } else {
            return redirect()->route('admin.messages.show', $message)->with('success', 'Balasan berhasil disimpan di sistem! (Catatan: Untuk pengiriman email otomatis ke inbox penerima, atur SMTP Mail di file .env)');
        }
    }
}
