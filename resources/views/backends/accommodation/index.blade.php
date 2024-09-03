@extends('backends.master')
@push('css')
    <style>
        .preview {
            margin-block: 12px;
            text-align: center;
        }

        .video-preview {
            margin-block: 12px;
            text-align: center;
        }

        .tab-pane {
            margin-top: 20px
        }
    </style>
@endpush
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{ __('Accommodation Details') }}</h3>
                </div>
                <div class="col-sm-6" style="text-align: right">
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-outline card-outline-tabs">
                <div class="">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">
                            <form id="accommodation-form" action="{{ route('admin.accommodation.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if (isset($accommodation))
                                    <input type="hidden" name="id" value="{{ $accommodation->id }}">
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Accommodation Description') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    {{-- <label for="description">{{ __('Accommodation Description') }}</label> --}}
                                                    {{-- <textarea name="description" id="description" class="form-control value_summernote" rows="6">{{ old('description', $accommodation->description ?? '') }}</textarea> --}}
                                                    <textarea name="description" id="description" class="form-control" rows="6">{{ old('description', $accommodation->description ?? '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Accommodation Image') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label for="featured_image">{{ __('Featured Image') }}</label>
                                                        <div class="preview">
                                                            <img src="
                                                                @if (isset($accommodation) &&
                                                                        $accommodation->featured_image &&
                                                                        file_exists(public_path('uploads/accommodations/' . $accommodation->featured_image))) {{ asset('uploads/accommodations/' . $accommodation->featured_image) }}
                                                                @else
                                                                    {{ asset('uploads/image/default.png') }} @endif
                                                                "
                                                                alt="" height="160px" width="350px" style="object-fit: cover">
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="featured_image">
                                                            <label class="custom-file-label"
                                                                for="customFile">{{ __('Choose file') }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label for="banner">{{ __('Banner') }}</label>
                                                        <div class="preview">
                                                            <img src="
                                                                @if (isset($accommodation) &&
                                                                        $accommodation->banner &&
                                                                        file_exists(public_path('uploads/accommodations/' . $accommodation->banner))) {{ asset('uploads/accommodations/' . $accommodation->banner) }}
                                                                @else
                                                                    {{ asset('uploads/image/default.png') }} @endif
                                                                "
                                                                alt="" height="160px" width="350px" style="object-fit: cover">
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="banner">
                                                            <label class="custom-file-label"
                                                                for="customFile">{{ __('Choose file') }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label for="banner_mobile">{{ __('Banner Mobile') }}</label>
                                                        <div class="preview">
                                                            <img src="
                                                                @if (isset($accommodation) &&
                                                                        $accommodation->banner_mobile &&
                                                                        file_exists(public_path('uploads/accommodations/' . $accommodation->banner_mobile))) {{ asset('uploads/accommodations/' . $accommodation->banner_mobile) }}
                                                                @else
                                                                    {{ asset('uploads/image/default.png') }} @endif
                                                                "
                                                                alt="" height="160px" width="350px" style="object-fit: cover">
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="banner_mobile">
                                                            <label class="custom-file-label"
                                                                for="customFile">{{ __('Choose file') }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label for="logo_voucher">{{ __('Logo Voucher') }}</label>
                                                        <div class="preview">
                                                            <img src="
                                                                @if (isset($accommodation) &&
                                                                        $accommodation->logo_voucher &&
                                                                        file_exists(public_path('uploads/accommodations/' . $accommodation->logo_voucher))) {{ asset('uploads/accommodations/' . $accommodation->logo_voucher) }}
                                                                @else
                                                                    {{ asset('uploads/image/default.png') }} @endif
                                                                "
                                                                alt="" height="160px" width="350px" style="object-fit: cover">
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="logo_voucher">
                                                            <label class="custom-file-label"
                                                                for="customFile">{{ __('Choose file') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Features Accommodation') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="description">{{ __('Features') }}</label>
                                                    <div class="row">
                                                        @foreach ($amenities as $amenity)
                                                            <div class="col-12 col-md-3 mt-2">
                                                                <div
                                                                    class="icheck-primary d-inline col-md-2 align-content-center">
                                                                    <input type="checkbox"
                                                                        id="checkboxPrimary{{ $loop->index }}"
                                                                        name="amenities[]"
                                                                        {{ in_array($amenity, $accommodation->amenities ?? []) ? 'checked' : '' }}
                                                                        value="{{ $amenity }}">
                                                                    <label for="checkboxPrimary{{ $loop->index }}"
                                                                        class="font-weight-normal">
                                                                        {{ $amenity }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Geolocation') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group col-6 d-flex">
                                                    <div class="form-check mr-3">
                                                        <input class="form-check-input" type="radio" name="option"
                                                            id="static" value="static" checked>
                                                        <label class="form-check-label" for="static">
                                                            {{ __('Static') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="option"
                                                            id="google_map" value="google_map">
                                                        <label class="form-check-label" for="google_map">
                                                            {{ __('Google Map') }}
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-6" id="static_google">
                                                    <label for="map_image">{{ __('Google Map Image') }}</label>
                                                    <div class="preview">
                                                        <img src="
                                                            @if (isset($accommodation) &&
                                                                    $accommodation->map_image &&
                                                                    file_exists(public_path('uploads/accommodations/' . $accommodation->map_image))) {{ asset('uploads/accommodations/' . $accommodation->map_image) }}
                                                            @else
                                                                {{ asset('uploads/image/default.png') }} @endif
                                                            "
                                                            alt="" height="160px" width="350px" style="object-fit: cover">
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="map_image">
                                                        <label class="custom-file-label"
                                                            for="customFile">{{ __('Choose file') }}</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-6" id="dynamic_google">
                                                    <label for="map_image">{{ __('Google Map') }}</label>
                                                    <div id="map" style="height: 500px;">
                                                </div>
                                            </div>
                                            <div class="form-group form-group col-6 d-flex mt-3" id="lat_long">
                                                <div class="d-flex align-items-center col-md-6 pr-2">
                                                    <label class="mr-2 mb-0">{{ __('X') }}</label>
                                                    <input type="text"
                                                        class="form-control @error('latitude') is-invalid @enderror"
                                                        id="lat" readonly
                                                        value="{{ old('latitude', $accommodation->latitude ?? '') }}"
                                                        name="latitude" placeholder="{{ __('Enter Latitude') }}">
                                                    @error('latitude')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="d-flex align-items-center col-md-6 pl-2">
                                                    <label class="mr-2 mb-0">{{ __('Y') }}</label>
                                                    <input type="text"
                                                        class="form-control @error('longitude') is-invalid @enderror"
                                                        id="long" readonly
                                                        value="{{ old('longitude', $accommodation->longitude ?? '') }}"
                                                        name="longitude" placeholder="{{ __('Enter longitude') }}">
                                                    @error('longitude')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-3 pr-4">
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="fas fa-save"></i>
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </section>
    <div class="modal fade modal_form" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
    @endsection
    @push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        $(document).ready(function() {
            // Function to toggle visibility based on selected radio button
            $('input[name="option"]').change(function() {
                if ($('#static').is(':checked')) {
                    $('#static_google').show();
                    $('#dynamic_google').hide();
                    $('#lat_long').hide(); // Hide lat/long when static is selected
                } else if ($('#google_map').is(':checked')) {
                    $('#dynamic_google').show();
                    $('#static_google').hide();
                    $('#lat_long').show(); // Show lat/long when Google Map is selected
    
                    // Initialize the map only when Google Map is selected
                    if (typeof initMap === "function") {
                        initMap();
                    }
                }
            });
    
            // Trigger the change event for the initially selected radio button
            $('input[name="option"]:checked').trigger('change');
        });
    
        function initMap() {
            // Get the values from the latitude and longitude input fields
            var latValue = parseFloat(document.getElementById('lat').value) || 13.354;
            var longValue = parseFloat(document.getElementById('long').value) || 103.854;

            // Initialize the map with the center based on input values or default values
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: latValue, lng: longValue },
                zoom: 8
            });

            // Add a red marker to the map at the specified coordinates
            var marker = new google.maps.Marker({
                position: { lat: latValue, lng: longValue },
                map: map,
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png" // URL to the red marker icon
                },
                draggable: true
            });

            // Update input fields when the marker is dragged
            google.maps.event.addListener(marker, 'dragend', function(a) {
                document.getElementById('lat').value = a.latLng.lat();
                document.getElementById('long').value = a.latLng.lng();
            });

            // Input search box for finding places
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var placeMarker = new google.maps.Marker({
                        map: map,
                        title: place.name,
                        position: place.geometry.location,
                        draggable: true,
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png" // URL to the red marker icon
                        }
                    });
                    document.getElementById('lat').value = place.geometry.location.lat();
                    document.getElementById('long').value = place.geometry.location.lng();
                    google.maps.event.addListener(placeMarker, 'dragend', function(a) {
                        document.getElementById('lat').value = a.latLng.lat();
                        document.getElementById('long').value = a.latLng.lng();
                    });

                    markers.push(placeMarker);

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });

            // Add a listener to handle map clicks, which will add a new red marker at the clicked location
            map.addListener('click', function(event) {
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                var clickMarker = new google.maps.Marker({
                    position: event.latLng,
                    map: map,
                    draggable: true,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png" // URL to the red marker icon
                    }
                });

                markers.push(clickMarker);
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('long').value = event.latLng.lng();
                google.maps.event.addListener(clickMarker, 'dragend', function(a) {
                    document.getElementById('lat').value = a.latLng.lat();
                    document.getElementById('long').value = a.latLng.lng();
                });
            });
        }
    </script>
    <script>
        $('.custom-file-input').change(function(e) {
            var reader = new FileReader();
            var preview = $(this).closest('.form-group').find('.preview img');
            console.log(preview);
            reader.onload = function(e) {
                preview.attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });
        $(document).on('click', '.nav-tabs .nav-link', function(e) {
            if ($(this).data('lang') != 'en') {
                $('.no_translate_wrapper').addClass('d-none');
            } else {
                $('.no_translate_wrapper').removeClass('d-none');
            }
        });
    </script>
    <script>
        $('.home_slider_summernote').summernote({
            placeholder: '{{ 'Type something' }}',
            tabsize: 2,
            height: 150,

        });
        $('.home_sub_summernote').summernote({
            placeholder: '{{ 'Type something' }}',
            tabsize: 2,
            height: 120,

        });
        $('.value_summernote').summernote({
            placeholder: '{{ 'Type something' }}',
            tabsize: 2,
            height: 250,

        });
        $('.foundation_summernote').summernote({
            placeholder: '{{ 'Type something' }}',
            tabsize: 2,
            height: 230,
        })
        $('.history_of_chaufea_summernote').summernote({
            placeholder: '{{ 'Type something' }}',
            tabsize: 2,
            height: 400,
        });
    </script>
@endpush
