@extends('layouts.app')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-15 p-b-50">
            <form method="POST" action="{{ route('password.update') }}" onsubmit='show()'>
                @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                <span class="login100-form-avatar" style='width:400px;'>
                    <img src="{{URL::asset('/images/MYPORTAL_logo.png')}}" alt="AVATAR">
                </span>
                <div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Email">
                    <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    <span class="focus-input100" data-placeholder="Enter Email"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                    <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-50" data-validate="Confirm Password">
                <input id="password-confirm" type="password" class="input100" name="password_confirmation" required>
                <span class="focus-input100" data-placeholder="Confirm Password"></span>
                </div>
                <div class="container-login100-form" style='padding-bottom:10px;'>
                        @if ($errors->has('email'))
                        <button class="login100-form">
                            <strong style='color:red;'>{{ $errors->first('email') }}</strong>
                        </button>
                        @endif
                        @if ($errors->has('password'))
                        <button class="login100-form">
                            <strong style='color:red;'>{{ $errors->first('password') }}</strong>
                        </button>
                        @endif
                    </div>
                <div class="container-login100-form-btn">
                <button class="login100-form" type='submit'  >
                    {{ __('Reset Password') }}
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
