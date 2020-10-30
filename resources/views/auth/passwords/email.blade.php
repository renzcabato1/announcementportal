@extends('layouts.app')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-15 p-b-50">
            <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}" onsubmit="show()">
                {{ csrf_field() }}
                <span class="login100-form-avatar" style='width:400px;'>
                    <img src="{{URL::asset('/images/MYPORTAL_logo.png')}}" alt="AVATAR">
                </span>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter username">
                    <input id="email" type="email"class="input100" name="email" value="{{ old('email') }}" required autofocus>
                    
                    <span class="focus-input100" data-placeholder="Please Enter Your Email"></span>
                </div>
                <div class="container-login100-form" style='padding-bottom:10px;'>
                    @if ($errors->has('email'))
                    <button class="login100-form">
                        <strong style='color:red;'>{{ $errors->first('email') }}</strong>
                    </button>
                    @endif
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form" type='submit'  >
                        Send Password Reset Link
                    </button>
                    <br>
                    <button class="login100-form"  >
                        <a style='color:black' href="{{  url('/login') }}"  onclick='show()'>Back to Login Page</a>
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
