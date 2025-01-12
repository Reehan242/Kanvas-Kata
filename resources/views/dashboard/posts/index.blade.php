@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row d-flex">
        <div class="table-responsive small col-lg-12">
            <a href="/dashboard/posts/create" class="btn btn-success mb-3">Create new post</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->likes_count }}</td>
                            <td>{{ $post->comments_count }}</td>
                            <td>{{ $post->created_at->format('d F Y') }} ( {{ $post->created_at->diffForHumans() }} )</td>
                            <td>
                                <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-primary btn-sm mt-1 mb-1">
                                    Preview
                                </a>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                    class="btn btn-secondary btn-sm mt-1 mb-1">
                                    Edit
                                </a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm mt-1 mb-1"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
