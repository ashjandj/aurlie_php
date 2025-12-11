@extends('layouts.frontend.app')
@section('title', __('labels.about'))
@section('content')
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
   <div class="container">
      <div class="max-w-3xl mx-auto text-center">
         <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">About Aurelia Club</h1>
         <p class="text-lg text-foreground/70">We believe that meaningful connections are built on understanding, not algorithms alone.</p>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-white">
   <div class="container">
      <div class="grid md:grid-cols-2 gap-12 items-center">
   <div>
      <h2 class="text-4xl font-bold text-foreground mb-6">Our Story</h2>
      <p class="text-foreground/70 mb-4 leading-relaxed">Aurelia was born out of a simple realisation: for a lot of people, love or companionship hasn't failed—the way we're trying to find it has. Endless swipes, vague profiles, and "sure or not sure about marriage" no longer work for people who know themselves better and take companionship seriously.</p>
      <p class="text-foreground/70 mb-4 leading-relaxed">At Aurelia, matches are built through our in-house Aurelia Compass—a psychometric and personality-based system that understands how you relate, what you value, and where you naturally vibe. It doesn't just help us introduce you to people who fit you better, it also recommends the kinds of spaces and events—jazz nights, film screenings, bookish cafés, dance socials, walks, workshops—where your personalities are more likely to click in real life.</p>
      <p class="text-foreground/70 mb-4 leading-relaxed">We combine this Compass with human-led introductions and thoughtfully designed shared experiences. We work with culture-aware Indians and NRIs who are seeking companionship, love, dating, or marriage—at their own pace, without the chaos and randomness of conventional dating apps.</p>
      <p class="text-foreground/70 leading-relaxed">In short: Aurelia exists for people who still believe in connection, but want a better, more intentional way to get there.</p>
   </div>
   <div class="bg-gradient-to-br from-accent/20 to-accent/5 rounded-2xl p-2 aspect-square flex items-center justify-center overflow-hidden">
      <img
         src="{{ asset('assets/images/frontend/marcos-corradini-OUNyDJfoqrs-unsplash.jpg') }}"
         alt="People connecting through Aurelia"
         class="w-full h-full object-cover rounded-2xl"
      >
   </div>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-accent/5">
   <div class="container">
      <h2 class="text-4xl font-bold text-foreground mb-12 text-center">Our Core Values</h2>
      <div class="grid md:grid-cols-3 gap-8">
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-8 w-8 text-accent mb-3">
                  <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
               </svg>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Authenticity</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">We believe in genuine connections built on real values and shared experiences.</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-8 w-8 text-accent mb-3">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
               </svg>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Inclusivity</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">We celebrate diversity and welcome all orientations, backgrounds, and beliefs.</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap h-8 w-8 text-accent mb-3">
                  <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
               </svg>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Compatibility</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">We use the Aurelia Compass (our psychometric matching engine) that reads your values, temperament, and intent. It points you to people and spaces where you're most likely to genuinely click.</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-white">
   <div class="container">
      <h2 class="text-4xl font-bold text-foreground mb-12 text-center">Our Team</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
         <a href="{{ route('frontend.team-member', 'raja-sahi') }}" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg hover:border-accent/30 transition-all duration-300 cursor-pointer group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-accent/20 group-hover:border-accent/50 transition-colors">
                  <img src="{{ asset('assets/images/frontend/raja.jpg') }}" alt="Raja Sahi" class="w-full h-full object-cover">
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground group-hover:text-accent transition-colors">Raja Sahi</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Co-Founder</div>
            </div>
         </a>
         <a href="{{ route('frontend.team-member', 'jyotika-raisinghani-dhawan') }}" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg hover:border-accent/30 transition-all duration-300 cursor-pointer group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-accent/20 group-hover:border-accent/50 transition-colors">
                  <img src="{{ asset('assets/images/frontend/jyotika.jpg') }}" alt="Jyotika Raisinghani Dhawan" class="w-full h-full object-cover">
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground group-hover:text-accent transition-colors">Jyotika Raisinghani Dhawan</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Co-Founder</div>
            </div>
         </a>
         <a href="{{ route('frontend.team-member', 'vidhee-shetty') }}" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg hover:border-accent/30 transition-all duration-300 cursor-pointer group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-accent/20 group-hover:border-accent/50 transition-colors">
                  <img src="{{ asset('assets/images/frontend/vidhee.jpg') }}" alt="Vidhee Shetty" class="w-full h-full object-cover">
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground group-hover:text-accent transition-colors">Vidhee Shetty</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Project Manager</div>
            </div>            
         </a>
         <a href="{{ route('frontend.team-member', 'aarti-ahuja') }}" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg hover:border-accent/30 transition-all duration-300 cursor-pointer group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-accent/20 group-hover:border-accent/50 transition-colors">
                  <img src="{{ asset('assets/images/frontend/aarti.jpg') }}" alt="Aarti Ahuja" class="w-full h-full object-cover">
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground group-hover:text-accent transition-colors">Aarti Ahuja</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Consultant Psychologist</div>
            </div>
         </a>
         <a href="{{ route('frontend.team-member', 'swati-khanna') }}" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg hover:border-accent/30 transition-all duration-300 cursor-pointer group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-accent/20 group-hover:border-accent/50 transition-colors">
                  <img src="{{ asset('assets/images/frontend/swati.jpg') }}" alt="Swati Khanna" class="w-full h-full object-cover">
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground group-hover:text-accent transition-colors">Swati Khanna</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Consultant, Partnerships & Referrals</div>
            </div>
         </a>
         <a href="{{ route('frontend.team-member', 'nandini-dhawan') }}" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 text-center hover:shadow-lg hover:border-accent/30 transition-all duration-300 cursor-pointer group">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-2 border-accent/20 group-hover:border-accent/50 transition-colors">
                  <img src="{{ asset('assets/images/frontend/nandini.jpg') }}" alt="Nandini Dhawan" class="w-full h-full object-cover">
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground group-hover:text-accent transition-colors">Nandini Dhawan</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Consultant- Creative & Content</div>
            </div>
         </a>
      </div>     
   </div>
</section>
@endsection