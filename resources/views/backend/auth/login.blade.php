@extends('layouts.backend.app')
@section('title',__('labels.login'))
@section('content')
<div class="nk-content ">
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="{{route('frontend.home')}}" class="logo-link">
                <x-logo logoClass="logo-img-lg"></x-logo>
            </a>
        </div>
        <div class="card">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">{{__('labels.login')}}</h4>
                        <div class="nk-block-des">
                            <p>{{__('message.access_admin')}}</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.login.submit')}}" method="post" id="admin-login-form" onsubmit="return false;">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="email">{{__('labels.email')}}</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="{{__('labels.enter_email')}}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">{{__('labels.password')}}</label>
                            <a class="link link-primary link-sm" href="{{route('admin.forgot-password')}}">{{__('labels.forgot_password')}}</a>
                        </div>
                        <div class="form-control-wrap">
                            <a  class="form-icon form-icon-right passcode-switch lg"
                                data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="{{__('labels.enter_password')}}" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-control-sm custom-checkbox">
                            <input type="checkbox" name="remember" id="remember" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="remember">{{__('labels.stay_logged_in')}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="signInBtn" class="btn btn-lg btn-primary btn-block">{{__('labels.login')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\LoginRequest','#admin-login-form') !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/auth/login.js')) !!}
@endpush
