@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Your Comments</h1>
    </div>

    <div class="row jsutify-content-start">
        <div class="col-lg-6 my-1">
            {{ $comments->links() }}
        </div>
        <div class="table-responsive small col-lg-12 px-3 my-2">
           
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Comments</th>
                        <th>On Post</th>
                        <th>Commented At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Comment::filterContent($comment->content) }}</td>
                            <td><a href="{{ route('post.show', ['post' => $comment->post->slug]) }}" class="text-decoration-none text-primary">{{ Str::limit($comment->post->title,15,'...') }} [View Post]</a></td>
                            <td>{{ $comment->created_at->format('d F Y') }} ({{ $comment->created_at->diffForHumans() }})</td>
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
