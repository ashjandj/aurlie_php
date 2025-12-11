@extends('layouts.backend.app')
@section('title',__('labels.my_profile'))
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="card {{getClassValue('cardBorder')}}">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between flex-wrap flex-sm-nowrap">
                                    <div class="nk-block-between w-100">
                                        <div class="nk-block-head-content mb-2 mb-sm-0">
                                            <h4 class="nk-block-title">{{__('labels.profile')}}</h4>
                                            <div class="nk-block-des">
                                                <p>{{__('message.basic_info')}}</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-center align-self-sm-start d-lg-none ms-auto">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-center align-self-sm-start ms-0 ms-sm-2">
                                        <a href="#" class="btn-primary btn" data-bs-toggle="modal" data-bs-target="#profile-edit"><em class="icon ni ni-edit"></em><span>{{__('labels.update_profile')}}</span></a>
                                    </div>
                                    
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">{{__('labels.basics')}}</h6>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">{{__('labels.name')}}</span>
                                            <span
                                                class="data-value">{{$userData->name ?? __('labels.not_add_yet')}}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">{{__('labels.email')}}</span>
                                            <span
                                                class="data-value">{{$userData->email ?? __('labels.not_add_yet')}}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                        <span class="data-label">{{__('labels.phone_number')}}</span>
                                            <span
                                                class="data-value text-soft">{{ $userData->phone_number ? '+' . $userData->phone_code . ' ' . $userData->phone_number : __('labels.not_add_yet') }}</span>
                                        </div>
                                    </div>

                                </div><!-- data-list -->
                            </div><!-- .nk-block -->
                        </div>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                            data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div class="user-avatar overflow-hidden imgBox">
                                            <img src="{{ getProfileImageUrl(getLoggedInUserDetail()->id) ?? asset_path('assets/images/backend/default-user.jpg') }}"
                                                id="currentProfileImage" class="w-100 h-100 object-fit-cover rounded-0" alt="admin-profile">
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{$userData->name ?? ''}}</span>
                                            <span class="sub-text">{{$userData->email ?? ''}}</span>
                                        </div>
                                        <!-- <div class="user-action">
                                            <div class="dropdown">
                                                <a class="btn btn-icon btn-trigger mr-n2" data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-more-v"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                                <em class="icon ni ni-edit-fill"></em>
                                                                <span>{{__('labels.update_profile')}}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div><!-- .user-card -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <ul class="link-list-menu">
                                        <li><a class="active" ><em
                                                    class="icon ni ni-user-fill-c"></em><span>{{__('labels.profile')}}</span></a>
                                        </li>
                                    </ul>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- card-aside -->
                    </div><!-- .card-aside-wrap -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>


<!-- Update Profile -->
<div class="modal fade zoom" tabindex="-1" id="profile-edit" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <a class="close custom-close1" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">{{__('labels.update_profile')}}</h5>
            </div>
            <div class="modal-body">
                <form id="updateProfileForm" method="POST" action="{{route('admin.update-profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="uploadPhoto position-relative mx-auto">
                                    <div class="img-box rounded-circle overflow-hidden w-100 h-100 imgBox">
                                        <img src="{{ getProfileImageUrl(getLoggedInUserDetail()->id) ?? asset_path('assets/images/backend/default-user.jpg') }}" alt="user-img" class="rounded-circle border" id="editImagePreviewDiv">
                                    </div>
                                    <label
                                        class="mb-0 d-flex align-items-center justify-content-center position-absolute rounded-circle overflow-hidden imgBox" for="uploadImage">
                                        <button type="button" class="btn btn-primary" id="mediaManagerBtn" data-id="{{$userData->id}}" data-type="profile_image"><em class="icon ni ni-camera-fill"></em></button>
                                    </label>
                                    <input type="hidden" name="image" id="editUploadedImage" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">{{__('labels.full_name')}}</label>
                                <input type="text" class="form-control" name="name" id="full-name" placeholder="{{__('labels.enter_name')}}"
                                    value="{{$userData->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="user-email">{{__('labels.email')}}</label>
                                <input type="text" class="form-control" name="email" id="user-email" placeholder="{{__('labels.enter_email')}}"
                                    value="{{$userData->email}}">
                            </div>
                        </div>
                        {{-- Country code dropdown removed as it's no longer required
                        <div class="col-md-3">
                            <select class="form-select js-select2 select-country" data-placeholder="" name="phone_code" id="countries" autocomplete="off">
                                @if (isset($countries) && !empty($countries))
                                    @foreach ($countries as $country)
                                        <option 
                                            @selected($userData->country_code == $country->code)
                                            value="{{ $country->phone_code }}"
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
                        --}}
                        <div class="col-md-12">
                            <input type="tel" class="form-control" id="phone-number" name="phone_number"
                            placeholder="{{ __('labels.enter_contact_number') }}" aria-describedby="phone_number-error"
                            value="{{$userData->phone_number}}">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-end">
                                <button type="button" id="updateProfileBtn" class="btn btn-primary me-1">{{__('labels.update')}}</button>
                                <button type="button" data-bs-dismiss="modal" class="btn btn-light resetForm">{{__('labels.cancel')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('backend.image-cropper-modal')
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\UpdateProfileRequest','#updateProfileForm') !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/cropper/image-cropper.js')) !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/profile/index.js')) !!}
@endpush
