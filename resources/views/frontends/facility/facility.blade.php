@extends('frontends.master')
@section('content')
<section class="chaufea-section facilities-section">
    @if (request()->routeIs('facility'))
        @php
            $titles = App\Models\SectionTitle::where('page_id', 5)->get();
        @endphp
    @endif
    <h2 class="chaufea-heading-1 mt-3 text-uppercase">{{ $titles[0]->title??$titles[0]->default_title }}</h2>

    <div class="row">
        <div class="col-12">
            <p>{!! $history_of_chaufea !!}</p>
        </div>
    </div>
</section>
@endsection
