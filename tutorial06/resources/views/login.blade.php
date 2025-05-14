@extends('master')
@section("content")
    <div class="custom-login">
        <div class="row">
            <div class="col-sm-4">
                <form class="form-floating">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="{{ __('name@example.com') }}">
                        <label for="floatingInput">{{ __('Email address') }}</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">{{ __('Password') }}</label>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('Sign in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
