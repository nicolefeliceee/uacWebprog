@extends('layout.master')

@section('content')
    <div class="container">
        @if (count($avatars) == 0)
            <div class="fs-2">No game available</div>
        @endif

        <div class="avatars d-flex flex-wrap justify-content-center">
            @foreach ($avatars as $avatar)
                <form action="/storeAvatar" method="post">
                    @csrf
                    <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="card mb-3 me-2" style="width: 18rem;">
                        <img src="{{ asset('storage/'. $avatar->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $avatar->name }}</h5>
                            <p class="card-title">Rp {{ $avatar->price }}</p>

                            <button class="btn btn-secondary bg-secondary" type="submit">Buy</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

    </div>
@endsection
