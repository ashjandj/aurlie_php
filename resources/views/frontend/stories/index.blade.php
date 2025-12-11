
@extends('layouts.frontend.app')
@section('title', __('labels.stories'))
@section('content')
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
    <div class="container">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Success Stories</h1>
            <p class="text-lg text-foreground/70">Real stories from couples who found love through Aurelia Club</p>
        </div>
    </div>
</section>
<section class="py-16 md:py-24 bg-white">
    <div class="container">
        <div class="grid md:grid-cols-2 gap-8">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div data-slot="card-title" class="leading-none font-semibold text-foreground">Priya &amp; Arjun</div>
                        <div data-slot="card-description" class="text-muted-foreground text-sm">London • 2023</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70 italic">"We matched on Aurelia and immediately felt a connection. The personality assessment helped us understand each other's values from day one. Now we're engaged!"</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div data-slot="card-title" class="leading-none font-semibold text-foreground">Neha &amp; Rohan</div>
                        <div data-slot="card-description" class="text-muted-foreground text-sm">New York • 2023</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70 italic">"As an NRI, I was skeptical about online dating. But Aurelia's human-led approach made all the difference. We met at an event and the rest is history."</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div data-slot="card-title" class="leading-none font-semibold text-foreground">Anjali &amp; Vikram</div>
                        <div data-slot="card-description" class="text-muted-foreground text-sm">Mumbai • 2024</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70 italic">"Long distance relationship that worked! Aurelia's matching algorithm found someone who understood my career ambitions and cultural values."</p>
            </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div data-slot="card-title" class="leading-none font-semibold text-foreground">Simran &amp; Aditya</div>
                        <div data-slot="card-description" class="text-muted-foreground text-sm">Toronto • 2024</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5 text-accent">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </div>
            </div>
            <div data-slot="card-content" class="px-6">
                <p class="text-foreground/70 italic">"We were both looking for someone who appreciated our Indian heritage but also embraced modern values. Aurelia understood exactly what we needed."</p>
            </div>
            </div>
        </div>
        <div class="max-w-2xl mx-auto mt-16 text-center bg-accent/5 rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-foreground mb-4">Share Your Story</h2>
            <p class="text-foreground/70 mb-6">Found your match through Aurelia? We'd love to hear your story!</p>
            <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-accent hover:bg-accent/90 text-white">Submit Your Story</button>
        </div>
    </div>
</section>
@endsection
