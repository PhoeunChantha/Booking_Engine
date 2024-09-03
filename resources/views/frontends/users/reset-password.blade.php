@extends('frontends.master')
@section('content')
    <form method="POST" action="{{ route('customer.reset.password.store') }}" id="reset-password-form" class="modal chaufea-modal py-4" enctype="multipart/form-data">
        @csrf
        <h2 class="chaufea-heading-2 text-center mb-4">{{ __('Create New Password') }}</h2>
        <div class="row">
            <input type="text" name="token" value="{{ $token }}" hidden>
            <div class="col-12">
                <div class="form-group">
                    <label for="password">{{ __('New Password') }}</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="confirm_password">{{ __('Confirm Password') }}</label>
                    <input id="confirm_password" name="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror">
                    @error('confirm_password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="form-group">
                    <input type="submit" id="btn-reset-password" class="chaufea-btn-1 btn-block" value="Confirm">
                </div>
            </div>
        </div>
    </form>
    <a id="reset-password-btn"href="#reset-password-form" rel="modal:open"></a>
    <script>
        
        window.onload = function() {
            document.getElementById('reset-password-btn').click();
        }
        $('#reset-password-form').on('submit', function(e) {
            e.preventDefault();
            $('#btn-reset-password').html('Please wait...').prop('disabled', true);
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success == 1) {
                        console.log(response);
                        toastr.success(response.msg);
                        $('#reset-password-form').hide();
                        window.location.href = "{{ route('homepage') }}";
                        $('#login-form').modal({
                            fadeDuration: 100
                        }); 
                    }else{
                        toastr.error(response.msg);
                    }
                }
            });
        });
    </script>
@endsection
