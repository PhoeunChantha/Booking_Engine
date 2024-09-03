<!-- Modal -->
<style>
    .sub-body>.font-weight {
        font-weight: 600;
    }

    .d-flex>.font-weight {
        font-weight: 600;
    }

    .price-details-body {
        padding-top: 0 !important;
    }

    .modal-header>button {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 3px solid #B49575;
        color: #B49575 !important;
        display: flex !important;
        justify-content: center !important;
        margin-right: 1rem
    }

    .modal-header .close {
        padding: 0 0 0 0 !important;
        margin: 0 0 0 0 !important;
    }

    .close {
        line-height: 22px !important;
    }
</style>
<div class="modal fade" id="pricedetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 ">
                <h5 class="modal-title" id="exampleModalLabel">Price Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body price-details-body ">
                <div class="col-md-12 sub-body">
                    <span class="font-weight">4 nights</span>
                    <div class="d-flex justify-content-between w-100 ">
                        <span class="font-weight mx-3">$35 per night including</span>
                        <span class="font-weight mx-2">$114</span>
                    </div>
                    <span class="font-weight mx-3">13% off (-$21)</span>
                    <div class="d-flex justify-content-between w-100">
                        <span class="font-weight">Taxes</span>
                        <span class="font-weight mx-2">$10</span>
                    </div>
                    <hr class="w-90">
                    <div class="d-flex justify-content-between w-100 mt-2">
                        <span class="font-weight">Total</span>
                        <span class="font-weight mx-2">$124</span>
                    </div>
                    <div class="d-flex align-items-center mb-1">
                        <img width="5%" src="{{ asset('website/images/tags.png') }}" alt="">
                        <span style="color: #539104;" class="ml-2 font-weight">You save $21!</span>
                    </div>
                    {{-- <button style="background-color: #539104;border-radius: 7px" type="button"
                        class="btn w-100 text-white">Book Now</button> --}}
                    <button style="background-color: #539104;border-radius: 7px" type="button" id="btn-price-detail"
                        class="btn w-100 text-white btn-book-now" data-toggle="modal"
                        data-target="#bookingdetailModal{{ $room->id }}" data-dismiss="modal"
                        data-room-id="{{ $room->id }}" data-action="close">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
