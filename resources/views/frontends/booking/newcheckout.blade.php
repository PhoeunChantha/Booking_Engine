<!-- Modal -->
<style>
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
</style>
<div class="modal fade" id="bookingdetailModal{{ $room->id }}" role="dialog" tabindex="-1"
    aria-labelledby="subModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 ">
                <h5 class="modal-title" id="subModalLabel">Booking for {{ $room->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php
                $start_date = null;
                $end_date = null;

                if (session()->has('booking_info')) {
                    $start_date = session('booking_info')['start_date'];
                    $end_date = session('booking_info')['end_date'];
                    // $room_id = session('booking_info')['room_id'];
                }

            @endphp
            <div class="modal-body">
                <form action="{{ route('new_post_checkout') }}" class="booking-form bg-white p-3 checkout_form"
                    method="post">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="rate_plan_id" id="selectedRatePlan_{{ $room->id }}">
                    <div class="guest-detail">
                        <div class="row">
                            <div class="form-group col-3 col-sm-2">
                                <label>{{ __('Title') }}</label>
                                <select class="form-control" name="title">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                </select>
                            </div>
                            <div class="form-group col-9 col-sm-4">
                                <label for="first_name" class="required_label">{{ __('First Name') }} </label>
                                <input type="text" id="first_name" name="first_name" class="form-control"
                                    value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="last_name" class="required_label">{{ __('Last Name') }} </label>
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                    value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="email" class="required_label">{{ __('Email') }} </label>
                                <input type="email" name="email" id="email" class="form-control" value=""
                                    required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="confirm_email" class="required_label">{{ __('Confirm Email') }} </label>
                                <input type="email" name="confirm_email" id="confirm_email" class="form-control"
                                    value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="phone_{{ $room->id }}">{{ __('Phone Number') }}</label>
                                <div class="form-group">
                                    <input id="phone{{ $room->id }}" type="tel"
                                        class="form-control @error('phone{{ $room->id }}') is-invalid @enderror"
                                        name="phone{{ $room->id }}" value="" required>
                                    @error('phone{{ $room->id }}')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="country" class="required_label">{{ __('Country') }} </label>
                                <select class="form-control" name="country" id="country" required>
                                    <option value="cambodia">{{ __('Cambodia') }}</option>
                                    <option value="china">{{ __('China') }}</option>
                                    <option value="united kingdom">{{ __('United Kingdom') }}</option>
                                </select>
                            </div>
                            {{-- <div class="form-group col-12 col-sm-6">
                                <label for="checkin_date_{{ $room->id }}"
                                    class="required_label">{{ __('Checkin date') }}</label>
                                <input type="hidden" name="checkin_date" id="checkin_date_{{ $room->id }}"
                                    class="form-control datepicker" value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="checkout_date_{{ $room->id }}"
                                    class="required_label">{{ __('Checkout date') }}</label>
                                <input type="hidden" name="checkout_date" id="checkout_date_{{ $room->id }}"
                                    class="form-control datepicker" value="" required>
                            </div> --}}
                            <input type="hidden" name="rate_plan_id" id="rate_plan_id_{{ $room->id }}"
                                class="rate_plan_id_{{ $room->id }}" value="">
                            <input type="hidden" id="total-price-input-{{ $room->id }}"
                                class="total-price-input-{{ $room->id }}" name="total_price" value="">
                            <input type="hidden" id="sub-price-input-{{ $room->id }}"
                                class="sub-price-input-{{ $room->id }}" name="sub_price" value="">
                            <div class="form-group col-12 col-sm-6">
                                <label for="checkin_date_{{ $room->id }}"
                                    class="required_label">{{ __('Checkin date') }}</label>
                                <input readonly type="text" name="checkin_date"
                                    id="checkin_date_{{ $room->id }}" class="form-control datepicker"
                                    value="{{ $start_date ? $start_date : __('start date') }}">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="checkout_date_{{ $room->id }}"
                                    class="required_label">{{ __('Checkout date') }}</label>
                                <input readonly type="text" name="checkout_date"
                                    id="checkout_date_{{ $room->id }}" class="form-control datepicker"
                                    value="{{ $end_date ? $end_date : __('end date') }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="comment">{{ __('Additional Comment') }} ({{ __('optional') }})</label>
                                <textarea class="form-control" name="comment" id="comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn chaufea-btn-1 btn_checkout btn-primary"
                            data-href="{{ route('new_post_checkout') }}">
                            <i class="fas fa-lock mr-3"></i>{{ __('Confirm and Book') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script>
    $(document).ready(function() {
        @foreach ($rooms as $room)
            var input = document.querySelector("#phone{{ $room->id }}");
            var iti = window.intlTelInput(input, {
                initialCountry: "kh",
                separateDialCode: true,
                hiddenInput: "full_mobile",
                geoIpLookup: function(callback) {
                    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "us";
                        callback(countryCode);
                    });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                nationalMode: false,
                autoPlaceholder: "aggressive"
            });

            $(".checkout_form").validate({
                messages: {
                    agree: "Please accept our policy"
                }
            });
        @endforeach
    });

    $(document).ready(function() {
        @foreach ($rooms as $room)
            $('#checkin_date').datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(selectedDate) {
                    $('#checkout_date').datepicker('option', 'minDate',
                        selectedDate);
                }
            });

            $('#checkout_date').datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(selectedDate) {
                    $('#checkin_date').datepicker('option', 'maxDate',
                        selectedDate);
                }
            });
        @endforeach
    });
</script>
@push('script')
@endpush
