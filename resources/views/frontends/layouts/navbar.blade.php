@include('frontends.layouts.navbar-style')
<nav class="navbar justify-content-center navbar-expand-md navbar-light bg-white ">
    <div class="container-fluid content-navbar section-78rem">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/website/logo/angkor-land.png') }}" alt="Logo" class="logo-img">
        </a>
        {{-- <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="
            @if ($data['web_header_logo'] && file_exists('uploads/business_settings/' . $data['web_header_logo'])) {{ asset('uploads/business_settings/' . $data['web_header_logo']) }}
            @else
                {{ asset('uploads/image/default.png') }} @endif
            "
                class="logo-img" alt="Logo">
        </a> --}}
        <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#sidebarModal"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    {{-- <a class="nav-link active" aria-current="page" href="#">Overview</a> --}}
                    <span class="nav-link active">Overview</span>
                </li>
                <li class="nav-item" id="facilities">
                    <a class="nav-link" href="#facilities-page">Facilities</a>
                </li>
                <li class="nav-item" id="rooms">
                    <a class="nav-link" href="rooms-page">Rooms</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- <nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/website/logo/angkor-land.png') }}" alt="Logo" class="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#sidebarModal"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rooms</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

<!-- Sidebar Modal -->
<div class="modal right fade" id="sidebarModal" tabindex="-1" aria-labelledby="sidebarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sidebarModalLabel">Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" aria-current="page" href="#">Overview</a> --}}
                        <span class="nav-link active">Overview</span>
                    </li>
                    <li class="nav-item" id="facilities">
                        <a class="nav-link" href="#facilities-page">Facilities</a>
                    </li>
                    <li class="nav-item" id="rooms">
                        <a class="nav-link" href="rooms-page">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('#facilities a').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor behavior
            const target = document.querySelector('#facilities-page');
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
        });
        document.querySelector('#rooms a').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor behavior
            const target = document.querySelector('#rooms-page');
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
        });
    });
</script>
