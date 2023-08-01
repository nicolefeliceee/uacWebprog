@extends('layout.master')

@section('title', 'Home')

@section('content')


<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @auth
        <h1>Hi, {{ auth()->user()->name }}</h1>
    @endauth

    <form action="/home" class="d-flex w-50 mx-auto mb-4" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <form action="/home" method="GET" class="mb-4">
        <label for="category">Filter by gender:</label>
        <div class="d-flex">
            <select class="form-select w-25" name="category" id="category">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <button type="submit" class="btn btn-dark">Filter</button>
        </div>
    </form>

    <div class="row">
        {{-- tess --}}
        @foreach ($users as $user)
            <div class="col-md-3">
                <div class="card" style="width: 16rem;">
                    <img src="{{ asset('storage/'.$user->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <h6>Hobby: {{ $user->hobby1 }} | {{ $user->hobby2 }} | {{ $user->hobby3 }}</h6>
                        @guest
                            <a href="/login" class="btn btn-primary">Like</a>
                        @endguest
                        @auth
                            {{-- <form action="/like" method="post">
                                @csrf
                                <input type="hidden" name="target_id" value="{{ $user->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <button type="submit" class="btn btn-primary">Like</button>
                            </form> --}}
                            @if ($liked_id->contains($user->id))
                                <button class="btn btn-danger">Liked</button>
                            @else
                                <form action="/like" method="post">
                                    @csrf
                                    <input type="hidden" name="target_id" value="{{ $user->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <button type="submit" class="btn btn-primary">Like</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
