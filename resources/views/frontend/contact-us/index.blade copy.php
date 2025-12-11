@extends('layouts.frontend.app')
@section('title', __('labels.contact_us'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <h1 class="display-5">{{__('labels.contact_us')}}</h1>
    <div class="contact card">
        <div class="card-body p-2">
            <form id="contactUsForm" action="{{ route('users.saveContactUs') }}" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        @if(! auth()->user() )
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="name">{{ __('labels.name')}}</label>
                            </div>
                            <div class="form-control-wrap">
                                <input type="text" name="name" id="name" class="form-control" value="{{ getLoggedInUserDetail()->name ?? ''}}" placeholder="{{__('labels.enter_name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email">{{ __('labels.email')}}</label>
                            </div>
                            <div class="form-control-wrap">
                                <input type="email" id="email" name="email" class="form-control" value="{{ getLoggedInUserDetail()->email ?? '' }}" placeholder="{{__('labels.enter_email')}}" >
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="message">{{ __('labels.message')}}</label>
                            </div>
                            <div class="form-control-wrap">
                                <textarea name="message" id="message" class="form-control" cols="30" rows="5" placeholder="{{__('labels.enter_message')}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="saveBtn" class="btn btn-primary width-120 ripple-effect">{{__('labels.send')}}</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactUsRequest','#contactUsForm')!!}
{!! returnScriptWithNonce(asset_path('assets/js/frontend/contact-us/index.js')) !!}
@endpush