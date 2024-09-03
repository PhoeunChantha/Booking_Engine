@push('css')
    <!-- Include any additional CSS here -->
@endpush


<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('New Video') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('admin.video_url.store') }}" enctype="multipart/form-data" class="submit-form"
            method="post">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group col-md-12">
                            <label class="" for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-12">
                                <label class="required_lable" for="type">{{ __('Type video') }}</label>
                                <select name="type" id="type"
                                    class="form-control select2 @error('type') is-invalid @enderror">
                                    <option value="">{{ __('Select type') }}</option>
                                    <option value="urlid">{{ __('URL ID') }}</option>
                                    <option value="url">{{ __('URL') }}</option>

                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        {{-- <div id="urlInput" class="form-group col-md-12" style="display: none;">
                                <label for="videoUrl">{{ __('URL') }}</label>
                                <input type="url" class="form-control" id="videoUrl" name="videourl">
                            </div> --}}
                        <div id="videoUrlId" class="form-group col-md-12">
                            <label class="required_label" for="videoUrlId">{{ __('URL ID') }}</label>
                            <input type="text" class="form-control @error('videourlid') is-invalid @enderror"
                                id="videoUrlId" name="videourlid">
                            @error('videourlid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#type').on('change', function() {
            var selectedType = $(this).val();

            if (selectedType === 'urlid') {
                $('#videoUrlId').show();
                $('#urlInput').hide();
            } else if (selectedType === 'url') {
                $('#videoUrlId').hide();
                $('#urlInput').show();
            } else {
                $('#videoUrlId').hide();
                $('#urlInput').hide();
            }
        });

        $('#type').trigger('change');
    });
</script> --}}
