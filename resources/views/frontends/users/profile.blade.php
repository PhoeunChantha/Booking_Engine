@extends('frontends.master')
@section('content')
<section class="chaufea-section profile-section">
<form method="POST" action="{{ route('customer.profile.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-3 d-flex justify-content-center">
            <div class="profile-img">
                <label for="profile-image-upload">
                    <img id="profile-img-preview" src="@if(Auth::guard('customer')->user()->image && file_exists(public_path('uploads/customers/' . Auth::guard('customer')->user()->image)))
                             {{ asset('uploads/customers/'. Auth::guard('customer')->user()->image) }}
                             @else
                             {{ asset('uploads/default-profile.png') }}
                             @endif" alt="profile-img" class="img-fluid rounded-circle">
                    <i class="fas fa-camera profile-img-icon"></i>
                </label>
                <input type="file" name="image" id="profile-image-upload" style="display: none;">
            </div>
        </div>
        <div class="col-12 col-md-9 mt-5 mt-md-0">
            <div>
                <h2 class="profile-name text-capitalize">{{ Auth::guard('customer')->user()->first_name }} {{ Auth::guard('customer')->user()->last_name }}</h2>
                <p class="profile-email">{{ Auth::guard('customer')->user()->email }}</p>
            </div>
            <div class="profile-form py-4" id="profile-form">
                <h4 class="text-muted font-weight-light">{{ __('Personal Info') }}</h4>
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="first_name">{{ __('First Name') }}</label>
                            <input id="first_name" type="text" name="first_name" value="{{ Auth::guard('customer')->user()->first_name }}" class="form-control text-capitalize @error('first_name') is-invalid @enderror">
                            @error('first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name') }}</label>
                            <input id="last_name" type="text" name="last_name" value="{{ Auth::guard('customer')->user()->last_name }}" class="form-control text-capitalize @error('last_name') is-invalid @enderror">
                            @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="phone">{{ __('Phone Number') }}</label>
                            <div class="form-group">
                                <input id="phone" type="tel" value="{{ Auth::guard('customer')->user()->phone }}" class="form-control @error('phone') is-invalid @enderror"  name="phone">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}" class="form-control @error('email') is-invalid @enderror" readonly>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
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
                            <input type="submit" class="chaufea-btn-1 px-5" value="Save Chages">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
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
<script>
    document.getElementById('profile-image-upload').addEventListener('change', function (e) {
        var fileInput = e.target;
        var previewImage = document.getElementById('profile-img-preview');

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            previewImage.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
