@extends('layouts.frontend.app')
@section('title', __('labels.login'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.login') }}</h1>
    <div class="content"></div>
</div>
<div style="max-width: 500px;margin: 0 auto;">
    <form id="loginForm" action="{{route('frontend.auth.login.post')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('labels.email') }} <span class="text-danger"><small>*</small></span></label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-error"
                placeholder="{{ __('labels.enter_email') }}">

            <span id="email-error" class="help-block error-help-block text-danger">
            </span>
        </div>
        <div class="mb-3">
            <div class="form-label-group">
                <label 
                    for="password" 
                    class="form-label"
                >
                    {{ __('labels.password') }}
                    <span class="text-danger"><small>*</small></span>
                </label>
            </div>
            <div class="form-control-wrap">
                <a  class="form-icon form-icon-right passcode-switch cursor-pointer">
                    <em class="icon ni ni-eye-fill" data-target="password"></em>
                </a>

                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password"
                    placeholder="{{ __('labels.enter_password') }}" 
                    aria-describedby="password-error" 
                    autocomplete="off"
                >
                <div class="float-end small">
                    <a href="{{route('frontend.password.reset')}}">{{__('labels.forgot_password')}}</a>
                </div>
            </div>

            <span id="password-error" class="help-block error-help-block text-danger">
            </span>
        </div>

        <button type="submit" id="loginBtn" class="btn btn-primary">{{ __('labels.login') }}</button>
        <div class="text-center small">
            {{__('labels.dont_have_account')}} 
            <a href="{{route('front.auth.signup')}}">{{__('labels.sign_up')}}</a>
        </div>
    </form>
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">{{ __('labels.login_with') }}</label>
        <div class="col-md-6">
            <!-- <a href="{{ route('frontend.auth.social', $social = 'facebook') }}" class="fb btn"><i class="fa fa-facebook"></i></a> -->
            <a href="{{ route('frontend.auth.social', $social = 'google') }}" class="fb btn"><i class="fa fa-google"></i></a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/login.js')) !!}

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\LoginRequest', '#loginForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush