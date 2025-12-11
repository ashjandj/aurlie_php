@extends('layouts.frontend.app')
@section('title', __('labels.verify_otp'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.verify_otp') }}</h1>
    <div class="content"></div>
</div>
<div class="card otp-card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">{{ __('labels.sign_in') }}</h4>
                <div class="nk-block-des">
                    <p></p>
                </div>
            </div>
        </div>
        <form action="{{ route('otp.verify') }}" method="post" id="frontend-otp-login-form"
            onsubmit="return false;">
            @csrf
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="otp">{{ __('labels.otp') }}</label>
                    <a href="#" class="link link-primary link-sm" data-href="{{ $resendOtpUrl }}"
                        id="resentBtn">{{ __('labels.resend_otp') }}</a>
                </div>
                <div class="form-control-wrap">
                    <input type="hidden" name="email" value="{{ $email }}" id="email">
                    <input type="hidden" name="otp" id="otp">

                    <div class="inputs d-flex flex-row justify-content-center mt-2 otp-field"> 
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                    </div>

                    <span id="otp-error" class="help-block error-help-block text-danger">
                    </span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" id="signInBtn"
                    class="btn btn-lg btn-primary btn-block">{{ __('labels.sign_in') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\VerifyOtpRequest', '#frontend-otp-login-form') !!}
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/otp.js')) !!}
@endpush