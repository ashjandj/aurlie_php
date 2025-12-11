@extends('layouts.frontend.app')
@section('title', __('labels.sign_up_btn'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.sign_up_btn') }}</h1>
    <div class="content"></div>
</div>
<div class="signupform" style="max-width: 500px;margin: 0 auto;">
    <form id="signUpForm" action="{{route('front.auth.signup.store')}}" method="POST" autocomplete="off">
        <div class="row mb-3">
            {{-- Full Name  --}}
            <div class="col-md-12">
                <label for="name" class="form-label">{{ __('labels.name') }} <span class="text-danger"><small>*</small></span></label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"
                    class="form-control" 
                    placeholder="{{ __('labels.enter_name') }}" 
                    aria-describedby="name-error"
                    autocomplete="off"
                    value=""
                >

                <span id="name-error" class="help-block error-help-block text-danger">
                </span>
            </div>
        </div>

        {{-- Email  --}}
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('labels.email') }} <span class="text-danger"><small>*</small></span></label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control" 
                aria-describedby="email-error"
                autocomplete="off"
                value=""
                placeholder="{{ __('labels.enter_email') }}"
            >

            <span id="email-error" class="help-block error-help-block text-danger">
            </span>
        </div>

        {{-- Phone Number  --}}
        <div class="mb-3">
            <label for="phone_number" class="form-label">{{ __('labels.phone_number') }} <span class="text-danger"><small>*</small></span></label>
            <div class="row d-flex">
                <div class="col-md-3">
                    <select class="form-select js-select2 select-country" data-placeholder="" name="phone_code" id="countries" autocomplete="off">
                        @if (isset($countries) && !empty($countries))
                            @foreach ($countries as $country)
                                <option value="{{ $country->phone_code }}"
                                    data-flag="{{ $country->flag_image_url }}"
                                    data-code="{{ $country->code }}"
                                    title="{{ $country->name }}">
                                    {{ $country->phone_code }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="country_code" id="country_code" value="">
                    <input type="tel" class="form-control" id="phone_number" name="phone_number"
                    placeholder="{{ __('labels.enter_contact_number') }}" aria-describedby="phone_number-error">
                </div>
            </div>

            <span id="phone_number-error" class="help-block error-help-block text-danger">
            </span>
        </div>

        <div class="mb-3">
            <div class="form-label-group">
                <label for="password" class="form-label">
                    {{ __('labels.password') }} 
                    <span class="text-danger"><small>*</small></span>
                    <em 
                        class="icon ni ni-question" 
                        data-toggle="tooltip"
                        title="{{__('message.error.password.invalid_format')}}"
                    ></em>
                </label>
            </div>

            <div class="form-control-wrap">
                <a  class="form-icon form-icon-right passcode-switch cursor-pointer">
                    <em class="icon ni ni-eye-fill" data-target="password"></em>
                </a>

                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    class="form-control" 
                    placeholder="{{ __('labels.enter_password') }}" aria-describedby="password-error"
                    autocomplete="off"
                    value=""
                >
            </div>

            <span id="password-error" class="help-block error-help-block text-danger">
            </span>
        </div>

        <div class="mb-3">
            <div class="form-label-group">
                <label for="confirm_password" class="form-label">
                    {{ __('labels.confirm_password') }} 
                    <span class="text-danger"><small>*</small></span>
                </label>
            </div>

            <div class="form-control-wrap">
                <a  class="form-icon form-icon-right passcode-switch cursor-pointer">
                        <em class="icon ni ni-eye-fill" data-target="confirm_password"></em>
                </a>

                <input 
                    type="password" 
                    class="form-control" 
                    id="confirm_password" 
                    name="confirm_password"
                    placeholder="{{ __('labels.enter_confirm_password') }}" aria-describedby="confirm_password-error"
                    autocomplete="off"
                    value=""
                >
            </div>

            <span id="confirm_password-error" class="help-block error-help-block text-danger">
            </span>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="country" class="form-label">{{ __('labels.country') }} <span class="text-danger"><small>*</small></span></label>

                <select class="form-select js-select2 form-select2"
                    data-placeholder="{{ __('labels.select_country') }}" name="country" id="country" aria-describedby="country-error" autocomplete="off">
                    <option></option>
                    @foreach ($countries as $country)
                        <option 
                        value="{{ $country->id }}"
                        @selected(!empty($user) && $user->country_id == $country->id)
                        >
                        {{ ucfirst($country->name) }}
                    </option>
                    @endforeach
                </select>

                <span id="country-error" class="help-block error-help-block text-danger">
                </span>
            </div>

            <div class="col-md-4">
                <label for="state" class="form-label">{{ __('labels.state') }} <span class="text-danger"><small>*</small></span></label>
                <select class="form-select js-select2 form-select2"
                    data-placeholder="{{ __('labels.select_state') }}" name="state" id="state" aria-describedby="state-error" autocomplete="off">
                    <option></option>
                </select>

                <span id="state-error" class="help-block error-help-block text-danger">
                </span>
            </div>

            <div class="col-md-4">
                <label for="city" class="form-label">{{ __('labels.city') }} <span class="text-danger"><small>*</small></span></label>
                <select class="form-select js-select2 form-select2"
                    data-placeholder="{{ __('labels.select_city') }}" name="city" id="city" aria-describedby="city-error" autocomplete="off">
                    <option></option>
                </select>

                <span id="city-error" class="help-block error-help-block text-danger">
                </span>
            </div>

        </div>

        <button type="submit" id="signupBtn" class="btn btn-primary">{{ __('labels.sign_up_btn') }}</button>
        <div class="text-center small">
            {{__('labels.already_have_account')}} 
            <a href="{{route('frontend.auth.login.get')}}">{{__('labels.login')}}</a>
        </div>
    </form>
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">{{ __('labels.signup_with') }}</label>
        <div class="col-md-6">
            <!-- <a href="{{ route('frontend.auth.social', $social = 'facebook') }}" class="fb btn"><i class="fa fa-facebook"></i></a> -->
            <a href="{{ route('frontend.auth.social', $social = 'google') }}" class="fb btn"><i class="fa fa-google"></i></a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/signup.js')) !!}

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\SignUpRequest', '#signUpForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush