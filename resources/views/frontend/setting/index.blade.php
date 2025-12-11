@extends('layouts.frontend.app')
@section('title', __('labels.settings'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.settings') }}</h1>
    <div class="content"></div>
</div>
<div class="card">
    <div class="card-inner">
        <ul class="nav nav-tabs">
            <li class="nav-item {{ config('constants.frontendTabDisplay.loginSecurity') }}">
                <a class="nav-link pt-0 {{ $activeTab == 'login-security' ? 'active' : '' }}" data-bs-toggle="tab"
                    href="#login-security-setting"><em
                        class="icon ni ni-lock"></em><span>{{ __('labels.login_security_setting') }}</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane {{ $activeTab == 'login-security' ? 'active' : '' }}" id="login-security-setting">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="card-body p-2">
                                <form id="loginSecurityForm"
                                    action="{{ route('frontend.setting.update-login-security') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="isInitital" id="isInitital" value="0">
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{ __('labels.login_security') }}</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2 form-select2" name="login_security" id="login_security"
                                                        data-placeholder="Select Login Security">
                                                        <option value="1" @selected($data['user']->login_security == '1')>
                                                            {{ __('labels.googleTwoFactor.otp') }}</option>
                                                        <option value="2" @selected($data['user']->login_security == '2')>
                                                            {{ __('labels.googleTwoFactor.totp_google_2fa') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group text-end" id="loginSecurityBtnSection">
                                                @if ($data['user']->login_security != '2')
                                                    <button type="button" class="btn btn-primary"
                                                        id="loginSecuritySubmitBtn">{{ __('labels.save') }}</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- google 2fa code hare start -->
                                <div id="google2faFormSection">
                                    @if ($data['user']->login_security == '2')
                                        <!-- 2 = TOTP (Google 2FA)-->
                                        @if (!$data['user']->loginSecurity->google2fa_enable)
                                            @include('frontend.google2fa.enable2fa')
                                        @elseif($data['user']->loginSecurity->google2fa_enable)
                                            @include('frontend.google2fa.disable2fa')
                                        @endif
                                    @endif
                                </div>
                                <!-- google 2fa code hare end -->
                            </div>
                        </div>
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