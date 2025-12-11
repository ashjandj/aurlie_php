@extends('layouts.frontend.app')
@section('title', __('labels.contact_us'))
@section('content')
<section data-loc="client/src/pages/Contact.tsx:110" class="py-16 md:py-24 bg-gradient-to-br from-accent/10 via-white to-primary/5">
   <div data-loc="client/src/pages/Contact.tsx:111" class="container">
      <div data-loc="client/src/pages/Contact.tsx:112" class="max-w-3xl mx-auto text-center">
         <h1 data-loc="client/src/pages/Contact.tsx:113" class="text-4xl md:text-5xl font-bold text-foreground mb-6">Get in Touch</h1>
         <p data-loc="client/src/pages/Contact.tsx:116" class="text-lg text-foreground/70 mb-8">Have questions about Aurelia Club? We'd love to hear from you. Reach out to us through any of our contact channels.</p>
      </div>
   </div>
</section>
<section data-loc="client/src/pages/Contact.tsx:124" class="py-16 md:py-20 bg-white">
   <div data-loc="client/src/pages/Contact.tsx:125" class="container">
      <div data-loc="client/src/pages/Contact.tsx:126" class="grid md:grid-cols-2 gap-12">
         <div data-loc="client/src/pages/Contact.tsx:128">
            <h2 data-loc="client/src/pages/Contact.tsx:129" class="text-3xl font-bold text-foreground mb-8">Send us a Message</h2>
            <form data-loc="client/src/pages/Contact.tsx:137" class="space-y-6">
               <div data-loc="client/src/pages/Contact.tsx:138" class="grid md:grid-cols-2 gap-4">
                  <div data-loc="client/src/pages/Contact.tsx:139"><label data-loc="client/src/pages/Contact.tsx:140" class="block text-sm font-medium text-foreground mb-2">First Name</label><input data-loc="client/src/pages/Contact.tsx:143" required="" placeholder="John" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="text" value="" name="firstName"></div>
                  <div data-loc="client/src/pages/Contact.tsx:153"><label data-loc="client/src/pages/Contact.tsx:154" class="block text-sm font-medium text-foreground mb-2">Last Name</label><input data-loc="client/src/pages/Contact.tsx:157" required="" placeholder="Doe" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="text" value="" name="lastName"></div>
               </div>
               <div data-loc="client/src/pages/Contact.tsx:169"><label data-loc="client/src/pages/Contact.tsx:170" class="block text-sm font-medium text-foreground mb-2">Email Address</label><input data-loc="client/src/pages/Contact.tsx:173" required="" placeholder="john@example.com" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent" type="email" value="" name="email"></div>
               <div data-loc="client/src/pages/Contact.tsx:184"><label data-loc="client/src/pages/Contact.tsx:185" class="block text-sm font-medium text-foreground mb-2">Your Question</label><textarea data-loc="client/src/pages/Contact.tsx:188" name="message" required="" placeholder="Tell us what you&#39;d like to know..." rows="6" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent resize-none"></textarea></div>
               <button data-loc="client/src/pages/Contact.tsx:199" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[&gt;svg]:px-3 w-full bg-accent hover:bg-accent/90 text-white" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send mr-2 h-5 w-5" data-loc="client/src/pages/Contact.tsx:200">
                     <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                     <path d="m21.854 2.147-10.94 10.939"></path>
                  </svg>
                  Send Message
               </button>
            </form>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:207">
            <h2 data-loc="client/src/pages/Contact.tsx:208" class="text-3xl font-bold text-foreground mb-8">Other Ways to Connect</h2>
            <div data-loc="client/src/pages/Contact.tsx:211" class="space-y-6 mb-12">
               <div data-loc="client/src/pages/Contact.tsx:212" class="flex gap-4">
                  <div data-loc="client/src/pages/Contact.tsx:213" class="flex-shrink-0">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-6 w-6 text-accent mt-1" data-loc="client/src/pages/Contact.tsx:214">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                     </svg>
                  </div>
                  <div data-loc="client/src/pages/Contact.tsx:216">
                     <h3 data-loc="client/src/pages/Contact.tsx:217" class="font-semibold text-foreground mb-1">Email</h3>
                     <p data-loc="client/src/pages/Contact.tsx:218" class="text-foreground/70">hello@aureliaclub.com</p>
                  </div>
               </div>
               <!-- <div data-loc="client/src/pages/Contact.tsx:222" class="flex gap-4">
                  <div data-loc="client/src/pages/Contact.tsx:223" class="flex-shrink-0">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-6 w-6 text-accent mt-1" data-loc="client/src/pages/Contact.tsx:224">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                     </svg>
                  </div>
                  <div data-loc="client/src/pages/Contact.tsx:226">
                     <h3 data-loc="client/src/pages/Contact.tsx:227" class="font-semibold text-foreground mb-1">Phone</h3>
                     <p data-loc="client/src/pages/Contact.tsx:228" class="text-foreground/70">+1 (212) 555-0123</p>
                  </div>
               </div> -->
               <div data-loc="client/src/pages/Contact.tsx:232" class="flex gap-4">
                  <div data-loc="client/src/pages/Contact.tsx:233" class="flex-shrink-0">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-6 w-6 text-accent mt-1" data-loc="client/src/pages/Contact.tsx:234">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                     </svg>
                  </div>
                  <div data-loc="client/src/pages/Contact.tsx:236">
                     <h3 data-loc="client/src/pages/Contact.tsx:237" class="font-semibold text-foreground mb-1">Global Offices</h3>
                     <p data-loc="client/src/pages/Contact.tsx:238" class="text-foreground/70">New York, London, Mumbai, Dubai</p>
                  </div>
               </div>
            </div>
            <div data-loc="client/src/pages/Contact.tsx:244">
               <h3 data-loc="client/src/pages/Contact.tsx:245" class="font-semibold text-foreground mb-4">Follow Us</h3>
               <div data-loc="client/src/pages/Contact.tsx:246" class="flex gap-4">
                  <a data-loc="client/src/pages/Contact.tsx:250" href="https://wa.me/919876543210" target="_blank" rel="noopener noreferrer" class="p-3 bg-foreground/5 rounded-lg transition-all hover:bg-foreground/10 hover:text-green-500" title="WhatsApp">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-6 w-6" data-loc="client/src/pages/Contact.tsx:258">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                     </svg>
                  </a>
                  <a data-loc="client/src/pages/Contact.tsx:250" href="https://instagram.com/aureliaclub" target="_blank" rel="noopener noreferrer" class="p-3 bg-foreground/5 rounded-lg transition-all hover:bg-foreground/10 hover:text-pink-500" title="Instagram">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram h-6 w-6" data-loc="client/src/pages/Contact.tsx:258">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                     </svg>
                  </a>
                  <a data-loc="client/src/pages/Contact.tsx:250" href="https://facebook.com/aureliaclub" target="_blank" rel="noopener noreferrer" class="p-3 bg-foreground/5 rounded-lg transition-all hover:bg-foreground/10 hover:text-blue-600" title="Facebook">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook h-6 w-6" data-loc="client/src/pages/Contact.tsx:258">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                     </svg>
                  </a>
                  <a data-loc="client/src/pages/Contact.tsx:250" href="https://linkedin.com/company/aureliaclub" target="_blank" rel="noopener noreferrer" class="p-3 bg-foreground/5 rounded-lg transition-all hover:bg-foreground/10 hover:text-blue-700" title="LinkedIn">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin h-6 w-6" data-loc="client/src/pages/Contact.tsx:258">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect width="4" height="12" x="2" y="9"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                     </svg>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section data-loc="client/src/pages/Contact.tsx:270" class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
   <div data-loc="client/src/pages/Contact.tsx:271" class="container">
      <div data-loc="client/src/pages/Contact.tsx:272" class="text-center mb-12">
         <h2 data-loc="client/src/pages/Contact.tsx:273" class="text-3xl md:text-4xl font-bold text-foreground mb-4">Our Global Offices</h2>
         <p data-loc="client/src/pages/Contact.tsx:276" class="text-lg text-foreground/70">We're present in major cities across the world to serve you better</p>
      </div>
      <div data-loc="client/src/pages/Contact.tsx:282" class="relative w-full h-96 md:h-[500px] bg-gradient-to-br from-accent/5 to-primary/5 rounded-2xl border border-border/50 overflow-hidden mb-12">
         <div data-loc="client/src/pages/Contact.tsx:284" class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-accent/10 opacity-50"></div>
         <div data-loc="client/src/pages/Contact.tsx:288" class="absolute transform -translate-x-1/2 -translate-y-1/2 group cursor-pointer" style="top: 35%; left: 25%;">
            <div data-loc="client/src/pages/Contact.tsx:294" class="relative">
               <div data-loc="client/src/pages/Contact.tsx:295" class="w-4 h-4 bg-accent rounded-full shadow-lg"></div>
               <div data-loc="client/src/pages/Contact.tsx:296" class="absolute w-4 h-4 bg-accent rounded-full animate-ping opacity-75"></div>
               <div data-loc="client/src/pages/Contact.tsx:299" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-4 hidden group-hover:block z-10">
                  <div data-loc="client/src/pages/Contact.tsx:300" class="bg-white rounded-lg shadow-xl p-4 w-48 border border-border">
                     <h3 data-loc="client/src/pages/Contact.tsx:301" class="font-bold text-foreground text-sm mb-1">New York</h3>
                     <p data-loc="client/src/pages/Contact.tsx:302" class="text-xs text-foreground/60 mb-2">USA</p>
                     <p data-loc="client/src/pages/Contact.tsx:303" class="text-xs text-foreground/70 mb-2">123 Madison Avenue, New York, NY 10016</p>
                     <p data-loc="client/src/pages/Contact.tsx:304" class="text-xs text-accent font-medium">+1 (212) 555-0123</p>
                  </div>
               </div>
            </div>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:288" class="absolute transform -translate-x-1/2 -translate-y-1/2 group cursor-pointer" style="top: 55%; left: 65%;">
            <div data-loc="client/src/pages/Contact.tsx:294" class="relative">
               <div data-loc="client/src/pages/Contact.tsx:295" class="w-4 h-4 bg-accent rounded-full shadow-lg"></div>
               <div data-loc="client/src/pages/Contact.tsx:296" class="absolute w-4 h-4 bg-accent rounded-full animate-ping opacity-75"></div>
               <div data-loc="client/src/pages/Contact.tsx:299" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-4 hidden group-hover:block z-10">
                  <div data-loc="client/src/pages/Contact.tsx:300" class="bg-white rounded-lg shadow-xl p-4 w-48 border border-border">
                     <h3 data-loc="client/src/pages/Contact.tsx:301" class="font-bold text-foreground text-sm mb-1">India</h3>
                     <p data-loc="client/src/pages/Contact.tsx:302" class="text-xs text-foreground/60 mb-2">Mumbai</p>
                     <p data-loc="client/src/pages/Contact.tsx:303" class="text-xs text-foreground/70 mb-2">456 Bandra Kurla Complex, Mumbai, MH 400051</p>
                     <p data-loc="client/src/pages/Contact.tsx:304" class="text-xs text-accent font-medium">+91 (22) 6789-0123</p>
                  </div>
               </div>
            </div>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:288" class="absolute transform -translate-x-1/2 -translate-y-1/2 group cursor-pointer" style="top: 30%; left: 45%;">
            <div data-loc="client/src/pages/Contact.tsx:294" class="relative">
               <div data-loc="client/src/pages/Contact.tsx:295" class="w-4 h-4 bg-accent rounded-full shadow-lg"></div>
               <div data-loc="client/src/pages/Contact.tsx:296" class="absolute w-4 h-4 bg-accent rounded-full animate-ping opacity-75"></div>
               <div data-loc="client/src/pages/Contact.tsx:299" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-4 hidden group-hover:block z-10">
                  <div data-loc="client/src/pages/Contact.tsx:300" class="bg-white rounded-lg shadow-xl p-4 w-48 border border-border">
                     <h3 data-loc="client/src/pages/Contact.tsx:301" class="font-bold text-foreground text-sm mb-1">London</h3>
                     <p data-loc="client/src/pages/Contact.tsx:302" class="text-xs text-foreground/60 mb-2">UK</p>
                     <p data-loc="client/src/pages/Contact.tsx:303" class="text-xs text-foreground/70 mb-2">789 Canary Wharf, London, E14 5AB</p>
                     <p data-loc="client/src/pages/Contact.tsx:304" class="text-xs text-accent font-medium">+44 (20) 7946-0958</p>
                  </div>
               </div>
            </div>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:288" class="absolute transform -translate-x-1/2 -translate-y-1/2 group cursor-pointer" style="top: 50%; left: 55%;">
            <div data-loc="client/src/pages/Contact.tsx:294" class="relative">
               <div data-loc="client/src/pages/Contact.tsx:295" class="w-4 h-4 bg-accent rounded-full shadow-lg"></div>
               <div data-loc="client/src/pages/Contact.tsx:296" class="absolute w-4 h-4 bg-accent rounded-full animate-ping opacity-75"></div>
               <div data-loc="client/src/pages/Contact.tsx:299" class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-4 hidden group-hover:block z-10">
                  <div data-loc="client/src/pages/Contact.tsx:300" class="bg-white rounded-lg shadow-xl p-4 w-48 border border-border">
                     <h3 data-loc="client/src/pages/Contact.tsx:301" class="font-bold text-foreground text-sm mb-1">Dubai</h3>
                     <p data-loc="client/src/pages/Contact.tsx:302" class="text-xs text-foreground/60 mb-2">UAE</p>
                     <p data-loc="client/src/pages/Contact.tsx:303" class="text-xs text-foreground/70 mb-2">321 Downtown Dubai, Dubai, UAE</p>
                     <p data-loc="client/src/pages/Contact.tsx:304" class="text-xs text-accent font-medium">+971 (4) 309-3333</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div data-loc="client/src/pages/Contact.tsx:313" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
         <div data-loc="client/src/pages/Contact.tsx:315" data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-loc="client/src/pages/Contact.tsx:316" data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-loc="client/src/pages/Contact.tsx:317" data-slot="card-title" class="font-semibold text-lg text-foreground">New York</div>
               <div data-loc="client/src/pages/Contact.tsx:318" data-slot="card-description" class="text-muted-foreground text-sm">USA</div>
            </div>
            <div data-loc="client/src/pages/Contact.tsx:320" data-slot="card-content" class="px-6 space-y-3">
               <!-- <div data-loc="client/src/pages/Contact.tsx:325" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:326">
                     <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:327" class="text-sm text-foreground/70">+1 (212) 555-0123</p>
               </div> -->
               <div data-loc="client/src/pages/Contact.tsx:329" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:330">
                     <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                     <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:331" class="text-sm text-foreground/70">ny@aureliaclub.com</p>
               </div>
            </div>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:315" data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-loc="client/src/pages/Contact.tsx:316" data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-loc="client/src/pages/Contact.tsx:317" data-slot="card-title" class="font-semibold text-lg text-foreground">India</div>
               <div data-loc="client/src/pages/Contact.tsx:318" data-slot="card-description" class="text-muted-foreground text-sm">Mumbai</div>
            </div>
            <div data-loc="client/src/pages/Contact.tsx:320" data-slot="card-content" class="px-6 space-y-3">
               <!-- <div data-loc="client/src/pages/Contact.tsx:325" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:326">
                     <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:327" class="text-sm text-foreground/70">+91 (22) 6789-0123</p>
               </div> -->
               <div data-loc="client/src/pages/Contact.tsx:329" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:330">
                     <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                     <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:331" class="text-sm text-foreground/70">mumbai@aureliaclub.com</p>
               </div>
            </div>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:315" data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-loc="client/src/pages/Contact.tsx:316" data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-loc="client/src/pages/Contact.tsx:317" data-slot="card-title" class="font-semibold text-lg text-foreground">London</div>
               <div data-loc="client/src/pages/Contact.tsx:318" data-slot="card-description" class="text-muted-foreground text-sm">UK</div>
            </div>
            <div data-loc="client/src/pages/Contact.tsx:320" data-slot="card-content" class="px-6 space-y-3">
               <!-- <div data-loc="client/src/pages/Contact.tsx:325" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:326">
                     <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:327" class="text-sm text-foreground/70">+44 (20) 7946-0958</p>
               </div> -->
               <div data-loc="client/src/pages/Contact.tsx:329" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:330">
                     <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                     <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:331" class="text-sm text-foreground/70">london@aureliaclub.com</p>
               </div>
            </div>
         </div>
         <div data-loc="client/src/pages/Contact.tsx:315" data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow">
            <div data-loc="client/src/pages/Contact.tsx:316" data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-loc="client/src/pages/Contact.tsx:317" data-slot="card-title" class="font-semibold text-lg text-foreground">Dubai</div>
               <div data-loc="client/src/pages/Contact.tsx:318" data-slot="card-description" class="text-muted-foreground text-sm">UAE</div>
            </div>
            <div data-loc="client/src/pages/Contact.tsx:320" data-slot="card-content" class="px-6 space-y-3">               
               <!-- <div data-loc="client/src/pages/Contact.tsx:325" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:326">
                     <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:327" class="text-sm text-foreground/70">+971 (4) 309-3333</p>
               </div> -->
               <div data-loc="client/src/pages/Contact.tsx:329" class="flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-4 w-4 text-accent flex-shrink-0 mt-0.5" data-loc="client/src/pages/Contact.tsx:330">
                     <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                     <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                  </svg>
                  <p data-loc="client/src/pages/Contact.tsx:331" class="text-sm text-foreground/70">dubai@aureliaclub.com</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section data-loc="client/src/pages/Contact.tsx:341" class="py-16 md:py-20 bg-gradient-to-br from-accent/20 via-primary/10 to-accent/10">
   <div data-loc="client/src/pages/Contact.tsx:342" class="container">
      <div data-loc="client/src/pages/Contact.tsx:343" class="max-w-2xl mx-auto text-center">
         <h2 data-loc="client/src/pages/Contact.tsx:344" class="text-3xl md:text-4xl font-bold text-foreground mb-6">Ready to Find Your Perfect Match?</h2>
         <p data-loc="client/src/pages/Contact.tsx:347" class="text-lg text-foreground/70 mb-8">Start your journey with Aurelia Club today and discover meaningful connections.</p>
         <a data-loc="client/src/pages/Contact.tsx:350" href="https://aureliaclub-rnshpaxf.manus.space/membership"><button data-loc="client/src/pages/Contact.tsx:351" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-accent hover:bg-accent/90 text-white">Sign Up</button></a>
      </div>
   </div>
</section>
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Frontend\ContactUsRequest','#contactUsForm')!!}
{!! returnScriptWithNonce(asset_path('assets/js/frontend/contact-us/index.js')) !!}
@endpush