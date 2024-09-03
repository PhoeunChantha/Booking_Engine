@extends('frontends.master')

@section('content')
    <section class="chaufea-section package-section">


        <div class="owl-carousel owl-theme package-carousel">
            @foreach ($packages as $package)
                <div class="item">
                    <div class="row m-0 position-relative">
                        <div class="col-sm-12 col-md-5 col-lg-5 p-0">
                        </div>
                        <div class="col-sm-12 col-md-7 col-lg-7 p-0">
                            <div class="package-image-wrap">
                                <img src="{{ asset('uploads/room/' . @$package->room->thumbnail) }}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 col-lg-6 p-0 package-detail-wrap">
                            <div class="d-flex align-items-center h-100">
                                <div class="package-detail p-3">

                                    <div>
                                        <p class="pakage-price chaufea-text-1">${{ number_format($package->price, 0) }}</p>
                                        <h3 class="chaufea-heading-2 text-dark">{{ $package->title }}</h3>
                                        <p class="package-short-desc">
                                            {{ $package->description }}
                                        </p>
                                    </div>
                                    <div>
                                        <div class="package-special-wrap">
                                            @if ($package->special_package)
                                                @if (is_array($package->special_package))
                                                    @foreach($package->special_package as $index => $row)
                                                       @php
                                                           $row = json_decode($row, true);
                                                       @endphp
                                                       @if ($row)
                                                       <div class="my-2 d-flex align-items-center" style="gap: 10px;">
                                                           <img src="{{ asset('uploads/amenity/' .$row['image']) }}" alt="">
                                                           <span>{{ $row['title'] }}</span>
                                                       </div>
                                                       @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between py-2 mt-4 ">
                                        <div><a href="{{ route('package.detail', ['id' => @$package->id, 'room_id' => @$package->room->id]) }}">Details
                                            <i class=" fa fa-arrow-right" style="font-weight: 500"></i>
                                        </a></div>
                                        <div>
                                            <a href="#" data-href="{{ route('book_now') }}" data-room_id="{{ @$package->room->id }}" data-rate_plan_id="{{ @$package->id }}" class="chaufea-btn-1 text-uppercase book_now">{{ __('Book Now') }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection

@push('script')
    <script>
        var bookingData = {};
        $(document).on('click', 'a.book_now', function (e) {
            e.preventDefault();
            var room_id = $(this).data('room_id');
            var rate_plan_id = $(this).data('rate_plan_id');
            var start_date = `{{ date("Y-m-d", strtotime("today")) }}`;
            var end_date = `{{ date("Y-m-d", strtotime("+1 day")) }}`;

            var url = $(this).data('href');
            bookingData = {
                'room_id': room_id,
                'rate_plan_id': rate_plan_id,
                'start_date': start_date,
                'end_date': end_date,
            }

            $.ajax({
                type: "get",
                url: '{{ route('check_login_status') }}',
                // data: data,
                // dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.success == false) {
                        $('#login-form').modal('show');
                    } else {
                        processBookingPackage(room_id, rate_plan_id, start_date, end_date);
                    }
                }
            });
        });
        function processBookingPackage(room_id, rate_plan_id, start_date, end_date) {
            var bookingData = {
                'room_id': room_id,
                'rate_plan_id': rate_plan_id,
                'start_date': start_date,
                'end_date': end_date,
            }

            $.ajax({
                type : 'GET',
                url : "{{ route('book_now') }}",
                data : bookingData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.url;
                    } else {
                        toastr.error(response.msg);
                    }
                }
            });
        }
        $('#login-form-package').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.msg);
                        if (Object.keys(bookingData).length > 0) {
                            processBookingPackage(bookingData.room_id, bookingData.rate_plan_id, bookingData.start_date, bookingData.end_date);
                            bookingData = {};
                        }
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    toastr.error('An error occurred while processing your request.');
                }
            });
        });
        $('#register-form-package').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.msg);
                        if (Object.keys(bookingData).length > 0) {
                            processBookingPackage(bookingData.room_id, bookingData.rate_plan_id, bookingData.start_date, bookingData.end_date);
                            bookingData = {};
                        }
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    toastr.error('An error occurred while processing your request.');
                }
            });
        });
    </script>
@endpush
