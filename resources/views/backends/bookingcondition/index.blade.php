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
                    <h3>{{ __('Booking Conditions') }}</h3>
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
                            <form id="bookingcondition-form" action="{{ route('admin.bookingcondition.update') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if (isset($bookingcondition))
                                    <input type="hidden" name="id" value="{{ $bookingcondition->id }}">
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Booking Deposit Type') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="deposit_type">{{ __('Deposit Type') }}</label>
                                                    <div class="form-group">
                                                        <div class="form-group d-flex">
                                                            <div class="d-flex align-items-center col-4 pl-0">
                                                                <select id="deposit_type"
                                                                    class="form-control select2 @error('deposit_type') is-invalid @enderror"
                                                                    name="deposit_type">
                                                                    <option value="">Select Deposit Type</option>
                                                                    @foreach (['no_deposit', 'full_amount', 'percentage', 'fixed_amount', 'nights'] as $type)
                                                                        <option value="{{ $type }}"
                                                                            {{ old('deposit_type', $bookingcondition->deposit_type ?? '') == $type ? 'selected' : '' }}>
                                                                            {{ ucwords(str_replace('_', ' ', $type)) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('deposit_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="d-flex align-items-center col-1 pr-0">
                                                                <input type="text" id="deposit_value"
                                                                       class="form-control @error('deposit_value') is-invalid @enderror"
                                                                       value="{{ old('deposit_value', $bookingcondition->deposit_value ?? '0') }}"
                                                                       name="deposit_value">
                                                                @error('deposit_value')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="balance_due">
                                                    <label for="balance_due">{{ __('Balance Due') }}</label>
                                                    <div class="form-group d-flex">
                                                        <div class="d-flex align-items-center col-3 pl-0">
                                                            <input type="text" id="balance_due_value"
                                                                class="form-control @error('balance_due') is-invalid @enderror"
                                                                value="{{ old('balance_due', $bookingcondition->balance_due ?? '0') }}"
                                                                name="balance_due">
                                                            @error('balance_due')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="d-flex align-items-center col-2 pl-0">
                                                            <label class="font-weight-normal"
                                                                for="balance_due">{{ __('days before arrival') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Cancellation Rule and Fee') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-6">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Other Policies') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea name="policies" id="policies" class="form-control" rows="6">{{ old('policies', $bookingcondition->policies ?? '') }}</textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#deposit_type').select2();

        function toggleDepositValue() {
            var selectedValue = $('#deposit_type').val();
            if (selectedValue === 'no_deposit') {
                $('#deposit_value').val('').hide();
                $('#balance_due').show();
                $('#balance_due_value').show();
            } else if (selectedValue === 'full_amount') {
                $('#deposit_value').val('').hide();
                $('#balance_due').hide();
                $('#balance_due_value').val('');
            } else {
                $('#deposit_value').show();
                $('#balance_due').show();
            }
        }
        
        toggleDepositValue();
        $('#deposit_type').on('change', function() {
            toggleDepositValue();
            $('#deposit_type').select2(); // Refresh select2
        });
    });

    $(document).ready(function() {
    function setDefaultValue() {
        var $depositValueInput = $('#deposit_value',);
        if ($depositValueInput.val().trim() === '') {
            $depositValueInput.val('0');
        }

        var $balanceValueInput = $('#balance_due_value',);
        if ($balanceValueInput.val().trim() === '') {
            $balanceValueInput.val('0');
        }
    }
    setDefaultValue();
    $('#someOtherInput').on('change', setDefaultValue);
});

</script>
@push('js')
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
