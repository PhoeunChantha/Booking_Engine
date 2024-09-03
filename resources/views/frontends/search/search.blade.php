@extends('frontends.master')

@section('content')
    <div class="chaufea-section search-result-section">

        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 px-5">
                <div class="seach-result-wrap position-relative">
                    <div class="search-room-thumbnail-wrap">
                        <img src="{{ asset('uploads/room/' . $room->thumbnail) }}" alt="">
                        <p class="searched-homestay-title text-white">{{ $room->title }}</p>
                    </div>
                    @php
                        $rate_plans = $room->RatePlan;
                        $price = 0;
                        if ($rate_plans && $rate_plans->count() > 0) {
                            $rate_plan = @$rate_plans->where('type', 'room')->where('status', 'active')->first();
                            $price = @$rate_plan->price;
                        }

                    @endphp
                    <div class="search-item-summary py-5 d-flex flex-column justify-content-between">
                        <div class="d-flex flex-column justify-content-start">
                            <h2 class="entry-title">
                                {{-- <p class="font-weight-light mb-0">{{ $price }}$ / Night</p> --}}
                                <a class="homestay-title" href="{{ route('homestay_detail', $room->id) }}" rel="bookmark">
                                    {{ $room->title }}
                                </a>
                            </h2>
                            {{-- @dd($room->amenities) --}}
                            <div class="entry-summary">
                                <div class="homestay-search-short-desc">
                                    {!! $room->description !!}
                                </div>
                                <div class="row m-0">
                                    @if($room->amenities != null)
                                        @php
                                            $limit = 10;
                                            $count = 0;
                                        @endphp
                                        @foreach ($room->amenities as $amenity)
                                           @if($count < $limit)
                                                @php
                                                    $amenity = json_decode($amenity, true);
                                                    $count++;
                                                @endphp
                                                <div class="col-6 my-1 px-0 d-flex justify-content-start align-items-center">
                                                    <img style="height:30px;" src="{{ asset('uploads/amenity/' . $amenity['image']) }}" alt="">
                                                    <span class="ml-2">{{ $amenity['title'] }}</span>
                                                </div>
                                            @else
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('homestay_detail', $room->id) }}" class="text-white">{{ __('More Detail') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
