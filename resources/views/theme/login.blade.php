@extends('theme.master')

@section('title', 'Login')

@section('content')
    <div class="form-box">
        <div class="container">
            <h2>LOGIN</h2>
            <form action="{{route('login')}}" method="post">
                @csrf
                <form method="post" action="{{route('login')}}">
                    @csrf
                    @if ($errors->any())
                        <div style="border: 1px solid red; background-color: #f8d7da; padding: 10px; border-radius: 5px;">
                            <ul style="list-style-type: none; margin: 0; padding: 0;">
                                @foreach ($errors->all() as $error)
                                    <li style="color: red; font-weight: bold;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="input-field">
                        <input type="text" name='email' value="{{old('email')}}" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name='password' required>
                        <label>Password</label>
                    </div>
                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="{{route('register')}}" id="signup-link">Signup</a>
                </div>
            </form>
        </div>
    </div>

@endsection
