@extends('layout.master')

@section('title', 'Friend')

@section('content')


<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @auth
        <h1>Hi, {{ auth()->user()->name }}, this is your friend! Start chatting</h1>
    @endauth

    <div class="row">
        {{-- tess --}}
        @foreach ($friends as $user)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'.$user->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <h6>Hobby: {{ $user->hobby1 }} | {{ $user->hobby2 }} | {{ $user->hobby3 }}</h6>
                        <form action="/chat" method="post">
                            @csrf
                            <input type="hidden" name="target_id" value="{{ $user->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-primary">Chat</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>



</div>

@endsection
