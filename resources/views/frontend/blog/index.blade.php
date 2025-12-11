
@extends('layouts.frontend.app')
@section('title', __('labels.blog'))
@section('content')
<!-- blog section -->
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
    <div class="container">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Insights &amp; Advice</h1>
            <p class="text-lg text-foreground/70">Expert dating tips, cultural insights, and relationship advice for Indians and NRIs</p>
        </div>
    </div>
</section>
<!-- blog search section -->
<section class="py-12 bg-white border-b border-border">
    <div class="container">
        <div class="max-w-3xl mx-auto">
            <div class="relative mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-foreground/50">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
            <input placeholder="Search articles..." class="w-full pl-12 pr-4 py-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="text" value="">
            </div>
            <div class="flex flex-wrap gap-3">
                <button data-filter="all" class="blog-filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all bg-accent text-white">All Articles</button>
                <button data-filter="dating-tips" class="blog-filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all bg-foreground/5 text-foreground hover:bg-foreground/10">Dating Tips</button>
                <button data-filter="cultural-insights" class="blog-filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all bg-foreground/5 text-foreground hover:bg-foreground/10">Cultural Insights</button>
                <button data-filter="relationship-advice" class="blog-filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all bg-foreground/5 text-foreground hover:bg-foreground/10">Relationship Advice</button>
            </div>
        </div>
    </div>
</section>
<!-- blog list section -->
<section class="py-16 md:py-24 bg-white">
    <div class="container">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('frontend.blog.show', 1) }}" data-category="dating-tips" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="5 Signs You&#39;ve Found Your Perfect Match" class="w-full object-cover hover:scale-105 transition-transform duration-300" style="height: 300px;" src="{{ asset_path('assets/images/frontend/WhatsApp Image 2025-11-26 at 09.51.13_a1f66ae1 (1) (1).jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <!-- <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">dating tips</span><span class="text-xs text-foreground/60">5 min read</span></div> -->
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Richa Pearl Singh, 40 years</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Why Most Matches Fail: The Values and Hobbies Problem.</div>
                </div>
                <!-- <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Priya Sharma</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Nov 5, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div> -->
            </div>
            </a>
            <a href="{{ route('frontend.blog.show', 2) }}" data-category="cultural-insights" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Navigating Long-Distance Love as an NRI" class="w-full object-cover hover:scale-105 transition-transform duration-300" style="height: 300px;" src="{{ asset_path('assets/images/frontend/WhatsApp Image 2025-11-26 at 09.51.15_1fb12503 (4).jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <!-- <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">cultural insights</span><span class="text-xs text-foreground/60">7 min read</span></div> -->
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Aparna Thapar, 40 years</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Second Chance Love: Older, Wiser, Smarter.</div>
                </div>
                <!-- <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Arjun Patel</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Nov 3, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div> -->
            </div>
            </a>
            <a href="{{ route('frontend.blog.show', 3) }}" data-category="dating-tips" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Prashant Chowdhary Blog" class="w-full object-cover hover:scale-105 transition-transform duration-300" style="height: 300px;" src="{{ asset('assets/images/frontend/chowdary.jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <!-- <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">dating tips</span><span class="text-xs text-foreground/60">5 min read</span></div> -->
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Prashant chowdhary, 26 years</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Swipes and compatibility</div>
                </div>
                <!-- <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Priya Sharma</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Nov 5, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div> -->
            </div>
            </a>
            <!-- <a href="https://aureliaclub-rnshpaxf.manus.space/blog/3" data-category="dating-tips" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="The Art of Meaningful First Conversations" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset_path('assets/images/frontend/IjVicFJwhowi.jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">dating tips</span><span class="text-xs text-foreground/60">6 min read</span></div>
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">The Art of Meaningful First Conversations</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Master the skills to create genuine connections from your very first interaction.</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Neha Gupta</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Oct 30, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            </a>
            <a href="https://aureliaclub-rnshpaxf.manus.space/blog/4" data-category="cultural-insights" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Balancing Tradition and Modernity in Relationships" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset_path('assets/images/frontend/ny8R8sq1FH0L.jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">cultural insights</span><span class="text-xs text-foreground/60">8 min read</span></div>
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Balancing Tradition and Modernity in Relationships</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">How to honor your cultural values while embracing contemporary relationship dynamics.</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Rohan Singh</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Oct 28, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            </a>
            <a href="https://aureliaclub-rnshpaxf.manus.space/blog/5" data-category="relationship-advice" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Understanding Your Attachment Style" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset_path('assets/images/frontend/ViPejg0kL4zE.jpeg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">relationship advice</span><span class="text-xs text-foreground/60">6 min read</span></div>
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Understanding Your Attachment Style</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Discover how your attachment style influences your relationships and what you can do about it.</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Priya Sharma</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Oct 25, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            </a>
            <a href="https://aureliaclub-rnshpaxf.manus.space/blog/6" data-category="cultural-insights" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Cultural Compatibility: More Than Just Background" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset_path('assets/images/frontend/axkpbKovB7zG.jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">cultural insights</span><span class="text-xs text-foreground/60">7 min read</span></div>
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Cultural Compatibility: More Than Just Background</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Explore what true cultural compatibility means beyond shared ethnicity or religion.</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Arjun Patel</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Oct 22, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            </a>
            <a href="https://aureliaclub-rnshpaxf.manus.space/blog/7" data-category="dating-tips" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Red Flags vs. Green Flags: A Dating Guide" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset_path('assets/images/frontend/pI8EEBhFoZRn.jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">dating tips</span><span class="text-xs text-foreground/60">5 min read</span></div>
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Red Flags vs. Green Flags: A Dating Guide</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Learn to identify warning signs and positive indicators early in your dating journey.</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Neha Gupta</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Oct 20, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            </a>
            <a href="https://aureliaclub-rnshpaxf.manus.space/blog/8" data-category="relationship-advice" class="blog-post-item">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden cursor-pointer h-full">
                <div class="h-56 overflow-hidden"><img alt="Communication Strategies for Cross-Cultural Couples" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset_path('assets/images/frontend/pI8EEBhFoZRn.jpg') }}"></div>
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div class="flex items-center justify-between mb-3"><span class="text-xs font-semibold text-accent uppercase">relationship advice</span><span class="text-xs text-foreground/60">7 min read</span></div>
                    <div data-slot="card-title" class="font-semibold text-foreground text-xl">Communication Strategies for Cross-Cultural Couples</div>
                    <div data-slot="card-description" class="text-sm text-foreground/70">Effective communication techniques for couples navigating different cultural backgrounds.</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-foreground/60">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Rohan Singh</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <span>Oct 18, 2024</span>
                        </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5 text-accent">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            </a> -->
        </div>
    </div>
</section>
<!-- newsletter section -->
<section class="py-16 md:py-24 bg-gradient-to-br from-accent/20 via-primary/10 to-accent/10">
    <div class="container">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4">Get Weekly Insights</h2>
            <p class="text-lg text-foreground/70 mb-8">Subscribe to our newsletter for the latest dating tips and cultural insights delivered to your inbox.</p>
            <div class="flex flex-col sm:flex-row gap-3"><input placeholder="Enter your email" class="flex-grow px-4 py-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="email"><button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-accent hover:bg-accent/90 text-white">Subscribe</button></div>
        </div>
    </div>
</section>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.blog-filter-btn');
    const blogPosts = document.querySelectorAll('.blog-post-item');

    if (!filterButtons.length || !blogPosts.length) {
        return;
    }

    function applyFilter(filter) {
        blogPosts.forEach(post => {
            const category = post.getAttribute('data-category');
            if (filter === 'all' || category === filter) {
                post.style.display = '';
            } else {
                post.style.display = 'none';
            }
        });
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filterValue = this.getAttribute('data-filter');

            // reset all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-accent', 'text-white', 'is-active');
                btn.classList.add('bg-foreground/5', 'text-foreground', 'hover:bg-foreground/10');
            });

            // activate clicked button and ensure hover doesn't change its color
            this.classList.remove('bg-foreground/5', 'text-foreground', 'hover:bg-foreground/10');
            this.classList.add('bg-accent', 'text-white', 'is-active');

            applyFilter(filterValue);
        });
    });

    // set initial active tab to "All Articles"
    const defaultButton = document.querySelector('.blog-filter-btn[data-filter="all"]');
    if (defaultButton) {
        defaultButton.click();
    }
});
</script>
<style>
/* Keep selected tab red even on hover */
.blog-filter-btn.is-active,
.blog-filter-btn.is-active:hover {
    background-color: #ef4444 !important; /* Tailwind red-500 */
    color: #ffffff !important;
}
</style>
@endpush
@endsection
