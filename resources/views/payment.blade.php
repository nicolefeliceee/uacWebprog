@extends('layout.master2')

@section('title', 'Payment')

@section('content')

<div class="container">

    <h2>You should pay {{ $price }}</h2>
    <form action="/payment" class="w-50 mx-auto d-flex flex-column" method="post">
        @csrf
            <label for="pay" class="pt-2">Input your money Here</label>
            <input type="text" name="pay" id="pay" required class="form-control @error('pay') invalid @enderror" value="{{ old('pay') }}">
            @error('pay')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-primary bg-dark mt-4 mx-auto px-3 border-0 mt-3">Pay</button>
            {{-- <div class="fs-6 text-center pt-3">Don't have an account? <a href="/register">Register here!</a></div> --}}

    </form>

</div>

@endsection
