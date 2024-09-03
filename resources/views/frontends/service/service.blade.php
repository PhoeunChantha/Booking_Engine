@extends('frontends.master')

@section('content')
<section class="chaufea-section service-section">
    <div class="border">
            <div class="row mx-0 ">
                @foreach($services as $service )
                    @php $service_c = $loop->iteration % 2 @endphp

                    @if($service_c == 0)
                        <div class="col-md-6 p-0">
                            <img class="servcie-image" src="{{ asset('uploads/service/' . $service->thumbnail) }}" alt="">
                        </div>
                    @endif
                    <div class="col-md-6 p-3 d-flex align-items-center">
                        <div class="">
                            <h3 class="chaufea-heading-2 text-uppercase">{{ $service->title }}</h3>
                            <p class="mt-2 mt-md-4">
                                {{ Str::limit($service->description,350) }}
                            </p>
                            <div class="text-center h-fit-content">
                                <a type="button" href="{{ route('service_detail',$service->id) }}" class="chaufea-btn-1">{{ __('LEARN MORE') }}</a>
                            </div>
                        </div>
                    </div>
                    @if ($service_c != 0)
                        <div class="col-md-6 p-0">
                            <img class="servcie-image" src="{{ asset('uploads/service/' . $service->thumbnail) }}" alt="">
                        </div>
                    @endif
                @endforeach
            </div>
    </div>
</section>
@endsection
