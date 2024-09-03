@extends('frontends.master')

@section('content')
    <section class="chaufea-section blog-section bg-light">
        <div>
            @if (request()->routeIs('blog'))
                @php
                    $titles = App\Models\SectionTitle::where('page_id', 7)->get();
                @endphp
            @endif
            <h2 class="chaufea-heading-1 text-uppercase mb-4">{{ $titles[0]->title??$titles[0]->default_title }}</h2>
            <p class="text-dark mb-4">{{$foundation}}</p>
            <div>
                    <div class="owl-carousel owl-theme blog-carousel">
                        @foreach ($blogs as $blog)
                            <div class="item px-0 px-md-3">
                                <div class="blog-image">
                                    <div style="z-index:1;position:relative;">
                                        <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}" alt="">
                                        <div class="blog-short-detail p-4">
                                            <div>
                                                <h4 class="chaufea-text-1 mb-4">{{ $blog->title }}</h4>
                                                <p class="text-white">
                                                    {!! $blog->description !!}
                                                </p>
                                            </div>
                                            <a class="blog-detail-btn" href="{{ route('blog.detail',$blog->id) }}">{{ __('View Detail') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </div>
        </div>
    </section>
@endsection
