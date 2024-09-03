<div class="check_available_form_wrapper">
    @if ($rate_plans && $rate_plans->count() > 0)
        <div class="room-list-wrap">
            @foreach ($rate_plans as $rate)
                <div class="room-list-item row position-relative p-2 py-md-4 px-md-5 mx-0">
                    <div class="col-12 col-sm-12 col-md-7">
                        <h4 class="room-list-title mb-4">{{ $room->title }} | {{ $rate->title }}</h4>
                        <div class="row m-0 justify-content-start">
                            <div class="amenitie-wrap">
                                <p class="text-secondary" style="font-size: 1.2em;">{{ __('Amenities') }}</p>
                                {{-- @dd($room->amenities) --}}
                                <div>
                                    <ul class="amenities-list">
                                        @if ($room->amenities)
                                            @foreach ($room->amenities as $amenity)
                                            @php
                                                $amenityData = json_decode($amenity, true);
                                                $imagePath = 'uploads/amenity/' . $amenityData['image'];
                                                $defaultImagePath = 'uploads/image/default.png';
                                            @endphp
                                                <li class="amenity my-2">
                                                    <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImagePath) }}"
                                                        alt="no image" style="width: 23px; height: 23px">
                                                    <span>{{ $amenityData['title'] }}</span>
                                                </li>
                                                <li>
                                                    <span>{!! $amenityData['description'] !!}</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @if ($rate->type == 'package')
                                <div class="special-packages-wrap">
                                    <p class="text-secondary" style="font-size: 1.2em;">{{ __('Special Package') }}</p>
                                    <div>
                                        <ul class="amenities-list">
                                            @if ($rate->special_package)
                                                @foreach ($rate->special_package as $row)
                                                 @php
                                                    $row = json_decode($row,true);
                                                    $imagePath = 'uploads/amenity/' . $row['image'];
                                                    $defaultImagePath = 'uploads/image/default.png';
                                                 @endphp
                                                    <li class="amenity my-2">
                                                        <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImagePath) }}"
                                                            alt="no image" style="width: 23px; height: 23px">
                                                        <span>{{ $row['title'] }}</span>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-5 d-flex flex-column justify-content-between text-left text-md-right py-4 p-md-0">
                        <div>
                            <p>{{ __('Price For One Night') }}:</p>
                            <p class="single-room-price">{{ number_format($rate->price, 0) }} $</p>
                        </div>
                        <div class="pb-4 mt-5 mt-md-0">
                            <a href="#" data-href="{{ route('book_now') }}" data-room_id="{{ $room->id }}" data-rate_plan_id="{{ $rate->id }}" class="chaufea-btn-1 text-uppercase book_now">{{ __('Book Now') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="room-list-wrap">
            {{ __('No data found') }}
        </div>
    @endif
</div>
