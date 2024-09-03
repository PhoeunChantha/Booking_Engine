@extends('backends.master')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Edit Rate Plan') }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <form method="POST" action="{{ route('admin.rate_plan.update', $ratePlan->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input type="hidden" name="room_id" value="{{ $room_id }}"> --}}
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                            {{-- @dump($languages) --}}
                                            @foreach (json_decode($language, true) as $lang)
                                                @if ($lang['status'] == 1)
                                                    <li class="nav-item">
                                                        <a class="nav-link text-capitalize {{ $lang['code'] == $default_lang ? 'active' : '' }}"
                                                            id="lang_{{ $lang['code'] }}-tab" data-toggle="pill"
                                                            href="#lang_{{ $lang['code'] }}" data-lang="{{ $lang['code'] }}"
                                                            role="tab" aria-controls="lang_{{ $lang['code'] }}"
                                                            aria-selected="false">{{ \App\helpers\AppHelper::get_language_name($lang['code']) . '(' . strtoupper($lang['code']) . ')' }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                        <div class="tab-content" id="custom-content-below-tabContent">
                                            @foreach (json_decode($language, true) as $lang)
                                                @if ($lang['status'] == 1)
                                                    <?php
                                                    if (count($ratePlan['translations'])) {
                                                        $translate = [];
                                                        foreach ($ratePlan['translations'] as $t) {
                                                            if ($t->locale == $lang['code'] && $t->key == 'title') {
                                                                $translate[$lang['code']]['title'] = $t->value;
                                                            }
                                                            if ($t->locale == $lang['code'] && $t->key == 'description') {
                                                                $translate[$lang['code']]['description'] = $t->value;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <div class="tab-pane fade {{ $lang['code'] == $default_lang ? 'show active' : '' }} mt-3"
                                                        id="lang_{{ $lang['code'] }}" role="tabpanel"
                                                        aria-labelledby="lang_{{ $lang['code'] }}-tab">
                                                        <div class="form-group">
                                                            <input type="hidden" name="lang[]"
                                                                value="{{ $lang['code'] }}">
                                                            <label
                                                                for="title_{{ $lang['code'] }}">{{ __('Title') }}({{ strtoupper($lang['code']) }})</label>
                                                            <input type="title" id="title_{{ $lang['code'] }}"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                name="title[]" placeholder="{{ __('Enter Title') }}"
                                                                value="{{ $translate[$lang['code']]['title'] ?? $ratePlan['title'] }}">

                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label
                                                                for="description_{{ $lang['code'] }}">{{ __('Description') }}({{ strtoupper($lang['code']) }})</label>
                                                            <textarea id="description_{{ $lang['code'] }}" class="form-control @error('description') is-invalid @enderror"
                                                                name="description[]" rows="3">{{ $translate[$lang['code']]['description'] ?? $ratePlan['description'] }}</textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div> --}}
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card no_translate_wrapper">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('General Info') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <input type="hidden" name="room_id" value="{{ request()->room_id }}">
                                        <div class="form-group col-md-12">
                                            <label for="code">{{ __('Code') }}</label>
                                            <input readonly type="text" id="code"
                                                class="form-control @error('code') is-invalid @enderror" name="code"
                                                placeholder="{{ __('Code') }}"
                                                value="{{ old('code', $ratePlan->code) }}">
                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <style>
                                            .container-guests {
                                                width: 49%;
                                            }
                                        </style>

                                        <div class="form-group col-md-12">
                                            <label for="code">{{ __('Guests Included in Price ') }}</label>
                                            <div class="d-flex justify-content-between gap-5">
                                                <div class="container-guests">
                                                    <select class="form-control" name="guest_included[]" id="guest_count">
                                                        @for ($i = 1; $i <= 100; $i++)
                                                            <option
                                                                value="{{ $i }} {{ $ratePlan->guest_included == $i ? 'selected' : '' }}">
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="container-guests">
                                                    <select class="form-control" name="guest_included[]" id="guest_type">
                                                        <!-- Options will be populated dynamically -->
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="code">{{ __('Maximum Guests Allowed ') }}</label>
                                            <div class="d-flex justify-content-between gap-5">
                                                <div class="container-guests">
                                                    <select class="form-control" name="guests_allowed[]"
                                                        id="guests_allowed">
                                                        @for ($i = 1; $i <= 100; $i++)
                                                            <option
                                                                value="{{ $i }} {{ $ratePlan->guests_allowed == $i ? 'selected' : '' }}">
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="container-guests">
                                                    <select class="form-control" name="guests_allowed[]" id="extra_options">
                                                        <option
                                                            value="extra adult or child {{ $ratePlan->guests_allowed == 'extra adult or child' ? 'selected' : '' }}">
                                                            extra adult or child</option>
                                                        <option
                                                            value="extra adult only {{ $ratePlan->guests_allowed == 'extra adult only' ? 'selected' : '' }}">
                                                            extra adult only</option>
                                                        <option
                                                            value="extra child only {{ $ratePlan->guests_allowed == 'extra child only' ? 'selected' : '' }}">
                                                            extra child only</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="" for="type">{{ __('Rates Type ') }}</label>
                                            <div class="contaner_type d-flex">
                                                <div class=" m-0" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="btnradio"
                                                        id="btnradio1" autocomplete="off" checked>
                                                    <label class="btn" for="btnradio1">Manual</label>

                                                    <input type="radio" class="btn-check" name="btnradio"
                                                        id="btnradio2" autocomplete="off">
                                                    <label class="btn" for="btnradio2">Derived</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="manual-section">
                                            <div class="form-group col-md-12">
                                                <label for="minimum_rate">{{ __('Minimum Rate') }}</label>
                                                <input type="text" id="minimum_rate"
                                                    class="form-control @error('min_rate') is-invalid @enderror"
                                                    name="min_rate" placeholder="{{ __('minimum_rate') }}"
                                                    value="{{ old('minimum_rate', $ratePlan->min_rate) }}">
                                                @error('min_rate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="default_rate">{{ __('Default Rate') }}</label>
                                                <input type="text" id="default_rate"
                                                    class="form-control @error('default_rate') is-invalid @enderror"
                                                    name="default_rate" placeholder="{{ __('default_rate') }}"
                                                    value="{{ old('default_rate', $ratePlan->default_rate) }}">
                                                @error('default_rate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div id="derived-section" style="display:none ;">
                                            <div class="form-group col-md-12">
                                                <label for="derived_from">{{ __('Derive From') }}</label>
                                                <select name="derived_from" class="form-control" id="derived_from">
                                                    <option value=""></option>
                                                    @foreach ($ratePlans as $id => $title)
                                                        <option value="{{ $id }} {{ $ratePlan->derived_from == $id ? 'selected' : '' }} ">{{ $title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <style>
                                                .custom_adjust>.adjust_rate,
                                                .amount {
                                                    width: 32%;
                                                }
                                            </style>
                                            <div class="form-group col-md-12">
                                                <label for="adjust_rate">{{ __('Adjust Rates ') }}</label>
                                                <div class="custom_adjust justify-content-between d-flex">
                                                    <select name="adjust_rates[]" class="form-control adjust_rate"
                                                        id="adjust_rate">
                                                        <option value="increase {{ $ratePlan->adjust_rates == 'increase' ? 'selected' : ''}}">Increase rates by</option>
                                                        <option value="decrease {{ $ratePlan->adjust_rates == 'decrease' ? 'selected' : ''}}">Decrease rates by</option>
                                                    </select>

                                                    <input value="{{ $ratePlan->adjust_rates }}" type="text" name="adjust_rates[]"
                                                        class="form-control amount" placeholder="">

                                                    <select name="adjust_rates[]" class="form-control adjust_rate"
                                                        id="adjustment_unit">
                                                        <option value="amount {{ $ratePlan->adjust_rates == 'amount' ? 'selected' : ''}}">Amount</option>
                                                        <option value="percent {{ $ratePlan->adjust_rates == 'percent' ? 'selected' : ''}}">Percent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class=""
                                                for="default_rate">{{ __('Booking Conditions ') }}</label>
                                            <div class="contaner_type d-flex">
                                                <div class="btn-group m-0" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input value="{{ $ratePlan->booking_conditions }}}" type="radio" class="btn-check" name="btnradio"
                                                        id="btnradio1" autocomplete="off" checked>
                                                    <label class="btn" for="btnradio1">Use Defualt</label>
                                                </div>
                                                <div class="btn-group m-0" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="btnradio"
                                                        id="btnradio2" autocomplete="off">
                                                    <label class="btn border-1" for="btnradio2">Custom</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="meals_included">{{ __('Meals Included ') }}</label>
                                            <div class="meals_included" role="group"
                                                aria-label="Basic checkbox toggle button group">
                                                <input name="meals_included[]" value="Breakfast {{ $ratePlan->meals_included == 'Breakfast' ? 'checked' : ''}}" type="checkbox"
                                                    class="btn-check" id="btncheck1" autocomplete="off"
                                                    data-meal="Breakfast">
                                                <label class="btn" for="btncheck1">Breakfast</label>

                                                <input name="meals_included[]" value="Lunch {{ $ratePlan->meals_included == 'Lunch' ? 'checked' : ''}}" type="checkbox"
                                                    class="btn-check" id="btncheck2" autocomplete="off"
                                                    data-meal="Lunch">
                                                <label class="btn" for="btncheck2">Lunch</label>

                                                <input name="meals_included[]" value="Dinner {{ $ratePlan->meals_included == 'Dinner' ? 'checked' : ''}}" type="checkbox"
                                                    class="btn-check" id="btncheck3" autocomplete="off"
                                                    data-meal="Dinner">
                                                <label class="btn" for="btncheck3">Dinner</label>

                                                <input name="meals_included[]" value="All Inclusive {{ $ratePlan->meals_included == 'All Inclusive' ? 'checked' : ''}}" type="checkbox"
                                                    class="btn-check" id="btncheck4" autocomplete="off"
                                                    data-meal="All Inclusive">
                                                <label class="btn" for="btncheck4">All Inclusive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">

                                        <style>
                                            #last_minute_amount {
                                                width: 11%;
                                            }

                                            #last_minute_type {
                                                width: 40%;
                                            }

                                            #last_minute_unit {
                                                width: 25%;
                                            }
                                        </style>
                                        <div class="form-group col-md-12" id="last_minute-section">
                                            <label for="last_minute_default">Last Minute Default </label>
                                            <div style="gap: 10px" class="custome_last d-flex">
                                                <div style="gap: 15px" class="last_minute d-flex align-items-center ">
                                                    <input class="form-control w-25" type="text"
                                                        id="last_minute_default" name="last_minute_default[]">
                                                    <label class="m-0 " for="">days in advance</label>
                                                </div>
                                                <select name="last_minute_default[]" class="form-control "
                                                    id="last_minute_type">
                                                    <option value="increase">Increase rates by</option>
                                                    <option value="decrease">Decrease rates by</option>
                                                </select>
                                                <input id="last_minute_amount" type="text"
                                                    name="last_minute_default[]" class="form-control">
                                                <select id="last_minute_unit" name="last_minute_default[]"
                                                    class="form-control ">
                                                    <option value="amount">Amount</option>
                                                    <option value="percent">Percent</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">{{ __('Inclusions ') }}</label>
                                            <div role="group" aria-label="Basic radio toggle button group">
                                                <input value="No" type="radio" class="btn-check"
                                                    name="inclusions[]" id="inclusion1" autocomplete="off" checked>
                                                <label class="btn" for="inclusion1">No</label>

                                                <input value="Yes" type="radio" class="btn-check"
                                                    name="inclusions[]" id="inclusion2" autocomplete="off">
                                                <label class="btn" for="inclusion2">Yes</label>
                                            </div>
                                        </div>
                                        <div class="container-inclusion-form" id="inclusion-form">
                                            <div class="form-group col-md-12">
                                                <label for="inclusions_name">Inclusions Name</label>
                                                <input name="inclusions[]" type="text" class="form-control"
                                                    id="inclusions_name">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inclusions_description">Inclusions Description</label>
                                                <textarea name="inclusions[]" type="text" rows="2" class="form-control" id="inclusions_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label
                                                for="Reference Rates for Meals and Inclusions ">{{ __('Reference Rates for Meals and Inclusions ') }}</label>
                                            <div class="" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input value="No" type="radio" class="btn-check"
                                                    name="reference_rates[]" id="reference_rate1" autocomplete="off"
                                                    checked>
                                                <label class="btn " for="reference_rate1">No</label>

                                                <input value="Yes" type="radio" class="btn-check"
                                                    name="reference_rates[]" id="reference_rate2" autocomplete="off">
                                                <label class="btn " for="reference_rate2">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="row container-form d-flex  align-items-center">
                                                <div class="form-group col-md-3" id="inclusions-input">
                                                    <label for="Inclusions ">{{ __('Inclusions') }}</label>
                                                    <input name="reference_rates[]" type="text" class="form-control "
                                                        id="Inclusions">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label
                                                for="Advanced Package Settings">{{ __('Advanced Package Settings') }}</label>
                                            <div class="" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="package" id="package1"
                                                    autocomplete="off" checked>
                                                <label class="btn " for="package1">No</label>

                                                <input type="radio" class="btn-check" name="package" id="package2"
                                                    autocomplete="off">
                                                <label class="btn " for="package2">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12" id="advanced-package">
                                            <label
                                                for="Additional Nights Booked at ">{{ __('Additional Nights Booked at ') }}</label>
                                            <div style="gap: 10px"
                                                class="container-night-select d-flex justify-content-between ">
                                                <select class="form-control w-50" name="additional_nights[]"
                                                    id="change-nights">
                                                    <option value="regular">Regular Rates</option>
                                                    <option value="fixed">Fixed Rate</option>
                                                    <option value="specific">Specific Rate Plan</option>
                                                </select>
                                                <select class="form-control w-50" name="additional_nights[]"
                                                    id="change-select">
                                                    <option value="unchanged">unchanged</option>
                                                    <option value="decreased">decreased by</option>
                                                    <option value="increased">increased by</option>
                                                </select>
                                                <input id="fixed_input" placeholder="0" type="text"
                                                    class="form-control w-50 mr-2" name="additional_nights[]"
                                                    style="display: none;">
                                                <select name="additional_nights[]" class="form-control w-50"
                                                    id="specific_rate" style="display: none;">
                                                    <option value=""></option>
                                                    @foreach ($ratePlans as $id => $title)
                                                        <option value="{{ $id }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-group align-items-center" id="input-div"
                                                    style="display: none;">
                                                    <input name="additional_nights[]" placeholder="0" type="text"
                                                        class="form-control w-25 mr-2" name="" id="">%
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 special_package mt-3">
                                        <label for="">{{ __('Special Package') }}</label>
                                        <div class="row">
                                            @if ($amenities->value)
                                                @foreach ($amenities->value as $row)
                                                    <div class="col-12 col-md-2 mt-2">
                                                        <div class="icheck-primary d-inline align-content-center">
                                                            <input type="checkbox"
                                                                id="checkboxPrimary{{ $loop->index }}"
                                                                name="special_package[]" value="{{ json_encode($row) }}">
                                                            <label for="checkboxPrimary{{ $loop->index }}">
                                                                {{ $row['title'] }}
                                                            </label>
                                                        </div>
                                                        <img src="{{ asset('uploads/amenity/' . $row['image']) }}"
                                                            alt="Image" style="width: 23px; height: 23px">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fa fa-save"></i>
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const $guestCount = $('#guest_count');
            const $guestsAllowed = $('#guests_allowed');
            const $extraOptions = $('.container-guests select[name="extra_options"]');

            function updateGuestsAllowed() {
                const guestCount = parseInt($guestCount.val(), 10);

                // Set guests_allowed to match guest_count
                $guestsAllowed.val(guestCount);

                // Enable or disable guests_allowed options
                $guestsAllowed.find('option').each(function() {
                    const value = parseInt($(this).val(), 10);
                    if (value < guestCount) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });

                // Show or hide extra options based on guests_allowed
                if (parseInt($guestsAllowed.val(), 10) > guestCount) {
                    $extraOptions.show();
                } else {
                    $extraOptions.hide();
                }
            }

            $guestCount.on('change', function() {
                updateGuestsAllowed();
            });

            $guestsAllowed.on('change', function() {
                const guestCount = parseInt($guestCount.val(), 10);
                const guestsAllowed = parseInt($guestsAllowed.val(), 10);

                // Prevent selecting guests_allowed < guest_count
                if (guestsAllowed < guestCount) {
                    $guestsAllowed.val(guestCount);
                }

                // Show or hide extra options based on guests_allowed
                if (guestsAllowed > guestCount) {
                    $extraOptions.show();
                } else {
                    $extraOptions.hide();
                }
            });

            // Initial update
            updateGuestsAllowed();
        });
    </script>

    <script>
        // Function to generate guest type options based on guest count
        function generateGuestTypeOptions(guestCount) {
            const options = [];

            // Add option for guest_count with no children
            options.push({
                value: "0",
                text: `${guestCount} adults`
            });

            // Add option for guest_count with no children
            options.push({
                value: "1",
                text: `${guestCount} adults (no child)`
            });

            // Add decreasing number of adults and increasing number of children
            for (let i = 0; i < guestCount; i++) {
                if (guestCount - i >= 0) {
                    options.push({
                        value: (i + 2).toString(),
                        text: `${guestCount - i - 1} adults and ${i + 1} children`
                    });
                }
            }

            return options;
        }

        // Function to update guest_type options based on guest_count
        function updateGuestTypeOptions() {
            const guestCount = parseInt(document.getElementById('guest_count').value, 10);
            const guestTypeSelect = document.getElementById('guest_type');

            // Clear current options
            guestTypeSelect.innerHTML = '';

            // Get new options
            const newOptions = generateGuestTypeOptions(guestCount);

            // Add new options
            newOptions.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option.value;
                optionElement.textContent = option.text;
                guestTypeSelect.appendChild(optionElement);
            });

            // Show or hide guest_type dropdown based on guest_count
            guestTypeSelect.style.display = guestCount > 1 ? 'block' : 'none';
        }

        // Event listener to update options when guest_count changes
        document.getElementById('guest_count').addEventListener('change', updateGuestTypeOptions);

        // Initial population of guest_type options based on the default guest_count
        updateGuestTypeOptions();
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Handle the change event on checkboxes
            $('.meals_included input[type="checkbox"]').change(function() {
                var meal = $(this).data('meal'); // Get the meal name from data attribute

                // If the checkbox is checked, add the input field and label
                if ($(this).is(':checked')) {
                    var inputField = `
                <div class="form-group col-md-3" id="${meal.toLowerCase()}-input">
                    <label for="${meal.toLowerCase()}_inclusions">${meal}</label>
                    <input type="text" class="form-control" id="${meal.toLowerCase()}_inclusions" name="${meal.toLowerCase()}_inclusions">
                </div>`;
                    $('#inclusions-input').after(inputField);
                } else {
                    // If unchecked, remove the corresponding input field and label
                    $(`#${meal.toLowerCase()}-input`).remove();
                }
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            // Handle the change event on checkboxes
            $('.meals_included input[type="checkbox"]').change(function() {
                var meal = $(this).data('meal').toLowerCase(); // Get the meal name from data attribute

                if (meal === 'all inclusive' && $(this).is(':checked')) {
                    // Uncheck all other checkboxes
                    $('.meals_included input[type="checkbox"]').not(this).prop('checked', false);

                    // Remove all other input fields
                    $('.container-form .form-group').not('#inclusions-input').remove();

                    // Add the "All Inclusive" input field after #inclusions-input
                    var inputField = `
                    <div class="form-group col-md-3" id="${meal}-input">
                        <label for="${meal}_inclusions">${meal.charAt(0).toUpperCase() + meal.slice(1)}</label>
                        <input name="reference_rates[${meal}]"  type="text" class="form-control" id="${meal}_inclusions">
                    </div>`;
                    $('#inclusions-input').after(inputField);

                    // Hide #other-form
                    $('#other-form').hide();
                } else {
                    // If the checkbox is checked, add the input field and label
                    if ($(this).is(':checked')) {
                        var inputField = `
                        <div class="form-group col-md-3" id="${meal}-input">
                            <label for="${meal}_inclusions">${meal.charAt(0).toUpperCase() + meal.slice(1)}</label>
                            <input type="text" class="form-control" id="${meal}_inclusions" name="${meal}_inclusions">
                        </div>`;
                        $('#inclusions-input').after(inputField);
                    } else {
                        // If unchecked, remove the corresponding input field and label
                        $(`#${meal}-input`).remove();
                    }

                    // Manage the visibility of the 'other-form'
                    var anyChecked = $('.meals_included input[type="checkbox"]').is(':checked');
                    if (anyChecked) {
                        $('#other-form').hide();
                    } else {
                        $('#other-form').show();
                    }
                }
            });
        });
    </script>





    <script>
        $(document).ready(function() {
            $('#change-select').change(function() {
                var selectedValue = $(this).val();

                if (selectedValue === 'decreased' || selectedValue === 'increased') {
                    $('#input-div').css('display', 'flex');
                } else {
                    $('#input-div').css('display', 'none');
                }
            });
            $('#change-nights').change(function() {
                if ($(this).val() === 'fixed') {
                    $('#change-select').hide();
                    $('#fixed_input').show();
                } else if ($(this).val() === 'specific') {
                    $('#change-select').hide();
                    $('#specific_rate').show();
                    $('#fixed_input').hide();

                } else {
                    $('#change-select').show();
                    $('#fixed_input').hide();
                    $('#specific_rate').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Show Manual section by default on page load
            $('#btnradio1').prop('checked', true);
            $('#manual-section').show();
            $('#derived-section').hide();
            $('#last_minute-section').show();


            function toggleSections() {
                if ($('#btnradio1').is(':checked')) {
                    $('#manual-section').show();
                    $('#last_minute-section').show();
                    $('#derived-section').hide();
                } else if ($('#btnradio2').is(':checked')) {
                    $('#manual-section').hide();
                    $('#last_minute-section').hide();
                    $('#derived-section').show();
                }
                if ($('#inclusion1').is(':checked')) {
                    $('#inclusion-form').hide();

                } else if ($('#inclusion2').is(':checked')) {
                    $('#inclusion-form').show();
                }
                if ($('#reference_rate1').is(':checked')) {
                    $('#inclusions-input').hide();
                    $('#other-form').hide();
                } else if ($('#reference_rate2').is(':checked')) {
                    $('#inclusions-input').show();
                    $('#other-form').show();

                }
                if ($('#package1').is(':checked')) {
                    $('#advanced-package').hide();
                } else if ($('#package2').is(':checked')) {
                    $('#advanced-package').show();

                }

            }
            toggleSections();

            // Call the function on radio button change
            $('input[name="btnradio"]').change(function() {
                toggleSections();
            });
            $('input[name="inclusions[]"]').change(function() {
                toggleSections();
            });
            $('input[name="reference_rates[]"]').change(function() {
                toggleSections();
            });
            $('input[name="additional_nights[]"]').change(function() {
                toggleSections();
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            checkType();
            $("#type").change(function() {
                checkType();
            });

            function checkType() {
                if ($("#type").val() === "package") {
                    $(".special_package").show();
                } else {
                    $(".special_package").hide();
                }
            }
        });

        $(document).on('click', '.nav-tabs .nav-link', function(e) {
            if ($(this).data('lang') != 'en') {
                $('.no_translate_wrapper').addClass('d-none');
            } else {
                $('.no_translate_wrapper').removeClass('d-none');
            }
        });
    </script>
@endpush
