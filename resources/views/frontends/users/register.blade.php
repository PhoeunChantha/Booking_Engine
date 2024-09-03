    <form method="POST" enctype="multipart/form-data" action="{{ route('customer.register.store') }}" id="register-form" class="modal chaufea-modal py-4">
        @csrf
        <h2 class="chaufea-heading-2 text-center mb-4">{{ __('Register') }}</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="first_name">{{ __('First Name') }}</label>
                    <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror">
                    @error('first_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="last_name">{{ __('Last Name') }}</label>
                    <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror">
                    @error('last_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                {{-- <div class="form-group"> --}}
                    <label for="phone">{{ __('Phone Number') }}</label>
                    {{-- <div class="input-group border">
                        <div class="input-group-prepend">
                            <button class="dropdown-toggle border-0 bg-white" type="button" data-toggle="dropdown"
                                aria-expanded="false"><img height="15" src="{{ asset('uploads/flags/kh.svg') }}" alt=""></button>
                            <div class="dropdown-menu" style="width:fit-content;min-width:fit-content;">
                                <a  class="dropdown-item flag-dropdown" href="#"><img height="15" src="{{ asset('uploads/flags/kh.svg') }}" alt=""></a>
                                <a  class="dropdown-item flag-dropdown" href="#"><img height="15" src="{{ asset('uploads/flags/us.svg') }}" alt=""></a>
                                <a  class="dropdown-item flag-dropdown" href="#"><img height="15" src="{{ asset('uploads/flags/cn.svg') }}" alt=""></a>
                            </div>
                        </div>
                        <input id="phone" type="text" class="form-control border-0">
                    </div> --}}
                    <div class="form-group">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"  name="phone" required>
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                {{-- </div> --}}
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="r_email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="r_password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="confirm_password">{{ __('Confirm Password') }}</label>
                    <input id="confirm_password" type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror">
                    @error('confirm_password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="form-group">
                    <input type="submit" class="chaufea-btn-1 btn-block">
                </div>
                <p>{{ __('Already have an account?') }} <a href="#login-form" class="open-login-form" rel="modal:open">{{ __('Login') }}</a></p>
            </div>
        </div>
    </form>

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
        });
    </script>
