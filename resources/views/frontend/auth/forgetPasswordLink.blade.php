@extends('auth.layout')
@section('content')
    <div class="layout-login__form bg-white" data-perfect-scrollbar>
        <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
            <a href="#" class="navbar-brand" style="min-width: 0">
                <img class="navbar-brand-icon" src="{{ asset('public/assets/images/stack-logo-blue.svg') }}" width="25"
                    alt="Chatbot">
                <span>Chatbot</span>
            </a>
        </div>

        <h4 class="m-0">Forgot Password?</h4>
        <p class="mb-5"></p>

        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label class="text-label" for="email_2">Email Address:</label>
                <div class="input-group input-group-merge">
                    <input id="email_2" type="email" name="email" class="form-control form-control-prepended"
                        placeholder="Enter your emial address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="text-label" for="password_2">Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password_2" type="password" name="password" class="form-control form-control-prepended"
                        placeholder="Enter your password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="text-label" for="password_2">Confirm Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password_2" type="password" name="password_confirmation"
                        class="form-control form-control-prepended" placeholder="Enter your confirm password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary mb-5" type="submit">Reset Password</button><br>

            </div>
        </form>
    </div>
@endsection
