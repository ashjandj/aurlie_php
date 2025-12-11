@extends('layouts.frontend.app')
@section('title', __('labels.reset_link_success'))
@section('content')
<!-- Header Section -->
<section class="py-12 md:py-16 bg-white border-b border-border">
    <div class="container max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">
            {{ __('labels.reset_link_success') }}
        </h1>
        <p class="text-foreground/70">
            {{ __('labels.reset_link_message') }}
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 md:py-16 bg-gradient-to-br from-white via-white to-accent/5 flex-grow">
    <div class="container max-w-3xl">
        <div
            data-slot="card"
            class="bg-card text-card-foreground flex flex-col gap-4 rounded-xl border py-8 px-6 shadow-sm border-border/50 max-w-md mx-auto text-center"
        >
            <div class="flex flex-col items-center gap-3">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-foreground">
                    {{ __('labels.reset_link_success') }}
                </h2>
                <p class="text-sm text-foreground/70">
                    {{ __('labels.reset_link_message') }}
                </p>
            </div>

            <div class="pt-4 border-t border-border/60 mt-4 text-sm text-foreground/70">
                <p>
                    {{ __('labels.if_not_review_account') ?? "If you didn’t request a password reset, you can safely ignore this email." }}
                </p>
                <p class="mt-3">
                    <a
                        href="{{ route('frontend.auth.login.get') }}"
                        class="font-medium text-accent hover:underline"
                    >
                        {{ __('labels.back_login') }} &mdash; {{ __('labels.login') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
