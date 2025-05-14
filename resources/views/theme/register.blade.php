@extends('theme.master')
@section('title', 'Register')

@section('content')
    <div class="form-box">
        <div class="container">
            <form method="post" action="{{route('register.task')}}">
                @csrf
                <h2>Register</h2>
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
                    <input type="text" name='name' value="{{old('name')}}" required>
                    <label>Name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="email" value="{{old('email')}}" required>
                    <label>Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Create password</label>
                </div>
                <button type="submit">Register</button>
                <div class="bottom-link">
                    Already have an account?
                    <a href="{{route('login')}}" id="login-link">Login</a>
                </div>
            </form>
        </div>
    </div>

@endsection