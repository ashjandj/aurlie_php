@extends('layouts.backend.app')
@section('title',__('labels.reset_password'))
@section('content')


    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="#" class="logo-link">
                                <x-logo logoClass="logo-img-lg"></x-logo>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">

                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title ">{{__('labels.reset_password')}}</h5>
                                        <div class="nk-block-des ">
                                            <p>{{__('labels.enter_your_password')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.reset.password.post') }}" id="add-form" method="POST">
                                @csrf

                                <input type="hidden" name="email" value="{{ $email }}" id="email" >
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="otp">{{__('labels.otp')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" name="otp" id="otp" placeholder="OTP">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">{{__('labels.new_password')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="New Password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="confirm-password">{{__('labels.confirm_new_password')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a class="form-icon form-icon-right passcode-switch lg" data-target="confirm-password">
                                                <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="confirm_password" id="confirm-password" placeholder="Confirm New Password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="resetBtn" class="btn btn-lg btn-primary btn-block">{{__('labels.reset')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\OtpResetPasswordRequest','#add-form') !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/auth/reset-password.js')) !!}
@endpush
