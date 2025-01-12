@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Post Categories</h1>
    <h5 class="mb-5 text-muted">Chekout available post categories</h5>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mt-3">
                    <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">
                        <div class="card text-bg-dark card-scale-up">
                            <img src="https://picsum.photos/500/400" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title flex-fill text-center p-4 fs-3"
                                    style="background-color:rgba(0,0,0,0.7);">{{ $category->name }}</h5>
                            </div>
                            <div class="card-footer">
                                <h5 class="text-warning text-center">{{ $category->posts_count }} Posts</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
