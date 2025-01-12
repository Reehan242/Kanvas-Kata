@extends('layouts.main')

@section('container')
    <div class="banner-container align-items-center justify-content-center"
        style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(255, 255, 255, 0.4)), url('/img/blog_wallpaper2.jpg') center/cover no-repeat; min-height: 100vh; padding: 5rem 0;">
        <div class="d-flex justify-content-center " style="margin-top:120px;">
            <div class="col-sm-8 p-1">
                <div class="card p-4" style="background-color:rgba(240, 240,240, 0.8)">
    
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('loginError') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <main class="form-signin w-100 m-auto">
                        <h1 class="h3 mb-3 fw-normal text-center text-gradient-2">Please login</h1>
                        <form action="/login" method="post">
                            @csrf
                            <input type="hidden" name="redirect_url" value="{{ request('redirect_url', route('index')) }}">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="name@example.com" autofocus required
                                    value="{{ old('email') }}">
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
    
                            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                        </form>
                        <small class="d-block text-center mt-3">Dont have account? <a href="/register">Register Now!</a></small>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
