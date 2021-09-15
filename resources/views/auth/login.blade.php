@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{ asset('/images/logo.webp') }}" alt="Admin" class="logo-img">
                        </a>
                    </div>
                    <div class="login-form">
                        <form method="POST" action="{{ route('authenticate') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input class="au-input au-input--full @error('email') is-invalid @enderror"
                                       type="email" name="email" id="email" placeholder="Email">

                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                                <label>
                                    <a href="#">Forgotten Password?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
