@extends('backends.master')
@section('contents')
    <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('Edit Service')}}</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('admin.extra-service.update', $extra_service->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                                {{-- @dump($languages) --}}
                                                @foreach (json_decode($language, true) as $lang)
                                                    @if ($lang['status'] == 1)
                                                        <li class="nav-item">
                                                            <a class="nav-link text-capitalize {{ $lang['code'] == $default_lang ? 'active' : '' }}" id="lang_{{ $lang['code'] }}-tab" data-toggle="pill" href="#lang_{{ $lang['code'] }}" data-lang="{{ $lang['code'] }}" role="tab" aria-controls="lang_{{ $lang['code'] }}" aria-selected="false">{{ \App\helpers\AppHelper::get_language_name($lang['code']) . '(' . strtoupper($lang['code']) . ')' }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                            <div class="tab-content" id="custom-content-below-tabContent">
                                                @foreach (json_decode($language, true) as $lang)
                                                    @if ($lang['status'] == 1)
                                                        <?php
                                                            if (count($extra_service['translations'])) {
                                                                $translate = [];
                                                                foreach ($extra_service['translations'] as $t) {

                                                                    if ($t->locale == $lang['code'] && $t->key == "title") {
                                                                        $translate[$lang['code']]['title'] = $t->value;
                                                                    }
                                                                    if ($t->locale == $lang['code'] && $t->key == "description") {
                                                                        $translate[$lang['code']]['description'] = $t->value;
                                                                        // dd($translate[$lang['code']]['description']);
                                                                    }

                                                                }
                                                            }
                                                        ?>
                                                        <div class="tab-pane fade {{ $lang['code'] == $default_lang ? 'show active' : '' }} mt-3" id="lang_{{ $lang['code'] }}" role="tabpanel" aria-labelledby="lang_{{ $lang['code'] }}-tab">
                                                            <div class="form-group">
                                                                <input type="hidden" name="lang[]" value="{{ $lang['code'] }}">
                                                                <label for="title_{{ $lang['code'] }}">{{ __('Name') }}({{ strtoupper($lang['code']) }})</label>
                                                                <input type="text" id="title_{{ $lang['code'] }}" class="form-control @error('title') is-invalid @enderror"
                                                                    name="title[]" placeholder="{{__('Enter Title')}}" value="{{ $translate[$lang['code']]['title'] ?? $extra_service['title'] }}">

                                                                @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="">{{ __('Extra Service Detail') }}</label>
                                                                <table class="table">
                                                                    <thead class="text-uppercase">
                                                                        <tr>
                                                                            <th>{{ __('option') }}</th>
                                                                            <th>{{ __('title') }}</th>
                                                                            <th>
                                                                                <button type="button"
                                                                                    class="btn btn-success btn-sm btn_add_row_extra_service"
                                                                                    data-lang="{{ $lang['code'] }}">
                                                                                    <i class="fa fa-plus-circle"></i>
                                                                                </button>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    @include('backends.extra_service._extra_service_detail_tbody')
                                                                </table>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card no_translate_wrapper">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('General Info') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="price">{{__('Price')}}</label>
                                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                                name="price" placeholder="{{__('Enter Price')}}" value="{{ $extra_service->price ?? '' }}">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputFile">{{__('Thumbnail')}}</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input-thumbnail" id="exampleInputFile" name="thumbnail">
                                                        <label class="custom-file-label" for="exampleInputFile">{{ $extra_service->thumbnail ?? __('Choose file') }}</label>
                                                    </div>
                                                </div>
                                                <div class="preview-thumbnail text-center border rounded mt-2" style="height: 150px">
                                                    <img src="
                                                    @if ($extra_service->thumbnail && file_exists(public_path('uploads/service/' . $extra_service->thumbnail)))
                                                        {{ asset('uploads/service/'. $extra_service->thumbnail) }}
                                                    @else
                                                        {{ asset('uploads/image/default.png') }}
                                                    @endif
                                                    " alt="" height="100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-save"></i>
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

@push('js')
    <script>
        $('.custom-file-input-thumbnail').change(function (e) {
            var reader = new FileReader();
            var preview = $(this).closest('.form-group').find('.preview-thumbnail img');
            reader.onload = function(e) {
                preview.attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });

        $(document).on('click', '.nav-tabs .nav-link', function (e) {
            if ($(this).data('lang') != 'en') {
                $('.no_translate_wrapper').addClass('d-none');
            } else {
                $('.no_translate_wrapper').removeClass('d-none');
            }
        });
        $('.btn_add_row_extra_service').click(function(e) {
            var lang = $(this).data('lang');
            var tbody = $(`.extra_detail_tbody_${lang}`);
            var numRows = tbody.find("tr").length;
            console.log(numRows);
            $.ajax({
                type: "get",
                url: window.location.href,
                data: {
                    "lang": lang,
                    "key": numRows
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $(tbody).append(response.tr);
                }
            });
        });


    </script>
@endpush