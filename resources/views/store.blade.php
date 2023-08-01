@extends('layout.master')

@section('title', 'Store')

@section('content')
<div class="container">

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-row justify-content-between align-items-center">
        <a class="btn btn-dark mb-3 h-50" href="/storeAvatar">Buy New Avatar +</a>
        <div class="wallet d-flex flex-column text-center w-25 border-3 rounded-4 p-3 border-dark">
            <h2 class="fs-5">My Wallet</h2>
            <h4 class="fs-2">{{ auth()->user()->wallet }}</h4>
            <button type="button" class="btn btn-secondary bg-dark w-50 mx-auto mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Top Up +
            </button>
        </div>
    </div>

    <!-- Modal -->
    <form action="/topup" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Top Up</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-row align-items-end">
                        <div class="right me-3" id="minusBtn">
                            <div class="btn btn-primary ms-3">-</div>
                        </div>
                        <div class="left w-25">
                            <label for="wallet" class="text-center w-100">Nominal</label>
                            <input type="number" name="wallet" id="wallet" class="form-control text-center" value="100">
                        </div>
                        <div class="right w-25" id="addBtn">
                            <div class="btn btn-primary ms-3">+</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary bg-primary">Top Up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if (count($transactions) == 0)
        <div class="fs-2 text-center my-4">You don't have any avatar</div>
    @endif

    <div class="avatars d-flex flex-wrap justify-content-start mt-4">
        @foreach ($transactions as $transaction)
            <div class="card mb-3 me-2" style="width: 18rem;">
                <img src="{{ asset('storage/'. $transaction->avatar->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $transaction->avatar->name }}</h5>
                    <p class="card-title">Rp {{ $transaction->avatar->price }}</p>

                    <a href="#" class="btn btn-primary">Send</a>
                </div>
            </div>
        @endforeach
    </div>

</div>

{{-- <div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @auth
        <h1>Hi, {{ auth()->user()->name }}</h1>
    @endauth
    <div class="games d-flex flex-wrap justify-content-center">
        @foreach ($avatars as $avatar)
            <form action="/store" method="post">
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
</div> --}}

@endsection
