@extends('layouts.main')

@section('container')
<div class="banner-container align-items-center justify-content-center"
        style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(255, 255, 255, 0.4)), url('/img/blog_wallpaper2.jpg') center/cover no-repeat; min-height: 100vh; padding: 5rem 0;">
    <div class="d-flex justify-content-center" style="margin-top:120px;">
        <div class="col-sm-8 p-1">
            <div class="card p-4" style="background-color:rgba(240, 240, 240, 0.8)">
                <main class="form-registration">
                    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                    <form action="/register" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required >
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                        <small class="d-block text-center mt-3">Have account? <a href="/login">Login Now!</a></small>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
