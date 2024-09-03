<!-- Modal -->
<style>
    /* .room-slider-detail {
        width: 100%;
        height: 30rem;
        border-radius: 20px;
        background-color: red !important;

    } */

    .room-slider-detail>img {
        width: 100%;
        height: 25rem;
        object-fit: cover;
        border-radius: 20px;
    }

    .list>img {
        width: 4%;
        object-fit: cover;
        margin-right: 10px;
    }

    .title-highlight {
        display: flex;
        align-items: center;
    }

    .title-highlight img {
        margin-right: 10px;
    }

    .title-highlight h6 {
        margin: 0;
    }

    .highlight {
        background-color: #E5C283;
        border-radius: 10px;
        padding: 15px;

    }

    .modal-header {
        border-bottom: 0;
    }

    .room-details-body {
        padding-top: 0;
    }
</style>
<div class="modal fade roomdetailModal" id="roomdetailModal{{ $room->id }}" data-room-id="{{ $room->id }}"
    role="dialog" aria-labelledby="mainModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mainModalLabel">Room Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body room-details-body">
                <div id="carouselroomControlsdetail{{ $room->id }}" class="carousel slide custom-carousel"
                    data-interval="false">
                    <div class="carousel-inner overflow-hidden">
                        {{-- @foreach ($rooms as $room) --}}
                        @if ($room->homestaygaller && $room->homestaygaller->isNotEmpty())
                            @foreach ($room->homestaygaller as $gallery)
                                @if ($gallery->image && is_array($gallery->image))
                                    @foreach ($gallery->image as $key => $galler)
                                        <div
                                            class="carousel-item room-slider-detail  @if ($key == 0) active @endif">
                                            <img src="{{ asset('uploads/home_stay_gallery/' . $galler) }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        @else
                            <p>{{ __('No gallery images available for this room.') }}</p>
                        @endif
                    </div>
                    <button class="carousel-control-prev btn-circle" type="button"
                        data-target="#carouselroomControlsdetail{{ $room->id }}" data-slide="prev">
                        <i class="fas fa-chevron-left fa-lg"></i>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next btn-circle" type="button"
                        data-target="#carouselroomControlsdetail{{ $room->id }}" data-slide="next">
                        <i class="fas fa-chevron-right fa-lg"></i>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
                <div class="container-list mt-3 ml-1">
                    <h5 class="card-title ">{{ $room->title }}</h5>
                    <span class="text-muted">City view</span>
                    <div class="highlight mb-3">
                        <div class="title-highlight">
                            <img width="3%" src="{{ asset('/website/images/star.png') }}" alt="">
                            <h6>Highlights</h6>
                        </div>
                        <p>{!! $room->description !!}</p>
                    </div>
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
                </div>
                <div class="exceptional mt-3 mb-3">
                    <h5>10/10Exceptional</h5>
                    <ul class="list m-0 p-0">
                        <li class="list-group-item ">Guests like it for </li>
                        <li class="list-group-item ">Clean (1 review)</li>
                        <li class="list-group-item ">Renovated (1 review)</li>
                        <li class="list-group-item ">Renovated (1 review)</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <h5>Room amenities</h5>
                    <div class="row d-flex">
                        @if ($room->amenities)
                            @foreach ($room->amenities as $amenity)
                                @php
                                    $amenityData = json_decode($amenity, true);
                                    $imagePath = 'uploads/amenity/' . $amenityData['image'];
                                    $defaultImagePath = 'uploads/image/default.png';
                                @endphp
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="Accessibility">
                                        <div class="title-highlight">
                                            <img width="5%"
                                                src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImagePath) }}"
                                                alt="no image">
                                            <h6>{{ $amenityData['title'] }}</h6>
                                        </div>
                                        <ul>
                                            {!! $amenityData['description'] !!}
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="content-footer">
                        <h4 class="mb-3">Room options</h4>
                        <h5>Extras</h5>
                        @foreach ($room->ratePlan as $plan)
                            <div class="form-radio d-flex">
                                {{-- <input class="radio-form" type="radio" data-rate-id="{{ $plan->id }}" id="ratePlan{{ $plan->id }}_{{ $room->id }}"
                             name="rate_plan_{{ $room->id }}" value="{{ $plan->price }}"
                             data-plan-price="{{ $plan->price }}" data-room-id="{{ $room->id }}"
                             onclick="updateTotalPrice({{ $room->id }})"> --}}
                                <input class="radio-form" type="radio"
                                    id="ratePlan{{ $plan->id }}_{{ $room->id }}"
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
                        <div class="amount">
                            <span id="room-price-{{ $room->id }}" data-price="{{ $room->price }}">
                                $ {{ $room->price }}
                            </span>
                        </div>
                        <div class="amount d-flex justify-content-between mt-1">
                            <span id="total-price-{{ $room->id }}" class="total-price">
                                $ {{ $room->price }} total
                            </span>
                            <input type="hidden" id="sub-price-input-{{ $room->id }}" name="sub_price"
                                value="">
                        </div>
                        <span class="fs-6 text-secondary p-0">includes taxes & fees</span>
                        <div class="room-detail">
                            <a href="#" type="button" class="" data-toggle="modal"
                                data-target="#pricedetailModal" data-dismiss="modal"
                                data-room-id="{{ $room->id }}" data-action="close">
                                {{ __(' Price details') }}
                                <i class="fa-solid fa-angle-right fa-xs ms-1"></i>
                            </a>
                        </div>
                        <div class="book-now mt-2">
                            <button type="button" class="btn-book-now btn-lg" data-toggle="modal"
                                data-target="#bookingdetailModal{{ $room->id }}" data-dismiss="modal"
                                data-room-id="{{ $room->id }}" data-action="close">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateTotalPrice(roomId, planId) {
            var roomElement = document.querySelector('.roomdetailModal[data-room-id="' + roomId + '"]');

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
<script>
    // document.getElementById('openSubModal').addEventListener('click', function() {
    //     // Show the sub-modal
    //     $('#bookingdetailModal{{ $room->id }}').modal('show');

    //     // Prevent the main modal from closing
    //     $('#roomdetailModal').on('hide.bs.modal', function (e) {
    //         if ($('#bookingdetailModal{{ $room->id }}').hasClass('show')) {
    //             e.preventDefault(); // Prevent the main modal from closing
    //         }
    //     });
    // });

    // Optionally, allow closing both modals when the sub-modal closes
    $('#bookingdetailModal{{ $room->id }}').on('hidden.bs.modal', function() {
        $('#roomdetailModal').modal('hide'); // Close the main modal after the sub-modal closes
    });
</script>
