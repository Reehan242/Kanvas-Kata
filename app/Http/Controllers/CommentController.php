<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:360',
            'parent_id' => 'nullable|exists:comments,id',
        ]);


        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $validatedData['post_id'],
            'content' => ($request->has('replied_author')) ? '@' . $request->replied_author . ' ' . $validatedData['content'] : $validatedData['content'],
            'parent_id' => ($request->has('parent_id')) ? $validatedData['parent_id'] : null
        ]);

        // Redirect kembali ke halaman post menggunakan slug
        $post = Post::findOrFail($request->post_id); // Cari post berdasarkan ID
        return redirect()->route('post.show', ['post' => $post->slug])
            ->with('success', 'Komentar berhasil ditambahkan!');


    }
    public function show()
    {
        $comments = Comment::with('post')->latest()->where('user_id', Auth::id())->paginate(3);

        return view('dashboard.comments.index', [
            'comments' => $comments
        ]);
    }
}
