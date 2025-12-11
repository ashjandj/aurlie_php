@extends('layouts.backend.app')
@section('title',__('labels.settings'))
@section('content')
<!-- content @s -->
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <nav>
                                <ul class="breadcrumb breadcrumb-pipe">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.dashboard')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('labels.setting')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.setting')}}</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="card">
                    <div class="card-inner">
                        <ul class="nav nav-tabs">
                            @can('admin.setting.application')
                                <li class="nav-item">
                                    <a class="nav-link pt-0 {{ $activeTab == 'application' ? 'active' : ''}}" data-bs-toggle="tab" href="#application-setting"><em class="icon ni ni-user"></em><span>{{__('labels.application_setting')}}</span></a>
                                </li>
                            @endcan
                            @can('admin.setting.general')
                                <li class="nav-item {{config('constants.adminTabDisplay.general')}}">
                                    <a class="nav-link pt-0 {{ $activeTab == 'general' ? 'active' : ''}}" data-bs-toggle="tab" href="#general-setting"><em class="icon ni ni-setting"></em><span>{{__('labels.general_setting')}}</span></a>
                                </li>
                            @endcan
                                <li class="nav-item {{config('constants.adminTabDisplay.loginSecurity')}}">
                                    <a class="nav-link pt-0 {{ $activeTab == 'media-manager' ? 'active' : ''}}" data-bs-toggle="tab" href="#media-manager-setting"><em class="icon ni ni-file"></em><span>{{__('labels.media_manager_setting')}}</span></a>
                                </li>
                                <li class="nav-item {{config('constants.adminTabDisplay.loginSecurity')}}">
                                    <a class="nav-link pt-0 {{ $activeTab == 'login-security' || $onlyLoginSecurity ? 'active' : ''}}" data-bs-toggle="tab" href="#login-security-setting"><em class="icon ni ni-lock"></em><span>{{__('labels.login_security_setting')}}</span></a>
                                </li>
                            @can('admin.setting.mail')
                                <li class="nav-item {{config('constants.adminTabDisplay.mailSettings')}}">
                                    <a class="nav-link pt-0 {{ $activeTab == 'mail-settings' ? 'active' : ''}}" data-bs-toggle="tab" href="#mail-settings"><em class="icon ni ni-mail"></em><span>{{__('labels.mail_settings')}}</span></a>
                                </li>
                            @endcan
                            @can('admin.setting.stripe')
                                <li class="nav-item {{config('constants.adminTabDisplay.stripeSettings')}}">
                                    <a class="nav-link pt-0 {{ $activeTab == 'stripe-settings' ? 'active' : ''}}" data-bs-toggle="tab" href="#stripe-settings"><em class="icon ni ni-sign-stripe-fulll"></em><span>{{__('labels.stripe_settings')}}</span></a>
                                </li>
                            @endcan
                            @can('admin.setting.social')
                                <li class="nav-item {{config('constants.adminTabDisplay.socialSettings')}}">
                                    <a class="nav-link pt-0 {{ $activeTab == 'social-settings' ? 'active' : ''}}" data-bs-toggle="tab" href="#social-settings"><em class="icon ni ni-google"></em><span>{{__('labels.social_settings')}}</span></a>
                                </li>
                            @endcan
                        </ul>
                        <div class="tab-content">
                            @can('admin.setting.application')
                                <div class="tab-pane {{ $activeTab == 'application' ? 'active' : ''}}" id="application-setting">
                                    <form id="addForm" action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.app_name')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" class="form-control" placeholder="{{__('labels.enter_app_name')}}" value="{{!empty($settings['app.name'])? $settings['app.name'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.facebook_url')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="text" name="facebook_url" class="form-control" placeholder="{{__('labels.enter_facebook_page_url')}}" value="{{!empty($settings['app.facebook_url'])? $settings['app.facebook_url'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.linkedin_url')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="text" name="linkedin_url" class="form-control" placeholder="{{__('labels.enter_linkedin_page_url')}}" value="{{!empty($settings['app.linkedin_url'])? $settings['app.linkedin_url'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.twitter_url')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="text" name="twitter_url" class="form-control" placeholder="{{__('labels.enter_twitter_page_url')}}" value="{{!empty($settings['app.twitter_url'])? $settings['app.twitter_url'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.youtube_url')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="text" name="youtube_url" class="form-control" placeholder="{{__('labels.enter_youtube_page_url')}}" value="{{!empty($settings['app.youtube_url'])? $settings['app.youtube_url'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.instagram_url')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="text" name="instagram_url" class="form-control" placeholder="{{__('labels.enter_instagram_page_url')}}" value="{{!empty($settings['app.instagram_url'])? $settings['app.instagram_url'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.contact_email')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="email" name="contact_email" class="form-control" placeholder="{{__('labels.enter_contact_email')}}" value="{{!empty($settings['app.contact_email'])? $settings['app.contact_email'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.contact_number')}}</label>
                                                    <div class="form-control-wrap">
                                                    <input type="number" name="contact_number" class="form-control" placeholder="{{__('labels.enter_contact_number')}}" value="{{!empty($settings['app.contact_number'])? $settings['app.contact_number'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.contact_address')}}</label>
                                                    <div class="form-control-wrap">
                                                    <textarea name="contact_address" class="form-control contact_address" placeholder="{{__('labels.enter_contact_email')}}">{{!empty($settings['app.contact_address'])? $settings['app.contact_address'] : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group text-end">
                                                    <button type="button" class="btn btn-primary" id="settingSubmitBtn">{{__('labels.save')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {!! JsValidator::formRequest('App\Http\Requests\Backend\CreateSettingRequest','#addForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
                                </div>
                            @endcan

                            @can('admin.setting.general')
                                <div class="tab-pane {{ $activeTab == 'general' ? 'active' : ''}}" id="general-setting">
                                    <div class="card">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>{{__('labels.optimize_clear')}}</h6>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <button type="button" class="btn btn-primary me-1 run-command" rel="opcl">{{__('labels.run')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>{{__('labels.config_cache')}}</h6>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <button type="button" class="btn btn-primary me-1 run-command" rel="coca">{{__('labels.run')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>{{__('labels.run_migrate')}}</h6>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <button type="button" class="btn btn-primary me-1 run-command" rel="rm">{{__('labels.run')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>{{__('labels.maintenance_mode')}}</h6>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input run-command" id="customSwitch" rel="{{($maintenanceMode) ? 'up' : 'down'}}" @if($maintenanceMode) checked=checked @endif>
                                                            <label class="custom-control-label" for="customSwitch"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            <div class="tab-pane {{ $activeTab == 'media-manager' ? 'active' : ''}}" id="media-manager-setting">
                                <form id="addMediaForm" action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="card">
                                    <div class="card-inner-group">
                                    <div class="card-inner">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">{{__('labels.accepted_file_type')}}</label>
                                                <div class="form-control-wrap">
                                                <input type="checkbox" name="accepted_file_type[]" value="png" {{strpos(getAllowedFileExt(), 'png') ? 'checked' : ''}}> png <br>
                                                <input type="checkbox" name="accepted_file_type[]" value="jpg" {{strpos(getAllowedFileExt(), 'jpg') ? 'checked' : ''}}> jpg <br>
                                                <input type="checkbox" name="accepted_file_type[]" value="jpeg" {{strpos(getAllowedFileExt(), 'jpeg') ? 'checked' : ''}}> jpeg <br>
                                                <input type="checkbox" name="accepted_file_type[]" value="pdf" {{strpos(getAllowedFileExt(), 'pdf') ? 'checked' : ''}}> pdf <br>
                                                <input type="checkbox" name="accepted_file_type[]" value="doc" {{strpos(getAllowedFileExt(), 'doc') ? 'checked' : ''}}> doc <br>
                                                <input type="checkbox" name="accepted_file_type[]" value="docx" {{strpos(getAllowedFileExt(), 'docx') ? 'checked' : ''}}> docx 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.file_visibility')}}</label>
                                                    <div class="form-control-wrap">
                                                    <select name="file_visibility" id="visibility" class="form-select js-select2" data-placeholder="Select File Visibility">
                                                        <option value="public" {{getFileVisibility() == 'public' ? 'selected' : ''}}>{{__('labels.public')}}</option>
                                                        <option value="private" {{getFileVisibility() == 'private' ? 'selected' : ''}}>{{__('labels.private')}}</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-sm-12">
                                            <div class="form-group text-end">
                                                <button type="button" class="btn btn-primary" id="mediaSettingSubmitBtn">{{__('labels.save')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane {{ $activeTab == 'login-security' || $onlyLoginSecurity ? 'active' : ''}}" id="login-security-setting">
                                <div class="row">
                                   <div class="col-lg-6 mx-auto">
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <form id="loginSecurityForm" action="{{ route('admin.setting.update-login-security') }}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="row g-3">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">{{__('labels.login_security')}}</label>
                                                                <div class="form-control-wrap">
                                                                    <select name="login_security" id="login_security" class="form-select js-select2" data-placeholder="Select Login Security">
                                                                        <option value="0" @selected($data['user']->login_security == '0')>{{__('labels.googleTwoFactor.none')}}</option>
                                                                        <option value="1" @selected($data['user']->login_security == '1')>{{__('labels.googleTwoFactor.otp')}}</option>
                                                                        <option value="2" @selected($data['user']->login_security == '2')>{{__('labels.googleTwoFactor.totp_google_2fa')}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group text-end" id="loginSecurityBtnSection">
                                                                @if ($data['user']->login_security != '2')
                                                                    <button type="button" class="btn btn-primary" id="loginSecuritySubmitBtn">{{__('labels.save')}}</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- google 2fa code hare start -->
                                                <div id="google2faFormSection">
                                                    @if ($data['user']->login_security == '2') <!-- 2 = TOTP (Google 2FA)-->
                                                        @if(!$data['user']->loginSecurity->google2fa_enable)
                                                            @include('backend.google2fa.enable2fa')
                                                        @elseif($data['user']->loginSecurity->google2fa_enable)
                                                            @include('backend.google2fa.disable2fa')
                                                        @endif
                                                    @endif
                                                </div>
                                                <!-- google 2fa code hare end -->
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>

                            @can('admin.setting.mail')
                                <div class="tab-pane {{ $activeTab == 'mail-settings' ? 'active' : ''}}" id="mail-settings">
                                    <form id="mailSettingForm" action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_type')}}</label>
                                                    <div class="form-control-wrap">
                                                        <select name="mail_type" id="mail_type" class="form-select js-select2" data-placeholder="{{__('labels.select')}}">
                                                            <option value="mailpit" @selected($settings['app.mail_type'] == 'mailpit')>Mailpit</option>
                                                            <option value="smtp" @selected($settings['app.mail_type'] == 'smtp')>SMTP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_host')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_host" id="mail_host" class="form-control" placeholder="{{__('labels.mail_host')}}" value="{{!empty($settings['app.mail_host'])? $settings['app.mail_host'] : ''}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_port')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_port" id="mail_port" class="form-control" placeholder="{{__('labels.mail_port')}}" value="{{!empty($settings['app.mail_port'])? $settings['app.mail_port'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_username')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_username" id="mail_username" class="form-control" placeholder="{{__('labels.mail_username')}}" value="{{!empty($settings['app.mail_username'])? $settings['app.mail_username'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_password')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_password" id="mail_password" class="form-control" placeholder="{{__('labels.mail_password')}}" value="{{!empty($settings['app.mail_password'])? $settings['app.mail_password'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_encryption')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_encryption" id="mail_encryption" class="form-control" placeholder="{{__('labels.mail_encryption')}}" value="{{!empty($settings['app.mail_encryption'])? $settings['app.mail_encryption'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_from_address')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_from_address" id="mail_from_address" class="form-control" placeholder="{{__('labels.mail_from_address')}}" value="{{!empty($settings['app.mail_from_address'])? $settings['app.mail_from_address'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.mail_from_name')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mail_from_name" id="mail_from_name" class="form-control" placeholder="{{__('labels.mail_from_name')}}" value="{{!empty($settings['app.mail_from_name'])? $settings['app.mail_from_name'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group text-end">
                                                    <button type="button" class="btn btn-primary" id="mailSettingSubmitBtn">{{__('labels.save')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {!! JsValidator::formRequest('App\Http\Requests\Backend\SaveMailSettingRequest','#mailSettingForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
                                </div>
                            @endcan

                            @can('admin.setting.stripe')
                                <div class="tab-pane {{ $activeTab == 'stripe-settings' ? 'active' : ''}}" id="stripe-settings">
                                    <form id="stripeSettingForm" action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.stripe_key')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="stripe_key" id="stripe_key" class="form-control" placeholder="{{__('labels.stripe_key')}}" value="{{!empty($settings['app.stripe_key'])? $settings['app.stripe_key'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.stripe_secret')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="stripe_secret" id="stripe_secret" class="form-control" placeholder="{{__('labels.stripe_secret')}}" value="{{!empty($settings['app.stripe_secret'])? $settings['app.stripe_secret'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{__('labels.stripe_web_hook')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="stripe_web_hook" id="stripe_web_hook" class="form-control" placeholder="{{__('labels.stripe_web_hook')}}" value="{{!empty($settings['app.stripe_web_hook'])? $settings['app.stripe_web_hook'] : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group text-end">
                                                    <button type="button" class="btn btn-primary" id="stripeSettingSubmitBtn">{{__('labels.save')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {!! JsValidator::formRequest('App\Http\Requests\Backend\SettingRequest','#stripeSettingForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
                                </div>
                            @endcan

                            @can('admin.setting.social')
                                <div class="tab-pane {{ $activeTab == 'social-settings' ? 'active' : ''}}" id="social-settings">
                                    <form id="socialSettingForm" action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">{{__('labels.google_login_cred')}}</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3 mt-1 mb-3">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.google_client_id')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="google_client_id" id="google_client_id" class="form-control" placeholder="{{__('labels.google_client_id')}}" value="{{!empty($settings['app.google_client_id'])? $settings['app.google_client_id'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.google_client_secret')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="google_client_secret" id="google_client_secret" class="form-control" placeholder="{{__('labels.google_client_secret')}}" value="{{!empty($settings['app.google_client_secret'])? $settings['app.google_client_secret'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-header">
                                                <h6 class="card-title">{{__('labels.facebook_login_cred')}}</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3 mt-1 mb-3">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.facebook_client_id')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="facebook_client_id" id="facebook_client_id" class="form-control" placeholder="{{__('labels.facebook_client_id')}}" value="{{!empty($settings['app.facebook_client_id'])? $settings['app.facebook_client_id'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.facebook_client_secret')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="facebook_client_secret" id="facebook_client_secret" class="form-control" placeholder="{{__('labels.facebook_client_secret')}}" value="{{!empty($settings['app.facebook_client_secret'])? $settings['app.facebook_client_secret'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-header">
                                                <h6 class="card-title">{{__('labels.apple_login_cred')}}</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3 mt-1 mb-3">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.apple_client_id')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="apple_client_id" id="apple_client_id" class="form-control" placeholder="{{__('labels.apple_client_id')}}" value="{{!empty($settings['app.apple_client_id'])? $settings['app.apple_client_id'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.apple_client_secret')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="apple_client_secret" id="apple_client_secret" class="form-control" placeholder="{{__('labels.apple_client_secret')}}" value="{{!empty($settings['app.apple_client_secret'])? $settings['app.apple_client_secret'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.apple_team_id')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="apple_team_id" id="apple_team_id" class="form-control" placeholder="{{__('labels.apple_team_id')}}" value="{{!empty($settings['app.apple_team_id'])? $settings['app.apple_team_id'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{__('labels.apple_key_id')}}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="apple_key_id" id="apple_key_id" class="form-control" placeholder="{{__('labels.apple_key_id')}}" value="{{!empty($settings['app.apple_key_id'])? $settings['app.apple_key_id'] : ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-2">
                                            <div class="form-group text-end">
                                                <button type="button" class="btn btn-primary" id="socialSettingSubmitBtn">{{__('labels.save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    {!! JsValidator::formRequest('App\Http\Requests\Backend\SettingRequest','#socialSettingForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@include('backend.image-cropper-modal')

@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/cropper/image-cropper.js')) !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/setting/index.js')) !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/google2fa/index.js')) !!}
@endpush
