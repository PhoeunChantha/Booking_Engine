@extends('frontends.master')

@section('content')

@if (request()->routeIs('contact-us'))
@php
    $titles = App\Models\SectionTitle::where('page_id', 9)->get();
@endphp
@endif
@php
    use Illuminate\Support\Facades\Cache;
    use App\Models\BusinessSetting;
    $getInTouch =  BusinessSetting::where('type', 'getInTouch')->first()->value??'No data found';
    $logo = Cache::remember('logo', 1440, function () {
        return BusinessSetting::where('type', 'web_header_logo')->first()->value??'No data found';
    });
    $backgroundImage =  BusinessSetting::where('type', 'image4')->first()->value??'No data found';
    $defaultImage = asset('uploads/image/default.png');
    $backgroundImageUrl = $backgroundImage && file_exists('uploads/business_settings/' . $backgroundImage)
        ? asset('uploads/business_settings/' . $backgroundImage)
        : $defaultImage;

@endphp
<section class="py-2 py-md-2 py-lg-2">

</section>
<section class="contact-form-section" style="background-image: url({{ $backgroundImageUrl }}); background-size: cover;background-repeat: no-repeat;background-position: center; transition: background 0.5 ease;">
    <div class="container d-flex justify-content-center">
          <div class="contact-section-inner-blade px-3">
            <div class="header-contact d-flex justify-content-center mb-2">
                <img src="
            @if ($logo && file_exists('uploads/business_settings/' . $logo)) {{ asset('uploads/business_settings/' . $logo) }}
            @else
                {{ asset('uploads/cf_logo.png') }} @endif
            "
                class="logo" alt="Phoum Chaufea">
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    {{-- <h1 class="chaufea-heading-1 text-center mb-1">
                        {{ $titles[1]->title??$titles[1]->default_title }}
                    </h1> --}}
                    <p class="text-left mx-auto">
                            {!! $getInTouch !!}
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{ route('contact-us.store') }}" class="contact-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control chaufea-contact-input"
                                value="{{ old('username',Auth::guard('customer')->check() ? Auth::guard('customer')->user()->first_name . ' ' . Auth::guard('customer')->user()->last_name : '') }}"
                                placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control chaufea-contact-input"
                                value="{{ old('phone', Auth::guard('customer')->check() ? Auth::guard('customer')->user()->phone : '' )}}" placeholder="Your Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control chaufea-contact-input"
                                value="{{ old('email', Auth::guard('customer')->check() ? Auth::guard('customer')->user()->email : '' )}}" placeholder="Your email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control chaufea-contact-input" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control chaufea-contact-input" id="message" cols="30" rows="10" placeholder="Message">{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" class="chaufea-btn-contact chaufea-input contact-submit" value="SEND MESSAGE">
                            </div>
                        </form>
                </div>
            </div>
          </div>
    </div>
</section>

@endsection
