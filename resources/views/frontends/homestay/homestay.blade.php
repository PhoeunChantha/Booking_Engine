@extends('frontends.master')

@section('content')
    <section class="chaufea-section homestay-section">
        <h2 class="chaufea-heading-1 text-uppercase">
            @if (request()->routeIs('homestays'))
                @php
                    $titles = App\Models\SectionTitle::where('page_id', 2)->get();
                @endphp
            @endif
            {{ $titles[0]->title ?? $titles[1]->default_title }}
        </h2>
        <div class="mt-3 mt-md-5">

            <div class="row">

                @foreach ($rooms as $room)
                    <div class="py-3 col-sm-6 col-md-6 col-lg-6">
                        <div class="home-homestay-wrap w-100 position-relative">
                            <a href="{{ route('homestay_detail', $room->id) }}">
                                <img class="homestay-thumnail w-100" src="{{ asset('uploads/room/' . $room->thumbnail) }}"
                                    alt="">
                            </a>
                            <div class="homestay-d-info p-3">
                                {{-- <p class="mb-0">150$ / NIGHT</p> --}}
                                <a href="{{ route('homestay_detail', $room->id) }}"
                                    class="mb-0 homestay-title">{{ $room->title }}</a>
                                <div class="special-wrap">
                                    <div class="special-list">
                                        @if (@$room->amenities)
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
            </div>

        </div>
    </section>
@endsection
