@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post You Liked</h1>
    </div>

    <div class="row jsutify-content-start">
        <div class="col-lg-6">
            {{ $likes->links() }}
        </div>
        <div class="table-responsive small col-lg-12 px-3 my-1">
           
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Liked At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($likes as $like)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('post.show', ['post' => $like->post->slug]) }}" class="text-decoration-none text-black">{{ $like->post->title }} <br> <span class="text-primary"> [Go to Post] </span></a></td>
                            <td><a href="/posts?author={{ $like->post->author->username }}#all-posts" class="text-decoration-none text-black">{{ $like->post->author->name }} <br> <span class="text-primary">[See Author's Posts] </span></a></td>
                            <td><a href="/posts?category={{ $like->post->category->slug }}#all-posts" class="text-decoration-none text-black">{{ $like->post->category->name }} <br> <span class="text-primary">  [See Category's Posts] </span></a></td>
                            <td>{{ $like->created_at->format('d F Y') }} ({{ $like->created_at->diffForHumans() }})</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">You haven’t liked any posts yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
