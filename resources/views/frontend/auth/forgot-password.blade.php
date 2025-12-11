@extends('layouts.frontend.app')
@section('title', __('labels.forgot_password'))
@section('content')
<!-- Header Section -->
<section class="py-12 md:py-16 bg-white border-b border-border">
    <div class="container max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">
            {{ __('labels.forgot_password') }}
        </h1>
        <p class="text-foreground/70">
            {{ __('labels.reset_link_message') ?? 'Enter your email address and we’ll send you a link to reset your password.' }}
        </p>
    </div>
</section>

<!-- Form Section -->
<section class="py-12 md:py-16 bg-gradient-to-br from-white via-white to-accent/5 flex-grow">
    <div class="container max-w-3xl">
        <div
            data-slot="card"
            class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 max-w-md mx-auto"
        >
            <div data-slot="card-content" class="px-6 pt-6 pb-2">
                <h2 class="text-xl font-semibold text-foreground mb-2">
                    {{ __('labels.forgot_password') }}
                </h2>
                <p class="text-sm text-foreground/70 mb-6">
                    Enter the email address associated with your account and we’ll email you a secure link to reset your password.
                </p>

                <form
                    id="forgotPasswordForm"
                    action="{{ route('frontend.password.reset.submit') }}"
                    method="POST"
                    class="space-y-6"
                >
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-foreground mb-2">
                            {{ __('labels.email') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="{{ __('labels.enter_email') }}"
                            class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                            aria-describedby="email-error"
                        >
                        <span
                            id="email-error"
                            class="mt-1 text-sm text-red-500 block"
                        ></span>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4 mt-4">
                        <button
                            type="submit"
                            id="forgotPasswordBtn"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 h-10 px-6 bg-accent hover:bg-accent/90 text-white w-full"
                        >
                            {{ __('labels.reset') }}
                        </button>
                    </div>

                    <!-- Back to Login -->
                    <div class="text-center text-sm text-foreground/70 pt-4 border-t border-border/60 mt-4">
                        {{ __('labels.back_login') }}
                        <a
                            href="{{ route('frontend.auth.login.get') }}"
                            class="font-medium text-accent hover:underline"
                        >
                            {{ __('labels.login') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/forgot-password.js')) !!}

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\ForgotPasswordRequest', '#forgotPasswordForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush