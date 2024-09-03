@extends('frontends.master')

@section('content')
    <div class="chaufea-section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8">
                <article>
                    <header class="entry-header">
                        <h1 class="entry-title chaufea-heading-1 mb-5 mt-1">{{ $blog->title }}</h1>

                    </header><!-- .entry-header -->

                    <div ID="blog_featured_img"
                        data-nanogallery2='{
                        "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/",
                        "thumbnailWidth": "850",
                        "thumbnailHeight": "530",
                        "thumbnailBorderVertical": 0,
                        "thumbnailBorderHorizontal": 0,
                        "thumbnailLabel": {
                            "position": "overImageOnBottom",
                            "display": false
                        },
                        "thumbnailAlignment": "fillWidth",
                        "thumbnailOpenImage": true
                        }'>
                        <a href="{{ asset('uploads/blogs/' . $blog->thumbnail) }}"
                            data-ngthumb="{{ asset('uploads/blogs/' . $blog->thumbnail) }}" data-ngdesc="">Featured Image</a>

                    </div>

                    <div class="entry-content">
                        <p class="my-5">
                            {!! $blog->description !!}
                        </p>
                    </div>

                </article>
                <div class="donate-section">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('contact-us') }}" class="chaufea-btn-1">{{ __('Donate') }}</a>
                    </div>
                </div>
                <div class="commemt-section" hidden>
                    @include('frontends.blog.comment', ['blog' => $blog])

                    <div class="comment-form-wrap">
                        <p>Leave a comment</p>
                        <form id="commentform" class="comment-form w-100" action="{{ route('comment.send') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (Auth::guard('customer')->check())
                                <input type="hidden" name="customer_id" value="{{ Auth::guard('customer')->user()->id }}">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            @else
                                <div class="col-12 col-sm-4 comment-form-author">
                                    <input type="text" class="form-control" name="author" placeholder="Name">
                                </div>
                                <div class="col-12 col-sm-8 comment-form-email">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            @endif
                            <div class="col-12 comment-form-comment">
                                <textarea name="content" class="w-100" id="" rows="10" placeholder="Write a Comment"></textarea>
                            </div>
                            <input type="submit" class="chaufea-btn-1 mt-5 btn-post-comment" value="POST A COMMENT">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <aside class="blog-sidebar">
                    <div class="widget_block blog-search">
                        <form action="">
                            <input type="text" class="form-control input-block">
                        </form>
                    </div>
                    <div class="widget_block latest-posts my-4">
                        <h3 class="block-heading">{{ __('Latest Posts') }}</h3>
                        <div class="bg-dark w-100 my-3" style="height:1.5px;"></div>
                        <ul class="latest-posts__list">
                            @foreach ($blogs as $blog)
                                <li>
                                    <div class="latest-posts__featured-image">
                                        <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}"
                                            alt="{{ $blog->title }}">
                                    </div>
                                    <a href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="widget_block blog-categories" hidden>
                        <h3 class="block-heading">Category</h3>
                        <div class="bg-dark w-100 my-3" style="height:1.5px;"></div>
                        <ul class="categories_list">
                            @foreach ($categories as $category)
                                <li>
                                    <a
                                        href="{{ route('blog', ['category_id' => $category->id]) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget_block blog-tags" hidden>
                        <h3 class="block-heading">Blog Tags</h3>
                        <div class="bg-dark w-100 my-3" style="height:1.5px;"></div>
                        <ul class="tags_list">
                            @foreach ($tages as $tag)
                                @php
                                    $tagIdsArray = explode(',', $tag->tag_id);
                                @endphp
                                <li class="tag-cloud">
                                    @foreach ($tagIdsArray as $tagId)
                                        <a class="tag-cloud-link"
                                            href="{{ route('blog', ['tag_id' => $tagId]) }}">{{ $tag->title }}</a>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#commentform").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == 1) {
                            console.log(response);
                            toastr.success(response.msg);
                            $('.contend-for-comment').replaceWith(response.comment);
                            $('#commentform')[0].reset();
                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $(document).on("click", ".btn-reply-comment", function(e) {
                e.preventDefault();
                var replySection = $(this).closest(".row").find(".reply-section");
                replySection.toggle();

                if (replySection.is(":visible")) {
                    replySection.find("#replyText").val('');
                }
            });

            $('.replyForm').submit(function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                var replyText = $('#replyText').val().trim();

                if (!replyText === '') {
                    toastr.error('Please enter a reply.');
                    return;
                }
                console.log(data);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: data,
                    success: function(response) {
                        if (response.success == 1) {
                            console.log(response);
                            toastr.success(response.msg);
                            $('.content-reply').replaceWith(response.reply);
                            $('.reply-section').hide();
                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>
@endsection
