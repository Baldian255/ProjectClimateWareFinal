@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="input-group remember-me">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <button type="submit" class="btn">Login</button>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </form>

        <p class="switch-link">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
    </div>
</div>
@endsection

@section('styles')
<style>
    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f7f7f7;
    }

    .auth-box {
        background-color: white;
        padding: 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 100%;
        max-width: 400px;
    }

    h2 {
        text-align: center;
        margin-bottom: 1rem;
        color: #333;
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .input-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .input-group input {
        width: 100%;
        padding: 0.8rem;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .remember-me {
        display: flex;
        align-items: center;
    }

    .btn {
        width: 100%;
        padding: 0.8rem;
        background-color: #3490dc;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #2779bd;
    }

    .error {
        color: red;
        font-size: 0.9rem;
        margin-top: 1rem;
    }

    .switch-link {
        text-align: center;
        margin-top: 1rem;
    }

    .switch-link a {
        color: #3490dc;
        font-weight: bold;
    }

    /* Fixes for layout issues */
    .input-group input {
        box-sizing: border-box;
    }

    .remember-me {
        margin-top: 0.5rem;
        font-size: 0.9rem;
    }
</style>
@endsection
