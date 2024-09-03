<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Angkor Land')</title>
    @php
        $setting = \App\Models\BusinessSetting::all();
        $data['fav_icon'] = @$setting->where('type', 'fav_icon')->first()->value;
    @endphp
    <link rel="icon" type="image/x-icon"
        href="@if ($data['fav_icon'] && file_exists('uploads/business_settings/' . $data['fav_icon'])) {{ asset('uploads/business_settings/' . $data['fav_icon']) }}
        @else
            {{ asset('uploads/image/default.png') }} @endif">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    {{-- Fonts --}}
    <link rel="stylesheet" href="{{ asset('fonts/arial_nova/stylesheet.css') }}">
    {{-- Frameworks --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    {{-- <script src="{{ asset('frameworks/jquery/jquery-3.7.1.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('frameworks/bootstrap-4.6.2/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frameworks/fontawesome-pro-5.8.2/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('frameworks/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frameworks/nanogallery2/dist/css/nanogallery2.woff.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frameworks/nanogallery2/dist/css/nanogallery2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/sweetalert2/css/sweetalert2.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.css" /> --}}

    {{-- tel input --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link type="text/css" rel="stylesheet" href="//book.securebookings.net/css/app.css" />
    {{-- <link rel="stylesheet" href="{{ asset('sass/app.min.css') }}?ver=1.0.1" media="all"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <style>
        .required_label::after {
            content: " *";
            color: red;
        }

        label.error {
            color: red;
            font-size: 0.75rem;
            display: inline;
        }

        html {
            scroll-behavior: smooth;
        }

        .page-content {
            max-width: 78rem;
            margin: 0 auto;
        }

        .content-footer {
            max-width: 78rem;
            margin: 0 auto;
        }

        .content-navbar {
            max-width: 78rem;
            margin: 0 auto;
        }
    </style>


</head>

<body data-topbar="light" data-layout="horizontal">
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            {{-- @include('frontends.layouts.slider') --}}
            {{-- @include('frontends.layouts.menu') --}}
            @include('frontends.layouts.navbar')
        </header><!-- #masthead -->
        <div id="site" class="site-content">
        </div>
    </div>
</body>
