
@extends('layouts.frontend.app')
@section('title', __('labels.membership'))
@section('content')
<!-- Membership Section -->
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
    <div class="container">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Which Aurelia membership would you like to start with?</h1>
            <p class="text-lg text-foreground/70">You can always upgrade later as your journey evolves.</p>
        </div>
    </div>
</section>
<!-- Membership Plans Section -->
<section class="py-16 md:py-24 bg-white">
    <div class="container">
        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <div class="relative">
            <div data-slot="card" class="bg-card text-card-foreground gap-6 rounded-xl border pb-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow flex flex-col h-full ring-2 ring-accent">
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="font-semibold text-3xl text-foreground">Aurelia Core</div>
                    <div data-slot="card-description" class="text-base font-medium text-accent">Building Connections</div>
                    <p class="text-sm text-foreground/60 mt-3 italic">For those who want to understand themselves better and start meeting curated matches at a comfortable, thoughtful pace.</p>
                    <p class="text-sm text-foreground/70 mt-2 font-medium">"Go at your own pace with some support"</p>
                    <div class="mt-6 pt-6 border-t border-border">
                        <div class="flex items-baseline gap-2 mb-2"><span class="text-4xl font-bold text-foreground">₹15,999</span><span class="text-foreground/60 text-sm">for 3 months</span></div>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 flex-grow">
                    <h3 class="font-semibold text-foreground mb-6">What you get:</h3>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Personality Assessment Report</p>
                            <p class="text-xs text-foreground/60 mt-1">Deep-dive psychometric profile to understand your patterns, values, and relationship style</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">2–3 Curated Profiles Each Month</p>
                            <p class="text-xs text-foreground/60 mt-1">Handpicked introductions aligned with your preferences and compatibility indicators</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">"Where You'll Vibe" Suggestions</p>
                            <p class="text-xs text-foreground/60 mt-1">Recommendations on spaces you're likely to connect best in (Sufi night, salsa class, cooking workshop, etc.)</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Event &amp; Experience Discounts</p>
                            <p class="text-xs text-foreground/60 mt-1">Preferential pricing on Aurelia events, partner gyms, classes, and curated experiences</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Discounts on Relationship Coaching &amp; Therapy</p>
                            <p class="text-xs text-foreground/60 mt-1">Preferential rates with Aurelia-aligned coaches and therapists</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Standard Support</p>
                            <p class="text-xs text-foreground/60 mt-1">Responsive customer support for profile, matches, and overall experience queries</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Expert-Supported First Meeting</p>
                            <p class="text-xs text-foreground/60 mt-1">One first meeting/date personally supported by Aurelia experts with pre-meet guidance and post-date reflection</p>
                        </div>
                        </li>
                    </ul>
                    <a href="https://aureliaclub-rnshpaxf.manus.space/checkout">
                        <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-transparent shadow-xs hover:bg-accent dark:bg-transparent dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[&gt;svg]:px-4 w-full border-border">
                        Choose Aurelia Core
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                        </button>
                    </a>
                </div>
            </div>
            </div>
            <div class="relative">
            <div data-slot="card" class="bg-card text-card-foreground gap-6 rounded-xl border pb-6 border-border/50 hover:shadow-lg transition-shadow flex flex-col h-full ring-2 ring-accent shadow-sm">
                <div class="bg-gradient-to-r from-accent to-primary text-white text-center py-3 text-sm font-semibold flex items-center justify-center gap-2 rounded-t-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-current">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    Most Popular
                </div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="font-semibold text-3xl text-foreground">Aurelia Elite</div>
                    <div data-slot="card-description" class="text-base font-medium text-accent">Curated Journeys</div>
                    <p class="text-sm text-foreground/60 mt-3 italic">For those who want high-touch support, deeper curation, and a guided relationship journey or a clear path toward marriage.</p>
                    <p class="text-sm text-foreground/70 mt-2 font-medium">"Top-3 priority with specialists walking with you"</p>
                    <div class="mt-6 pt-6 border-t border-border">
                        <div class="flex items-baseline gap-2 mb-2"><span class="text-4xl font-bold text-foreground">₹51,000</span><span class="text-foreground/60 text-sm">for 3 months + ₹1,00,000 success fee if marriage</span></div>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 flex-grow">
                    <h3 class="font-semibold text-foreground mb-6">What you get:</h3>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Personality Assessment Report + Guided Integration</p>
                            <p class="text-xs text-foreground/60 mt-1">In-depth psychometric report plus personalized guidance on applying it in real-life connections</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Up to 4 Curated Profiles Each Month</p>
                            <p class="text-xs text-foreground/60 mt-1">More introductions with tighter curation and higher-touch matchmaking</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Priority Event &amp; Experience Access</p>
                            <p class="text-xs text-foreground/60 mt-1">Best-available pricing and early access to limited-seat Aurelia events and partner experiences</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Background Verification Support</p>
                            <p class="text-xs text-foreground/60 mt-1">Background checks available at 30% discount through third-party partner</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">1 Free Relationship Coaching / Therapy Session</p>
                            <p class="text-xs text-foreground/60 mt-1">One complimentary session with an Aurelia-aligned coach or therapist</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Concierge Support (Unlimited)</p>
                            <p class="text-xs text-foreground/60 mt-1">High-touch, priority support for profile positioning, message-framing, and navigating complex situations</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Dedicated Aurelia Relationship Guide</p>
                            <p class="text-xs text-foreground/60 mt-1">A named expert who knows your story, goals, and context, walking alongside you</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Monthly 1:1 Check-In Calls</p>
                            <p class="text-xs text-foreground/60 mt-1">Regular structured calls to review progress and refine your journey</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">All First Meetings / Dates Supported by Aurelia Experts</p>
                            <p class="text-xs text-foreground/60 mt-1">Every first meeting comes with pre-date prep, boundary-setting, and post-date reflection support</p>
                        </div>
                        </li>
                        <li class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 text-accent flex-shrink-0 mt-0.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-foreground text-sm">Family / Ecosystem Handling</p>
                            <p class="text-xs text-foreground/60 mt-1">Support with 'how to tell parents', aligning expectations, and backing you for initial family conversations</p>
                        </div>
                        </li>
                    </ul>
                    <a href="https://aureliaclub-rnshpaxf.manus.space/checkout">
                        <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[&gt;svg]:px-4 w-full bg-accent hover:bg-accent/90 text-white">
                        Choose Aurelia Elite
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                        </button>
                    </a>
                </div>
            </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto mt-16 p-8 bg-gradient-to-br from-accent/5 to-primary/5 rounded-2xl border border-border/50">
            <h2 class="text-2xl font-bold text-foreground mb-6">How to Choose?</h2>
            <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="font-semibold text-foreground mb-3 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center text-sm font-bold">1</div>
                    Choose Aurelia Core if...
                </h3>
                <ul class="space-y-2 text-foreground/70 text-sm">
                    <li>• You want to go at your own pace</li>
                    <li>• You prefer some autonomy in your journey</li>
                    <li>• You're exploring and want curated matches</li>
                    <li>• You value support but not constant guidance</li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-foreground mb-3 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center text-sm font-bold">2</div>
                    Choose Aurelia Elite if...
                </h3>
                <ul class="space-y-2 text-foreground/70 text-sm">
                    <li>• Finding a partner is a top-3 priority for you</li>
                    <li>• You want expert guidance every step of the way</li>
                    <li>• You're marriage-focused and want family support</li>
                    <li>• You value personalized, high-touch service</li>
                </ul>
            </div>
            </div>
        </div>
        <div class="max-w-3xl mx-auto mt-16">
            <h2 class="text-2xl font-bold text-foreground mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-6">
            <div class="p-6 bg-white border border-border/50 rounded-lg hover:shadow-md transition-shadow">
                <h3 class="font-semibold text-foreground mb-2">Can I upgrade from Core to Elite?</h3>
                <p class="text-foreground/70 text-sm">Yes! You can upgrade anytime as your journey evolves. We'll credit your Core membership toward your Elite plan.</p>
            </div>
            <div class="p-6 bg-white border border-border/50 rounded-lg hover:shadow-md transition-shadow">
                <h3 class="font-semibold text-foreground mb-2">What does the success fee mean?</h3>
                <p class="text-foreground/70 text-sm">The ₹1,00,000 success fee for Elite is only applicable if your match leads to marriage. It's our way of being invested in your happiness.</p>
            </div>
            <div class="p-6 bg-white border border-border/50 rounded-lg hover:shadow-md transition-shadow">
                <h3 class="font-semibold text-foreground mb-2">Do I get the assessment with both plans?</h3>
                <p class="text-foreground/70 text-sm">Yes, both plans include the Personality Assessment Report. Elite adds guided integration to help you apply insights in real-life situations.</p>
            </div>
            <div class="p-6 bg-white border border-border/50 rounded-lg hover:shadow-md transition-shadow">
                <h3 class="font-semibold text-foreground mb-2">What if I'm not satisfied?</h3>
                <p class="text-foreground/70 text-sm">We offer a 30-day satisfaction guarantee. If you're not happy, we'll work with you to adjust your plan or provide a refund.</p>
            </div>
            <div class="p-6 bg-white border border-border/50 rounded-lg hover:shadow-md transition-shadow">
                <h3 class="font-semibold text-foreground mb-2">Can I pause my membership?</h3>
                <p class="text-foreground/70 text-sm">Yes, you can pause your membership for up to 3 months without losing your matches or profile data.</p>
            </div>
            </div>
        </div>
    </div>
</section>
<section class="py-16 md:py-20 bg-gradient-to-br from-accent/20 via-primary/10 to-accent/10">
    <div class="container">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-6">Ready to start your journey?</h2>
            <p class="text-lg text-foreground/70 mb-8">Choose your plan and begin connecting with meaningful matches today.</p>
            <a href="https://aureliaclub-rnshpaxf.manus.space/checkout">
            <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-accent hover:bg-accent/90 text-white">
                Get Started Now
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-5 w-5">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </button>
            </a>
        </div>
    </div>
</section>
@endsection
