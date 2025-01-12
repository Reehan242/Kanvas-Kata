@extends('layouts.main')

@section('container')

    {{-- banner home --}}
    <section id="banner">
        <div class="banner-container d-flex align-items-center justify-content-center vh-100 text-white pt-5"
            style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(30, 30, 30, 0.8)), url(/img/blog_wallpaper5.jpg) no-repeat center center; background-size: cover;">
            <div class="text-center px-4" style="backdrop-filter: blur(5px);">
                <h1 class="display-2 fw-bold mb-4 animate-title text-gradient">KanvasKata</h1>
                <p class="lead mb-5 text-light animate-description fw-bold">
                    Welcome to <span class="text-primary fw-bold text-gradient">KanvasKata</span> — a creative platform where
                    your words
                    come to life.
                    Share your thoughts, stories, or anything that’s on your mind. Whether it’s a heartfelt confession,
                    an imaginative tale, or just your daily musings, your voice matters here.
                </p>
                <a href="#all-posts" class="btn btn-khusus btn-outline-light btn-lg animate-button">Explore Posts</a>
            </div>
        </div>
    </section>

    {{-- All Posts --}}
    <section id="all-posts">
        <div class="banner-container d-flex align-items-center justify-content-center"
            style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(255, 255, 255, 0.2)), url('/img/blog_wallpaper4.jpg') center/cover no-repeat; min-height: 100vh; padding: 5rem 0;">
            <div class="container p-5" style="backdrop-filter: blur(6px);">

                <h1 class="fw-bold animate-title text-light text-gradient-2 py-2 mb-3">{{ $title }}</h1>
                <div class="row justify-content-center px-2">
                    <a href="/dashboard/posts/create" class="btn btn-success btn-outline-light animate-title py-2 fw-bold ">Write Your Own Post <span class="text-primary fw-bold">{{ Auth::check() ? '' : ' [Login Required]' }}</span></a>
                </div>
                <div class="row justify-content-start mt-4 text-start">
                    <div class="col-lg-6 mb-3 animate-title">
                        <form action="/posts#all-posts">
                            <div class="input-group">
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @elseif (request('author'))
                                    <input type="hidden" name="author" value="{{ request('author') }}">
                                @endif
                                <input type="text" class="form-control" placeholder="Search Post" name="search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-khusus btn-outline-light" type="submit">Search</button>
                            </div>
                        </form>

                    </div>
                    @if (request()->has('search') || request()->has('author') || request()->has('category'))
                        <div class="col-lg-3 mb-3 animate-title">
                            <div class="d-flex justify-content-start">
                                <a href="/posts#all-posts" class="btn btn-khusus btn-outline-light">Cancel Search / View All
                                    Posts</a>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-lg-12 my-3 animate-title">
                        <div class="d-flex justify-content-start">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="card bg-dark text-white mb-5 animate-card">
                            <div class="row g-0">

                                <div class="col-md-6 overflow-hidden">
                                    <div class="position-absolute px-2 py-1"
                                        style="background:rgba(0,0,0,0.6); backdrop-filter: blur(8px)"><span
                                            class="{{ $post->likes_count > 0 ? 'text-white' : 'text-secondary' }} like-icon">{{ $post->likes_count }}
                                            <i class="bi bi-hand-thumbs-up"></i></span></div>
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid h-100">
                                    @else
                                        <img src="https://picsum.photos/1200/600" class="img-fluid h-100"
                                            alt="{{ $post->category->name }}">
                                    @endif
                                </div>
                                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center py-4">

                                    <h2 class="text-center px-2 text-responsive">{{ $post->title }}</h2>
                                    <p class="text-light px-2 text-center">By <a
                                            href="/posts?author={{ $post->author->username }}#all-posts"
                                            class="text-decoration-none">{{ $post->author->name }}</a> in <a
                                            href="/posts?category={{ $post->category->slug }}#all-posts"
                                            class="text-decoration-none">{{ $post->category->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}</p>
                                    <p class="px-2 text-center">{{ $post->excerpt }}</p>
                                    <a href="/post/{{ $post->slug }}" class="btn btn-khusus mt-3 pt-2">Read More</a>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center my-3">
                        {{ $posts->links() }}
                    </div>
                @else
                    <p class="text-center fs-4 text-white">No post yet...</p>
                @endif
            </div>
        </div>
    </section>
    {{-- All Post End --}}

    {{-- All Categories Start --}}
    <section id="categories">
        <div class="banner-container d-flex align-items-center justify-content-center"
            style="background: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.6)), url('/img/blog_wallpaper3.jpg') center/cover no-repeat; min-height: 100vh; padding: 5rem 0;">
            <div class="container p-5" style="backdrop-filter: blur(6px);">
                <h1 class="mb-3 text-gradient-3 fw-bold animate-title text-light py-2">Post Categories</h1>
                <h5 class="mb-5 text-muted">Chekout available post categories</h5>

                <div class="container animate-card">
                    @if ($categories->count())
                        <div style="display: flex; width:100%; overflow-x: scroll; scroll-snap-type: x-mandatory;">
                            @foreach ($categories as $category)
                                <div class="col-md-4 m-1 p-3">
                                    <a href="/posts?category={{ $category->slug }}#all-posts" class="text-decoration-none">
                                        <div class="card h-100 text-bg-dark card-scale-up"
                                            style="scroll-snap-align: center; min-width:180px;">
                                            @if ($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}"
                                                    class="img-fluid h-100">
                                            @else
                                                <img src="https://picsum.photos/500/400" class="card-img"
                                                    style="min-height:150px;" alt="...">
                                            @endif
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $category->name }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text text-warning text-center">{{ $category->posts_count }}
                                                    Posts</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center fs-4 text-black">No category yet....</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- All Categories End --}}




    {{-- All Posts Start --}}
    {{-- <div class="container mt-4">
        <h1 class="mb-3 text-start">{{ $title }}</h1>

        <div class="row justify-content-center mb-3">
            <div class="col-lg-6">
                {{ $posts->links() }}
            </div>
            <div class="col-lg-6">
                <form action="/posts">
                    <div class="input-group mb-3">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @elseif (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <input type="text" class="form-control" placeholder="Search Post" name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($posts->count())
            <div class="card mb-3">
                @if ($posts[0]->image)
                    <div style="max-height:300px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top img-fluid">
                    </div>
                @else
                    <img src="https://picsum.photos/1200/300" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                @endif
                <div class="card-body text-center">
                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                        <h3 class="card-title">{{ $posts[0]->title }}</h3>
                    </a>
                    <p>
                        <small class="text-body-secondary">
                            By. <a href="/posts?author={{ $posts[0]->author->username }} "
                                class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                                href="/posts?category={{ $posts[0]->category->slug }}"
                                class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-8 text-start">
                            <a href="/post/{{ $posts[0]->slug }}"
                                class="text-decoration-none border border-primary rounded highlight-blue">Read More...</a>
                        </div>
                        <div class="col-4 text-end">
                            <span
                                class="{{ $posts[0]->likes_count > 0 ? 'text-danger' : 'text-secondary' }} like-icon">{{ $posts[0]->likes_count }}
                                <i class="bi bi-hand-thumbs-up"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($posts->skip(1) as $post)
                        <div class="col-lg-4">
                            <div class="card mt-2">
                                <div class="position-absolute bg-dark px-2 py-1"><a
                                        href="/posts?category={{ $post->category->slug }}"
                                        class="text-decoration-none text-white fs-7">{{ $post->category->name }}</a></div>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid">
                                @else
                                    <img src="https://picsum.photos/500/300" class="card-img-top"
                                        alt="{{ $post->category->name }}">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p>
                                        <small class="text-body-secondary">
                                            By. <a href="/posts?author={{ $post->author->username }} "
                                                class="text-decoration-none">{{ $post->author->name }}</a>
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text">{{ $post->excerpt }}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <a href="/post/{{ $post->slug }}"
                                                class="text-decoration-none border border-primary rounded highlight-blue">Read
                                                more...</a>

                                        </div>
                                        <div class="col-4 text-end">
                                            <span
                                                class="{{ $post->likes_count > 0 ? 'text-danger' : 'text-secondary' }} like-icon">{{ $post->likes_count }}
                                                <i class="bi bi-hand-thumbs-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center fs-4">No post found.</p>
        @endif

        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
    </div> --}}
    {{-- All Posts End --}}

@endsection
