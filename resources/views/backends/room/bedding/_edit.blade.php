@push('css')
@endpush
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Edit Category') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('admin.bedding.update', $bedding->id) }}" enctype="multipart/form-data"
            class="submit-form" method="post">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            {{-- @dump($languages) --}}
                            @foreach (json_decode($language, true) as $lang)
                                @if ($lang['status'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link text-capitalize {{ $lang['code'] == $default_lang ? 'active' : '' }}"
                                            id="lang_{{ $lang['code'] }}-tab" data-toggle="pill"
                                            href="#lang_{{ $lang['code'] }}" role="tab"
                                            aria-controls="lang_{{ $lang['code'] }}"
                                            aria-selected="false">{{ \App\helpers\AppHelper::get_language_name($lang['code']) . '(' . strtoupper($lang['code']) . ')' }}</a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
                            @foreach (json_decode($language, true) as $key => $lang)
                                @if ($lang['status'] == 1)
                                    <?php
                                    if (count($bedding['translations'])) {
                                        $translate = [];
                                        foreach ($bedding['translations'] as $t) {
                                            if ($t->locale == $lang['code'] && $t->key == 'name') {
                                                $translate[$lang['code']]['name'] = $t->value;
                                            }
                                            // if ($t->locale == $lang['code'] && $t->key == 'description') {
                                            //     $translate[$lang['code']]['description'] = $t->value;
                                            // }
                                        }
                                    }
                                    ?>
                                    <div class="tab-pane fade {{ $lang['code'] == $default_lang ? 'show active' : '' }} mt-3"
                                        id="lang_{{ $lang['code'] }}" role="tabpanel"
                                        aria-labelledby="lang_{{ $lang['code'] }}-tab">
                                        <div class="form-group">
                                            <input type="hidden" name="lang[]" value="{{ $lang['code'] }}">
                                            <label
                                                for="name_{{ $lang['code'] }}">{{ __('Name') }}({{ strtoupper($lang['code']) }})</label>
                                            <input type="name" id="name_{{ $lang['code'] }}"
                                                class="form-control @error('name') is-invalid @enderror" name="name[]"
                                                placeholder="{{ __('Enter name') }}"
                                                value="{{ $translate[$lang['code']]['name'] ?? $bedding['name'] }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <label
                                                for="description_{{ $lang['code'] }}">{{ __('Description') }}({{ strtoupper($lang['code']) }})</label>
                                            <textarea id="description_{{ $lang['code'] }}" class="form-control @error('description') is-invalid @enderror"
                                                name="description[]" placeholder="{{ __('Enter Description') }}" rows="4">{{ $translate[$lang['code']]['description'] ?? $bedding['description'] }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary submit">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

{{-- @push('js') --}}
{{-- @endpush --}}