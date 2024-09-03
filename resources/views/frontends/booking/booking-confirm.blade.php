@extends('frontends.master')
@section('content')
    <section class="chaufea-section-bg confirm-section">
        <div class="order-confirm-wrap row mb-5">

            <div class="col-12 col-sm-8 col-md-9 d-flex justify-content-start align-items-center">
                <div>
                    <img style="height: 100px;" src="{{ asset('uploads/sucess.svg') }}" alt="">
                </div>
                <div class="thank-you-text">
                    <p><span class="font-weight-bold">{{ __('Thank you') }},</span> {{ __('your order was submitted sucessfully') }}:</p>
                    <p >{{ __('Booking detail has been sent to') }}: {{ $customer->email }}</p>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3">
                <div class="confirmed-detail py-3">
                    <p>{{ __('Booking number') }}: <span>{{ $transaction->invoice_no }}</span></p>
                    <p>{{ __('Booking Date') }}: <span>{{ date('d/m/Y', strtotime($transaction->created_at)) }}</span></p>
                    <p>{{ __('Payment Method') }}: <span class="text-uppercase">{{ $transaction->payment_method }}</span></p>
                    <p>{{ __('Booking Status') }}: <span class="text-uppercase">{{ $transaction->status }}</span></p>
                </div>
            </div>

        </div>
        <div class="row booking-detail">
            <div class="col-12 col-md-8">
                <h3 class="mb-4">{{ __('Your Information') }}</h3>
                <div class="booking-detail-wrap p-3">
                    <div class="table-responsive ">
                        <table class="w-100 table table-borderless book-detail-table">

                            <tr class="border-bottom">
                                <td>{{ __('First Name') }}:</td>
                                <td>{{ $customer->first_name }}</td>
                            </tr>
                            <tr class=" border-bottom">
                                <td>{{ __('Last Name') }}:</td>
                                <td>{{ $customer->last_name }}</td>
                            </tr>
                            <tr class=" border-bottom">
                                <td>{{ __('Email') }}:</td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr class=" border-bottom">
                                <td>{{ __('Phone Number') }}:</td>
                                <td>{{ $customer->phone }} </td>
                            </tr>
                            <tr class="border-bottom">
                                <td>{{ __('Country') }}:</td>
                                <td>{{ $customer->country }}</td>
                            </tr>
                            <tr class="">
                                <td>{{ __('Additional Comment') }}:</td>
                                <td>{{ $transaction->comment }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 text-center">
                        <a href="{{ route('booking_history') }}" class="btn chaufea-btn-1 btn_checkout my-3" data-href="{{ route('post_checkout') }}">
                            {{ __('Booking History') }}
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4">
                <h3 class="mb-4">{{ __('Your Booking') }}</h3>
                <div class="booking-detail-wrap p-3">
                    <div class="row m-0">
                        <div class="col-4 px-0">
                            <img src="{{ asset('uploads/room/' . $transaction->room->thumbnail) }}" alt="">
                        </div>
                        <div class="col-8">
                            <p>{{ $transaction->room->title }} | {{ $transaction->ratePlan->title }}</p>
                        </div>
                    </div>
                    <div class="table-responsive ">
                        <table class="w-100 table table-borderless book-detail-table">

                            <tr class="border-bottom">
                                <td>Check-in:</td>
                                <td>{{ date('F j, Y', strtotime($transaction['checkin_date'])) }}</td>
                            </tr>
                            <tr class=" border-bottom">
                                <td>Check-out:</td>
                                <td>{{ date('F j, Y', strtotime($transaction['checkout_date'])) }}</td>
                            </tr>
                            <tr class=" border-bottom">
                                <td>Night:</td>
                                <td>{{ $transaction->night_stay }}</td>
                            </tr>
                            <tr class=" border-bottom">
                                <td>Adults:</td>
                                <td>{{ $transaction->room->adult }}</td>
                            </tr>
                            <tr class="">
                                <td>Single Stay * {{ $transaction->night_stay }}</td>
                                <td>$ {{ max($transaction['price_each_date']) }}/ {{ __('Night') }}</td>
                            </tr>
                            <tr class="">
                                <td class="pt-0">Total</td>
                                <td class="pt-0 text-danger">$ {{ $transaction->final_total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
