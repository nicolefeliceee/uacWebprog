@extends('layout.master')

@section('title', 'Wishlist')

@section('content')

<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>This is the people you like!</h1>
    <div class="row">
        {{-- tess --}}
        @php
            $flag = 0;
        @endphp
        @foreach ($users as $user)
            @if ($liked_id->contains($user->id))
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/'.$user->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <h6>Hobby: {{ $user->hobby1 }} | {{ $user->hobby2 }} | {{ $user->hobby3 }}</h6>
                        </div>
                    </div>
                </div>
                @php
                    $flag = 1;
                @endphp
            @endif
        @endforeach
        @if ($flag == 0)
            <h2>You haven't like anyone</h2>
        @endif

        {{-- @foreach ($users as $user)
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
                    </div>
                </div>
            </div>
        @endforeach --}}
    </div>
</div>

@endsection
