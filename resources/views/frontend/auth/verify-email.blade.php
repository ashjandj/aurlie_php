@extends('layouts.frontend.app')
@section('title', __('labels.verify_email'))
@section('content')
<!-- Aurelia signup thank-you / verification section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Thank you for signing up for Aurelia</h1>
    <div class="content mt-3 text-left" style="max-width: 720px; margin: 0 auto;">
        <p>Thank you for signing up for Aurelia – we’re genuinely excited to have you here.</p>
        <p class="mt-3">
            You’re now on the waitlist for joining the Aurelia Club, and we’re really looking forward to seeing you
            inside the community.
        </p>
        <p class="mt-3">
            You’ll receive an email with your membership status within the next 3 working days. If your membership is
            approved, that email will walk you through:
        </p>
        <p class="mt-2">
            The payment window, and your psychometric assessment (The Aurelia Compass) – a core part of how Aurelia
            understands you and helps you find deeper, more meaningful connections.
        </p>
        <p class="mt-3">
            Thank you for trusting us with this journey. We can’t wait to get to know you better.
        </p>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <p class="card-text text-center">{{ __('labels.verification_message') }}</p>
                <div class="text-center">
                    <form action="{{ route('verification.send') }}" method="POST" id="resendVerificationForm">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}" id="tempToken">
                        <button type="submit" class="btn btn-primary"
                            id="resendVerificationLinkBtn">{{ __('labels.resend_verification') }}</button>

                        <p id="timerDisplay" class="mt-2 text-danger"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/verify-email.js')) !!}
@endpush