
@extends('layouts.frontend.app')
@section('title', __('labels.compass'))
@section('content')
<section class="py-12 md:py-16 bg-white border-b border-border">
   <div class="container max-w-2xl">
      <div class="mb-6">
         <div class="flex items-center justify-between mb-2">
            <h2 class="text-sm font-semibold text-foreground">Step 1 of 7</h2>
            <span class="text-sm text-foreground/60">14%</span>
         </div>
         <div class="w-full bg-foreground/10 rounded-full h-2">
            <div class="bg-gradient-to-r from-accent to-primary h-2 rounded-full transition-all duration-300" style="width: 14.2857%;"></div>
         </div>
      </div>
      <h1 class="text-3xl font-bold text-foreground mb-2">Background &amp; Basics</h1>
      <p class="text-foreground/70">Let's start with some basic information about you</p>
   </div>
</section>
<section class="py-12 md:py-16 bg-gradient-to-br from-white via-white to-accent/5 flex-grow">
   <div class="container max-w-2xl">
      <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
         <div data-slot="card-content" class="px-6 pt-6">
            <div class="mb-6">
               <label class="block text-sm font-medium text-foreground mb-2">Age</label>
               <select class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                  <option value="">Select an option</option>
                  <option value="18-25">18-25</option>
                  <option value="26-30">26-30</option>
                  <option value="31-35">31-35</option>
                  <option value="36-40">36-40</option>
                  <option value="41-45">41-45</option>
                  <option value="45+">45+</option>
               </select>
            </div>
            <div class="mb-6"><label class="block text-sm font-medium text-foreground mb-2">City &amp; Pincode</label><input placeholder="Enter your city and pincode" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="text" value=""></div>
            <div class="mb-6">
               <label class="block text-sm font-medium text-foreground mb-3">Willing to relocate within next 2-5 years?</label>
               <div class="space-y-2"><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Yes" name="relocate"><span class="text-foreground/80">Yes</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="No" name="relocate"><span class="text-foreground/80">No</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Maybe" name="relocate"><span class="text-foreground/80">Maybe</span></label></div>
            </div>
            <div class="mb-6">
               <label class="block text-sm font-medium text-foreground mb-2">Education Level</label>
               <select class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                  <option value="">Select an option</option>
                  <option value="High School">High School</option>
                  <option value="Bachelor&#39;s">Bachelor's</option>
                  <option value="Master&#39;s">Master's</option>
                  <option value="PhD">PhD</option>
                  <option value="Other">Other</option>
               </select>
            </div>
            <div class="mb-6">
               <label class="block text-sm font-medium text-foreground mb-3">Working Status</label>
               <div class="space-y-2"><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Working" name="workingStatus"><span class="text-foreground/80">Working</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Non-working" name="workingStatus"><span class="text-foreground/80">Non-working</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Entrepreneur" name="workingStatus"><span class="text-foreground/80">Entrepreneur</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Student" name="workingStatus"><span class="text-foreground/80">Student</span></label></div>
            </div>
            <div class="mb-6">
               <label class="block text-sm font-medium text-foreground mb-3">Relationship Intent</label>
               <div class="space-y-2"><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Long-term dating" name="relationshipIntent"><span class="text-foreground/80">Long-term dating</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Marriage" name="relationshipIntent"><span class="text-foreground/80">Marriage</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Open to both" name="relationshipIntent"><span class="text-foreground/80">Open to both</span></label></div>
            </div>
            <div class="mb-6">
               <label class="block text-sm font-medium text-foreground mb-3">Children</label>
               <div class="space-y-2"><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Have" name="children"><span class="text-foreground/80">Have</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Want" name="children"><span class="text-foreground/80">Want</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Don&#39;t want" name="children"><span class="text-foreground/80">Don't want</span></label><label class="flex items-center gap-3 cursor-pointer"><input class="w-4 h-4 text-accent" type="radio" value="Open to partner with kids" name="children"><span class="text-foreground/80">Open to partner with kids</span></label></div>
            </div>
         </div>
      </div>
      <div class="flex gap-4 mt-8">
         <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-transparent shadow-xs hover:bg-accent dark:bg-transparent dark:border-input dark:hover:bg-input/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 flex-1" disabled="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left mr-2 h-5 w-5">
               <path d="m12 19-7-7 7-7"></path>
               <path d="M19 12H5"></path>
            </svg>
            Previous
         </button>
         <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[&gt;svg]:px-3 flex-1 bg-accent hover:bg-accent/90 text-white">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-5 w-5">
               <path d="M5 12h14"></path>
               <path d="m12 5 7 7-7 7"></path>
            </svg>
         </button>
      </div>
   </div>
</section>
@endsection
