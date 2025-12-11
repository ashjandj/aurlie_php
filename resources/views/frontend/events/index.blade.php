
@extends('layouts.frontend.app')
@section('title', __('labels.events'))
@section('content')
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
   <div class="container">
      <div class="max-w-3xl mx-auto text-center">
         <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Connect Beyond the Screen</h1>
         <p class="text-lg text-foreground/70">Join our vibrant community at exclusive events and interest-based circles</p>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-white">
   <div class="container">
      <div class="max-w-4xl mx-auto">
         <div class="mb-12 rounded-2xl overflow-hidden shadow-lg">
            <img src="{{ asset('assets/images/frontend/events-dance.jpg') }}" alt="Couple at event" class="w-full h-[400px] md:h-[500px] object-cover">
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col items-center justify-center gap-8 rounded-xl border py-16 px-8 shadow-sm border-border/50">
            <div class="flex flex-col items-center gap-6 text-center">
               <div class="w-24 h-24 rounded-full bg-gradient-to-br from-accent/20 to-primary/20 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock text-accent">
                     <circle cx="12" cy="12" r="10"></circle>
                     <polyline points="12 6 12 12 16 14"></polyline>
                  </svg>
               </div>
               <div>
                  <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4">Events Coming Soon</h2>
                  <p class="text-lg text-foreground/70 max-w-2xl mx-auto">
                     We're preparing something special for you! Our exclusive events and interest-based circles will be launching soon. Stay tuned for exciting opportunities to connect beyond the screen.
                  </p>
               </div>
               <div class="inline-flex items-center gap-2 px-6 py-3 rounded-full text-sm font-semibold bg-gradient-to-r from-accent to-primary text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell">
                     <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                     <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                  </svg>
                  <span>We'll notify you when events are available</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
