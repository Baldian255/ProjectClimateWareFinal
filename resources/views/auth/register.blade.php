@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-box">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit" class="btn">Register</button>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </form>

        <p class="switch-link">Already have an account? <a href="{{ route('login') }}">Login</a></p>
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
</style>