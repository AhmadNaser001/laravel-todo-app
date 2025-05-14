@extends('theme.master')

@section('title', 'Welcome')
@section('content')

    <!-- Start Landing -->
    <div class="landing">
        <div class="container">
            <div class="text">
                <h1>Welcome, To Taskify</h1>
                <p>
                    Keep track of your tasks easily and efficiently with our To Do List app. Organize your day, set
                    reminders, and stay on top of your goals. </p>
                <div class="btn-action">
                    <a class="login-btn" href="{{route('login')}}">Login</a>
                    <a class="register-btn" href="{{route('register')}}">Register</a>
                </div>
            </div>
            <div class="image">
                <img decoding="async" src="{{ asset('asset/image/landing-image.png') }}" alt="" />
            </div>
        </div>
        <a href="#articles" class="go-down">
            <i class="fas fa-angle-double-down fa-2x"></i>
        </a>
    </div>
    <!-- End Landing -->

@endsection