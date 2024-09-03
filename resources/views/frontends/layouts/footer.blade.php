{{-- <footer id="colophon" class="site-footer">

    <div class="footer-inner-wrap">
        <div class="row">
            <div class="chaufea-footer-col-1 col-12 col-md-4 col-lg-4">
                <h3 class="footer-title">{{ __('About Us') }}</h3>
                @php

                    $setting = App\Models\BusinessSetting::all();
                    $data['about_us_description'] =
                        @$setting->where('type', 'about_us_description')->first()->value ?? '';
                @endphp
                <p>
                    {{ $data['about_us_description'] }}
                </p>
                <div id="language-switcher">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle rounded-0 bg-white text-dark text-capitalize"
                            type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            @foreach ($available_locales as $locale_name => $locale_code)
                                @if ($locale_code === $current_locale)
                                    {{ $locale_name }}
                                    <i
                                        class="flag-icon flag-icon-{{ $locale_code == 'en' ? 'gb' : $locale_code }} ml-3"></i>
                                @endif
                            @endforeach
                        </button>
                        <div class="dropdown-menu rounded-0" aria-labelledby="dropdownMenu2">
                            @foreach ($available_locales as $locale_name => $available_locale)
                                @if ($available_locale === $current_locale)
                                    <a href="{{ route('change_language', $available_locale) }}" type="button"
                                        class="dropdown-item text-capitalize active">
                                        {{ $locale_name }} <i
                                            class="flag-icon flag-icon-{{ $available_locale == 'en' ? 'gb' : $available_locale }} ml-2"></i>
                                    </a>
                                @else
                                    <a href="{{ route('change_language', $available_locale) }}" type="button"
                                        class="dropdown-item text-capitalize">
                                        {{ $locale_name }} <i
                                            class="flag-icon flag-icon-{{ $available_locale == 'en' ? 'gb' : $available_locale }} ml-2"></i>
                                    </a>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
            <div
                class="chaufea-footer-col-2 col-12 col-md-4 col-lg-4 d-block d-md-flex mt-5 mt-md-0 justify-content-center">
                <div>
                    @php
                        $menu_explores = \App\Models\MenuExplore::where('status', 'active')
                            ->WhereNull('deleted_at')
                            ->get();
                    @endphp
                    <h3 class="footer-title">{{ __('Explore') }}</h3>
                    <ul id="explore-menu" class="explore-menu">
                        @foreach ($menu_explores as $menu_explore)
                            @if (isset($menu_explore->menu_url))
                                <li id="menu-item-34"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a
                                        href="{{ url($menu_explore->menu_url) }}">{{ $menu_explore->name }}</a></li>
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="chaufea-footer-col-3 col-12 col-md-4 col-lg-4 mt-5 mt-md-0">
                @php
                    $setting = App\Models\BusinessSetting::all();
                    $data['contact_us_phone_number'] = @$setting->where('type', 'contact_us_phone_number')->first()
                        ->value;
                    $data['company_address'] = @$setting->where('type', 'company_address')->first()->value;
                    $data['email'] = @$setting->where('type', 'email')->first()->value;
                    $data['copy_right_text'] = @$setting->where('type', 'copy_right_text')->first()->value;
                    $data['web_header_logo'] = @$setting->where('type', 'web_header_logo')->first()->value;
                    $data['social_media'] = @$setting->where('type', 'social_media')->first()->value ?? '[]';
                @endphp
                <h3 class="footer-title">{{ __('Contact') }}</h3>
                <div class="footer-contact">
                    <p class="chaufea_address">{{ $data['company_address'] }}</p>
                    <p class="d-flex align-items center">
                        <span class="material-symbols-outlined">{{ __('phone_in_talk') }}</span><span class="ml-2">
                            <a class="text-white"
                                href="tel:{{ $data['contact_us_phone_number'] }}">{{ $data['contact_us_phone_number'] }}</a>
                        </span>
                    </p>
                    <p>{{ $data['email'] }}</p>
                </div>
                <div class="site-branding d-flex justify-content-center">
                    <a href="{{ route('homepage') }}">
                        <img src="
                        @if ($data['web_header_logo'] && file_exists('uploads/business_settings/' . $data['web_header_logo'])) {{ asset('uploads/business_settings/' . $data['web_header_logo']) }}
                        @else
                            {{ asset('uploads/image/default.png') }} @endif
                        "
                            class="custom-logo" alt="Phoum Chaufea">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-social-content row ">
            <div class="col-12 d-flex justify-content-center">
                <ul class="footer-social d-flex align-items-center">
                    @foreach (json_decode($data['social_media'], true) as $social_media)
                      @if ($social_media['status'] == 1)
                        <li class="footer-social-item mr-1 mr-md-3"><a href="{{ $social_media['link'] }}" target="_blank">
                            <img class="footer-social-icon" src="{{ $social_media['icon'] }}"  alt="not found" height="50px" width="50px">
                            {{-- <i class="{{ $social_media['title'] }}"></i>
                        </a></li>
                      @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="site-info text-center mt-5">
            <p>{{ $data['copy_right_text'] }}</p>
        </div><!-- .site-info -->
    </div>
</footer> --}}
@include('frontends.layouts.footer-style')
<footer class="bg-light">
    @php
        $setting = App\Models\BusinessSetting::all();
        $data['contact_us_phone_number'] = @$setting->where('type', 'contact_us_phone_number')->first()->value;
        $data['company_address'] = @$setting->where('type', 'company_address')->first()->value;
        $data['email'] = @$setting->where('type', 'email')->first()->value;
        $data['phone'] = @$setting->where('type', 'phone')->first()->value;
        $data['copy_right_text'] = @$setting->where('type', 'copy_right_text')->first()->value;
        $data['web_header_logo'] = @$setting->where('type', 'web_header_logo')->first()->value;
        $data['social_media'] = @$setting->where('type', 'social_media')->first()->value ?? '[]';
        $data['payment'] = @$setting->where('type', 'payment')->first()->value ?? '[]';
        $data['contact'] = @$setting->where('type', 'contact')->first()->value ?? '[]';
    @endphp

    {{-- <div class="col-md-12 ">
        <div class="row d-flex justify-content-center  p-5">
            <div class="col-md-4 follow-us mb-3">
                <h4>Follow Us</h4>
                <p>And Keep Up to date with Angkorland Urban Boutiqque</p>
                <div class="social-media-icons d-flex">
                    <div class="icon-circle">
                        <a href="#">
                            <img src="{{ asset('/website/social/facebook.png') }}" alt="">
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="#">
                            <img src="{{ asset('/website/social/instagram.png') }}" alt="">
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="#">
                            <img src="{{ asset('/website/social/youtube.png') }}" alt="">
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="#">
                            <img src="{{ asset('/website/social/xbox.png') }}" alt="">
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="#">
                            <img src="{{ asset('/website/social/advisor.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 contactus">
                <h4>Contact</h4>
                <p>+855 77 588 000</p>
                <p>+855 77 588 000</p>
                <p>RESERVATION@ANGKORLAND.ORG</p>
            </div>
            <div class="col-md-4">
                <h4>We Accept</h4>
                <div class="pay-card ">
                    <div class="row d-flex ">
                        <div class="visa">
                            <img src="{{ asset('/website/card/visa.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/mastercard.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/express.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/stripe.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/pay.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/solar.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/binance.png') }}" alt="">
                        </div>
                        <div class="visa">
                            <img src="{{ asset('/website/card/wechat.png') }}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-12 py-5">
        <div class="row d-flex justify-content-between p-3 p-md-4 section-78rem content-footer">
            {{-- <div class="col-12 col-md-4 px-0 follow-us mb-3 text-left text-md-start">
                <h4 class="mb-3">{{ __('Follow Us') }}</h4>
                <p>{{ __('And Keep Up to date with Angkorland Urban Boutique') }}</p>
                <div class="social-media-icons d-flex justify-content-start">
                    <div class="icon-circle">
                        @foreach (json_decode($data['social_media'], true) as $social_media)
                            @if ($social_media['status'] == 1)
                                <a href="{{ $social_media['link'] }}" target="_blank">
                                    <img class=""
                                        src="{{ asset('uploads/social_media/' . $social_media['icon']) }}"
                                        alt="not found" width="45px">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div> --}}
            <div class="col-12 col-md-4 px-0 follow-us mb-3 text-left text-md-start">
                <h4 class="mb-3">{{ __('Follow Us') }}</h4>
                <p>{{ __('And Keep Up to date with Angkorland Urban Boutique') }}</p>
                <div class="social-media-icons d-flex flex-wrap justify-content-start">
                    @foreach (json_decode($data['social_media'], true) as $social_media)
                        @if ($social_media['status'] == 1)
                            <a href="{{ $social_media['link'] }}" target="_blank" class="m-2">
                                <img src="{{ asset('uploads/social_media/' . $social_media['icon']) }}" alt="not found"
                                    width="45px">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-4 contactus text-left px-0 text-md-start mb-3 mb-md-0">
                <h4 class="mb-3">{{ __('Contact') }}</h4>
                @foreach (json_decode($data['contact'], true) as $contact)
                    @if ($contact['status'] == 1)
                        <a class="mb-2 conatct-link"
                            style="display: flex; align-items: center; gap: 15px; text-decoration: none"
                            href="{{ $contact['link'] }}" target="_blank">
                            <img class="" src="{{ asset('uploads/social_media/' . $contact['icon']) }}"
                                alt="not found" width="35px">

                            <p class="mb-2 contact-title" style="color: gray; font-weight: 400;">{{ $contact['title'] }}
                            </p>
                        </a>
                    @endif
                @endforeach
                {{-- <a class="mb-2 conatct-link" style="display: flex; align-items: center; gap: 15px; text-decoration: none" target="_blank" href="mailto:reservation@angkorland.org">
                    <img class=""
                                src="{{ asset('uploads/social_media/mail.png') }}"
                                alt="not found" width="35px">
                    <p class="mb-2 contact-title" style="color: gray; font-weight: 400;">RESERVATION@ANGKORLAND.ORG</p>
                </a> --}}
                {{-- <p>{{ $data['email'] }}</p> --}}
            </div>
            <div class="col-12 col-md-4 payment px-0 text-left text-md-start">
                <h4 class="mb-3">{{ __('We Accept') }}</h4>
                <div class="pay-card d-flex flex-wrap justify-content-center justify-content-md-start">
                    @foreach (json_decode($data['payment'], true) as $payment)
                        @if ($payment['status'] == 1)
                            <div class="visa ">
                                <img src="{{ asset('uploads/social_media/' . $payment['icon']) }}" alt="">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 ">
        <div class="row copy-container d-flex justify-content-center">
            <div class="angkor-copy-right col-md-12">
                <strong class="text-white fw-bold text-copy-right">{{ $data['copy_right_text'] }}</strong>
            </div>
        </div>
    </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<!-- #colophon -->
<script src="{{ asset('frameworks/bootstrap-4.6.2/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frameworks/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js"></script>
<script src="{{ asset('frameworks/nanogallery2/dist/jquery.nanogallery2.min.js') }}"></script>
{{-- tel input --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('backend/sweetalert2/js/sweetalert2@10.js') }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script> --}}
{{-- datepicker --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
<script>
    $(function() {

        // $(".datepicker").datepicker({
        //     dateFormat: "dd/mm/yy", // Format for input and filtering
        //     minDate: 0, // Disable past dates
        //     onSelect: function(dateText) {
        //         var date = $.datepicker.parseDate("dd/mm/yy", dateText);
        //         var formattedDate = $.datepicker.formatDate("dd M yy",
        //         date); // Format as "25 Jul 2024"
        //         var dayOfWeek = date.toLocaleString('en-us', {
        //             weekday: 'long'
        //         });

        //         // Display the formatted date and day of the week
        //         $(this).val(formattedDate);
        //         $(this).next(".day-of-week").text(dayOfWeek);
        //     }
        // });
        $(".datepicker").datepicker({
            dateFormat: "dd/mm/yy", // Format for input and backend filtering
            minDate: 0, // Disable past dates
            onSelect: function(dateText) {
                // Parse the selected date in "dd/mm/yy" format
                var date = $.datepicker.parseDate("dd/mm/yy", dateText);

                // Check if the date is parsed correctly
                if (date) {
                    // Format the date for display as "dd M yy"
                    var displayDate = $.datepicker.formatDate("dd M yy", date);
                    $(this).val(displayDate); // Update input field

                    // Update the day of the week
                    var dayOfWeek = date.toLocaleString('en-us', {
                        weekday: 'long'
                    });
                    $(this).siblings(".day-of-week").text(
                        dayOfWeek); // Ensure you're targeting the sibling span

                    // Optionally, store the original "dd/mm/yy" format in a hidden input for backend use
                    $(this).siblings('.original-date').val(dateText);
                }
            }
        });

        $('.datepicker-container').click(function() {
            $(this).find('.datepicker-input').focus();
        });

        // $(".datepicker").each(function() {
        //     var today = new Date();
        //     var dayOfWeek = today.toLocaleString('en-us', {
        //         weekday: 'long'
        //     });
        //     var formattedDate = ("0" + today.getDate()).slice(-2) + "/" + ("0" + (today.getMonth() + 1))
        //         .slice(-2) + "/" + today.getFullYear();
        //     $(this).val(formattedDate);
        //     $(this).next(".day-of-week").text(dayOfWeek);
        // });
    });
</script>

<script>
    $(document).ready(function() {
        // alert(1);
        // var success_audio = "{{ URL::asset('sound/success.wav') }}";
        // var error_audio = "{{ URL::asset('sound/error.wav') }}";
        // var success = new Audio(success_audio);
        // var error = new Audio(error_audio);

        const Confirmation = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        @if (Session::has('msg'))
            @if (Session::get('success') == true)
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ Session::get('msg') }}");
                success.play();
            @else
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ Session::get('msg') }}");
                error.play();
            @endif
        @endif

    });
</script>
@stack('script')
</body>

</html>
