@extends('frontends.master')
@section('content')
    <div class="chaufea-section">
        <article>
            <header class="entry-header">
                <h1 class="chaufea-heading-1 mb-2 mt-1">{{ $room->title }}</h1>
            </header><!-- .entry-header -->
            <div class="row m-0">
                <div class="col-12 col-lg-8">
                    <div id="ngy2p"
                        data-nanogallery2='{
                        "itemsBaseURL": "http://nanogallery2.nanostudio.org/samples/",
                        "thumbnailWidth": 450,
                        "thumbnailHeight": 350,
                        "thumbnailBorderVertical": 0,
                        "thumbnailBorderHorizontal": 0,
                        "thumbnailLabel": {
                            "position": "overImageOnBottom",
                            "display": false
                        },
                        "thumbnailAlignment": "fillWidth",
                        "thumbnailGutterWidth": 20,
                        "thumbnailGutterHeight": 20,
                        "thumbnailOpenImage": true,
                        {{-- "thumbnailCountPerPage": 2, --}}
                        "galleryDisplayMode":  "rows",
                        "galleryMaxRows":      1,
                        "thumbnailLazyLoad": true
                    }'>
                        @if ($home_stay_gallery && $home_stay_gallery->image)
                            @foreach ($home_stay_gallery->image as $image)
                                <a href="{{ asset('uploads/home_stay_gallery/' . $image) }}"
                                    data-ngthumb="{{ asset('uploads/home_stay_gallery/' . $image) }}" data-ngdesc="">Gallery
                                    Image</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4" style="padding-top: 2px">
                    <a href="#video-modal" rel="modal:open" data-youtube-link="{{ $room->video }}">
                        <div class="video-thumbnail mt-3 mt-sm-0">
                            <img id="icon_play" src="{{ asset('uploads/play-button.png') }}" alt="">
                            <img class="thumbnail_show" src="{{ asset('uploads/room/' . $room->video_thumbnail) }}"
                                id="thumbnailImage" alt="Video Thumbnail">
                        </div>
                    </a>
                </div>
            </div>

            <div class="my-1">
                <div>
                    <p>
                        {!! $room->description !!}
                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <p>
                            {!! $room->column_1 !!}
                        </p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p>
                            {!! $room->column_2 !!}
                        </p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p>
                            {!! $room->column_3 !!}
                        </p>
                    </div>
                </div>

                @php
                    $start_date = null;
                    $end_date = null;
                    $room_id = null;

                    if (session()->has('booking_info') && session('booking_info')['room_id'] == $room->id) {
                        $start_date = session('booking_info')['start_date'];
                        $end_date = session('booking_info')['end_date'];
                        // $room_id = session('booking_info')['room_id'];
                    }

                @endphp
                <div class="position-relative">
                    <div class="room-check-form position-static py-1">
                        <form id="form-check-available" class="w-100" style="position: fixed;bottom: 0;z-index: 5;padding:15px;left:0;"  action="{{ route('homestay_detail_check_available', ['homestay_id' => $room->id]) }}"
                            method="get">
                            <div class="row mx-auto check_available_wrapper justify-content-center w-100 section-single-form-check">
                                <input type="hidden" name="homestay_id" value="{{ $room->id }}">
                                <div style="border: 2px solid #CF6737;border-right: 2px solid #CF6737;"
                                    class="col-6 col-md-4 col-lg-2 p-0 position-relative">
                                    <div class="check-form-single reserv-inner-wrap">
                                        <input id="reserv-checkin" class="w-100 reserv-datepick no-placeholder" type="date"
                                            name="start_date" value="{{ $start_date }}">
                                        <p style="padding-left: 25px;" id="checkin-label" class="datepick-label">
                                            @if ($start_date)
                                                {{ $start_date }}
                                            @else
                                                {{ __('Arrival') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div style="border: 2px solid #CF6737;border-left: none;"
                                    class="check-form-single col-6 col-md-4 col-lg-2 p-0 position-relative">
                                    <div class="reserv-inner-wrap">
                                        <input id="reserv-checkout" class="w-100 reserv-datepick no-placeholder" type="date"
                                            name="end_date" value="{{ $end_date }}">
                                        <p style="padding-left: 25px;" id="checkout-label" class="datepick-label">
                                            @if ($end_date)
                                                {{ $end_date }}
                                            @else
                                                {{ __('Departure') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div style="border: 2px solid #CF6737;"
                                    class="check-form-single col-12 col-md-4 col-lg-2 p-0 position-relative">
                                    <div class="reserv-inner-wrap">
                                        <button class="reserv-submit text-uppercase btn_check_available"
                                            type="button">{{ __('CHECK AVAILABILITY') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                flatpickr("#reserv-checkin", {
                                    dateFormat: "Y-m-d",
                                    minDate: "today",

                                });

                                flatpickr("#reserv-checkout", {
                                    minDate: new Date().fp_incr(1),
                                    dateFormat: "Y-m-d"
                                });
                            });
                            document.addEventListener('DOMContentLoaded', function() {
                                var checkinInput = document.getElementById('reserv-checkin');
                                var checkoutInput = document.getElementById('reserv-checkout');
                                var checkinLabel = document.getElementById('checkin-label');
                                var checkoutLabel = document.getElementById('checkout-label');

                                checkinInput.addEventListener('change', function() {
                                    var date = this.value;
                                    checkinLabel.innerText = date ? date : "{{ __('Arrival') }}";
                                    checkoutInput.disabled = !date;
                                    if (!date) {
                                        checkoutInput.value = '';
                                        checkoutLabel.innerText = "{{ __('Departure') }}";
                                    }
                                });

                                checkoutInput.addEventListener('change', function() {
                                    var date = this.value;
                                    checkoutLabel.innerText = date ? date : "{{ __('Departure') }}";
                                });

                                if (!checkinInput.value) {
                                    checkoutInput.disabled = true;
                                }
                            });
                        </script>
                    </div>

                    <div class="check_available_form_wrapper">
                    </div>

                    <div class="row py-1">
                        <div class="col-12 col-md-6 col-lg-7">
                            <h3 class="mb-4">{{ __('Check-In') }}</h3>
                            <div>
                                <ul class="check-in-list">
                                    @if ($room->checkin)
                                        @foreach (json_decode($room->checkin, true) as $row)
                                            <li class="check-in-item my-2">
                                                <img src="{{ asset('uploads/mdi_tick.svg') }}" alt="icon">
                                                <span>{{ $row['title'] }}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <h3 class="mb-4">{{ __('Check-Out') }}</h3>
                            <div>
                                <ul class="check-out-list">
                                    @if ($room->checkout)
                                        @foreach (json_decode($room->checkout, true) as $row)
                                            <li class="check-in-item my-2">
                                                <img src="{{ asset('uploads/mdi_tick.svg') }}" alt="icon">
                                                <span>{{ $row['title'] }}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="no-style" hidden>
                        <h3 class="mb-4">{{ __('Special Check-In Instruction') }}</h3>
                        <div class="my-2">
                            <p>
                                {{ $room->special_note }}
                            </p>
                        </div>
                    </div>

                    <div class="no-style" hidden>
                        <h3 class="mb-4">{{ __('Pets') }}</h3>

                        <div class="my-2">
                            <p>
                                @if ($room->pet == 1)
                                    {{ __('Allow') }}
                                @else
                                    {{ __('Not Allow') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div id="video-modal" class="modal chaufea-modal py-4">
        <div class="modal-content">
            <iframe id="youtubeVideo" class="youtube-iframe" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // check available
        $(document).on('click', '.btn_check_available', function(e) {
            e.preventDefault();
            var check_availale_wrapper = $(this).closest('.check_available_wrapper');
            var homestay_id = check_availale_wrapper.find('input[name=homestay_id]').val();
            var start_date = check_availale_wrapper.find('input[name=start_date]').val();
            var end_date = check_availale_wrapper.find('input[name=end_date]').val();
            var is_package = `{{ strpos(url()->current(), '/offers') ? 1 : 0 }}`
            $.ajax({
                type: "get",
                url: `{{ route('homestay_detail_check_available') }}`,
                data: {
                    'homestay_id': homestay_id,
                    'start_date': start_date,
                    'end_date': end_date,
                    'is_package': is_package,
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.success == false) {
                        toastr.error(response.msg);
                        $('.check_available_form_wrapper').empty();
                    } else if (response.success == true) {
                        toastr.success(response.msg);
                        // check_available_form_wrapper
                        $('.check_available_form_wrapper').replaceWith(response.view);
                    }
                }
            });
        });

        $(document).on('change', 'input[name=start_date]', function(e) {
            $('.check_available_form_wrapper').empty();
        });
        $(document).on('change', 'input[name=end_date]', function(e) {
            $('.check_available_form_wrapper').empty();
        });

        $(document).on('click', 'a.book_now', function(e) {
            e.preventDefault();
            var room_id = $(this).data('room_id');
            var rate_plan_id = $(this).data('rate_plan_id');
            var start_date = $('input[name=start_date]').val();
            var end_date = $('input[name=end_date]').val();

            var url = $(this).data('href');
            var data = {
                'room_id': room_id,
                'rate_plan_id': rate_plan_id,
                'start_date': start_date,
                'end_date': end_date,
            }

            $.ajax({
                type: "get",
                url: url,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.success == false) {
                        toastr.error(response.msg);
                    } else {
                        window.location = response.url;
                    }
                }
            });
        });
        function processBooking(room_id, rate_plan_id, start_date, end_date) {
            var bookingData = {
                'room_id': room_id,
                'rate_plan_id': rate_plan_id,
                'start_date': start_date,
                'end_date': end_date,
            }

            $.ajax({
                type : 'POST',
                url : "{{ route('book_now') }}",
                data : bookingData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.url;
                    } else {
                        toastr.error(response.msg);
                    }
                }
            });
        }
        function getYouTubeVideoId(youtubeShareLink) {
            var regex =
                /(?:youtu\.be\/|youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
            var match = youtubeShareLink.match(regex);
            return match ? match[1] : null;
        }

        function showYouTubeModal(videoLink) {
            var videoId = getYouTubeVideoId(videoLink);
            if (videoId) {
                $('#youtubeVideo').attr('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1');
                hideCheckAvailabilityForm();
            } else {
                hideCheckAvailabilityForm();
                console.error('Invalid YouTube link');
            }
        }

        function hideCheckAvailabilityForm() {
            $('#form-check-available').hide();
        }

        function showCheckAvailabilityForm() {
            $('#form-check-available').show();
        }
        $(document).on('click', '[rel="modal:open"]', function() {
            var videoLink = $(this).data('youtube-link');
            showYouTubeModal(videoLink);
        });


        $(document).on($.modal.CLOSE, function() {
            $('#youtubeVideo').attr('src', '');
            showCheckAvailabilityForm();
        });
    </script>
@endpush
