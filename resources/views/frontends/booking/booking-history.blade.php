@extends('frontends.master')

@section('content')
    <section class="chaufea-section-bg">
        @if($transactions && $transactions->count() > 0)
        <ul class="booking-history_list">
            @foreach ($transactions as $transaction)
                <li class="booking-history_item">
                    <div class="row">
                        <div class="col-12 col-sm-5">
                            <p class="booking-id">{{ __('Booking ID') }} #{{ $transaction->invoice_no }}</p>
                            <div class="booking-history_item-img">
                                <img src="{{ asset('uploads/room/' . @$transaction->room->thumbnail) }}" alt="homestay-1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-sm-7">
                            <div class="table-responsive ">
                                <table class="w-100 table table-borderless">
                                    <tr class="booking-status border-bottom">
                                        <td>{{ __('Status') }}:</td>
                                        @php
                                            $status_text_class = null;
                                            $status_icon_class = null;
                                            $status = $transaction->status;
                                            if ($status == 'confirmed') {
                                                $status_text_class = 'text-success';
                                                $status_icon_class = 'fa-check-circle';
                                            }
                                            if ($status == 'processing') {
                                                $status_text_class = 'text-primary';
                                                $status_icon_class = 'fa-arrow-circle-up';
                                            }
                                            if ($status == 'cancel') {
                                                $status_text_class = 'text-danger';
                                                $status_icon_class = 'fa-times-circle';
                                            }
                                        @endphp
                                        {{-- style="color: #28a745!important;" --}}
                                        <td class="{{ $status_text_class }} text-uppercase">
                                            <i class="fas {{ $status_icon_class }}" ></i>
                                            {{ $status }}
                                        </td>
                                    </tr>
                                    <tr class="booking-payment border-bottom">
                                        <td>{{ __('Payment Method') }}:</td>
                                        <td class="text-uppercase">{{ $transaction->payment_method }}</td>
                                    </tr>
                                    <tr class="booking-checkin">
                                        <td>{{ __('Check-in') }}:</td>
                                        <td>{{ date('F j, Y', strtotime($transaction['checkin_date'])) }}</td>
                                    </tr>
                                    <tr class="booking-checkout border-bottom">
                                        <td>{{ __('Check-out') }}:</td>
                                        <td>{{ date('F j, Y', strtotime($transaction['checkout_date'])) }}</td>
                                    </tr>
                                    <tr class="booking-guest_name border-bottom">
                                        <td>{{ __('Name') }}:</td>
                                        <td>{{ $transaction->guest_info['first_name'] . ' ' . $transaction->guest_info['last_name'] }}</td>
                                    </tr>
                                    <tr class="booking-guest_email">
                                        <td>{{ __('Email') }}:</td>
                                        <td>{{ $transaction->guest_info['email'] }}</td>
                                    </tr>
                                    <tr class="booking-guest_phone border-bottom">
                                        <td>{{ __('Phone Number') }}:</td>
                                        <td>{{ $transaction->guest_info['full_mobile'] }}</td>
                                    </tr>
                                    <tr class="booking-homestay">
                                        <td>{{ __('Homestay') }}:</td>
                                        <td>
                                            <div class="row justify-content-between m-0">
                                                <div>{{ @$transaction->room->title }} | {{ @$transaction->ratePlan->title }}</div>
                                                <div>$ {{ max($transaction['price_each_date']) }}/ {{ __('Night') }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('uploads/image/not_found.png') }}" alt="no data" style="max-width: 512px">
            </div>
            <div class="col-12">
                <h3 class="text-center">
                    {{ __('No data found') }}
                </h3>
            </div>
        </div>
        @endif
    </section>
@endsection
