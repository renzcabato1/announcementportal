@extends('layouts.app')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-15 p-b-50">
            <form class="login100-form validate-form" method="POST" action="" onsubmit="show()">
                {{ csrf_field() }}
                <span class="login100-form-avatar" style='width:400px;'>
                    <img src="{{URL::asset('/images/MYPORTAL_logo.png')}}" alt="AVATAR">
                </span>
                <div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Email">
                    <input id="email" type="email"class="input100" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                    <input id="password" type="password"  class="input100" name="password" required>
                    <span class="focus-input100" data-placeholder="Password"></span>
                    
                </div>
                <div class="container-login100-form" style='padding-bottom:10px;'>
                    @if ($errors->has('email'))
                    <button class="login100-form">
                        <strong style='color:red;'>{{ $errors->first('email') }}</strong>
                    </button>
                    @endif
                    @if ($errors->has('password'))
                    <button class="login100-form">
                        <strong>{{ $errors->first('password') }}</strong>
                    </button>
                    @endif
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form" type='submit'  >
                        Login
                    </button>
                    <br>
                    <button class="login100-form"  >
                        <a style='color:black' href="{{ route('password.request') }}" onclick='show()'>Forgot Password</a>
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
