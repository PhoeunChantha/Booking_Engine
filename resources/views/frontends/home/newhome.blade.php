@extends('frontends.master')
@section('content')
    @include('frontends.home.newhome-style')
    @include('frontends.home.popup-images')
    <section class="gallery ">
        <div class="col-md-12 px-0 banner section-78rem">
            <div class="row mx-0 d-flex justify-content-center">
                <div class="col-md-6 left-image pr-2 pl-2">
                    @php
                        $showgallery = $showgallery;
                        $galleryCount = $gallery->count(); // Make sure to get the count here
                    @endphp
                    @if ($showgallery)
                        <img style="cursor: pointer" data-toggle="modal" data-target="#galleryModal"
                            src="
                            @if ($showgallery->image && file_exists(public_path('uploads/gallery/' . $showgallery->image))) {{ asset('uploads/gallery/' . $showgallery->image) }}
                            @else
                                {{ asset('uploads/image/default.png') }} @endif
                            "
                            alt="Gallery Image 1" class="main-image">
                    @endif

                    <div class="picture-gallery">
                        {{-- <button class="btn btnpicture" data-toggle="modal" data-target="#galleryModal">
                            <i class="fas fa-camera mr-2" style="color: #4A4B51;"></i>{{ $galleryCount }} See all photos
                        </button> --}}
                        <button class="btn btnpicture" data-toggle="modal" data-target="#galleryModal">
                            <i class="fas fa-camera mr-2" style="color: #4A4B51;"></i> See all photos
                        </button>
                    </div>
                </div>

                <div class="col-md-6 container-image poster px-2">
                    <div class="image-grid">
                        @foreach ($gallerys as $gallery)
                            <div class="small-image" data-toggle="modal" data-target="#galleryModal"
                                style="cursor: pointer">
                                <img src="
                                    @if ($gallery->image && file_exists(public_path('uploads/gallery/' . $gallery->image))) {{ asset('uploads/gallery/' . $gallery->image) }}
                                    @else
                                        {{ asset('uploads/image/default.png') }} @endif
                                    "
                                    alt="Gallery Image {{ $loop->iteration }}">
                            </div>
                        @endforeach
                        {{-- <div class="small-image">
                            <img src="{{ asset('/website/images/gallery2.png') }}" alt="Gallery Image 2">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="flex-grow-1 position-relative" style="margin-inline: 2.5rem;">
                                                                                        <div class="row d-flex justify-content-center align-items-center">
                                                                                            <div class="card container-booking w-100">
                                                                                                <div class="col-md-12">
                                                                                                    <form id="check-availability-form" action="{{ route('checkavailability') }}" method="post">
                                                                                                        @csrf
                                                                                                        <div class="row d-flex justify-content-center align-items-center">
                                                                                                            <div class="col-12 col-md-3 col-lg-3 p-0">
                                                                                                                <div style="background-color: #F2F2F3; border-radius: 10px"
                                                                                                                    class="row datepicker-container m-1 d-flex justify-content-center align-items-center p-2">
                                                                                                                    <div class="col-2 p-0">
                                                                                                                        <img width="60%" src="{{ asset('/website/images/datapicker.png') }}"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    {{-- <div class="col-10 p-0 calendar">
                                            <input autocomplete="off" id="checkin-date" name="start_date"
                                                placeholder="Check in" style="background-color: #F2F2F3;" type="text"
                                                class="form-control border-0 datepicker datepicker-input">
                                            <span class="day-of-week ml-2 align-self-center"></span>
                                        </div> --}}
                                                                                                                    <div class="col-10 p-0 calendar">
                                                                                                                        <input autocomplete="off" id="checkin-date" name="start_date_display"
                                                                                                                            placeholder="Check in" style="background-color: #F2F2F3" type="text"
                                                                                                                            class="form-control border-0 datepicker datepicker-input">
                                                                                                                        <input type="hidden" name="start_date" class="original-date">
                                                                                                                        <span class="day-of-week ml-2 align-self-center"></span>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-12 col-md-3 col-lg-3 p-0">
                                                                                                                <div id="" style="background-color: #F2F2F3; border-radius: 10px"
                                                                                                                    class="row datepicker-container m-1 d-flex justify-content-center align-items-center p-2">
                                                                                                                    <div class="col-2 p-0">
                                                                                                                        <img width="60%" src="{{ asset('/website/images/datapicker.png') }}"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    {{-- <div class="col-10 p-0 calendar">
                                            <input autocomplete="off" id="checkout-date" name="end_date"
                                                placeholder="Check out" style="background-color: #F2F2F3" type="text"
                                                class="form-control border-0 datepicker datepicker-input">
                                            <span class="day-of-week ml-2 align-self-center"></span>
                                        </div> --}}
                                                                                                                    <div class="col-10 p-0 calendar">
                                                                                                                        <input autocomplete="off" id="checkout-date" name="end_date_display"
                                                                                                                            placeholder="Check out" style="background-color: #F2F2F3" type="text"
                                                                                                                            class="form-control border-0 datepicker datepicker-input">
                                                                                                                        <input type="hidden" name="end_date" class="original-date">
                                                                                                                        <span class="day-of-week ml-2 align-self-center"></span>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-12 col-md-3 col-lg-3 p-0 select-child">
                                                                                                                <div style="background-color: #F2F2F3; border-radius: 10px"
                                                                                                                    class="row m-1 d-flex justify-content-center align-items-center p-2">
                                                                                                                    <div class="col-2 p-0">
                                                                                                                        <img width="60%" src="{{ asset('/website/images/selectpeople.png') }}"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div class="select-people col-10 p-2" onclick="toggleDropdown()">
                                                                                                                        <span id="display-adults">0 adults</span>,
                                                                                                                        <span id="display-children">0 children</span><br>
                                                                                                                        <span id="display-rooms">0 rooms</span>
                                                                                                                        <input type="hidden" name="number" id="input-rooms">
                                                                                                                        <input type="hidden" name="adult" id="input-adult">
                                                                                                                        <input type="hidden" name="child" id="input-child">
                                                                                                                        <input type="hidden" name="child_age" id="input-child_age">
                                                                                                                        <div class="icon-dropdown">
                                                                                                                            <i class="fas fa-angle-down fa-sm" style="color: gray;"></i>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="dropdown-content">
                                                                                                                        <div class="container-fluid">
                                                                                                                            <div class="row">
                                                                                                                                <div class="card w-100 p-1">
                                                                                                                                    <div class="col-12 mt-2 mb-2">
                                                                                                                                        <div
                                                                                                                                            class="row align-items-center justify-content-center mb-3">
                                                                                                                                            <div
                                                                                                                                                class="col-6 text-left align-items-center justify-content-center">
                                                                                                                                                <h6 class="label">Rooms</h6>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="col-6 text-right d-flex justify-content-center align-items-center">
                                                                                                                                                <button type="button" class="minus"
                                                                                                                                                    aria-label="Decrease by one" disabled>
                                                                                                                                                    <svg width="16" height="2"
                                                                                                                                                        viewBox="0 0 16 2" fill="none"
                                                                                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                                                                                        <line y1="1" x2="16"
                                                                                                                                                            y2="1" stroke="#0064FE"
                                                                                                                                                            stroke-width="2" class="icon" />
                                                                                                                                                    </svg>
                                                                                                                                                </button>
                                                                                                                                                <div class="number dim">0</div>
                                                                                                                                                <button type="button" class="plus"
                                                                                                                                                    aria-label="Increase by one">
                                                                                                                                                    <svg width="16" height="16"
                                                                                                                                                        viewBox="0 0 16 16" fill="none"
                                                                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                        class="icon">
                                                                                                                                                        <line x1="8" y1="0"
                                                                                                                                                            x2="8" y2="16"
                                                                                                                                                            stroke="#0064FE" stroke-width="2" />
                                                                                                                                                        <line y1="8" x2="16"
                                                                                                                                                            y2="8" stroke="#0064FE"
                                                                                                                                                            stroke-width="2" />
                                                                                                                                                    </svg>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="row align-items-center mb-3">
                                                                                                                                            <div
                                                                                                                                                class="col-6 text-left align-items-center justify-content-center">
                                                                                                                                                <h6 class="label">Adults</h6>
                                                                                                                                                <p class="label-description">Ages 18 and above</p>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="col-6 text-right d-flex justify-content-center align-items-center">
                                                                                                                                                <button type="button" class="minus"
                                                                                                                                                    aria-label="Decrease by one" disabled>
                                                                                                                                                    <svg width="16" height="2"
                                                                                                                                                        viewBox="0 0 16 2" fill="none"
                                                                                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                                                                                        <line y1="1" x2="16"
                                                                                                                                                            y2="1" stroke="#0064FE"
                                                                                                                                                            stroke-width="2" class="icon" />
                                                                                                                                                    </svg>
                                                                                                                                                </button>
                                                                                                                                                <div class="number dim">0</div>
                                                                                                                                                <button type="button" class="plus"
                                                                                                                                                    aria-label="Increase by one">
                                                                                                                                                    <svg width="16" height="16"
                                                                                                                                                        viewBox="0 0 16 16" fill="none"
                                                                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                        class="icon">
                                                                                                                                                        <line x1="8" y1="0"
                                                                                                                                                            x2="8" y2="16"
                                                                                                                                                            stroke="#0064FE" stroke-width="2" />
                                                                                                                                                        <line y1="8" x2="16"
                                                                                                                                                            y2="8" stroke="#0064FE"
                                                                                                                                                            stroke-width="2" />
                                                                                                                                                    </svg>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="row align-items-center">
                                                                                                                                            <div class="col-6 text-left">
                                                                                                                                                <h6 class="label">Child</h6>
                                                                                                                                                <p class="label-description">Age 0 - 17</p>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="col-6 text-right d-flex justify-content-center align-items-center">
                                                                                                                                                <button type="button" class="minus"
                                                                                                                                                    aria-label="Decrease by one" disabled>
                                                                                                                                                    <svg width="16" height="2"
                                                                                                                                                        viewBox="0 0 16 2" fill="none"
                                                                                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                                                                                        <line y1="1" x2="16"
                                                                                                                                                            y2="1" stroke="#0064FE"
                                                                                                                                                            stroke-width="2" class="icon" />
                                                                                                                                                    </svg>
                                                                                                                                                </button>
                                                                                                                                                <div class="number dim">0</div>
                                                                                                                                                <button type="button" class="plus"
                                                                                                                                                    aria-label="Increase by one">
                                                                                                                                                    <svg width="16" height="16"
                                                                                                                                                        viewBox="0 0 16 16" fill="none"
                                                                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                        class="icon">
                                                                                                                                                        <line x1="8" y1="0"
                                                                                                                                                            x2="8" y2="16"
                                                                                                                                                            stroke="#0064FE" stroke-width="2" />
                                                                                                                                                        <line y1="8" x2="16"
                                                                                                                                                            y2="8" stroke="#0064FE"
                                                                                                                                                            stroke-width="2" />
                                                                                                                                                    </svg>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="row align-items-center mt-2">
                                                                                                                                            <div class="col-6 text-left">
                                                                                                                                                <p class="label-description">Age of child 1</p>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="col-6 text-right d-flex justify-content-center align-items-center">
                                                                                                                                                <input style="border:#B49575 1px solid;"
                                                                                                                                                    class="w-50" type="number" id="child_age"
                                                                                                                                                    min="1"
                                                                                                                                                    onfocus="this.style.border='#B49575 1px solid';">
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="row align-items-center mt-3">
                                                                                                                                            <div
                                                                                                                                                class="col-12 text-right d-flex justify-content-center align-items-center">
                                                                                                                                                <button type="button"
                                                                                                                                                    class="btn btn-primary btn-done px-4 mr-3"
                                                                                                                                                    onclick="updateDisplay()">Done</button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-12 col-md-3 col-lg-3 p-1 container-button">
                                                                                                                <button class="btn w-100 button-booking check-available" type="submit"
                                                                                                                    id="checkAvailability">
                                                                                                                    Book Now
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
    </section>

    <section class="section-welcome">
        <div class="col-md-12 pt-2 section-welcome-container">
            <div class="row title flex-column align-items-center d-flex justify-content-center pt-5">
                <h3 class="">Welcome To {{ $company_name }}</h3>
                <span></span>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-11 contaner-desc mt-0">
                    <div class="description" id="description">
                        {!! $company_description !!}
                    </div>
                    <div class="read-more text-center mt-3">
                        <a id="read-more" href="#">{{ __('Read More') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section id="rooms-page" class="px-4 section-78rem">
        <div class="col-md-12 px-0">
            <div class="float-start ">
                <h4 class="fw-bold mt-4 section-title">{{ __('Select Your Room') }}</h4>
            </div>
            <div id="rooms-container" class="row mt-4 gap-3 mb-2 justify-content-center rooms-container">
                @include('frontends.home.room_available', ['rooms' => $rooms])

            </div>
        </div>
    </section> --}}
    <section id="rooms-page" class="px-4 section-78rem">
        <div class="col-md-12 px-0">
            <div class="hbe-bws mt-3">
                <section id="hbe-bws-page">
                    <div id="hbe-bws-wrapper"> </div>
                </section>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12 p-0">
            <div class="bg-white mb-4 mt-5">
                <div class="title text-center">
                    <h3 style="color: #B49575" class="mb-3 fw-600 section-title">{{ __('Highlights') }}</h3>
                </div>
            </div>
            <div id="change-backgroundimage" class="card border-0 banner-back overflow-hidden"
                style="background-repeat: no-repeat; background-position: center; background-size: cover;">
                <div class="d-flex flex-wrap" style="background-color: rgba(0, 0, 0, 0.4); height: 100%;">
                    <div class="col-12 col-md-6 pl-5 d-flex align-items-center overflow-hidden">
                        <div id="carouselExampleInterval" class="vertical carousel slide" data-bs-ride="carousel"
                            data-bs-slide="vertical">
                            <div class="carousel-inner">
                                @foreach ($highlights as $highlight)
                                    <div
                                        class="carousel-item item highlights @if ($loop->first) active @endif">
                                        <img class="img-fluid" src="{{ asset('uploads/highlight/' . $highlight->icon) }}"
                                            alt="">
                                        <h1 class="highlights-title text-white fs-1">{{ $highlight->title }}</h1>
                                        <div class="text-description text-white fs-2 fw-400">
                                            {{ $highlight->description }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center pr-0 container-thumbnail">
                        <div class="thumbnail-wrapper" style="margin-right: -10px;">
                            <div class="thumbnail-container">
                                @foreach ($highlights as $highlight)
                                    <div class="thumbnail"
                                        data-bg-image="{{ asset('uploads/highlight/' . $highlight->thumbnail) }}">
                                        <img class="img-fluid"
                                            src="{{ asset('uploads/highlight/' . $highlight->thumbnail) }}"
                                            alt="">
                                        <div class="container-title-thumbnail">
                                            <h4 class="thumbnail-title">{{ $highlight->title }}</h4>
                                            <h4 class="d-none">{{ $highlight->description }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center mt-4 pl-2 pr-4">
                                <div class="progress flex-grow-1" style="margin-right: 10px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"
                                        style="width: 0%; background-color: #F9A854; border-radius: 5px"></div>
                                </div>
                                <span class="num-bar text-white mb-1" style="font-size: 2.2rem; font-weight: 600">
                                    01
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- StayCation -->
    <section class="px-4 section-78rem">
        <div class="col-12 px-0 mt-2 fw-800">
            <div class="Staycation-title text-center mt-5">
                <h3 style="color: #B49575" class="section-title">{{ __('Staycation offers available') }}</h3>
                <span class="sub-title">{{ __('Get special benefits for your stay') }}</span>
            </div>
            <div class="row mt-3">
                @foreach ($staycations as $staycation)
                    <div class="col-12 col-md-6 col-lg-3 my-3">
                        <div class="card offer-card border-0 shadow-sm" style="border-radius: 20px">
                            <div class="card-header p-0 ">
                                <img src="{{ asset('uploads/staycation/' . $staycation->thumbnail) }}" alt="" style="height: 250px">
                            </div>
                            <div class="card-body pb-0">
                                @if (@$staycation->amenities)
                                    @foreach ($staycation->amenities as $item)
                                        @php
                                            $decodedItem = json_decode($item, true);
                                        @endphp
                                        @if ($decodedItem)
                                            <div class="body-title d-flex align-items-center align-content-center">
                                                <img class=""
                                                    src="{{ asset('uploads/amenity/' . $decodedItem['image']) }}"
                                                    alt="{{ $decodedItem['title'] }}">
                                                <h5 class="card-title m-0 ml-2">{{ $decodedItem['title'] }}</h5>
                                            </div>
                                            <div class="form-group gap-3">
                                                <div class="round">
                                                    {{-- @include('svgs.checkicon') --}}
                                                    <span class="checkbox-label-text">{!! $decodedItem['description'] !!}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Facilities -->
    <section id="facilities-page">
        <div class="col-12 px-4 mt-4 mb-5 section-78rem">
            <div class="row d-flex mx-0 justify-content-center align-items-center">
                <div id="carouselExampleControls10" class="carousel slide custom-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="title-section py-3 mb-2">
                            <h3 class="fw-bold section-title">{{ __('Facilities') }}</h3>
                        </div>
                        @foreach ($facilities as $facility)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-12 col-md-5 facility-image">
                                        <img class="d-block w-100"
                                            src="{{ asset('uploads/facility/' . $facility->thumbnail) }}" alt=""
                                            height="300px" style="object-fit: cover; border-radius: 20px">
                                    </div>
                                    <div class="col-12 col-md-7 facility-details">
                                        <div class="Facility-number">
                                            <span class="fw-bold">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </div>
                                        <div class="Facility-title py-3">
                                            <h3>{{ $facility->title }}</h3>
                                        </div>
                                        <div class="Facility-description">
                                            <p>{{ $facility->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 text-center mt-3">
                        <div class="Facility-button">
                            <a class="" type="button" data-target="#carouselExampleControls10" data-slide="prev">
                                <a class="" type="button" data-target="#carouselExampleControls10"
                                    data-slide="prev">
                                    <i class="fas fa-chevron-left fa-lg"></i>
                                </a>
                                <a class="" type="button" data-target="#carouselExampleControls10"
                                    data-slide="next">
                                    <a class="" type="button" data-target="#carouselExampleControls10"
                                        data-slide="next">
                                        <i class="fas fa-chevron-right fa-lg"></i>
                                    </a>
                                </a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Hotel Facilities -->
    <section>
        <div class="col-12 mt-5 p-3 section-78rem" style="background-color: #F2F2F3">
            <div class="title-section text-center p-3 position-relative">
                <h3 class="fw-bold" style="font-size: 1.5rem">{{ __('Hotel Facilities') }}</h3>
                <span></span>
            </div>
            <div class="row mt-3 mb-3 d-flex">
                @foreach ($facilities as $facility)
                    <div class="col-12 col-md-6 d-flex my-3">
                        <div class="col-12 d-flex flex-wrap justify-content-center">
                            <div class="col-5 col-md-2 hotel-image">
                                <img src="{{ asset('uploads/facility/' . $facility->image) }}" alt="">
                            </div>
                            <div class="col-12 col-md-10 hotel-text ml-0 mt-2">
                                <h4>{{ $facility->title }}</h4>
                                <div class="hotel-description">
                                    <p>{{ $facility->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Customer Comment -->
    <section class="">
        <div class="col-12 section-78rem comment-customer">
            <div class="row mx-0 d-flex justify-content-center customer-content align-items-center">

                <div class="col-12 col-md-6 col-lg-6 m-0 p-0">
                    @php
                        $setting = App\Models\BusinessSetting::all();
                        $data['comment_image'] = @$setting->where('type', 'comment_image')->first()->value;
                    @endphp
                    <div class="comment-image">
                        <img src="@if ($data['comment_image'] && file_exists('uploads/business_settings/' . $data['comment_image'])) {{ asset('uploads/business_settings/' . $data['comment_image']) }}
                                @else
                                    {{ asset('uploads/image/default.png') }} @endif"
                            alt="not found">
                    </div>
                </div>
                <div class="col-12 col-md-6 pl-4 col-lg-6 text-comment" style="height: 70vh">
                    <div class="card-header col-12 text-center mt-3" style="background: none; border: none">
                        <div class="comment-button">
                            <a class="" type="button" data-target="#carouselcommentControls10" data-slide="prev">
                                <a class="" type="button" data-target="#carouselcommentControls10"
                                    data-slide="prev">
                                    <i class="fas fa-chevron-left fa-lg"></i>
                                </a>
                                <a class="" type="button" data-target="#carouselcommentControls10"
                                    data-slide="next">
                                    <a class="" type="button" data-target="#carouselcommentControls10"
                                        data-slide="next">
                                        <i class="fas fa-chevron-right fa-lg"></i>
                                    </a>
                                </a>
                            </a>
                        </div>
                    </div>
                    <div id="carouselcommentControls10" class="card-body carousel slide p-4" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($comments as $comment)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <div class="comment-text pb-4">
                                        <p class="fs-4">{{ $comment->content }}</p>
                                    </div>
                                    <div class="comment-name">
                                        <strong>{{ $comment->customer_name }}</strong>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <script>
        function toggleDropdown() {
            const dropdown = document.querySelector('.dropdown-content');
            dropdown.classList.toggle('show');
        }
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.dropdown-content');
            const selectPeople = document.querySelector('.select-people');

            if (!dropdown.contains(event.target) && !selectPeople.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
        const buttons = document.querySelectorAll("button");
        const minValue = 0;
        const maxValue = 10;

        buttons.forEach((button) => {
            button.addEventListener("click", (event) => {
                // 1. Get the clicked element
                const element = event.currentTarget;
                // 2. Get the parent
                const parent = element.parentNode;
                // 3. Get the number (within the parent)
                const numberContainer = parent.querySelector(".number");
                const number = parseFloat(numberContainer.textContent);
                // 4. Get the minus and plus buttons
                const increment = parent.querySelector(".plus");
                const decrement = parent.querySelector(".minus");
                // 5. Change the number based on click (either plus or minus)
                const newNumber = element.classList.contains("plus") ?
                    number + 1 :
                    number - 1;
                numberContainer.textContent = newNumber;
                console.log(newNumber);
                // 6. Disable and enable buttons based on number value (and undim number)
                if (newNumber === minValue) {
                    decrement.disabled = true;
                    numberContainer.classList.add("dim");
                    // Make sure the button won't get stuck in active state (Safari)
                    element.blur();
                } else if (newNumber > minValue && newNumber < maxValue) {
                    decrement.disabled = false;
                    increment.disabled = false;
                    numberContainer.classList.remove("dim");
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.btn-done').addEventListener('click', function() {
                const adults = document.querySelectorAll('.number')[1].textContent.trim();
                const children = document.querySelectorAll('.number')[2].textContent.trim();
                const rooms = document.querySelectorAll('.number')[0].textContent.trim();

                document.getElementById('display-adults').textContent = `${adults} adults`;
                document.getElementById('display-children').textContent = `${children} children`;
                document.getElementById('display-rooms').textContent = `${rooms} rooms`;
                $('#input-adult').val(adults);
                $('#input-child').val(children);
                $('#input-rooms').val(rooms);
                $('#input-child_age').val($('#child_age').val());

                toggleDropdown(); // Hide the dropdown after updating the display
            });
        });
    </script> --}}
    <script>
        document.querySelectorAll('.check-available').forEach(button => {
            button.addEventListener('click', function(event) {
                // Get the IDs for check-in and check-out inputs
                var checkinInput = document.getElementById('checkin-date');
                var checkoutInput = document.getElementById('checkout-date');
                var checkinDate = checkinInput.value.trim();
                var checkoutDate = checkoutInput.value.trim();
                if (!checkinDate || !checkoutDate) {
                    // Show Toastr alert
                    toastr.warning('Please select check in and check out dates.', {
                        closeButton: true,
                        progressBar: true,
                        timeOut: 5000
                    });

                    // Scroll to the check-in date input
                    if (!checkinDate) {
                        checkinInput.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        checkinInput.focus();
                    } else {
                        checkoutInput.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        checkoutInput.focus();
                    }

                    event.stopImmediatePropagation(); // Stop the button's default action
                    return false;
                }
                // If both dates are provided, the modal will show naturally
            });
        });
    </script>
    {{-- <script>
        document.querySelectorAll('.btn-book-now[data-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function(event) {
                // Get the IDs for check-in and check-out inputs
                var checkinInput = document.getElementById('checkin-date');
                var checkoutInput = document.getElementById('checkout-date');
                var checkinDate = checkinInput.value.trim();
                var checkoutDate = checkoutInput.value.trim();
                if (!checkinDate || !checkoutDate) {
                    // Show Toastr alert
                    toastr.warning('Please select check in and check out dates.', {
                        closeButton: true,
                        progressBar: true,
                        timeOut: 5000
                    });

                    // Scroll to the check-in date input
                    if (!checkinDate) {
                        checkinInput.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        checkinInput.focus();
                    } else {
                        checkoutInput.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        checkoutInput.focus();
                    }

                    event.stopImmediatePropagation(); // Stop the button's default action
                    return false;
                }
                // If both dates are provided, the modal will show naturally
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#check-availability-form').on('submit', function(e) {
                e.preventDefault();

                // var startDate = $('#checkin-date').val();
                // var endDate = $('#checkout-date').val();
                // var token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('checkavailability') }}",
                    method: 'POST',
                    // data: {
                    //     _token: token,
                    //     start_date: startDate,
                    //     end_date: endDate
                    // },
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success == true) {
                            $('.rooms-container').replaceWith(response.view);
                            document.querySelector('#rooms-page').scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                        // $('#rooms-container').html(response);
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.status + ' - ' + xhr.statusText);
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('.custom-carousel').each(function() {
                $(this).carousel({
                    interval: false
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnailContainer = document.querySelector('.thumbnail-container');
            const thumbnails = document.querySelectorAll('.thumbnail');
            const changeBackgroundImage = document.getElementById('change-backgroundimage');
            const carouselItems = document.querySelectorAll('.carousel-item.highlights');
            const progressBar = document.querySelector('.progress-bar');
            const numBar = document.querySelector('.num-bar');
            const totalThumbnails = thumbnails.length;
            const thumbnailsToShow = 3;
            let currentIndex = 0;
            let isSliding = false;

            // Clone initial thumbnails
            for (let i = 0; i < thumbnailsToShow; i++) {
                const clone = thumbnails[i].cloneNode(true);
                thumbnailContainer.appendChild(clone);
            }

            function updateContentAndBackground() {
                const firstVisibleThumbnail = thumbnails[currentIndex % totalThumbnails];
                const newTitle = firstVisibleThumbnail.querySelector('.container-title-thumbnail h4:first-child')
                    .innerText;
                const newDescription = firstVisibleThumbnail.querySelector(
                    '.container-title-thumbnail h4:last-child').innerText;
                const newBgImage = firstVisibleThumbnail.getAttribute('data-bg-image');

                changeBackgroundImage.style.backgroundImage = `url('${newBgImage}')`;

                // Add a short delay before updating the carousel items
                setTimeout(() => {
                    carouselItems.forEach((item, index) => {
                        if (index === currentIndex % totalThumbnails) {
                            item.querySelector('.highlights-title').innerText = newTitle;
                            item.querySelector('.text-description').innerText = newDescription;
                            item.classList.add('active');
                        } else {
                            item.classList.remove('active');
                        }
                    });
                }, 50); // Adjust delay if necessary
            }

            function updateProgressBar() {
                const percentage = ((currentIndex % totalThumbnails) + 1) / totalThumbnails * 100;
                progressBar.style.width = `${percentage}%`;

                // Update the num-bar with the current thumbnail number
                numBar.innerText = String(currentIndex + 1).padStart(2, '0');
            }

            function slideThumbnails() {
                if (isSliding) return;

                isSliding = true;
                currentIndex++;

                if (currentIndex >= totalThumbnails) {
                    currentIndex = 0;
                }

                const offset = -currentIndex * (100 / thumbnailsToShow);
                thumbnailContainer.style.transform = `translateX(${offset}%)`;

                // Ensure the thumbnail transition is applied
                thumbnailContainer.addEventListener('transitionend', function handleTransitionEnd() {
                    updateContentAndBackground();
                    updateProgressBar();
                    isSliding = false;
                    thumbnailContainer.removeEventListener('transitionend', handleTransitionEnd);
                }, {
                    once: true
                });
            }

            // Initial setup
            updateContentAndBackground();
            updateProgressBar();

            setInterval(slideThumbnails, 3000);
        });
    </script>
    <script>
        $(document).ready(function() {
            let originalText = $('#description').text();
            let truncatedText = originalText.substring(0, 450) + '...';

            $('#description').text(truncatedText);

            $('#read-more').click(function(e) {
                e.preventDefault();
                let isExpanded = $('#description').hasClass('expanded');

                if (isExpanded) {
                    $('#description').text(truncatedText);
                    $(this).text('Read more');
                } else {
                    $('#description').text(originalText);
                    $(this).text('Read less');
                }

                $('#description').toggleClass('expanded');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//book.securebookings.net/js/widget.all.js"></script>
    <script type="text/javascript"
        src="//book.securebookings.net/widgetCustomize?lang=en&widgetType=Widget&id=3e1aeca5-9e84-1670214067-49a5-b7d5-f36c9d20ea95&ajax=true">
    </script>
@endsection
@push('script')
@endpush
