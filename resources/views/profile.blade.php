@extends('layout.master')

@section('title', 'Profile')

@section('content')

<div class="container p-5">
    <div class="d-flex">
        <div class="leftSide">
            <div class="img" style="background-image: url({{ asset('storage/' . $user->image) }}); width:20rem; height:20rem; background-size:cover; background-repeat:no-repeat; background-position:center; border-radius:50%"></div>
        </div>
        <div class="rightSide ps-5 w-50">
            <h2>My Profile</h2>
            <label for="name" class="mt-3">Name</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>

            <label for="email" class="mt-3">Email</label>
            <input type="text" class="form-control" value="{{ $user->email }}" readonly>

            <a href="/edit-profile" class="btn btn-dark mt-5">Edit Profile</a>
        </div>
    </div>
</div>

@endsection
