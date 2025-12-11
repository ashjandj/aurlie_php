@extends('layouts.frontend.app')
@section('title', 'Blog Detail')
@section('content')
<!-- blog detail hero section -->
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('frontend.blog') }}" class="inline-flex items-center gap-2 text-foreground/70 hover:text-foreground transition mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left h-5 w-5">
                    <path d="m12 19-7-7 7-7"></path>
                    <path d="M19 12H5"></path>
                </svg>
                <span>Back to Blog</span>
            </a>
            @if($id == 1)
                <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Richa Pearl Singh, 40 years</h1>
                <p class="text-xl text-foreground/70 mb-8">Why Most Matches Fail: The Values and Hobbies Problem.</p>
            @elseif($id == 2)
                <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Aparna Thapar, 40 years</h1>
                <p class="text-xl text-foreground/70 mb-8">Second Chance Love: Older, Wiser, Smarter.</p>
            @elseif($id == 3)
                <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Prashant chowdhary, 26 years</h1>
                <p class="text-xl text-foreground/70 mb-8">Swipes and compatibility</p>
            @endif
        </div>
    </div>
</section>

<!-- blog detail image section -->
<section class="py-8 bg-white">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <div class="rounded-2xl overflow-hidden mb-12">
                @if($id == 1)
                    <img alt="Blog Featured Image" class="w-full h-[400px] md:h-[500px] object-cover" src="{{ asset_path('assets/images/frontend/WhatsApp Image 2025-11-26 at 09.51.13_a1f66ae1 (1) (1).jpg') }}">
                @elseif($id == 2)
                    <img alt="Blog Featured Image" class="w-full h-[400px] md:h-[500px] object-cover" src="{{ asset_path('assets/images/frontend/WhatsApp Image 2025-11-26 at 09.51.15_1fb12503 (4).jpg') }}">
                @elseif($id == 3)
                    <img alt="Blog Featured Image" class="w-full h-[400px] md:h-[500px] object-cover" src="{{ asset('assets/images/frontend/chowdary.jpg') }}">
                @endif
            </div>
        </div>
    </div>
</section>

<!-- blog detail content section -->
<section class="py-16 md:py-24 bg-white">
    <div class="container">
        <div class="max-w-3xl mx-auto">
            <div class="prose prose-lg max-w-none">
                @if($id == 1)
                    <p class="text-lg text-foreground/80 leading-relaxed mb-6">
                        I'll be honest with you—after watching friends go through divorce, navigating my own relationship's ups and downs, and seeing nieces and nephews starting to date, I've noticed something. We spend so much time worrying about chemistry and attraction, but we completely overlook the two things that actually matter in the long run: values and hobbies.
                    </p>
                    
                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Here's what I mean. You meet someone, there's a spark, the conversation flows easily over dinner. You both love the same Netflix shows, you laugh at each other's jokes, and suddenly you're thinking this could be it. Fast forward six months, a year, maybe five years, and you're sitting across from each other wondering how you got here. The spark is gone, but more than that—you realize you've been living parallel lives the entire time.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        The values mismatch is usually the first crack to show. Maybe you discover that your idea of financial responsibility means saving for retirement and having a cushion, while theirs means living for today and worrying about tomorrow when it comes. Or you value family time and Sunday dinners with the kids, but they see weekends as their time to decompress alone. Neither person is wrong, exactly, but you're fundamentally incompatible.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        I've seen this play out in my own circle more times than I can count. My friend Neha married someone who seemed perfect on paper—good job, kind, attractive. But she wanted to save money for her kids' college funds, and he wanted to upgrade to a luxury car every three years. Small thing, right? Except it wasn't. It was about what they each believed mattered in life, and those beliefs were worlds apart.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Then there's the hobbies issue, which people dismiss as trivial until they're living it. I'm not saying you need to do everything together—God knows that's suffocating. But you need something in common beyond watching TV on the couch. When one person lives for hiking and outdoor adventures every weekend, and the other person's idea of a perfect Saturday is browsing antique stores and going to brunch, someone is always compromising. And after years of compromising, resentment builds.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        What really gets me is how avoidable this all is. We ask "What do you do for work?" and "Where did you grow up?" but we don't ask "What does a good life look like to you twenty years from now?" or "How do you actually like spending your free time—not on a first date, but on a random Tuesday?" We mistake compatibility for chemistry, and we pay for it later.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        The truth is, shared values and overlapping interests aren't everything, but they're the foundation. They're what keep you connected when the butterflies fade and real life sets in. They're what give you something to talk about, something to build together, something to come back to when things get hard.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        So if you're out there dating, do yourself a favor. Look past the immediate attraction and ask the deeper questions. Pay attention to how someone spends their time and what they think matters. Because in the end, that's what you'll be living with—not the perfect first date, but the everyday reality of two people trying to build a life together. And if your values and interests don't at least point in the same direction, you're already starting uphill.
                    </p>
                @elseif($id == 2)
                    <p class="text-lg text-foreground/80 leading-relaxed mb-6">
                        Trying to build a new relationship later in life is a strange blend of hope mixed with caution mixed with self-awareness. I got married at 21, which now feels almost like remembering someone else's life from a long time ago. At that age you are still guessing who you are. You make choices with a sense of open space in front of you. Everything is coloured in a lens of optimism and the sheer possibilities ahead. By the time you reach 40, that space has a shape. You are not a blank slate anymore. You've become a dog-eared book with chapters overflowing with your experiences.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Even nine years after my divorce, I am surprised by how deeply old patterns stay in one's DNA. They show up in how you handle conflict, how you show affection, how much you give without asking for anything back… For me it is often the instinct to smooth over disagreements before they even start, a habit left over from years of trying to keep the peace. When you do rebuild a life piece by piece, you naturally become fiercely protective of the person you have worked hard to become. And that makes you much more picky about who you let into your space.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        The research backs this. Psychologist Eli Finkel, author of The All or Nothing Marriage (a good read for anyone interested in this stuff), writes about how the expectations we bring into relationships change over time. In later life we look for things like depth, growth, and emotional alignment, not just superficial compatibility and companionship. With age, we get clearer about what we can genuinely offer, what we deeply value, and what we truly need. That clarity helps, but it also makes us slower to let someone into the life we have rebuilt.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        From my own experience, age also sharpens your instinct for subtler signals. How someone handles stress; whether they listen; whether their words match their actions.. You pay close attention because you have paid the cost of getting those things wrong.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Yet, I don't think love gets harder with age, it just becomes more intentional. You choose with a clearer head and for the right reasons. And when you do find love at a later age, it is worth every bit of the work it took to become the person who could receive it.
                    </p>

                    <div class="mt-12 pt-8 border-t border-border">
                        <p class="text-foreground/80 font-semibold mb-2">Aparna Thapar</p>
                        <p class="text-sm text-foreground/60 italic">
                            [powered by curiosity, heavy deadlifts, strong coffee, and good quality protein. When I get a break from all that, I run a small F&B business, teach, edit stuff, and raise two kids (sometimes in that exact order).]
                        </p>
                    </div>
                @elseif($id == 3)
                    <p class="text-lg text-foreground/80 leading-relaxed mb-6">
                        Somewhere between our third dating app and our fifteenth "hey, what's up?" message, a lot of us quietly lowered the bar. We stopped asking, "Does this person really get me?" and started negotiating for the bare minimum—someone who replies, someone who isn't creepy, someone who isn't actively chaotic. Swiping promised us a shortcut to connection, but somewhere in the speed and convenience, we lost the thing that makes relationships meaningful: compatibility.
                    </p>
                    
                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Swipe culture treats connection like a numbers game. You match with someone based on a photo, exchange a few texts, and hope the chemistry will appear later. But ultimately, swiping only introduces people; it doesn't tell you whether you'll actually belong in each other's lives. A profile can't reveal how someone handles silence, how they deal with stress, or what they look like when they're genuinely happy. Photos and quick prompts only show fragments, not the full emotional wiring that makes or breaks real bonding.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Compatibility isn't magic, and it's not some dramatic soulmate headline. It's alignment. It's emotional rhythm. It's the natural ease of being yourself around someone without trying to impress them. When two people connect on personality, lifestyle, communication style, priorities, and relationship intent, everything feels less like work and more like flow. You don't have to overthink every message. You don't decode tone. You don't constantly feel misunderstood. You show up as you are—and they respond to the real you, not the highlight reel version.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        And compatibility doesn't happen in theory. It happens in moments. It shows its face when you're doing life together—whether that's dancing clumsily at a salsa night, arguing passionately about a film ending, going for long city walks with coffee, choosing groceries for a Sunday cooking experiment, or laughing uncontrollably at a stand-up show. Shared activities don't just entertain you; they reveal who you are with someone. You learn whether they're playful or anxious, whether they enjoy discovery or prefer routine, whether they listen or just wait for their turn to speak, whether your energies match or constantly collide.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Swipe culture keeps us at the surface, where "liking" someone becomes a performance. But shared experiences pull us into depth, where comfort matters more than coolness. Connection becomes something you feel in your stomach, not something you interpret through messages. A personality match isn't about having identical hobbies—it's about finding someone who moves through the world in a way that complements your pace and emotional texture.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        At 26, after witnessing enough situationships, ghosting cycles, and vibe illusions, I can confidently say this: we don't need more swipes; we need better fit. We don't need more chaos; we need emotional ease. We don't need constant availability; we need relational alignment. Because love isn't built on randomness—it's built on two people who bring out something grounded, joyful, and real in each other.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        Swipe culture may introduce us to people, but compatibility shapes who stays. And in a world obsessed with instant matches, maybe the most rebellious thing we can do is slow down, show up, and discover someone in the spaces where we're both ourselves.
                    </p>

                    <p class="text-foreground/80 leading-relaxed mb-6">
                        That's what I want, and honestly, I think that's what most of us want too.
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- newsletter section -->
<section class="py-16 md:py-24 bg-gradient-to-br from-accent/20 via-primary/10 to-accent/10">
    <div class="container">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4">Get Weekly Insights</h2>
            <p class="text-lg text-foreground/70 mb-8">Subscribe to our newsletter for the latest dating tips and cultural insights delivered to your inbox.</p>
            <div class="flex flex-col sm:flex-row gap-3">
                <input placeholder="Enter your email" class="flex-grow px-4 py-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="email">
                <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[>svg]:px-3 bg-accent hover:bg-accent/90 text-white">Subscribe</button>
            </div>
        </div>
    </div>
</section>
@endsection

