<div class="card text-left mt-2 bg-transparent">
    <div class="card-body">
        @if ($comment->user->name === $post->author->name)
            <p class="text-primary card-title">{{ $comment->user->name }} <span class="text-secondary">
                    [ Author ]</span></p>
        @else
            <p class="text-primary card-title">{{ $comment->user->name }}</p>
        @endif
        <p class="text-secondary card-subtitle mb-2">{{ $comment->created_at->diffForHumans() }}</p>
        <p class="card-text">{{ Comment::filterContent($comment->content) }}</p>

        <!-- Nested Reply Form -->
        @auth
            <a class="btn btn-sm btn-secondary" data-bs-toggle="collapse" href="#replyForm{{ $comment->id }}" role="button"
                aria-expanded="false" aria-controls="replyForm{{ $comment->id }}">
                Reply
            </a>
        @else
            <a href="{{ route('login', ['redirect_url' => route('post.show', ['post' => $post->slug])]).'#comments' }}"
                class="btn btn-sm btn-secondary">Reply [Require Login]</a>
        @endauth
        <div class="collapse mt-2" id="replyForm{{ $comment->id }}">
            <form action="{{ route('comment.store') }}#comments" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="parent_id" value="{{ $comment->parent_id }}">
                <input type="hidden" name="replied_author" value="{{ $comment->user->name }}">
                <textarea class="form-control" name="content" rows="2" placeholder="Type Your Comment Here"></textarea>
                <div class="row text-end">
                    <div class="col">
                        <button type="submit" class="btn btn-sm btn-primary my-2 ms-2">Reply</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Recursive Nested Replies -->
        {{-- @if ($comment->replies->isNotEmpty())
            <a class="btn btn-sm btn-secondary" data-bs-toggle="collapse" href="#replies{{ $comment->id }}"
                role="button" aria-expanded="false" aria-controls="replies{{ $comment->id }}">
                See Replies ({{ $comment->replies->count() }})
            </a>
            <div class="collapse mt-2" id="replies{{ $comment->id }}">
                <div class="ms-4">
                    @foreach ($comment->replies as $reply)
                        @include('partials.comment', ['comment' => $reply])
                    @endforeach
                </div>
            </div>
        @endif --}}
    </div>
</div>
