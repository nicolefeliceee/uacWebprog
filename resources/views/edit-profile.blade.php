@extends('layout.master')

@section('title', 'Profile')

@section('content')

<div class="container p-5">
    <form action="/edit-profile" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="d-flex">
            <div class="leftSide d-flex justify-content-center flex-column w-25">
                {{-- <div class="img-preview" style="background-image: url({{ asset('storage/' . $user->image) }}); width:20rem; height:20rem; background-size:cover; background-repeat:no-repeat; background-position:center; border-radius:50%"></div> --}}
                <img src="{{ asset('storage/' . $user->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block w-100">

                <div style="position: relative" class="mt-3">
                    <input type="file" class="form-control @error('image') invalid @enderror" name="image" id="image" value="{{ $user->image }}" onchange="previewImage()" style="position: absolute; z-index: 10; opacity: 0%; width: 100%">
                    <input type="hidden" id="image" name="oldImage" value="{{ $user->image }}">
                    <div class="btn btn-dark" style="z-index: 1; position: absolute; width: 100%">Browse Photo</div>
                </div>

            </div>
            <div class="rightSide ps-5 w-50">
                <h2>My Profile</h2>
                <label for="name" class="mt-3">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" autofocus>

                <label for="email" class="mt-3">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">

                <button type="submit" class="btn btn-dark mt-5">Save Profile</button>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvenet) {
            imgPreview.src = oFREvenet.target.result;
        }
    }
</script>
@endsection
