{{-- <div class="modal-dialog modal-md modal-dialog-centered" id="login-form">
    <div class="modal-content"> --}}
        <form id="login-form" class="modal chaufea-modal" method="Post" action="{{ route('customer.login.store') }}">
            @csrf
            <h2 class="chaufea-heading-2 text-center mb-4">{{ __('Login') }}</h2>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label> <a href="#forget-password-form" id="to_forget_password" class="open-forget-password-form" rel="modal:open">{{ __('Forgot Password?') }}</a>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="remember" name="remember" type="checkbox">
                        <label class="ml-1" for="remember">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="form-group">
                        <input type="submit" class="chaufea-btn-1 btn-block" value="Login">
                    </div>
                    <p>{{ __('Don\'t have an account?') }} <a href="#register-form" class="open-register-form" rel="modal:open">{{ __('Register') }}</a></p>
                </div>
            </div>
        </form>
    {{-- </div>
</div>   --}}

