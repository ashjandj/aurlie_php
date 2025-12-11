@extends('layouts.backend.app')
@section('title', __('labels.googleTwoFactor.varify_page_title'))
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
                        <h4 class="nk-block-title">{{__('labels.googleTwoFactor.two_factor_authentication')}}</h4>
                        <div class="nk-block-des">
                            <p>{{__('labels.googleTwoFactor.varify_page_content')}}</p>
                            {{__('labels.googleTwoFactor.enter_pin_text')}}<br/><br/>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.post.2faVerify') }}" method="post" id="2faVerify-form" onsubmit="return false;">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="one_time_password">{{__('labels.googleTwoFactor.one_time_password')}}</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg noSpaceAllow onlyNumbers" id="one_time_password" name="one_time_password" placeholder="{{__('labels.googleTwoFactor.one_time_password')}}" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="2faVerifyBtn" class="btn btn-lg btn-primary btn-block">{{__('labels.googleTwoFactor.authenticate')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\Check2faVerifyRequest','#2faVerify-form') !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/google2fa/index.js')) !!}
@endpush
