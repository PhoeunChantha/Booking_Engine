<div id="rooms-container" class="row mt-4 gap-3 mb-5 justify-content-center rooms-container">
    {{-- @dd($rooms) --}}
    @include('frontends.home.room_available', ['rooms' => $rooms])

</div>
