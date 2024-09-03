@extends('frontends.master')
@section('content')
    <style>
        label#agree-error {
        position: absolute;
        top: 21px;
    }
    </style>
    <section class="chaufea-section-bg checkout-section">
        <h1 class="chaufea-heading-1 mb-5">{{ __('Booking Information') }}</h1>

        <div class="row booking-detail">
            <div class="col-12 col-md-8">
                <h3 class="mb-4">Guest Detail</h3>
                <form action="{{ route('post_checkout') }}" class="booking-form bg-white p-3 checkout_form" method="post">
                    @csrf
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
                                <input type="text" id="first_name" name="first_name" class="form-control" value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="last_name" class="required_label">{{ __('Last Name') }} </label>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="email" class="required_label">{{ __('Email') }} </label>
                                <input type="email" name="email" id="email" class="form-control" value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="confirm_email" class="required_label">{{ __('Confirm Email') }} </label>
                                <input type="email" name="confirm_email" id="confirm_email" class="form-control" value="" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="phone">{{ __('Phone Number') }}</label>
                                <div class="form-group">
                                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"  name="phone" value="" required>
                                    @error('phone')
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
                            <div class="form-group col-12">
                                <label for="comment">{{ __('Additional Comment') }} ({{ __('optional') }})</label>
                                <textarea class="form-control" name="comment" id="comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="payment-detail">
                        <h3 class="mb-4">{{ __('Payment') }}</h3>
                        <div class="row">
                            <div class="form-group col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <select class="form-control w-100" name="payment_method" id="payment_method">
                                            <option value="credit_card">{{ __('Credit Card') }}</option>
                                            <option value="bank_transfer">{{ __('Bank Transfer') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="extra-card">
                                            <img src="{{ asset('uploads/mastercard.png') }}" alt="">
                                            <img src="{{ asset('uploads/visa.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="btn-group w-100">
                                    <a type="button" class="position-relative btn py-3 border text-left payment-dropdown" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="{{ asset('uploads/creditcard.png') }}" class="mx-3" alt="">
                                        {{ __('Credit Card') }}
                                        <i class="fas fa-chevron-down payment-toggle"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left pl-1">
                                        <a class="dropdown-item payment-dropdown py-3" >
                                            <img src="{{ asset('uploads/creditcard.png') }}" class="mr-3" alt="">
                                            Credit Card 1
                                        </a>
                                        <a class="dropdown-item payment-dropdown py-3" >
                                            <img src="{{ asset('uploads/creditcard.png') }}" class="mr-3" alt="">
                                            Credit Card 2
                                        </a>
                                    </div>
                                    <div class="extra-card">
                                        <img src="{{ asset('uploads/mastercard.png') }}" alt="">
                                        <img src="{{ asset('uploads/visa.png') }}" alt="">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label>{{ __('Card Number') }} *</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label>{{ __('Name on card') }}</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label>{{ __('Expiration Date') }}</label>
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-control">
                                            <option>---Month---</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control">
                                            <option>---Year---</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label>{{ __('Card security code') }}</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-12">

                                {{-- <label for="agree"></label> --}}
                                <label for="agree">
                                    <input type="checkbox" name="agree" id="agree" required> {{ __('Please check this box to indicate that you have read and agree to the Booking policies.') }}
                                </label>
                            </div>
                            <div class="form-group col-12">
                                <button type="submit" class="btn chaufea-btn-1 btn_checkout" data-href="{{ route('post_checkout') }}">
                                    <i class="fas fa-lock mr-3"></i>{{ __('Confirm and Book') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-12 col-md-4">
                {{-- <div>
                    <h3 class="mb-4">{{ __('Your Booking') }}</h3>
                    <div class="booking-detail-wrap p-3">
                        <div class="row m-0">
                            <div class="col-4 px-0">
                                <img src="{{ asset('uploads/room/' . $room->thumbnail) }}" alt="">
                            </div>
                            <div class="col-8">
                                <p>{{ $room->title }} | {{ $booking_info['rate_plan']['title'] }}</p>
                            </div>
                        </div>
                        <div class="table-responsive ">
                            <table class="w-100 table table-borderless book-detail-table">

                                <tr class="border-bottom">
                                    <td>{{ __('Check-in') }}:</td>
                                    <td>{{ date('F j, Y', strtotime($booking_info['start_date'])) }}</td>
                                </tr>
                                <tr class=" border-bottom">
                                    <td>{{ __('Check-out') }}:</td>
                                    <td>{{ date('F j, Y', strtotime($booking_info['end_date'])) }}</td>
                                </tr>
                                <tr class=" border-bottom">
                                    <td>{{ __('Night') }}:</td>
                                    <td>{{ $booking_info['total_night'] }}</td>
                                </tr>
                                <tr class=" border-bottom">
                                    <td>{{ __('Adults') }}:</td>
                                    <td>{{ $room->adult }}</td>
                                </tr>
                                <tr class="">
                                    <td>{{ $room->title }} * {{ $booking_info['total_night'] }}</td>
                                    <td>{{ $booking_info['rate_plan'][''] }}$ {{ max($booking_info['date_price']) }}/ {{ __('Night') }}</td>
                                </tr>
                                <tr class="">
                                    <td class="pt-0">{{ __('Total') }}</td>
                                    <td class="pt-0 text-danger">${{ $booking_info['total_price'] }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- <div class="booking-policies mt-4">
            <h3 class="mb-4">{{ __('Booking Policies') }}</h3>
            <p>
                {!! $booking_policy !!}
            </p>
        </div> --}}
    </section>
@endsection

@push('script')
<script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.js') }}"></script>

<script>
    $(document).ready(function () {
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input,{
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
            nationalMode: false, // Always display the international dial code
            autoPlaceholder: "aggressive" // Show the full international number as a placeholder

        });

        $(".checkout_form").validate({
            messages: {
                agree: "Please accept our policy"
            }
        });

    });

</script>
@endpush
