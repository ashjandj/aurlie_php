@extends('layouts.frontend.app')
@section('title', $member['name'] . ' - ' . __('labels.about'))
@section('content')
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
   <div class="container">
      <div class="max-w-4xl mx-auto">
         <a href="{{ route('frontend.about-us') }}" class="inline-flex items-center text-accent hover:text-accent/80 mb-8 transition-colors font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
               <path d="m12 19-7-7 7-7"></path>
               <path d="M19 12H5"></path>
            </svg>
            Back to About Us
         </a>
         
         <div class="bg-white rounded-2xl shadow-xl border border-border/50 overflow-hidden">
            <div class="bg-gradient-to-br from-accent/10 via-accent/5 to-white px-8 py-12 text-center">
               <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-6 border-4 border-white shadow-lg">
                  <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover rounded-full">
               </div>
               <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-3">{{ $member['name'] }}</h1>
               <p class="text-xl text-accent font-semibold">{{ $member['role'] }}</p>
            </div>
            
            <div class="px-8 md:px-12 py-10 md:py-12">
               <div class="max-w-3xl mx-auto space-y-6">
                  <p class="text-lg text-foreground/80 leading-relaxed">
                     {{ $member['description'] }}
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

