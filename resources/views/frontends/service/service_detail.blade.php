@extends('frontends.master')
@section('content')
    <div class="chaufea-section">
        <article>
            <header class="entry-header">
                <h1 class="chaufea-heading-1 mb-5 mt-1">{{ $service->title }}</h1>
            </header><!-- .entry-header -->

            @if ($gallery->image != null)
            <div ID="ngy2p"
                data-nanogallery2='{
            "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/",
            "thumbnailWidth": "450",
            "thumbnailHeight": "350",
            "thumbnailBorderVertical": 0,
            "thumbnailBorderHorizontal": 0,
            "thumbnailLabel": {
              "position": "overImageOnBottom",
              "display": false
            },
            "thumbnailAlignment": "fillWidth",
            "thumbnailGutterWidth": 20,
            "thumbnailGutterHeight": 20,
            "thumbnailOpenImage": true
          }'>


                    @foreach ($gallery->image as $image)
                        <a href="{{asset('uploads/service_gallery/'. $image)}} " data-ngthumb="{{asset('uploads/service_gallery/'. $image)}}"
                            data-ngdesc="">Gallery Image</a>
                    @endforeach


            </div>
            @endif
            <div class="my-5">
                <div>
                    <p>
                        {{ $service->description }}
                    </p>
                </div>

                <div class=" mt-4 py-2 position-relative">
                    @if ($service->extra_info)                        
                    @foreach ($service->extra_info as $item)
                        <div class="mt-5">
                            <h3 class="mb-4">{{$item['title']}}</h3>
                            <div>
                                <p>
                                    {!!$item['description']!!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </article>
    </div>
@endsection
