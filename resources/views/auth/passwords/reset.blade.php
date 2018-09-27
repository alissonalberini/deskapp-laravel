<!DOCTYPE html>
<html>
    <head>
        @include('include/head')
    </head>
    <body>
        <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="login-box bg-white box-shadow pd-30 border-radius-5">
                <img src="{{ asset('images/login-img.png') }}" alt="login" class="login-img">
                <h2 class="text-center mb-30">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <p>{{ __('Enter your new password, confirm and submit') }}</p>
                    <div class="input-group custom input-group-lg">
                        <input id="email" type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="email">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group custom input-group-lg">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="New Password">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group custom input-group-lg">
                        <input id="password-confirm"  name="password_confirmation" required type="password" class="form-control" placeholder="Confirm New Password">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ __('Submit') }}" title="{{ __('Reset Password') }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('include/script')
    </body>
</html>