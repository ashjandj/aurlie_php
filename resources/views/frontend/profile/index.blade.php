@extends('layouts.frontend.app')
@section('title', __('labels.my_profile'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ __('labels.my_profile') }}</h1>
    <div class="content"></div>
</div>
<div class="signupform" style="max-width: 500px;margin: 0 auto;">
    <form id="updateProfileForm" action="{{route('frontend.profile.update', customEncrypt($user->id))}}" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <input type="hidden" name="id" value="{{ customEncrypt($user->id) }}" />
        <div class="col-md-12">
                    <div class="form-group">
                        <div class="uploadPhoto position-relative mx-auto">
                            <div class="img-box rounded-circle overflow-hidden w-100 h-100 imgBox">
                                <img src="{{ !empty($user) ? (getOriginalProfileImage($user->id) ? getOriginalProfileImage($user->id) : asset_path('assets/images/backend/default-user.jpg')) : asset_path('assets/images/backend/default-user.jpg') }}" alt="user-img" class="rounded-circle border" id="editImagePreviewDiv">
                            </div>
                            <label
                                class="mb-0 d-flex align-items-center justify-content-center position-absolute rounded-circle overflow-hidden imgBox" for="uploadImage">
                                <button type="button" class="btn btn-primary" id="mediaManagerBtn" data-id="{{getLoggedInUserDetail()->id}}" data-type="profile_image"><em class="icon ni ni-camera-fill"></em></button>
                            </label>
                            <input type="hidden" name="image" id="editUploadedImage" value="">
                        </div>
                    </div>
                </div>
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
                    value="{{$user->name}}"
                >

                <span id="name-error" class="help-block error-help-block text-danger">
                </span>
            </div>
        </div>

        {{-- Phone Number  --}}
        <div class="mb-3">
            <label for="phone_number" class="form-label">{{ __('labels.phone_number') }} <span class="text-danger"><small>*</small></span></label>
            <div class="row d-flex">
                <div class="col-md-3">
                    <select class="form-select js-select2 select-country" data-placeholder="" name="phone_code" id="countries" autocomplete="off">
                        @if (isset($countries) && !empty($countries))
                            @foreach ($countries as $country)
                                <option @selected(!empty($user) && $user->country_code == $country->code) value="{{ $country->phone_code }}"
                                    data-flag="{{ $country->flag_image_url }}"
                                    data-code="{{ $country->code }}"
                                    title="{{ $country->name }}">
                                    {{ $country->phone_code }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="country_code" id="country_code" value="{{$user->country_code}}">
                    <input 
                        type="tel" 
                        class="form-control" 
                        id="phone_number" 
                        name="phone_number"
                        placeholder="{{ __('labels.enter_contact_number') }}" 
                        aria-describedby="phone_number-error"
                        value="{{$user->phone_number}}"
                    >
                </div>
            </div>

            <span id="phone_number-error" class="help-block error-help-block text-danger">
            </span>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="country" class="form-label">{{ __('labels.country') }} <span class="text-danger"><small>*</small></span></label>

                <select class="form-select js-select2 form-select2"
                    data-placeholder="{{ __('labels.select_country') }}" name="country_id" id="country_id" aria-describedby="country_id-error" autocomplete="off">
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

                <span id="country_id-error" class="help-block error-help-block text-danger">
                </span>
            </div>

            <div class="col-md-4">
                <label for="state" class="form-label">{{ __('labels.state') }} <span class="text-danger"><small>*</small></span></label>
                <select class="form-select js-select2 form-select2"
                    data-placeholder="{{ __('labels.select_state') }}" name="state_id" id="state_id" aria-describedby="state_id-error" autocomplete="off">
                    <option></option>
                    @if (!empty($states))
                        @foreach ($states as $state)
                            <option 
                            value="{{$state->id}}"
                            @selected($state->id == $user->state_id)
                            >
                            {{$state->name}}
                        </option>
                        @endforeach
                    @endif
                </select>

                <span id="state_id-error" class="help-block error-help-block text-danger">
                </span>
            </div>

            <div class="col-md-4">
                <label for="city" class="form-label">{{ __('labels.city') }} <span class="text-danger"><small>*</small></span></label>
                <select class="form-select js-select2 form-select2"
                    data-placeholder="{{ __('labels.select_city') }}" name="city_id" id="city_id" aria-describedby="city_id-error" autocomplete="off">
                    <option></option>
                    @if (!empty($cities))
                        @foreach ($cities as $city)
                            <option 
                            value="{{$city->id}}"
                            @selected($city->id == $user->city_id)
                            >
                            {{$city->name}}
                        </option>
                        @endforeach
                    @endif
                </select>

                <span id="city_id-error" class="help-block error-help-block text-danger">
                </span>
            </div>

        </div>

        <button type="button" id="profileBtn" class="btn btn-primary">{{ __('labels.update_profile') }}</button>
    </form>
</div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/profile/index.js')) !!}

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\UpdateProfileRequest', '#updateProfileForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush