@extends('layouts.frontend.app')
@section('title', __('labels.verify_totp'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.verify_totp') }}</h1>
    <div class="content"></div>
</div>
<div class="card otp-card2">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">{{__('labels.googleTwoFactor.two_factor_authentication')}}</h4>
                <div class="nk-block-des">
                    <p>{{__('labels.googleTwoFactor.varify_page_content')}}</p>
                    {{__('labels.googleTwoFactor.enter_pin_text')}}<br/><br/>
                </div>
            </div>
        </div>
        <form action="{{ route('post.2faVerify') }}" method="post" id="2faVerify-form" onsubmit="return false;">
            @csrf
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="one_time_password">{{__('labels.googleTwoFactor.one_time_password')}}</label>
                </div>
                <div class="form-control-wrap">

                    <input type="hidden" name="one_time_password" id="one_time_password">

                    <div class="inputs d-flex flex-row justify-content-center mt-2 otp-field"> 
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                        <input class="m-2 h-75 text-center form-control rounded otp-input" type="number" disabled />
                    </div>

                    <span id="one_time_password-error" class="help-block error-help-block text-danger">
                    </span>
                </div>
            </div>
            <div class="form-group">
                <button type="button" id="2faVerifyBtn" class="btn btn-lg btn-primary btn-block">{{__('labels.googleTwoFactor.authenticate')}}</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Frontend\Check2faVerifyRequest','#2faVerify-form') !!}
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/google2fa/index.js')) !!}
@endpush