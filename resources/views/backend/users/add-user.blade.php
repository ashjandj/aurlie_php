<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <a class="close custom-close" data-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
            <h5 class="modal-title">
                {{ __('labels.add_user') }}</h5>
        </div>
        <div class="modal-body">
            <form id="saveForm"
                action="{{ route('admin.users.store') }}"
                method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="POST">
                <input type="hidden" name="id" value="" />
                <input type="hidden" name="user_type" value="" />

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="uploadPhoto position-relative mx-auto">
                                <div class="img-box rounded-circle overflow-hidden w-100 h-100 imgBox">
                                    <img src="{{ asset_path('assets/images/backend/default-user.jpg') }}"
                                        alt="user-img" class="rounded-circle border" id="addImagePreviewDiv">
                                </div>
                                <label
                                    class="mb-0 d-flex align-items-center justify-content-center position-absolute rounded-circle overflow-hidden imgBox"
                                    for="uploadImage">
                                    <button type="button" class="btn btn-primary" id="mediaManagerBtn"
                                        data-id="{{ getLoggedInUserDetail()->id }}" data-type="profile_image"><em
                                            class="icon ni ni-camera-fill"></em></button>
                                </label>
                                <input type="hidden" name="image" id="addUploadedImage" value="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 form-group">
                        <label class="form-label">{{ __('labels.user_name') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control"
                                placeholder="{{ __('labels.enter_user_name') }}"
                                value="" aria-describedby="name-error">

                            <span id="name-error" class="help-block error-help-block">
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">{{ __('labels.email') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="form-control-wrap">
                            <input type="text" name="email" class="form-control"
                                placeholder="{{ __('labels.enter_user_email') }}"
                                value="" aria-describedby="email-error">

                            <span id="email-error" class="help-block error-help-block">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="form-label-group">
                            <label class="form-label">
                                {{ __('labels.password') }}
                                <span class="text-danger"><small>*</small></span>
                            </label>
                        </div>

                        <div class="form-control-wrap">
                            <a class="form-icon form-icon-right passcode-switch cursor-pointer">
                                <em class="icon ni ni-eye-fill" data-target="password"></em>
                            </a>

                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="{{ __('labels.enter_user_password') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">{{ __('labels.user_role') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2-add form-select2"
                                data-placeholder="{{ __('labels.select_user_role') }}" name="user_role"
                                aria-describedby="user_role-error">
                                <option></option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>

                            <span id="user_role-error" class="help-block error-help-block">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 form-group countryCode">
                        <label class="form-label">{{ __('labels.phone_number') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="d-flex">
                            {{-- Country code dropdown removed as it's no longer required
                            <select class="form-select js-select2-add form-select2 select-country" data-placeholder="" name="phone_code"
                                id="countries">
                                @if (isset($countries) && !empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->phone_code }}"
                                            data-code="{{ $country->code }}"
                                            data-flag="{{ $country->flag_image_url }}" title="{{ $country->name }}">
                                            {{ $country->phone_code }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <input type="hidden" id="country_code" name="country_code" value="">
                            --}}
                            <input type="text" class="form-control shadow-none"
                                placeholder="{{ __('labels.enter_contact_number') }}" name="phone_number"
                                value=""
                                aria-describedby="phone_number-error">
                        </div>
                        <span id="phone_number-error" class="help-block error-help-block"></span>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">{{ __('labels.country') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2-add form-select2"
                                data-placeholder="{{ __('labels.select_country') }}" name="country_id"
                                id="countryId" aria-describedby="country_id-error">
                                <option></option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ ucfirst($country->name) }}
                                    </option>
                                @endforeach
                            </select>

                            <span id="country_id-error" class="help-block error-help-block"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label">{{ __('labels.state') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2-add form-select2"
                                data-placeholder="{{ __('labels.select_state') }}" name="state_id" id="stateId"
                                aria-describedby="state_id-error">
                                <option></option>
                                @if (!empty($states))
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                            <span id="state_id-error" class="help-block error-help-block"></span>
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">{{ __('labels.city') }} <span
                                class="text-danger"><small>*</small></span> </label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2-add form-select2"
                                data-placeholder="{{ __('labels.select_city') }}" name="city_id" id="cityId"
                                aria-describedby="city_id-error">
                                <option></option>
                                @if (!empty($cities))
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                            <span id="city_id-error" class="help-block error-help-block"></span>
                        </div>
                    </div>
                </div><br>

                <div class="form-group text-end">
                    <button type="button" class="btn btn-primary me-1"
                        id="saveBtn">{{ __('labels.add') }}</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light custom-close"
                        id="saveCancelBtn">{{ __('labels.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{!! returnScriptWithNonce(asset_path('assets/js/media-manager.js')) !!}
{!! JsValidator::formRequest('App\Http\Requests\Backend\StoreUserRequest', '#saveForm')->ignore(
    "input:hidden:not(input:hidden.required), [contenteditable='true']",
) !!}
