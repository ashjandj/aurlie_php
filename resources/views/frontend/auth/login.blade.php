@extends('layouts.frontend.app')
@section('title', __('labels.login'))
@section('content')
<script src="https://accounts.google.com/gsi/client" async defer></script>
<style>
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--border, #e5e5e5);
        }
        .divider span {
            padding: 0 1rem;
            color: var(--foreground/60, #666);
            font-size: 0.875rem;
        }
        .google-signin-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border, #e5e5e5);
            border-radius: 0.5rem;
            background: white;
            color: var(--foreground, #333);
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .google-signin-button:hover {
            background: var(--background-gray-main, #f8f8f7);
            border-color: var(--accent, #007bff);
        }
        .google-signin-button svg {
            width: 18px;
            height: 18px;
        }
        .forgot-password {
            text-align: right;
            margin-top: 0.5rem;
        }
        .forgot-password a {
            color: var(--accent, #007bff);
            text-decoration: none;
            font-size: 0.875rem;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border, #e5e5e5);
        }
        .signup-link p {
            color: var(--foreground/70, #666);
            font-size: 0.875rem;
        }
        .signup-link a {
            color: var(--accent, #007bff);
            text-decoration: none;
            font-weight: 500;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
<!-- Header Section -->
<section class="py-12 md:py-16 bg-white border-b border-border">
    <div class="container max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">Welcome Back</h1>
        <p class="text-foreground/70">Sign in to your Aurelia Club account to continue your journey.</p>
    </div>
</section>

<!-- Form Section -->
<section class="py-12 md:py-16 bg-gradient-to-br from-white via-white to-accent/5 flex-grow">
    <div class="container max-w-3xl">
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 max-w-md mx-auto">
            <div data-slot="card-content" class="px-6 pt-6">
                @if (session('success'))
                    <div
                        class="mb-4 rounded-md px-4 py-3 text-sm"
                        style="background-color:#dcfce7;border:1px solid #16a34a;color:#166534;"
                    >
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Google Sign In Button -->
                <div id="g_id_onload"
                    data-client_id="YOUR_GOOGLE_CLIENT_ID"
                    data-callback="handleGoogleSignIn"
                    data-auto_prompt="false">
                </div>
                <div class="g_id_signin" 
                    data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="signin_with"
                    data-shape="rectangular"
                    data-logo_alignment="left">
                </div>

                <!-- Divider -->
                <div class="divider">
                    <span>OR</span>
                </div>

                <!-- Login Form -->
                <form id="loginForm"
                      method="POST"
                      action="{{ route('frontend.auth.login.post') }}"
                      class="space-y-6">
                    @csrf
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required placeholder="Enter your email address" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-2">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" required placeholder="Enter your password" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                        <div class="forgot-password">
                            <a href="{{ route('frontend.password.reset') }}">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-accent">
                        <label for="remember" class="text-sm text-foreground/80 cursor-pointer">Remember me</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4 mt-6">
                        <button
                            id="loginBtn"
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 h-10 px-6 bg-accent hover:bg-accent/90 text-white w-full">
                            Sign In
                        </button>
                    </div>
                </form>

                <!-- Sign Up Link -->
                <div class="signup-link">
                    <p>Don't have an account?
                        <a href="{{ route('front.auth.signup') }}">Sign up here</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/login.js')) !!}

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\LoginRequest', '#loginForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush