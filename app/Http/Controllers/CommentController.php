<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Get recent comments
     */
    public function index()
    {
        $comments = Comment::where('is_approved', true)
            ->latest()
            ->take(50)
            ->get()
            ->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'name' => $comment->name,
                    'message' => $comment->message,
                    'avatar' => $comment->avatar ?: 'https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($comment->name),
                    'created_at' => $comment->created_at->toISOString(),
                    'time_ago' => $comment->created_at->diffForHumans(),
                ];
            });

        return response()->json([
            'status' => 'success',
            'data' => $comments,
        ]);
    }

    /**
     * Store a new comment
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
            'avatar' => 'nullable|string|max:255',
        ]);

        $avatar = $validated['avatar'] ?? ('https://api.dicebear.com/7.x/adventurer/svg?seed=' . urlencode($validated['name']));

        $comment = Comment::create([
            'name' => $validated['name'],
            'message' => $validated['message'],
            'avatar' => $avatar,
            'ip_address' => $request->ip(),
            'is_approved' => true,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Komentar berhasil dikirim!',
            'data' => [
                'id' => $comment->id,
                'name' => $comment->name,
                'message' => $comment->message,
                'avatar' => $comment->avatar,
                'created_at' => $comment->created_at->toISOString(),
                'time_ago' => 'Baru saja',
            ],
        ], 201);
    }
}
