@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <a href="/dashboard/posts" class="btn btn-success mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                    </svg>
                    Back to all my posts
                </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil" viewBox="0 0 16 16">
                        <path
                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                    </svg>
                    Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mt-1" onclick="return confirm('Are you sure?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        Delete
                    </button>
                </form>

                <div class="col-lg-8 mt-2 mb-2" style="height: 250px;">
                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top img-fluid" style="max-height:250px; overflow:hidden;" alt="{{ $post->image}}">
                    @else
                        <img src="https://picsum.photos/1200/400" class="card-img-top img-fluid"
                            alt="{{ $post->category->name }}" style="max-height:250px; overflow:hidden;">
                    @endif
                </div>
                <article class="my-3 fs-5"> 
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection


