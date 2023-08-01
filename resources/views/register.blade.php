@extends('layout.master')

@section('title', 'Register')

@section('content')

<div class="container">
    <h2 class="mt-4 text-center">Register</h2>
    <form action="/register" class="w-50 mx-auto d-flex flex-column" method="post" enctype="multipart/form-data">
        @csrf
            <label for="name" class="pt-4">Name</label>
            <input type="text" name="name" id="name" required class="form-control @error('name') invalid @enderror" autofocus value="{{ old('name') }}">
            @error('name')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror

            <label for="email" class="pt-2">Email</label>
            <input type="text" name="email" id="email" required class="form-control @error('email') invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror

            <label for="instagram" class="pt-2">Instagram</label>
            <input type="text" name="instagram" id="instagram" required class="form-control @error('instagram') invalid @enderror" value="{{ old('instagram') }}">
            @error('instagram')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror

            <label for="phone" class="pt-2">Phone</label>
            <input type="text" name="phone" id="phone" required class="form-control @error('phone') invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror

            <div class=" pt-2">
                <label for="hobby">Hobbies</label>
                <input type="text" name="hobby1" id="hobby1" required class="mb-2 form-control @error('hobby1') invalid @enderror" value="{{ old('hobby1') }}">
                @error('hobby1')
                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                @enderror
                <input type="text" name="hobby2" id="hobby2" required class="mb-2 form-control @error('hobby2') invalid @enderror" value="{{ old('hobby2') }}">
                @error('hobby2')
                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                @enderror
                <input type="text" name="hobby3" id="hobby3" required class="form-control @error('hobby3') invalid @enderror" value="{{ old('hobby3') }}">
                @error('hobby3')
                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                @enderror
            </div>

            {{-- <label for="image" class="pt-2">Image</label>
            <input type="file" name="image" id="image" required class="form-control @error('image') invalid @enderror" value="{{ old('image') }}">
            @error('image')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror --}}

            <label for="password" class="pt-2">Password</label>
            <input type="password" name="password" id="password" required class="form-control @error('password') invalid @enderror" value="{{ old('password') }}">
            @error('password')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror

            <label for="gender" class="pt-2">Gender</label>
            <div class="genderDiv d-flex">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline ms-4">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <label for="image" class="pt-2">Image</label>
            <input type="file" name="image" id="image" required class="form-control @error('image') invalid @enderror" value="{{ old('image') }}" onchange="previewImage()">
            <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block w-[30vw] w-100 rounded-3 mt-3">
            @error('image')
                <p class="text-danger p-0 m-0">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-primary bg-dark mt-4 mx-auto px-3 border-0 mt-3">Register</button>
            <div class="fs-6 text-center pt-3">Already have an account? <a href="/login">Login here!</a></div>

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
