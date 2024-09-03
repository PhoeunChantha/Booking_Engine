@php
    use App\Models\BusinessSetting;

    $video_trailer = BusinessSetting::where('type', 'video_trailer')->first()->value ?? 'No data found';
    $link_video = BusinessSetting::where('type', 'link_full_video')->first()->value ?? 'No data found';

@endphp
@if (request()->routeIs('customer.profile'))
    <img height="400px" width="100%" src="{{ asset('uploads/profile_header.png') }}" alt="profile">
@else
    <div class="slider-wrap">
        @php

            if (request()->routeIs('homepage')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'home')
                    ->get();
            }
            if (
                request()->routeIs('homestays') ||
                request()->routeIs('homestay.search') ||
                request()->routeIs('homestay_detail') ||
                request()->routeIs('homestay_detail_check_available')
            ) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'villas')
                    ->get();
            }
            if (request()->routeIs('about-us')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'about')
                    ->get();
            }
            if (request()->routeIs('blog') || request()->routeIs('blog.detail')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'foundation')
                    ->get();
            }
            if (request()->routeIs('service') || request()->routeIs('service_detail')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'experience')
                    ->get();
            }
            if (request()->routeIs('facility')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'the_property')
                    ->get();
            }
            if (request()->routeIs('gallery')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'gallery')
                    ->get();
            }
            if (request()->routeIs('package') || request()->routeIs('package.detail')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'offers')
                    ->get();
            }
            if (request()->routeIs('contact-us')) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'contact')
                    ->get();
            }
            if (
                request()->routeIs('booking_history') ||
                request()->routeIs('checkout_form') ||
                request()->routeIs('show_booking_success')
            ) {
                $slider = \App\Models\Slider::where('status', 'active')
                    ->WhereNull('deleted_at')
                    ->where('type', 'booking_history')
                    ->get();
            }
        @endphp
        @if (request()->routeIs('homepage'))
            <div class="head-video">
                <div class="item-video">
                    <div class="video-preview">
                        <video src="{{ asset('uploads/business_settings/' . $video_trailer) }}" autoplay muted loop
                            preload="auto" playsinline></video>
                    </div>
                </div>
                <div class="botton-full">
                    <a href="{{ $link_video }}" class="btn btn-sm btn-warning chaufea-btn-1 btn_video "
                        target="_blank"><i class="fa fa-play mr-2"></i>{{ __('Watch Full') }}</a>
                </div>
            </div>
        @else
            <div class="owl-carousel owl-theme head-slider">
                @forelse ($slider as $item)
                    <div class="item">
                        <div class="image_slider_mobile">
                            <img src="{{ $item->image_url }}" alt="">
                        </div>
                        <div class="slider-title-mobile">
                            <h1 class="mb-0">{{ $item->name }}</h1>
                            <p class="slider-description-mobile">{{ $item->short_des }}</p>
                        </div>
                    </div>
                @empty
                    <div class="item image_slider_mobile">
                        <img src="{{ asset('uploads/image/default-big.png') }}" alt="">
                    </div>
                @endforelse

            </div>
        @endif

        @if (request()->routeIs('homepage') || request()->routeIs('search'))
            <div id="chaufea-search-form" class="room-check-form"
                style="position: fixed;bottom: 0;width: 100%;z-index: 100">
                <form action="{{ route('homestay.search') }}" method="get">
                    <div class="row chaufea-section-form mx-auto">
                        <div class="chaufea_input_arrival col-6 col-md-4 col-lg-2 p-0 position-relative">
                            <div class="reserv-inner-wrap d-flex justify-content-center align-items-center">

                                <input id="reserv-checkin" class="w-100 reserv-datepick no-placeholder" type="date"
                                    name="start_date">
                                <label id="checkin-label" for="reserv-checkin" style="cursor: pointer;"
                                    class="datepick-label">{{ __('Arrival') }}</label>

                            </div>
                        </div>
                        <div class="chaufea_input_departure col-6 col-md-4 col-lg-2 p-0 position-relative">
                            <div class="reserv-inner-wrap">
                                <input id="reserv-checkout" class="w-100 reserv-datepick no-placeholder" type="date"
                                    name="end_date">
                                <label for="reserv-checkout" id="checkout-label" style="cursor: pointer;"
                                    class="datepick-label">{{ __('Departure') }}</label>

                            </div>
                        </div>
                        <div class="chaufea_input_adult col-6 col-md-4 col-lg-2 p-0 position-relative">
                            <div class="reserv-inner-wrap">
                                <select name="adult" style="padding-left: 25px; color: #CF6737;" class="reserv-select"
                                    id="adult">
                                    <option value="1">1 {{ __('Adult') }}</option>
                                    <option value="2">2 {{ __('Adult') }}</option>
                                    <option value="3">3 {{ __('Adult') }}</option>
                                    <option value="4">4 {{ __('Adult') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="chaufea_input_children col-6 col-md-4 col-lg-2 p-0 position-relative">
                            <div class="reserv-inner-wrap">
                                <select name="children" style="padding-left: 25px; color: #CF6737;"
                                    class="reserv-select" id="children">
                                    <option value="0">0 {{ __('Children') }}</option>
                                    <option value="1">1 {{ __('Children') }}</option>
                                    <option value="2">2 {{ __('Children') }}</option>
                                    <option value="3">3 {{ __('Children') }}</option>
                                    <option value="4">4 {{ __('Children') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="chaufea_input_homestay col-6 col-md-4 col-lg-2 p-0 position-relative">
                            <div class="reserv-inner-wrap ">
                                <select name="homestay_id" style="padding-left: 25px; color: #CF6737;"
                                    class="reserv-select" id="homestay-select">
                                    @foreach ($home_stay_dropdowns as $home_stay_dropdown)
                                        <option value="{{ $home_stay_dropdown->id }}">{{ $home_stay_dropdown->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="chaufea_input_submit col-6 col-md-4 col-lg-2 p-0 position-relative">
                            <div class="reserv-inner-wrap">
                                <input class="reserv-submit" type="submit" value="CHECK AVAILABILITY">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize flatpickr for check-in
                    flatpickr("#reserv-checkin", {
                        dateFormat: "Y-m-d",
                        minDate: "today",
                        onChange: function(selectedDates, dateStr, instance) {
                            let checkOutInput = document.querySelector("#reserv-checkout");
                            checkOutInput._flatpickr.set("minDate", dateStr ? new Date(dateStr).fp_incr(1) :
                                new Date().fp_incr(1));
                        }
                    });

                    // Initialize flatpickr for check-out
                    flatpickr("#reserv-checkout", {
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
        @endif
    </div>
@endif
