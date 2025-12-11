@extends('layouts.frontend.app')
@section('title', __('labels.login_security'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.login_security') }}</h1>
    <div class="content">
        <p>{{__('message.error.otp.select_method')}}</p>
        <p>{{__('message.error.otp.option_one')}}</p>
        <p>{{__('message.error.otp.option_two')}}</p>
    </div>
</div>
<div class="card">
    <div class="card-inner">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body p-2">
                        <form id="loginSecurityForm" action="{{ route('frontend.setting.update-login-security') }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="isInitital" id="isInitital" value="1">
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('labels.login_security') }}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2 form-select2"
                                                name="login_security" id="login_security"
                                                data-placeholder="Select Login Security">
                                                <option value="1">
                                                    {{ __('labels.googleTwoFactor.otp') }}</option>
                                                <option value="2">
                                                    {{ __('labels.googleTwoFactor.totp_google_2fa') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-end" id="loginSecurityBtnSection">
                                        @if ($user->login_security != '2')
                                            <button 
                                                type="button" 
                                                class="btn btn-primary"
                                                id="loginSecuritySubmitBtn"
                                            >
                                            {{ __('labels.save') }}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- google 2fa code hare start -->
                        <div id="google2faFormSection">
                        </div>
                        <!-- google 2fa code hare end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/google2fa/index.js')) !!}
@endpush