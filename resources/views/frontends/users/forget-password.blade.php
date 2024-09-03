<form method="POST" action="{{ route('customer.forget.password.store') }}" id="forget-password-form" class="modal chaufea-modal py-4" enctype="multipart/form-data">
    @csrf
    <h2 class="chaufea-heading-2 text-center mb-4">{{ __('Forgot Password') }}</h2>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="forget_email" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <input type="submit" class="chaufea-btn-1 btn-block" value="Request Password Reset">
            </div>
            <p class="text-center"><a href="#login-form" class="open-login-form" rel="modal:open">{{ __('Back to Login') }}</a></p>

        </div>
    </div>
</form>
