@extends('frontends.master')
@section('content')
    <div class="chaufea-section">
        <article>
            <header class="entry-header">
                <h1 class="chaufea-heading-1 mb-5 mt-1">{{ @$package->room->title }}</h1>
            </header><!-- .entry-header -->

            <div class="row m-0">
                <div class="col-12 col-sm-8">
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

                        @if ($home_stay_gallery->image)
                            @foreach ($home_stay_gallery->image as $image)
                                @if ($loop->index < 2)
                                    <a href="{{ asset('uploads/home_stay_gallery/' . $image) }}"
                                        data-ngthumb="{{ asset('uploads/home_stay_gallery/' . $image) }}" data-ngdesc="">Gallery
                                        Image</a>
                                @endif
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    {{-- <a href="#" data-toggle="modal" data-target="#youtubeModal" class="video-btn" data-youtube-link="{{ @$package->room->video }}"> --}}
                    <a href="#video-modal" rel="modal:open" data-youtube-link="{{ @$package->room->video }}">
                        <img src="{{ asset('uploads/video_thumb_1.png') }}" id="thumbnailImage" alt="Video Thumbnail">
                    </a> 
                </div>
            </div>
            <div class="my-5">
                <div>
                    <p>
                        {!! @$package->room->description !!}
                    </p>
                </div>

                <div class=" mt-4 py-2 position-relative">
                    <div class="room-check-form position-static py-5">
                        <form action="#" method="post" class="bg-white">
                            <div class="row mx-auto">
                                <div class="col-6 col-md-4 col-lg-2 p-0 position-relative">
                                    <div class="check-form-single reserv-inner-wrap border-right-1">
                                        <input id="reserv-checkin" class="w-100 reserv-datepick" type="date"
                                            name="reserv-checkin">
                                        <p id="checkin-label" class="datepick-label">{{ __('Check in') }}</p>
                                    </div>
                                </div>
                                <div class=" check-form-single col-6 col-md-4 col-lg-2 p-0 position-relative">
                                    <div class="reserv-inner-wrap border-right-1">
                                        <input id="reserv-checkout" class="w-100 reserv-datepick" type="date"
                                            name="reserv-checkout">
                                        <p id="checkout-label" class="datepick-label">{{ __('Check out') }}</p>
                                    </div>
                                </div>
                                <div class="check-form-single col-6 col-md-4 col-lg-2 p-0 position-relative">
                                    <div class="reserv-inner-wrap">
                                        <input class="reserv-submit" type="submit" value="CHECK NOW">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            document.getElementById('reserv-checkin').addEventListener('change', function() {
                                var date = this.value;
                                document.getElementById('checkin-label').innerText = date;
                            });
                            document.getElementById('reserv-checkout').addEventListener('change', function() {
                                var date = this.value;
                                document.getElementById('checkout-label').innerText = date;
                            });
                        </script>
                    </div>
                    <div class="room-list-wrap">
                        <div class="room-list-item row position-relative p-2 py-md-4 px-md-5 mx-0">
                            <div class="col-12 col-sm-12 col-md-7">
                                <h4 class="room-list-title mb-4">{{ $package->title }}</h4>
                                <div class="row m-0 justify-content-start">
                                    <div class="amenitie-wrap">
                                        <p class="text-secondary" style="font-size: 1.2em;">{{ __('Amenities') }}</p>
                                        <div>
                                            <ul class="amenities-list">
                                                @if (@$package->room->amenities)
                                                    @foreach (json_decode(@$package->room->amenities, true) as $amenity)
                                                        <li class="amenity my-2">
                                                            <img src="{{ asset('uploads/amenity/' . json_decode($amenity, true)['image']) }}"
                                                                alt="">
                                                            <span>{{ json_decode($amenity, true)['title'] }}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="special-packages-wrap">
                                        <p class="text-secondary" style="font-size: 1.2em;">{{ __('Special Package') }}</p>
                                        <div>
                                            <ul class="amenities-list">
                                                @if (@$package->special_package)
                                                    @foreach (json_decode($package->special_package, true) as $amenity)
                                                        <li class="amenity my-2">
                                                            <img src="{{ asset('uploads/amenity/' . json_decode($amenity, true)['image']) }}"
                                                                alt="">
                                                            <span>{{ json_decode($amenity, true)['title'] }}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-12 col-md-5 d-flex flex-column justify-content-between text-left text-md-right py-4 p-md-0">
                                <div>
                                    <p>{{ __('Price For One Night') }}:</p>
                                    <p class="single-room-price">{{ number_format($package->price, 0) }} $</p>
                                </div>
                                <div class="pb-4 mt-5 mt-md-0">
                                    <a href="#" class="chaufea-btn-1">{{ __('BOOK NOW') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 col-md-6 col-lg-7">
                            <h3 class="mb-4">{{ __('Check-In') }}</h3>
                            <div>
                                <ul class="check-in-list">
                                    @foreach (json_decode(@$package->room->checkin, true) as $row)
                                        <li class="check-in-item my-2">
                                            <img src="{{ asset('uploads/mdi_tick.svg') }}" alt="">
                                            <span>{{ $row['title'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <h3 class="mb-4">{{ __('Check-Out') }}</h3>
                            <div>
                                <ul class="check-out-list">
                                    @foreach (json_decode(@$package->room->checkout, true) as $row)
                                        <li class="check-in-item my-2">
                                            <img src="{{ asset('uploads/mdi_tick.svg') }}" alt="">
                                            <span>{{ $row['title'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="mb-4">{{ __('Special Check-In Instruction') }}</h3>
                        <div class="my-2">
                            <p>
                                {{ @$package->room->special_note }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="mb-4">{{ __('Pets') }}</h3>

                        <div class="my-2">
                            <p>
                                {{ __('Not Allow') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div  id="video-modal" class="modal chaufea-modal p-4">

    <iframe id="youtubeVideo" width="100%" class="youtube-iframe" src="" frameborder="0"
        allowfullscreen></iframe>
    </div>
    <script>
        function getYouTubeVideoId(youtubeShareLink) {
            var regex =
                /(?:youtu\.be\/|youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
            var match = youtubeShareLink.match(regex);
            return match ? match[1] : null;
        }

        function showYouTubeModal(videoLink) {
            var videoId = getYouTubeVideoId(videoLink);
            if (videoId) {
                var embedLink = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
                $('#youtubeVideo').attr('src', embedLink);
                $('#youtubeModal').modal('show');
            } else {
                console.error('Invalid YouTube link');
            }
        }

        $('#thumbnailImage').on('click', function(e) {
            e.preventDefault();
            var videoLink = $(this).parent().data('youtube-link');
            showYouTubeModal(videoLink);
        });

        $('#youtubeModal').on('hidden.bs.modal', function() {
            $('#youtubeVideo').attr('src', '');
        });
    </script>

@endsection
