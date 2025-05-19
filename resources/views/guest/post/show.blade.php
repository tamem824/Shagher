<x-guest.layouts.app>
    <div class="latest-post-main-box float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <div class="post-picture float_left position-relative">
                        <img src="{{ asset($post->photo) }}" alt="img" class="img-fluid rounded-3">
                        <div class="vedio-text position-absolute bottom-0 left-0 p-3 bg-dark bg-opacity-50 text-white">
                            <span>{{ $post->created_at->format('d M Y') }}</span>
                            <ul class="list-unstyled mt-2">
                                <li>
                                    <a href="#" class="text-white">
                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp;
                                        {{ $post->is_liked ? 'Liked' : 'Like' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-white">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i> &nbsp;
                                        {{ $post->comments->count() }} Comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="post-content mt-4">
                <h5>{{ $post->title }}</h5>
                <p>{{ $post->content }}</p>
            </div>

            <div class="comments-section mt-5">
                <h4 class="mb-4">Comments ({{ $post->comments->count() }})</h4>

                @foreach($post->comments as $comment)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title mb-1">
                                <strong>{{ $comment->user->name ?? 'Guest' }}</strong>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </h6>
                            <p class="card-text">{{ $comment->content }}</p>


                            @foreach($comment->replies as $reply)
                                <div class="card mt-3 ml-4 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title mb-1">
                                            <strong>{{ $reply->user->name ?? 'Guest' }}</strong>
                                            <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                        </h6>
                                        <p class="card-text">{{ $reply->content }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @auth
                                <button class="btn btn-sm btn-outline-primary reply-btn" data-comment-id="{{ $comment->id }}">Reply</button>
                                <div class="reply-form mt-2" id="reply-form-{{ $comment->id }}" style="display: none;">
                                    <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-2">
                                            <textarea name="content" class="form-control" rows="2" placeholder="Write your reply..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success">Reply</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="add-comment-section mt-5">
                <h4 class="mb-3">Add a Comment</h4>

                @auth
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="4" placeholder="Write your comment..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                @else
                    <div class="alert alert-warning">
                        You must <a href="{{ route('login') }}">login</a> to add a comment.
                    </div>
                @endauth
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            document.querySelectorAll('.reply-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const commentId = button.getAttribute('data-comment-id');
                    const replyForm = document.getElementById('reply-form-' + commentId);

                    if (replyForm.style.maxHeight) {
                        replyForm.style.maxHeight = null;
                    } else {
                        replyForm.style.display = 'block';
                        replyForm.style.overflow = 'hidden';
                        replyForm.style.maxHeight = replyForm.scrollHeight + "px";
                    }
                });
            });
        </script>
    @endpush

</x-guest.layouts.app>
