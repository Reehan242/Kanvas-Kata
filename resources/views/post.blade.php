@extends('layouts.main')

@section('container')

    <div class="container-fluid align-items-center justify-content-center p-5"
        style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(255, 255, 255, 0.6)), url('/img/blog_wallpaper6.jpg') center/cover no-repeat; min-height: 100vh;">

        {{-- Post Content Start --}}
        <div class="row justify-content-center mb-5 mt-5">
            <div class="col-lg-8 p-2">
                <h1 class="mb-3 fw-bold text-gradient-3">{{ $post->title }}</h1>
                <p>By. <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in
                    <a href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>

                @if ($post->image)
                    <div style="max-height:300px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid">
                    </div>
                @else
                    <img src="https://picsum.photos/1200/400" class="card-img-top img-fluid"
                        alt="{{ $post->category->name }}">
                @endif
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <div class="row">
                    <div class="col text-start mt-2">
                        @auth
                            @if ($post->likes->where('user_id', Auth::id())->isNotEmpty())
                                <button class="btn btn-danger like-btn" data-post-slug="{{ $post->slug }}">
                                    <i class="bi bi-hand-thumbs-up-fill"></i> | Unlike <span
                                        class="like-count">{{ $post->likes->count() }}</span>
                                </button>
                            @else
                                <button class="btn btn-primary like-btn" data-post-slug="{{ $post->slug }}">
                                    <i class="bi bi-hand-thumbs-up"></i> | Like <span
                                        class="like-count">{{ $post->likes->count() }}</span>
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login', ['redirect_url' => route('post.show', ['post' => $post->slug])]) }}"
                                class="btn btn-primary"><i class="bi bi-hand-thumbs-up"></i> | Like <span
                                    class="like-count">{{ $post->likes->count() }}</span></a>
                        @endauth
                    </div>
                    <div class="col text-end mt-2"><a href="/posts" class="btn btn-primary">Back To Home</a></div>
                </div>
            </div>
        </div>
        {{-- Post Content Start --}}

        {{-- Comments Start --}}
        <section id="comments">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <hr>
                    <h3>{{ $post->comments->isNotEmpty() ? 'Comments (' . $post->comments->count() . ')' : 'Comment' }}
                    </h3>
                    <br>
                    @auth
                        <div class="text-left">
                            <form action="{{ route('comment.store') }}#comments" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                <label for="comment" class="form-label">Add a new comment</label>
                                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Type Your Comment Here"></textarea>
                                <div class="row text-end">
                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="text-center">
                            <h5 class="text-muted">To post a comment, you have to login first</h5>
                            <a href="{{ route('login', ['redirect_url' => route('post.show', ['post' => $post->slug])]) }}"
                                class="btn btn-sm btn-secondary">Login</a>

                        </div>
                    @endauth

                    @forelse ($comments as $comment)
                        <div class="card text-left mt-2 bg-transparent">
                            <div class="card-body">
                                @if ($comment->user->name === $post->author->name)
                                    <p class="text-primary card-title">{{ $comment->user->name }} <span
                                            class="text-secondary">
                                            [ Author ]</span></p>
                                @else
                                    <p class="text-primary card-title">{{ $comment->user->name }}</p>
                                @endif

                                <p class="text-secondary card-subtitle mb-2">{{ $comment->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text">{{ Comment::filterContent($comment->content) }}</p>

                                <!-- Reply Form -->
                                @auth
                                    <a class="btn btn-sm btn-secondary me-2 mt-2" data-bs-toggle="collapse"
                                        href="#replyForm{{ $comment->id }}" role="button" aria-expanded="false"
                                        aria-controls="replyForm{{ $comment->id }}">
                                        Reply
                                    </a>
                                @else
                                    <a href="{{ route('login', ['redirect_url' => route('post.show', ['post' => $post->slug])]) . '#comments' }}"
                                        class="btn btn-sm btn-secondary">Reply [Login required]</a>
                                @endauth

                                <div class="collapse mt-2" id="replyForm{{ $comment->id }}">
                                    <form action="{{ route('comment.store') }}#comments" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="replied_author" value="{{ $comment->user->name }}">
                                        <textarea class="form-control" name="content" rows="2" placeholder="Type Your Comment Here"></textarea>
                                        <div class="row text-end">
                                            <div class="col">
                                                <button type="submit" class="btn btn-sm btn-primary mt-2">Reply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Nested Replies -->
                                @if ($comment->replies->isNotEmpty())
                                    <a class="btn btn-sm btn-secondary mt-2" data-bs-toggle="collapse"
                                        href="#replies{{ $comment->id }}" role="button" aria-expanded="false"
                                        aria-controls="replies{{ $comment->id }}">
                                        See Replies ({{ $comment->replies->count() }})
                                    </a>
                                    <div class="collapse mt-2" id="replies{{ $comment->id }}">
                                        <div class="ms-4">
                                            @foreach ($comment->replies as $reply)
                                                @include('partials.comment', ['comment' => $reply])
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="card text-left mt-5">
                            <div class="card-body">
                                <p>No Comments Yet...</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>
        
        {{-- Comments End --}}
    </div>
@endsection
