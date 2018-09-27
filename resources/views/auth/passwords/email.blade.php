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
                
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <p>{{ __('Enter your email address to reset your password') }}</p>
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div class="input-group custom input-group-lg">
                        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required placeholder="Email">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" >
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="forgot-password"><a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg btn-block">{{ __('Sign In') }}</a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('include/script')
    </body>
</html>