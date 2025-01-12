<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Request $request, Post $post)
    {

        $user = Auth::user();
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            $status = 'unliked';
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            $status = 'liked';
        }

        return response()->json(['status' => $status, 'likes_count' => $post->likes()->count()]);
    }

    public function show()
    {
        $likes = Like::with('post.author','post.category')->latest()->where('user_id', Auth::id())->paginate(10);

        return view('dashboard.likes.index', [
            'likes' => $likes
        ]);
    }


}
