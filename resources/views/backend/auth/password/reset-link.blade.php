@extends('layouts.backend.app')
@section('title',__('labels.forgot_password'))
@section('content')

    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="#" class="logo-link">
                                <x-logo logoClass="logo-img-lg"></x-logo>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title ">{{__('labels.forgot_password')}}</h5>
                                        <div class="nk-block-des ">
                                            <p>{{__('message.if_forgot_pass')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.forgotPassword') }}" id="submitFrom" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">{{__('labels.email')}}</label>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg" id="default-01" placeholder="{{__('labels.enter_email')}}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" id="resetLinkBtn" class="btn btn-lg btn-primary btn-block">{{__('labels.send_link')}}</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4">
                                    <a href="{{route('admin.login')}}"><strong>{{__('message.return_login')}}</strong></a>
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
</div>
@endsection
<!-- app-root @e -->
<!-- JavaScript -->
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\VerifyEmailRequest','#submitFrom') !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/auth/reset-password.js')) !!}
@endpush

