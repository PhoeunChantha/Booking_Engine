@extends('frontends.master')

@section('content')
    <section class="mt-md-0 mt-lg-0 chaufea-section home-description">
        <h2 class="chaufea-heading-1 text-uppercase mt-2 mt-md-0">
            {{ $company_name }} </h2>
        <h4 class="m-0">{!! $company_sub_title !!}</h4>
        <div class="mt-3 mt-md-5">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div>
                        <p>{!! $company_description !!}</p>

                    </div>
                    <div class="mt-3 mt-md-5">
                        <div class="d-flex">
                            <div style="width:60px;"></div>
                            <p class="text-muted ml-4 mb-0">{{ __('Reservation') }}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0_358_25352" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="80" height="80">
                                    <rect width="60" height="60" fill="url(#pattern0)"></rect>
                                </mask>
                                <g mask="url(#mask0_358_25352)">
                                    <rect width="60" height="60" fill="#CF6737"></rect>
                                </g>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_358_25352" transform="scale(0.0078125)"></use>
                                    </pattern>
                                    <image id="image0_358_25352" width="128" height="128"
                                        xlink:href="data:image/png;base64,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">
                                    </image>
                                </defs>
                            </svg>
                            <p class="ml-4 chaufea-text-1 font-weight-bold mb-0"><a style="color:#CF6737"
                                    href="tel:{{ $phone }}">{{ $phone }}</a></p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="owl-carousel owl-theme home-gallery-slider mt-4 mt-md-2 mt-lg-0">
                        @foreach ($sliders as $slider)
                            <div class="item">
                                <div class="">
                                    <img class="image-slider-chaufea" src="{{ $slider->image_url }}" alt="">
                                </div>
                                {{-- <div class="slider-chafea-title text-center">
                                  <p class="mb-0 text-white">{{ $slider->name }}</p>
                                  <p class="mb-0 text-white">{{ $slider->short_des }}</p>
                              </div> --}}
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image1) }} ">
                                <img class="home-gal-img-1" src="{{ asset('uploads/business_settings/' . $image1) }} "
                                    alt="">
                            </a>
                        </div>
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image2) }} ">
                                <img class="home-gal-img-2" src="{{ asset('uploads/business_settings/' . $image2) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image3) }}">
                                <img class="home-gal-img-3" src="{{ asset('uploads/business_settings/' . $image3) }} "alt="">
                            </a>
                        </div>
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image4) }}">
                                <img class="home-gal-img-4" src="{{ asset('uploads/business_settings/' . $image4) }}"
                                    alt="">
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="chaufea-section homestay-section">
        <h2 class="chaufea-heading-1 text-uppercase">
            @if (request()->routeIs('homepage'))
                @php
                    $titles = App\Models\SectionTitle::where('page_id', 1)->get();
                @endphp
                {{ $titles[0]->title ?? $titles[0]->default_title }}
            @endif
        </h2>
        <div class="mt-3 mt-md-5">

            <div class="row">

                @foreach ($rooms->take(4) as $room)
                    <div class="py-3 col-sm-6 col-md-6 col-lg-6">
                        <div class="home-homestay-wrap w-100 position-relative">
                            <a href="{{ route('homestay_detail', $room->id) }}">
                                <img class="homestay-thumnail w-100" src="{{ asset('uploads/room/' . $room->thumbnail) }}"
                                    alt="">
                            </a>
                            <div class="homestay-d-info p-3">

                                <a href="{{ route('homestay_detail', $room->id) }}"
                                    class="mb-0 homestay-title">{{ $room->title }}</a>
                                <div class="special-wrap">
                                    <div class="special-list">
                                        {{-- @dd($room->amenities) --}}
                                        @if ($room->amenities)
                                            @if (is_array($room->amenities))
                                                @foreach ($room->amenities as $item)
                                                    @if ($loop->iteration <= 4)
                                                        @php
                                                            $decodedItem = json_decode($item, true);
                                                        @endphp

                                                        @if ($decodedItem)
                                                            <img src="{{ asset('uploads/amenity/' . $decodedItem['image']) }}"
                                                                alt="{{ $decodedItem['title'] }}">
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('homestay_detail', $room->id) }}">{{ __('Details') }} <i
                                                class=" fa fa-arrow-right" style="font-weight: 500"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                @if ($rooms && $rooms->count() >= 4)
                    <div class="col-12">
                        <span>
                            <a href="{{ route('homestays') }}">{{ __('View more') }} <i class=" fa fa-arrow-right"
                                    style="font-weight: 500"></i></a>
                        </span>
                    </div>
                @endif
            </div>

        </div>
    </section>
    <section class="chaufea-section extra-service-section">
        <h2 class="text-white chaufea-heading-1">{{ $titles[1]->title ?? $titles[1]->default_title }}</h2>
        <div class="row mt-3 mt-md-5">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="pb-0 pb-md-5">
                    <p>
                        {!! $extra_service_description !!}
                    </p>
                </div>
                <div class="mt-5">
                    <div class="d-flex">
                        <div style="width:60px;"></div>
                        <p class="text-muted ml-4 mb-0">{{ __('For Information') }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <mask id="mask0_358_25352" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="80" height="80">
                                <rect width="60" height="60" fill="url(#pattern0)" />
                            </mask>
                            <g mask="url(#mask0_358_25352)">
                                <rect width="60" height="60" fill="#CF6737" />
                            </g>
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_358_25352" transform="scale(0.0078125)" />
                                </pattern>
                                <image id="image0_358_25352" width="128" height="128"
                                    xlink:href="data:image/png;base64,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" >
                                </image>
                            </defs>
                        </svg>
                        <p class="ml-4 chaufea-text-1 font-weight-bold mb-0"><a style="color:#CF6737"
                                href="tel:{{ $phone }}">{{ $phone }}</a></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7 mt-5 mt-md-2 mt-lg-0">
                <div class="owl-carousel owl-theme extra-service-carousel">
                    @foreach ($extra_services as $extservice)
                        <div class="item px-2">
                            <div class="extra-service-wrap">
                                <img src="{{ asset('uploads/service/' . $extservice->thumbnail) }}" alt="extra-service">
                                <div class="extra-service-detail">
                                    <h3 class="">{{ $extservice->title }}</h4>
                                        <p class="text-dark"><span
                                                class="special-service-price">${{ number_format($extservice->price, 0) }}</span>/day
                                        </p>
                                        <ul class="features mb-4">

                                            @foreach ($extservice->description as $item)
                                                <li class="feature">
                                                    @if ($item['option'] == 'yes')
                                                        <img src="{{ asset('uploads/mdi_tick.svg') }}" alt="">
                                                    @else
                                                        <img src="{{ asset('uploads/teenyicons_x-outline.svg') }}"
                                                            alt="">
                                                    @endif
                                                    <span>{{ $item['title'] }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="chaufea-section service-section">
        <div class="border">
            <div class="row mx-0 ">
                @foreach ($services as $service)
                    @php $service_c = $loop->iteration % 2 @endphp

                    @if ($service_c == 0)
                        <div class="col-md-6 p-0">
                            <img class="servcie-image" src="{{ asset('uploads/service/' . $service->thumbnail) }}"
                                alt="">
                        </div>
                    @endif
                    <div class="col-md-6 p-3 d-flex align-items-center">
                        <div class="">
                            <h3 class="chaufea-heading-2 text-uppercase">{{ $service->title }}</h3>
                            <p class="mt-2 mt-md-4">
                                {{ Str::limit($service->description, 350) }}
                            </p>
                            <div class="text-center h-fit-content">
                                <a type="button" href="{{ route('service_detail', $service->id) }}"
                                    class="chaufea-btn-1">{{ __('LEARN MORE') }}</a>
                            </div>
                        </div>
                    </div>
                    @if ($service_c != 0)
                        <div class="col-md-6 p-0">
                            <img class="servcie-image" src="{{ asset('uploads/service/' . $service->thumbnail) }}"
                                alt="">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="chaufea-section facilities-section">
        <h2 class="chaufea-heading-1 text-uppercase">{{ $titles[2]->title ?? $titles[2]->default_title }}</h2>

        <div class="row">
            <div class="col-12">
                <p>{!! $history_of_chaufea !!}</p>
            </div>
        </div>
    </section>
    <section class="chaufea-section blog-section">
        <div>
            <h2 class="chaufea-heading-1 text-uppercase mb-4">{{ $titles[3]->title ?? $titles[3]->default_title }}</h2>
            <p class="text-white mb-4">{{ $foundation }}</p>
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
                                            {!! $blog->description !!}
                                        </div>
                                        <a class="blog-detail-btn"
                                            href="{{ route('blog.detail', $blog->id) }}">{{ __('View Detail') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <section class="chaufea-section contact-section">
        <div class="contact-section-inner">
            <div class="row bg-white">
                <div class="col-sm-12 col-md-6 col-lg-5 py-4 px-4" style="background-color: #FFE7D4;">
                    <div>
                        @if (request()->routeIs('contact-us'))
                            @php
                                $titles = App\Models\SectionTitle::where('page_id', 9)->get();
                            @endphp
                        @endif
                        <h1 class="chaufea-heading-1">{{ $titles[0]->title ?? $titles[0]->default_title }}</h1>
                        <div class="mt-4">
                            <p>
                                {!! $contact_description !!}
                            </p>

                            <div class="mt-4">
                                <div class="chaufea-icon-box">
                                    <div class="chaufea-icon mr-3">
                                        <svg width="40" height="40" viewBox="0 0 80 80" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <mask id="mask0_358_25352" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="80" height="80">
                                                <rect width="80" height="80" fill="url(#pattern1)" />
                                            </mask>
                                            <g mask="url(#mask0_358_25352)">
                                                <rect width="80" height="80" fill="#CF6737" />
                                            </g>
                                            <defs>
                                                <pattern id="pattern1" patternContentUnits="objectBoundingBox"
                                                    width="1" height="1">
                                                    <use xlink:href="#image0_358_25352" transform="scale(0.0078125)" />
                                                </pattern>
                                                <image id="image0_358_25352" width="128" height="128"
                                                    xlink:href="data:image/png;base64,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" />
                                            </defs>
                                        </svg>
                                    </div>
                                    <p class="mb-0"><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                                </div>
                                <div class="chaufea-icon-box">
                                    <div class="chaufea-icon mr-3">
                                        <svg width="40" height="40" viewBox="0 0 40 41" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <mask id="mask0_49_544" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="40" height="40">
                                                <rect y="0.5" width="40" height="40" fill="url(#pattern2)" />
                                            </mask>
                                            <g mask="url(#mask0_49_544)">
                                                <rect y="1" width="40" height="40" fill="#CF6737" />
                                            </g>
                                            <defs>
                                                <pattern id="pattern2" patternContentUnits="objectBoundingBox"
                                                    width="1" height="1">
                                                    <use xlink:href="#image0_49_544" transform="scale(0.0078125)" />
                                                </pattern>
                                                <image id="image0_49_544" width="128" height="128"
                                                    xlink:href="data:image/png;base64,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" />
                                            </defs>
                                        </svg>
                                    </div>
                                    <p class="mb-0">{{ $email }}</p>
                                </div>
                                <div class="chaufea-icon-box">
                                    <div class="chaufa-icon mr-3">
                                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <mask id="mask0_51_557" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="40" height="41">
                                                <rect y="0.5" width="40" height="40" fill="url(#pattern3)" />
                                            </mask>
                                            <g mask="url(#mask0_51_557)">
                                                <rect y="0.5" width="40" height="40" fill="#CF6737" />
                                            </g>
                                            <defs>
                                                <pattern id="pattern3" patternContentUnits="objectBoundingBox"
                                                    width="1" height="1">
                                                    <use xlink:href="#image0_51_557" transform="scale(0.0078125)" />
                                                </pattern>
                                                <image id="image0_51_557" width="128" height="128"
                                                    xlink:href="data:image/png;base64,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" />
                                            </defs>
                                        </svg>
                                    </div>
                                    <p class="mb-0 chaufea_address">{{ $company_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-7 p-0">
                    @php
                        $setting = App\Models\BusinessSetting::all();
                        $data['getInTouch'] = @$setting->where('type', 'getInTouch')->first()->value ?? '';
                        $data['link_google_map'] = @$setting->where('type', 'link_google_map')->first()->value;

                        $userProvidedIframe = $data['link_google_map'];

                         preg_match('/<iframe.*?src=["\'](.*?)["\'].*@endphp/i', $userProvidedIframe, $matches);

                         $srcAttributeValue = !empty($matches[1]) ? $matches[1] : null;
                    ?>
                    <div class="chaufea-maps">
                        @if (!empty($srcAttributeValue))
                            <iframe src="{{ $srcAttributeValue }}" width="800" height="600" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <p>No valid Google Maps iframe provided.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
