
@extends('layouts.frontend.app')
@section('title', __('labels.referral'))
@section('content')
<section class="py-16 md:py-24 bg-gradient-to-br from-white via-white to-accent/5">
   <div class="container">
      <div class="max-w-3xl mx-auto text-center">
         <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6">Earn While You Share</h1>
         <p class="text-lg text-foreground/70">Invite your friends to Aurelia Club and earn rewards for every successful referral</p>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-white">
   <div class="container">
      <div class="max-w-2xl mx-auto">
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl py-6 shadow-sm border-2 border-accent">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Your Referral Link</div>
               <div data-slot="card-description" class="text-muted-foreground text-sm">Share this link with friends and earn rewards</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <div class="flex gap-3 mb-6">
                  <input readonly="" class="flex-grow px-4 py-3 border border-border rounded-lg bg-foreground/5 text-foreground/70" type="text" value="https://aurelia.club/join?ref=AURELIA2024">
                  <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-accent hover:bg-accent/90 text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy h-5 w-5">
                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                        <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                     </svg>
                  </button>
               </div>
               <div class="bg-accent/10 rounded-lg p-4">
                  <p class="text-sm text-foreground/70"><strong>Your Referral Code:</strong> AURELIA2024</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-gradient-to-br from-accent/5 via-white to-primary/5">
   <div class="container">
      <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-12 text-center">How It Works</h2>
      <div class="grid md:grid-cols-4 gap-6">
         <div class="text-center">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 mx-auto shadow-lg">1</div>
            <h3 class="text-lg font-semibold text-foreground mb-2">Share Your Link</h3>
            <p class="text-foreground/70 text-sm">Copy and share your unique referral link with friends</p>
         </div>
         <div class="text-center">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 mx-auto shadow-lg">2</div>
            <h3 class="text-lg font-semibold text-foreground mb-2">Friend Joins</h3>
            <p class="text-foreground/70 text-sm">Your friend signs up using your referral link</p>
         </div>
         <div class="text-center">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 mx-auto shadow-lg">3</div>
            <h3 class="text-lg font-semibold text-foreground mb-2">They Upgrade</h3>
            <p class="text-foreground/70 text-sm">Your friend purchases a membership plan</p>
         </div>
         <div class="text-center">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-accent to-primary text-white font-bold mb-4 mx-auto shadow-lg">4</div>
            <h3 class="text-lg font-semibold text-foreground mb-2">You Earn</h3>
            <p class="text-foreground/70 text-sm">Receive rewards instantly in your account</p>
         </div>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-white">
   <div class="container">
      <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-12 text-center">Why Refer?</h2>
      <div class="grid md:grid-cols-3 gap-8">
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow text-center">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="flex justify-center mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gift h-8 w-8 text-accent">
                     <rect x="3" y="8" width="18" height="4" rx="1"></rect>
                     <path d="M12 8v13"></path>
                     <path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"></path>
                     <path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"></path>
                  </svg>
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Earn Bonus</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">Earn a percentage of the fee every time someone you refer joins.</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow text-center">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="flex justify-center mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-8 w-8 text-accent">
                     <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                     <circle cx="9" cy="7" r="4"></circle>
                     <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Unlimited Referrals</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">Refer as many friends as you want, earn for each one</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow text-center">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div class="flex justify-center mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up h-8 w-8 text-accent">
                     <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                     <polyline points="16 7 22 7 22 13"></polyline>
                  </svg>
               </div>
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Bonus Rewards</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">Earn extra rewards when your referral upgrades to Premium</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- <section class="py-16 md:py-24 bg-gradient-to-br from-accent/5 via-white to-primary/5">
   <div class="container">
      <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-12 text-center">Reward Tiers</h2>
      <div class="grid md:grid-cols-4 gap-6">
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-gradient-to-r from-orange-400 to-orange-600 h-24 flex items-center justify-center">
               <h3 class="text-2xl font-bold text-white">Bronze</h3>
            </div>
            <div data-slot="card-content" class="px-6 pt-6">
               <div class="space-y-4">
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Referrals Needed</p>
                     <p class="text-lg font-semibold text-foreground">1-5</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Per Referral</p>
                     <p class="text-lg font-semibold text-accent">₹500 per referral</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Tier Bonus</p>
                     <p class="text-lg font-semibold text-foreground">No bonus</p>
                  </div>
               </div>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-gradient-to-r from-gray-400 to-gray-600 h-24 flex items-center justify-center">
               <h3 class="text-2xl font-bold text-white">Silver</h3>
            </div>
            <div data-slot="card-content" class="px-6 pt-6">
               <div class="space-y-4">
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Referrals Needed</p>
                     <p class="text-lg font-semibold text-foreground">6-15</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Per Referral</p>
                     <p class="text-lg font-semibold text-accent">₹750 per referral</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Tier Bonus</p>
                     <p class="text-lg font-semibold text-foreground">₹2,000 bonus at tier</p>
                  </div>
               </div>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 h-24 flex items-center justify-center">
               <h3 class="text-2xl font-bold text-white">Gold</h3>
            </div>
            <div data-slot="card-content" class="px-6 pt-6">
               <div class="space-y-4">
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Referrals Needed</p>
                     <p class="text-lg font-semibold text-foreground">16-30</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Per Referral</p>
                     <p class="text-lg font-semibold text-accent">₹1,000 per referral</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Tier Bonus</p>
                     <p class="text-lg font-semibold text-foreground">₹5,000 bonus at tier</p>
                  </div>
               </div>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50 hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-24 flex items-center justify-center">
               <h3 class="text-2xl font-bold text-white">Platinum</h3>
            </div>
            <div data-slot="card-content" class="px-6 pt-6">
               <div class="space-y-4">
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Referrals Needed</p>
                     <p class="text-lg font-semibold text-foreground">30+</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Per Referral</p>
                     <p class="text-lg font-semibold text-accent">₹1,500 per referral</p>
                  </div>
                  <div>
                     <p class="text-sm text-foreground/60 mb-1">Tier Bonus</p>
                     <p class="text-lg font-semibold text-foreground">₹10,000 bonus + exclusive perks</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<section class="py-16 md:py-24 bg-white">
   <div class="container">
      <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-12 text-center">Frequently Asked Questions</h2>
      <div class="max-w-2xl mx-auto space-y-6">
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">When do I receive my referral rewards?</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">Rewards are credited to your account within 24 hours of your friend completing their first payment.</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Is there a limit to how many people I can refer?</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">No! You can refer as many friends as you want. The more you refer, the higher your tier and rewards.</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">Can I withdraw my referral earnings?</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">Yes, you can use your referral credits towards membership upgrades or request a withdrawal after reaching ₹1,000.</p>
            </div>
         </div>
         <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-2 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
               <div data-slot="card-title" class="leading-none font-semibold text-foreground">What if my friend doesn't complete the signup?</div>
            </div>
            <div data-slot="card-content" class="px-6">
               <p class="text-foreground/70">Your referral link is valid for 30 days. If your friend signs up within that period, you'll get credit.</p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="py-16 md:py-24 bg-gradient-to-br from-accent/20 via-primary/10 to-accent/10">
   <div class="container">
      <div class="max-w-2xl mx-auto text-center">
         <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4">Start Earning Today</h2>
         <p class="text-lg text-foreground/70 mb-8">Share your referral link with friends and start building your rewards.</p>
         <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-10 rounded-md px-6 has-[&gt;svg]:px-4 bg-accent hover:bg-accent/90 text-white">Copy Your Link</button>
      </div>
   </div>
</section>
@endsection
