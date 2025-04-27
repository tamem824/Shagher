<x-guest.layouts.app>
    @section('content')
        <div class="latest-post-main-box float_left">
            <div class="container">
                <div class="row">
                    @if($posts->isNotEmpty())
                        @foreach($posts as $post)
                            <div class="col-lg-6 col-md-12 col-12 mb-4">
                                <div class="post-picture float_left">
                                    <img src="{{ asset($post->photo) }}" alt="img">
                                    <div class="vedio-text">
                                        <span>{{ $post->created_at->format('d M Y') }}</span>
                                        <h4>
                                            <a href="{{ route('guest.posts.show', $post->id) }}">{{ $post->title }}</a>
                                        </h4>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp;
                                                    {{ $post->is_liked ? 'Liked' : 'Like' }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-comments-o" aria-hidden="true"></i> &nbsp;
                                                    {{ $post->comments->count() }} Comments
                                                </a>
                                            </li>
                                        </ul>

                                        {{-- عرض التعليقات --}}
                                        @foreach($post->comments as $comment)
                                            <div class="comment-box mt-2">
                                                <p><strong>{{ $comment->user->name ?? 'Guest' }}</strong></p>
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No posts available.</p>
                    @endif
                </div>

                {{-- روابط الصفحات (Pagination) --}}
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    @endsection
</x-guest.layouts.app>
