<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name .' Category';
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        $post = Post::withCount(['likes'])->latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString();
        $post->onEachSide(0);

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => $post,
            "user" => User::with('follows')->where('id',Auth::id())->first(),
            'categories' => Category::withCount('posts')->get(),
        ]);
    }

    public function show(Post $post)
    {
        // Ambil comments utama (parent_id null) dan load replies
        $comments = $post->comments()->with(['replies','user'])->get();

        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post,
            "comments" => $comments
        ]);
    }

   
}
