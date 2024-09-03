@push('css')
@endpush
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Guest Profile') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('admin.guest_management.update', $guest->id) }}" class="submit-form" method="post">
            <div class="modal-body" style="overflow-y: scroll; height: 500px;">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="type">{{ __('Title') }}</label>
                            <select name="type" id="type" class="form-control">
                                <option value="mr" {{ $guest->type == 'mr' ? 'selected' : '' }}>{{ __('Mr.') }}</option>
                                <option value="mrs" {{ $guest->type == 'mrs' ? 'selected' : '' }}>{{ __('Mrs.') }}</option>
                                <option value="dr" {{ $guest->type == 'dr' ? 'selected' : '' }}>{{ __('Dr.') }}</option>
                                <option value="unspecified" {{ $guest->type == 'unspecified' ? 'selected' : '' }}>{{ __('Unspecified') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="first_name">{{ __('First Name') }}<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $guest->first_name }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name') }}<span class="text-danger">*</span></label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $guest->last_name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}<span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ $guest->email }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}<span class="text-secondary">(Optional)</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $guest->phone }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $guest->address }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="country">{{ __('Country') }}</label>
                            <input type="text" name="country" id="country" class="form-control" value="{{ $guest->country }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="city">{{ __('City') }}</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ $guest->city }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="postal_code">{{ __('Postal Code') }}</label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $guest->postal_code }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="identification">{{ __('Identification') }}</label>
                            <input type="text" name="identification" id="identification" class="form-control" value="{{ $guest->identification }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nationality">{{ __('Nationality') }}</label>
                            <input type="text" name="nationality" id="nationality" class="form-control" value="{{ $guest->nationality }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="birth_date">{{ __('Birth Date') }}</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $guest->birth_date }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="gender">{{ __('Gender') }}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" {{ $guest->gender == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                <option value="female" {{ $guest->gender == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="guest_reference">{{ __('Guest Reference') }}</label>
                            <textarea name="guest_reference" id="guest_reference" class="form-control">{{ $guest->guest_reference }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary w-100" onclick="showGuestHistory(event);">{{ __('Show Guest History') }}</button>
                    </div>
                    <div class="col-12 d-none" id="guest-history-container">
                        <table class="table" id="guest-history-table">
                            <thead>
                                <tr>
                                    <th>{{ __('Invoice No') }}</th>
                                    <th>{{ __('Checkin') }}</th>
                                    <th>{{ __('Checkout') }}</th>
                                    <th>{{ __('Total Night') }}</th>
                                    <th>{{ __('Total Amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($guest->bookings as $booking)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.bookings.show', $booking->id) }}">{{ $booking->invoice_no }}</a>
                                        </td>
                                        <td>{{ $booking->checkin }}</td>
                                        <td>{{ $booking->checkout }}</td>
                                        <td>{{ $booking->total_night }}</td>
                                        <td>{{ $booking->total_amount }}</td>
                                    </tr>
                                @endforeach --}}
                        </table>
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

{{-- @push('js') --}}
<script>
    function showGuestHistory(event) {
        event.preventDefault();
        $('#guest-history-container').toggleClass('d-none');
    }
</script>
{{-- @endpush --}}
