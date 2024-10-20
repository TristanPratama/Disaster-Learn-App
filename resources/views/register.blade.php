@extends('layouts.auth')

@section('container')


<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    {{-- Bagian Kiri --}}
                    <div class="col-lg-6">
                        <div class="p-5">
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    Create an Account!
                                </h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('actionregister') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="username"
                                        class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                        placeholder="Username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="email" aria-describedby="emailHelp"
                                        placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>

                    {{-- Bagiian Kanan --}}
                    <div class="col-lg-6 d-none d-lg-flex bg-primary" style="display: flex; justify-content: center; align-items: center;">
                        <div class="p-5">
                            <div class="text-center">
                                <h3 class=" text-white mb-4 text-wrap m-4">
                                    <b> Effect of a Disaster Management Learning Application on
                                    Improving Disaster Preparedness: A Research Team Study </b>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
