<div class="contend-for-comment">
    @php
        $comments = \App\Models\Comment::where('status', 'active')
            ->where('blog_id', $blog->id)
            ->whereNull('parent_id')
            ->get();
        $comment_count = $comments->count();
    @endphp
    <p id="comment-count" class="comment-count">{{ $comment_count }} {{ __('Comments') }}</p>
    <div id="comment-section" class="comment-wrap">
        @foreach ($comments as $comment)
            <div class="row">
                <div class="col-3 col-sm-2">
                    <img style="width: 80px; height: 80px;border-radius: 50%"
                        src="@if (@$comment->customer->image && file_exists(public_path('uploads/customers/' . @$comment->customer->image))) {{ asset('uploads/customers/' . @$comment->customer->image) }}
                @else
                {{ asset('uploads/default-profile.png') }} @endif"
                        alt="user-profile" class="img-fluid mt-4">
                </div>
                <div class="col-7 col-sm-8">
                    <p class="commenter-name text-capitalize font-weight-bold">{{ @$comment->customer->first_name }}
                        {{ @$comment->customer->last_name }}</p>
                    <div class="comment-content">
                        <p>
                            {{ $comment->content }}
                        </p>
                    </div>
                    @if (!$comment->parent_id)
                        <a href="#" class="reply btn-reply-comment">{{ __('Reply') }}</a>
                    @endif
                </div>
                <div class="col-12 col-sm-12 ml-0 ml-sm-5 reply-section" style="display: none;">
                    <form class="replyForm" action="{{ route('comment.reply', $comment->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <textarea name="content" class="form-control mt-2" id="replyText" placeholder="Type your reply here"></textarea>
                        <button type="submit" class="btn btn-primary mt-2" id="saveReply">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
            @include('frontends.blog.reply', ['comment' => $comment])
            <hr>
        @endforeach
    </div>

</div>
