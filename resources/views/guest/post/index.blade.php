<x-guest.layouts.app>
    <div class="latest-post-main-box float_left py-5">
        <div class="container">
            <div class="row justify-content-center">
                @if($posts->isNotEmpty())
                    @foreach($posts as $post)
                        <div class="col-lg-6 col-md-8 col-12 mb-5">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <img src="{{ asset($post->photo) }}" alt="{{ $post->title }}" class="card-img-top" style="object-fit: cover; height: 250px;">
                                <div class="card-body">
                                    <span class="badge bg-primary mb-2">{{ $post->created_at->format('d M Y') }}</span>
                                    <h4 class="card-title">
                                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                    <ul class="list-inline mt-3 mb-2">
                                        <li class="list-inline-item me-3">
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                            {{ $post->is_liked ? 'Liked' : 'Like' }}
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                                            {{ $post->comments->count() }} Comments
                                        </li>
                                    </ul>


                                    @if($post->comments->isNotEmpty())
                                        <div class="mt-3">
                                            @foreach($post->comments as $comment)
                                                <div class="border-top pt-2">
                                                    <p class="mb-1">
                                                        <strong>{{ $comment->user->name ?? 'Guest' }}</strong>
                                                    </p>
                                                    <p class="text-muted small mb-0">{{ $comment->content }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">No posts available.</p>
                    </div>
                @endif
            </div>


            <div class="mt-5 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-guest.layouts.app>
