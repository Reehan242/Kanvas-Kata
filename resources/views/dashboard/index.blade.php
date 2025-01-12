@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back,<span class="text-primary">{{ auth()->user()->name }}</span> </h1>
    </div>

    <h3 class="text-center mt-4 mb-3 text-primary">Statistic Summary</h3>
    <div class="row d-flex justify-content-start">
        <div class="col-xl-8 border">
            <div id="chart_div" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="table-responsive small col-xl-4 border px-4 py-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Statistic</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Posts Made</td>
                        <td>{{ $posts->count() }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Likes Received</td>
                        <td>{{ $totalLikes }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Liked Given</td>
                        <td>{{ $totalLikedPost }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Comments Made</td>
                        <td>{{ $totalCommentsMade }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Comments Recieved</td>
                        <td>{{ $receivedComments->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Statistic', 'Value'], // Header
                ['Posts Made', {{ $posts->count() }}],
                ['Likes Received', {{ $totalLikes }}],
                ['Liked Given', {{ $totalLikedPost }}],
                ['Comments Made', {{ $totalCommentsMade }}],
                ['Comments Received', {{ $receivedComments->count() }}]
            ]);

            var options = {
                // is3D: true, // Untuk efek 3D, bisa dihapus jika tidak diperlukan
                colors: ['#1E88E5', '#D32F2F', '#FBC02D', '#7CB342', '#8E24AA']
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        // Redraw chart on window resize
        window.addEventListener('resize', drawChart);
    </script>

    <hr>

    {{-- Recent Activities Start --}}
    <h2 class="text-center mt-3 mb-4 text-primary">Latest Activities</h2>
    <div class="row justify-content-start">
        <!-- Section: Latest Posts -->
        <div class="table-responsive small col-xl-6 border rounded px-3 my-2">
            <h5 class="py-2">Latest Posts</h5>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts->take(10) as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('post.show', ['post' => $post->slug]) }}"
                                    class="text-decoration-none">{{ $post->title }}
                                    <span class="text-primary">[View Details]</span></a></td>
                            <td>{{ $post->created_at->format('d F Y') }} ({{ $post->created_at->diffForHumans() }})</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">You haven’t created any posts yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Section: Posts You Liked -->
        <div class="table-responsive small col-xl-6 border rounded px-3 my-2">
            <h5 class="py-2">Posts You Liked</h5>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Liked At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($likes->take(10) as $like)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('post.show', ['post' => $like->post->slug]) }}"
                                    class="text-decoration-none">{{ $like->post->title }}
                                    <span class="text-primary">[View Post]</span></a></td>
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

        <!-- Section: Your Recent Comments -->
        <div class="table-responsive small col-xl-6 border rounded px-3 my-2">
            <h5 class="py-2">Your Latest Comments</h5>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Comment</th>
                        <th>Commented At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments->take(10) as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('post.show', ['post' => $comment->post->slug]) }}"
                                    class="text-decoration-none">{{ Comment::filterContent($comment->content) }}
                                    <span class="text-primary">[View Post]</span></a></td>
                            <td>{{ $comment->created_at->format('d F Y') }} ({{ $comment->created_at->diffForHumans() }})
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">You haven’t commented on any posts yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Section: Comments Received on Your Posts -->
        <div class="table-responsive small col-xl-6 border rounded px-3 my-2">
            <h5 class="py-2">Comments Received on Your Posts</h5>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Comment</th>
                        <th>Commented At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($receivedComments->take(10) as $receivedComment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('post.show', ['post' => $receivedComment->post->slug]) }}"
                                    class="text-decoration-none">{{ Comment::filterContent($receivedComment->content) }}
                                    <span class="text-primary">[View Post]</span></a></td>
                            <td>{{ $receivedComment->created_at->format('d F Y') }}
                                ({{ $receivedComment->created_at->diffForHumans() }})
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No one has commented on your posts yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


{{-- Statistic Summary Start --}}

    {{-- <h2 class="text-center mt-3 mb-3 text-primary">Statistic Summary</h2>
    <div class="row justify-content-center">
        <div class="col-xl-3 mx-2 my-2">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-light text-center">
                    <h5>Posts Made</h5>
                </div>
                <div class="card-body text-center">
                    <p class="fs-4 text-secondary">{{ $posts->count() }} Posts</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mx-2 my-2">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-light text-center">
                    <h5>Likes Received</h5>
                </div>
                <div class="card-body text-center">
                    <p class="fs-4 text-secondary">{{ $totalLikes }} Likes</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mx-2 my-2">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-light text-center">
                    <h5>Liked Given</h5>
                </div>
                <div class="card-body text-center">
                    <p class="fs-4 text-secondary">{{ $totalLikedPost }} Liked Posts</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mx-2 my-2">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-light text-center">
                    <h5>Comments Made</h5>
                </div>
                <div class="card-body text-center">
                    <p class="fs-4 text-secondary">{{ $totalCommentsMade }} Comments</p>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <h3 class="text-center mt-4 mb-3 text-primary">Statistic Summary</h3> --}}
    {{-- <div class="row justify-content-start">
        <div class="table-responsive small col-xl-12 border-end border-start px-2 my-2">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Statistic</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Posts Made</td>
                        <td>{{ $posts->count() }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Likes Received</td>
                        <td>{{ $totalLikes }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Liked Given</td>
                        <td>{{ $totalLikedPost }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Comments Made</td>
                        <td>{{ $totalCommentsMade }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Comments Recieved</td>
                        <td>{{ $receivedComments->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
