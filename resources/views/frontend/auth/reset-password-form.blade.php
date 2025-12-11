@extends('layouts.frontend.app')
@section('title', __('labels.reset_password'))
@section('content')
<!-- Header Section -->
<section class="py-12 md:py-16 bg-white border-b border-border">
    <div class="container max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">
            {{ __('labels.reset_password') }}
        </h1>
        <p class="text-foreground/70">
            {{ __('labels.use_below_link') ?? 'Create a new password to regain access to your account.' }}
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
                    {{ __('labels.reset_password') }}
                </h2>
                <p class="text-sm text-foreground/70 mb-6">
                    Choose a strong password you haven’t used before on Aurelia.
                </p>

                <form
                    action="{{ route('user.reset-password.put') }}"
                    id="resetPasswordForm"
                    method="POST"
                    class="space-y-6"
                >
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}" id="email">

                    <!-- New Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label
                                class="block text-sm font-medium text-foreground"
                                for="password"
                            >
                                {{ __('labels.new_password') }}
                            </label>
                        </div>
                        <div class="relative">
                            <input
                                type="password"
                                class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent pr-10"
                                name="password"
                                id="password"
                                placeholder="{{ __('labels.new_password') }}"
                                aria-describedby="password-error"
                                autocomplete="off"
                            >
                            <button
                                type="button"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-foreground/60 hover:text-foreground text-xs uppercase tracking-wide passcode-switch"
                                data-target="password"
                            >
                                Show
                            </button>
                        </div>
                        <span
                            id="password-error"
                            class="mt-1 text-sm text-red-500 block"
                        ></span>
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label
                                class="block text-sm font-medium text-foreground"
                                for="confirm_password"
                            >
                                {{ __('labels.confirm_new_password') }}
                            </label>
                        </div>
                        <div class="relative">
                            <input
                                type="password"
                                class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent pr-10"
                                name="confirm_password"
                                id="confirm_password"
                                placeholder="{{ __('labels.confirm_new_password') }}"
                                aria-describedby="confirm_password-error"
                                autocomplete="off"
                            >
                            <button
                                type="button"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-foreground/60 hover:text-foreground text-xs uppercase tracking-wide passcode-switch"
                                data-target="confirm_password"
                            >
                                Show
                            </button>
                        </div>
                        <span
                            id="confirm_password-error"
                            class="mt-1 text-sm text-red-500 block"
                        ></span>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4 mt-4">
                        <button
                            type="button"
                            id="resetPasswordBtn"
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

    <script>
        (function () {
            $(document).on('click', '.passcode-switch', function () {
                var targetId = $(this).data('target');
                if (!targetId) {
                    return;
                }

                var $input = $('#' + targetId);
                if (!$input.length) {
                    return;
                }

                var currentType = $input.attr('type');
                var isPassword = currentType === 'password';
                $input.attr('type', isPassword ? 'text' : 'password');

                // Toggle button text between Show and Hide
                $(this).text(isPassword ? 'Hide' : 'Show');
            });
        })();
    </script>

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\ResetPasswordRequest', '#resetPasswordForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush