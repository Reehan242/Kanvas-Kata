<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $posts = Post::withCount('likes')->where('user_id', $user_id)->get();
        $user = User::withCount('likes', 'comments')->latest()->where('id', $user_id)->get();
        $likes = Like::with('post')->latest()->where('user_id', $user_id)->get();
        $userComments = Comment::with('post')->latest()->where('user_id', $user_id)->get();
        $receivedComments = Comment::with('post')
            ->whereHas('post', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->where('user_id', '!=', $user_id)
            ->latest()
            ->get();


        $totalLikesGet = $posts->sum('likes_count');
        $totalLikedPost = $user->sum('likes_count');
        $totalCommentsMade = $user->sum('comments_count');
        return view('dashboard.index', [
            'posts' => $posts,
            'likes' => $likes,
            'comments' => $userComments,
            'receivedComments' => $receivedComments,
            'totalLikes' => $totalLikesGet,
            'totalLikedPost' => $totalLikedPost,
            'totalCommentsMade' => $totalCommentsMade,
        ]);
    }
}
