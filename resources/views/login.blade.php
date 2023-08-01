@extends('layout.master')

@section('title', 'Login')

@section('content')

<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mt-4 text-center">Login</h2>
    <form action="/login" class="w-50 mx-auto d-flex flex-column" method="post">
        @csrf
            <label for="email" class="pt-2">Email</label>
            <input type="text" name="email" id="email" required class="form-control @error('email') invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <label for="password" class="pt-3">Password</label>
            <input type="password" name="password" id="password" required class="form-control @error('password') invalid @enderror" value="{{ old('password') }}">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-primary bg-dark mt-4 mx-auto px-3 border-0 mt-3">Login</button>
            <div class="fs-6 text-center pt-3">Don't have an account? <a href="/register">Register here!</a></div>

    </form>
</div>

@endsection
