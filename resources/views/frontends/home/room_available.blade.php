@forelse ($rooms as $room)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-room-id="{{ $room->id }}">
        <div class="card container-card">
            <div id="carouselroomControls{{ $room->id }}" class="carousel slide custom-carousel "
                data-interval="false">
                <div class="carousel-inner carousel-room ">
                    {{-- @foreach ($rooms as $room) --}}
                    @if ($room->homestaygaller && $room->homestaygaller->isNotEmpty())
                        @foreach ($room->homestaygaller as $gallery)
                            @if ($gallery->image && is_array($gallery->image))
                                @foreach ($gallery->image as $key => $galler)
                                    <div class="carousel-item @if ($key == 0) active @endif">
                                        <img src="{{ asset('uploads/home_stay_gallery/' . $galler) }}"
                                            class="d-block w-100" alt=".">
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        <p>{{ __('No gallery images available for this room.') }}</p>
                    @endif
                    {{-- @endforeach --}}
                </div>
                <button class="carousel-control-prev btn-circle" type="button"
                    data-target="#carouselroomControls{{ $room->id }}" data-slide="prev">
                    <i class="fas fa-chevron-left fa-lg"></i>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next btn-circle" type="button"
                    data-target="#carouselroomControls{{ $room->id }}" data-slide="next">
                    <i class="fas fa-chevron-right fa-lg"></i>
                    <span class="sr-only">Next</span>
                </button>
                <div class="total-room">
                    <img src="{{ asset('/website/images/icon-image.png') }}" alt="">
                    <span>{{ $room->image_count }}</span>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title ">{{ $room->title }}</h5>
                @if ($room->amenities)
                    @foreach ($room->amenities as $amenity)
                        @php
                            $amenityData = json_decode($amenity, true);
                            $imagePath = 'uploads/amenity/' . $amenityData['image'];
                            $defaultImagePath = 'uploads/image/default.png';
                        @endphp
                        <div class="list d-flex align-items-center">
                            <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImagePath) }}"
                                alt="no image" style="width: 23px; height: 23px">
                            <li class="list-group-item">{{ $amenityData['title'] }}</li>
                        </div>
                    @endforeach
                @endif
                <div class="list d-flex align-items-center">
                    <a href="#" class="refundable">
                        <li class="list-group-item">Fully refundable</li>
                    </a>
                    <img width="10%" src="{{ asset('/website/images/info-circle.png') }}" alt="error">
                </div>
                <div class="list d-flex align-items-center">
                    <li class="list-group-item">Before Wed, Jul 31</li>
                </div>
                <div class="room-detail">
                    <a href="#" type="button" class="" data-toggle="modal"
                        data-target="#roomdetailModal{{ $room->id }}">
                        {{ __(' More details') }}
                        <i class="fa-solid fa-angle-right fa-xs ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-footer" style="border-radius: inherit;">
                <h4>Extras</h4>
                @foreach ($room->ratePlan as $plan)
                    <div class="form-radio d-flex">
                        {{-- <input class="radio-form" type="radio" data-rate-id="{{ $plan->id }}" id="ratePlan{{ $plan->id }}_{{ $room->id }}"
                             name="rate_plan_{{ $room->id }}" value="{{ $plan->price }}"
                             data-plan-price="{{ $plan->price }}" data-room-id="{{ $room->id }}"
                             onclick="updateTotalPrice({{ $room->id }})"> --}}
                        <input class="radio-form" type="radio" id="ratePlan{{ $plan->id }}_{{ $room->id }}"
                            name="rate_plan_{{ $room->id }}" value="{{ $plan->id }}"
                            data-plan-price="{{ $plan->price }}" data-room-id="{{ $room->id }}"
                            data-rate-plan-id="{{ $plan->id }}"
                            onclick="updateTotalPrice({{ $room->id }}, {{ $plan->id }})">
                        <input type="hidden" id="selected-plan-id-{{ $room->id }}" name="rate_plan_id"
                            value="">
                        <label class="radio-label mb-0 ml-3"
                            for="ratePlan{{ $plan->id }}_{{ $room->id }}">{{ $plan->title }}</label>
                        <span class="float-end">
                            <i class="fa-solid fa-plus fa-xs mr-1"></i>${{ $plan->price }}
                        </span>
                    </div>
                @endforeach
                <div class="discount mb-3">
                    <span style="display: none" class="badge badge-danger p-1">10% Off</span>
                </div>
                <div class="amount mb-2">
                    <span style="font-size: 20px; font-weight: 600" id="room-price-{{ $room->id }}" data-price="{{ $room->price }}">
                        $ {{ $room->price }}
                    </span>
                </div>
                <div class="amount d-flex justify-content-between mt-1">
                    <span id="total-price-{{ $room->id }}" class="total-price">
                        $ {{ $room->price }} total
                    </span>
                    {{-- <span id="room-price-{{ $room->id }}" data-price="{{ $room->price }}">$
                         {{ $room->price }}</span> --}}
                    <input type="hidden" id="sub-price-input-{{ $room->id }}" name="sub_price" value="">
                </div>
                {{-- <div class="amount d-flex justify-content-between mt-1">
                     <span id="total-price-{{ $room->id }}" class="total-price">${{ $room->price }}
                         total</span>
                     <input type="hidden" id="total-price-input-{{ $room->id }}" name="total_price"
                         value="">
                 </div> --}}
                <span class="fs-6 text-secondary p-0 mb-1">includes taxes & fees</span>
                <div class="room-detail mt-2">
                    <a href="#" type="button" class="" data-toggle="modal" data-target="#pricedetailModal">
                        {{ __(' Price details') }}
                        <i class="fa-solid fa-angle-right fa-xs ms-1"></i>
                    </a>
                </div>
                <div class="book-now mt-2">
                    {{-- <button type="button" class="btn-book-now btn-lg" data-toggle="modal"
                        data-target="#bookingdetailModal{{ $room->id }}">
                        Book Now
                    </button> --}}
                    {{-- <a href="https://book.securebookings.net/roomrate?id=3e1aeca5-9e84-1670214067-49a5-b7d5-f36c9d20ea95" type="button" class="btn-book-now btn-lg">
                        Book Now
                    </a> --}}
                    <a href="https://book.securebookings.net/roomrate?id=3e1aeca5-9e84-1670214067-49a5-b7d5-f36c9d20ea95" class="" target="blank">
                        <button type="button" class="btn-book-now btn-lg">
                            Book Now
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('frontends.booking.newcheckout')
    @include('frontends.home.room-detail-modal')
    @include('frontends.home.price-detail-modal')
@empty
    <div class="d-flex justify-content-center align-items-center vh-50">
        <div class="no-data text-center">
            <img width="30%" src="{{ asset('/website/social/no-data.png') }}" alt="error">
            <p style="font-size: 20px; font-weight: 400" class="text-danger mt-2">{{ __('No rooms available') }}</p>
        </div>
    </div>
@endforelse
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateTotalPrice(roomId, planId) {
            var roomElement = document.querySelector('.col-12[data-room-id="' + roomId + '"]');

            if (!roomElement) return;

            var roomPrice = parseFloat(roomElement.querySelector('#room-price-' + roomId).getAttribute(
                'data-price'));
            var selectedRadio = roomElement.querySelector('input[type="radio"]:checked');

            if (selectedRadio) {
                var ratePlanPrice = parseFloat(selectedRadio.getAttribute('data-plan-price'));
                var totalPrice = roomPrice + ratePlanPrice;

                // Update the total price display
                roomElement.querySelector('#total-price-' + roomId).textContent = '$' + totalPrice.toFixed(2) +
                    ' total';

                // Update hidden input values
                document.querySelector('#selected-plan-id-' + roomId).value = selectedRadio.getAttribute(
                    'data-plan-id');
                document.querySelector('#total-price-input-' + roomId).value = totalPrice.toFixed(2);
            } else {
                roomElement.querySelector('#total-price-' + roomId).textContent = '$' + roomPrice.toFixed(2) +
                    ' total';
            }
            console.log($(`.rate_plan_id_${roomId}`).val());
            $(`.rate_plan_id_${roomId}`).val(planId);
            $(`.total-price-input-${roomId}`).val(totalPrice);
        }

        document.addEventListener('change', function(event) {
            if (event.target.matches('input[type="radio"][name^="rate_plan_"]')) {
                var roomId = event.target.getAttribute('data-room-id');
                var planId = event.target.getAttribute('data-rate-plan-id');
                updateTotalPrice(roomId, planId);
            }
        });
    });
</script>
