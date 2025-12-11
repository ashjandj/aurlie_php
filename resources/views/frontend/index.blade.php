
@extends('layouts.frontend.app')
@section('title', __('labels.home'))
@section('content')
<!-- Hero Section -->
<section class="relative py-20 md:py-32 overflow-hidden bg-gradient-to-br from-white via-white to-accent/10">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 right-10 w-72 h-72 bg-accent/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
    </div>
    <div class="container relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
            <h1 class="text-5xl md:text-6xl font-bold text-foreground mb-6 leading-tight">Love doesn’t just happen by chance, it needs an introduction.</h1>
            <p class="text-xl text-foreground/70 mb-8 leading-relaxed">Aurelia uses personality-based alignment, human-led introductions, and thoughtfully designed shared experiences to connect people who are seeking companionship, love, dating, or marriage—at their own pace.</p>
            <div class="flex flex-col sm:flex-row gap-4 mb-12">
                <a href="{{ route('front.auth.signup') }}">
                    <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-accent hover:bg-accent/90 text-white">
                        Sign Up
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles ml-2 h-5 w-5">
                        <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                        <path d="M20 3v4"></path>
                        <path d="M22 5h-4"></path>
                        <path d="M4 17v2"></path>
                        <path d="M5 18H3"></path>
                        </svg>
                    </button>
                </a>
                <a href="#how-it-works">
                    <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-transparent shadow-xs hover:bg-accent dark:bg-transparent dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[&gt;svg]:px-4">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-5 w-5">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </button>
                </a>
            </div>
            <div class="flex flex-wrap gap-6 text-sm text-foreground/60">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield h-5 w-5 text-accent">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    </svg>
                    <span>Verified Members</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                    <span>Privacy Protected</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-5 w-5 text-accent">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>500+ Matches</span>
                </div>
            </div>
            </div>
            <div class="relative h-96 md:h-full rounded-2xl overflow-hidden shadow-2xl">
            <img alt="Happy couple" class="w-full h-full object-cover" src="{{asset_path('assets/images/frontend/jonathan-borba-VX2nrLhq4h4-unsplash.jpg')}}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
        </div>
    </div>
</section>
<!-- About Section -->
<section id="about" class="py-20 md:py-28 bg-white">
    <div class="container">
        <div class="max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-6 text-center">Why Aurelia Club</h2>
            <p class="text-lg text-foreground/70 text-center">Aurelia — where compatibility is curated and chemistry is yours to discover.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="h-48 overflow-hidden"><img alt="Psychometric Based Matching" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{asset_path('assets/images/frontend/gabor-kozmon-JVqXshb5nWk-unsplash.jpg')}}"></div>
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles h-8 w-8 text-accent">
                        <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                        <path d="M20 3v4"></path>
                        <path d="M22 5h-4"></path>
                        <path d="M4 17v2"></path>
                        <path d="M5 18H3"></path>
                    </svg>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Psychometric Based Matching</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70">Our Aurelia Compass assessment uses proven psychometric frameworks to find your ideal match.</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="h-48 overflow-hidden"><img alt="Verified &amp; Authentic Profiles" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{asset_path('assets/images/frontend/ViPejg0kL4zE.jpeg')}}"></div>
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield h-8 w-8 text-accent">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    </svg>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Verified &amp; Authentic Profiles</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70">Every member is verified through our rigorous screening process. No fake profiles, just real people.</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="h-48 overflow-hidden"><img alt="Curated Matches Not Algorithms Alone" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{asset_path('assets/images/frontend/benjamin-wedemeyer-_0Sw8lB5GVU-unsplash.jpg')}}"></div>
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-8 w-8 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Curated Matches Not Algorithms Alone</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70">Expert matchmakers review every connection to ensure quality and compatibility beyond the data.</p>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- How It Works Section -->
<section id="how-it-works" class="py-20 md:py-28 bg-gradient-to-br from-accent/10 via-white to-primary/5">
    <div class="container">
        <div class="max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-6 text-center">Your journey to meaningful connection in four simple steps</h2>
        </div>
        <div class="grid md:grid-cols-4 gap-6 mb-12">
            <div class="relative">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 shadow-lg">1</div>
                <h3 class="text-lg font-semibold text-foreground mb-2">Sign Up</h3>
                <p class="text-foreground/70 text-sm flex-grow">Create your profile to join our trusted community</p>
            </div>
            <div class="hidden md:block absolute top-6 -right-3 w-6 h-0.5 bg-gradient-to-r from-accent to-primary"></div>
            </div>
            <div class="relative">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 shadow-lg">2</div>
                <h3 class="text-lg font-semibold text-foreground mb-2">Take Aurelia Compass</h3>
                <p class="text-foreground/70 text-sm flex-grow">Complete our psychometric based assessment to discover your compatibility blueprint</p>
            </div>
            <div class="hidden md:block absolute top-6 -right-3 w-6 h-0.5 bg-gradient-to-r from-accent to-primary"></div>
            </div>
            <div class="relative">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 shadow-lg">3</div>
                <h3 class="text-lg font-semibold text-foreground mb-2">Receive Curated Matches</h3>
                <p class="text-foreground/70 text-sm flex-grow">Get personalized match recommendations based on deep compatibility and shared values</p>
            </div>
            <div class="hidden md:block absolute top-6 -right-3 w-6 h-0.5 bg-gradient-to-r from-accent to-primary"></div>
            </div>
            <div class="relative">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 shadow-lg">4</div>
                <h3 class="text-lg font-semibold text-foreground mb-2">Connect &amp; Meet</h3>
                <p class="text-foreground/70 text-sm flex-grow">Start meaningful conversations and meet in person at a place we believe suits you both best. We can suggest the venue and even handle the booking for you</p>
            </div>
            </div>
        </div>
        <div class="text-center"><a href="{{ route('front.auth.signup') }}"><button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-accent hover:bg-accent/90 text-white">Sign Up</button></a></div>
    </div>
</section>
<!-- Aurelia Compass Assessment Section -->
<section class="py-20 md:py-28 bg-white">
    <div class="container">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
            <div class="relative h-96 rounded-2xl overflow-hidden shadow-2xl"><img alt="Aurelia Compass Assessment" class="w-full h-full object-cover" src="{{asset_path('assets/images/frontend/vows-on-the-move-p0vZplFhKYI-unsplash.jpg')}}"></div>
            </div>
            <div class="order-1 md:order-2">
            <h2 class="text-4xl font-bold text-foreground mb-6">Discover Your Compatibility Blueprint</h2>
            <p class="text-lg text-foreground/70 mb-6">The Aurelia Compass is more than a personality test. It is a comprehensive assessment that reveals your unique relationship style, values, and compatibility factors.</p>
            <ul class="space-y-4 mb-8">
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles h-5 w-5 text-accent mt-1 flex-shrink-0">
                        <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                        <path d="M20 3v4"></path>
                        <path d="M22 5h-4"></path>
                        <path d="M4 17v2"></path>
                        <path d="M5 18H3"></path>
                    </svg>
                    <span class="text-foreground/80">Science backed psychometric framework</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5 text-accent mt-1 flex-shrink-0">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                    <span class="text-foreground/80">Comprehensive compatibility report included</span>
                </li>
            </ul>
            <a href="{{ route('front.auth.signup') }}"><button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-accent hover:bg-accent/90 text-white">Sign Up</button></a>
            </div>
        </div>
    </div>
</section>
<!-- Connect Beyond the Screen Section -->
<!-- <section class="py-20 md:py-28 bg-gradient-to-br from-primary/5 via-white to-accent/10">
    <div class="container">
        <div class="max-w-3xl mx-auto mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4 text-center">Connect Beyond the Screen</h2>
            <p class="text-lg text-foreground/70 text-center">Join our vibrant community through exclusive events and interest-based circles</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="h-48 overflow-hidden"><img alt="Speed Dating" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{asset_path('assets/images/frontend/R06ALKnlbsua.jpg')}}"></div>
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-center gap-2 text-accent mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                    <span class="text-sm font-medium">Dec 28, 2024</span>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Speed Dating</div>
                <div data-slot="card-description" class="text-muted-foreground text-sm">London Winter Mixer</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-foreground/70"><span class="text-sm">Time: 7:00 PM</span></div>
                    <div class="flex items-center gap-2 text-foreground/70">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span class="text-sm">Mayfair</span>
                    </div>
                </div>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="h-48 overflow-hidden"><img alt="Wine Tasting" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{asset_path('assets/images/frontend/axkpbKovB7zG.jpg')}}"></div>
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-center gap-2 text-accent mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                    <span class="text-sm font-medium">Jan 5, 2025</span>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Wine Tasting</div>
                <div data-slot="card-description" class="text-muted-foreground text-sm">Premium Event</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-foreground/70"><span class="text-sm">Time: 8:00 PM</span></div>
                    <div class="flex items-center gap-2 text-foreground/70">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span class="text-sm">Chelsea</span>
                    </div>
                </div>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="h-48 overflow-hidden"><img alt="Cultural Mixer" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{asset_path('assets/images/frontend/R06ALKnlbsua.jpg')}}"></div>
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-center gap-2 text-accent mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                    <span class="text-sm font-medium">Jan 15, 2025</span>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Cultural Mixer</div>
                <div data-slot="card-description" class="text-muted-foreground text-sm">Exclusive Gathering</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-foreground/70"><span class="text-sm">Time: 6:30 PM</span></div>
                    <div class="flex items-center gap-2 text-foreground/70">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span class="text-sm">Soho</span>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="text-center"><a href="{{ route('frontend.events') }}"><button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-transparent shadow-xs hover:bg-accent dark:bg-transparent dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[&gt;svg]:px-4">View All Events</button></a></div>
    </div>
</section> -->
<!-- Safety Section -->
<section class="py-20 md:py-28 bg-white">
    <div class="container">
        <div class="max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-6 text-center">Your Safety is Our Priority</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield h-8 w-8 text-accent">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    </svg>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Identity Verification</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70">Every member is verified through government issued ID and photo verification</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-8 w-8 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">Privacy Protected</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70">Your data is encrypted and protected. Control who sees your profile</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-8 w-8 text-accent">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div data-slot="card-title" class="leading-none font-semibold text-foreground">24/7 Moderation</div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70">Our team monitors activity and responds quickly to reports</p>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- tech solution section  -->
<!-- <div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{__('labels.home')}}</h1>
    <div class="content"></div>
</div> -->
@endsection
