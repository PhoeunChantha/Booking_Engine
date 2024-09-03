@extends('frontends.master')
@section('content')
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gallery-item {
            flex: 1 0 300px;
            max-width: 300px;
            text-align: center;
        }

        .gallery-item img {
            max-width: 100%;
            height: auto;
        }

        .caption {
            margin-top: 10px;
            font-style: italic;
        }
    </style>
    <section class="chaufea-section gallery-section">
        @if (request()->routeIs('gallery'))
            @php
                $titles = App\Models\SectionTitle::where('page_id', 6)->get();
            @endphp
        @endif
        <h2 class="chaufea-heading-2 mb-4">{{ $titles[0]->title ?? $titles[0]->default_title }}</h2>
        <div ID="ngy2p"
            data-nanogallery2='{
              "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/",
              "thumbnailWidth": "650",
              "thumbnailHeight": "330",
              "thumbnailBorderVertical": 0,
              "thumbnailBorderHorizontal": 0,
              "thumbnailLabel": {
                "position": "overImageOnBottom",
                "display": true,
                "title": true,
                "titleMultiline": true,
                "titleAlign": "center"
              },
              "thumbnailAlignment": "fillWidth",
              "thumbnailGutterWidth": 15,
              "thumbnailGutterHeight": 15,
              "thumbnailOpenImage": true
            }'>

            @php
                $chaufea_gallery_top = $gallery->take(2);
            @endphp
            @foreach ($chaufea_gallery_top as $image)
                : ?>
                <a href="{{ asset('uploads/gallery/' . $image['image']) }}"
                    data-ngthumb="{{ asset('uploads/gallery/' . $image['image']) }}" title="{{ $image['description'] }}"
                    data-ngdesc="{{ $image['description'] }}" data-ngdescmultiline="true"><span style="max-width: 100%;">{{ $image['description'] }}</span></a>
            @endforeach

        </div>
        <div id="ngy2p_1"
            data-nanogallery2='{
            "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/",
            "thumbnailWidth": "450",
            "thumbnailHeight": "330",
            "thumbnailBorderVertical": 0,
            "thumbnailBorderHorizontal": 0,
            "thumbnailLabel": {
                "position": "overImageOnBottom",
                "display": true,
                "title": true,
                "titleMultiline": true,
                "titleAlign": "center"
            },
            "thumbnailAlignment": "fillWidth",
            "thumbnailGutterWidth": 15,
            "thumbnailGutterHeight": 15,
            "thumbnailOpenImage": true
        }'>

            @php
                $chaufea_gallery = $gallery->slice(2);
            @endphp
            @foreach ($chaufea_gallery as $image)
                <a href="{{ asset('uploads/gallery/' . $image['image']) }}"
                    data-ngthumb="{{ asset('uploads/gallery/' . $image['image']) }}" title="{{ $image['description'] }}"
                    data-ngdesc="{{ $image['description'] }}" data-ngdescmultiline="true"><span style="max-width: 100%;">{{ $image['description'] }}</span></a>
            @endforeach

        </div>
    </section>
@endsection
