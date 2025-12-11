@extends('layouts.frontend.app')

@section('title', __('labels.sign_up_btn'))

@section('content')
<!-- Header Section -->
<section class="py-12 md:py-16 bg-white border-b border-border">
    <div class="container max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">
            Thank you for signing up for Aurelia
        </h1>
        <p class="text-foreground/70">
            We’re genuinely excited to have you here.
        </p>
    </div>
</section>

<!-- Message Section -->
<section class="py-12 md:py-16 bg-gradient-to-br from-white via-white to-accent/5 flex-grow">
    <div class="container max-w-3xl">
        <div data-slot="card"
             class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-8 px-6 shadow-sm border-border/50">
            <div data-slot="card-content">
                <div class="prose max-w-none text-foreground/80 prose-p:mt-3">
                    <p>
                        Thank you for signing up for Aurelia – we’re genuinely excited to have you here.
                    </p>
                    <p>
                        You’re now on the waitlist for joining the Aurelia Club, and we’re really looking forward to
                        seeing you inside the community.
                    </p>
                    <p>
                        You’ll receive an email with your membership status within the next 3 working days. If your
                        membership is approved, that email will walk you through:
                    </p>
                    <p>
                        The payment window, and your psychometric assessment (The Aurelia Compass) – a core part of how
                        Aurelia understands you and helps you find deeper, more meaningful connections.
                    </p>
                    <p>
                        Thank you for trusting us with this journey. We can’t wait to get to know you better.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


