<!DOCTYPE html>
<html>
    <head>
        @include('include/head')
    </head>
    <body>
        <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
            <div class="login-box bg-white box-shadow pd-30 border-radius-5">
                <img src="{{ asset('images/login-img.png') }}" alt="login" class="login-img">
                <h2 class="text-center mb-30">{{ __('Register') }}</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="input-group custom input-group-lg">
                        <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" value="{{ old('name') }}" required autofocus>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="input-group custom input-group-lg">
                        <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                   
                    <div class="input-group custom input-group-lg">
                        <input d="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="**********">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="input-group custom input-group-lg">
                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    

                    <div class="input-group custom input-group col-8 offset-2">
                        <div class="input-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </button>    
                        </div>
                    </div>
                    
                    
                </form>

            </div>
        </div>
        @include('include/script')
    </body>
</html>