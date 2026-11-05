<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(15);
        $totalComments = Comment::count();
        $approvedCount = Comment::where('is_approved', true)->count();
        $pendingCount = Comment::where('is_approved', false)->count();

        return view('admin.comments.index', compact('comments', 'totalComments', 'approvedCount', 'pendingCount'));
    }

    public function toggleApproval(Comment $comment)
    {
        $comment->update([
            'is_approved' => !$comment->is_approved
        ]);

        $status = $comment->is_approved ? 'ditampilkan' : 'disembunyikan';
        return redirect()->route('admin.comments.index')->with('success', "Komentar berhasil {$status} di website publik!");
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'Komentar berhasil dihapus permanen!');
    }

    /**
     * Sinkronkan komentar dan pesan kontak dari website Vercel online ke database lokal
     */
    public function syncWeb()
    {
        $syncedComments = 0;
        $syncedContacts = 0;

        // 1. Ambil Komentar dari Vercel
        try {
            $response = Http::timeout(10)->get('https://perjalanan-oiq.vercel.app/api/comments');
            if ($response->successful()) {
                $data = $response->json();
                $commentsList = $data['data'] ?? [];

                foreach ($commentsList as $item) {
                    if (empty($item['name']) || empty($item['message'])) continue;

                    $exists = Comment::where('name', $item['name'])
                        ->where('message', $item['message'])
                        ->exists();

                    if (!$exists) {
                        Comment::create([
                            'name' => $item['name'],
                            'message' => $item['message'],
                            'avatar' => $item['avatar'] ?? null,
                            'is_approved' => true,
                            'created_at' => !empty($item['created_at']) ? $item['created_at'] : now(),
                        ]);
                        $syncedComments++;
                    }
                }
            }
        } catch (\Throwable $e) {
            Log::warning('Gagal sinkron komentar dari web: ' . $e->getMessage());
        }

        // 2. Ambil Pesan Kontak dari Vercel
        try {
            $response = Http::timeout(10)->get('https://perjalanan-oiq.vercel.app/api/contact');
            if ($response->successful()) {
                $data = $response->json();
                $contactsList = $data['data'] ?? [];

                foreach ($contactsList as $item) {
                    if (empty($item['name']) || empty($item['message'])) continue;

                    $exists = Contact::where('email', $item['email'] ?? '')
                        ->where('message', $item['message'])
                        ->exists();

                    if (!$exists) {
                        Contact::create([
                            'name' => $item['name'],
                            'email' => $item['email'] ?? 'pengunjung@web.com',
                            'message' => $item['message'],
                            'created_at' => !empty($item['created_at']) ? $item['created_at'] : now(),
                        ]);
                        $syncedContacts++;
                    }
                }
            }
        } catch (\Throwable $e) {
            Log::warning('Gagal sinkron pesan kontak dari web: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', "Sinkronisasi selesai! {$syncedComments} komentar baru dan {$syncedContacts} pesan kontak baru berhasil ditarik dari web Vercel ke panel admin.");
    }
}
