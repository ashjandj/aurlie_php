@extends('layouts.frontend.app')
@section('title', __('labels.sign_up_btn'))
@push('styles')
<style>
    /* Validation error messages - Red color */
    .help-block,
    .error-help-block,
    .invalid-feedback,
    span.error,
    label.error {
        color: #dc2626 !important;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }
    
    /* Ensure error messages are visible and red */
    .text-danger {
        color: #dc2626 !important;
    }
    
    /* For jQuery validation errors */
    #signupForm .error {
        color: #dc2626 !important;
    }
    
    #signupForm label.error {
        color: #dc2626 !important;
    }
</style>
@endpush
@section('content')
<!-- Header Section -->
<section class="py-12 md:py-16 bg-white border-b border-border">
    <div class="container max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold text-foreground mb-2">Join Aurelia Club</h1>
        <p class="text-foreground/70">We ask a few questions about your identity and preferences so Aurelia can reflect who you are and who you're comfortable connecting with.</p>
    </div>
</section>
 <!-- Form Section -->
 <section class="py-12 md:py-16 bg-gradient-to-br from-white via-white to-accent/5 flex-grow">
    <div class="container max-w-3xl">
        <!-- Registration Illustration -->
        <div class="mb-8">
            <div class="overflow-hidden rounded-xl border border-border/60 bg-accent/5">
                <img
                    src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg"
                    alt="People connecting and talking"
                    class="w-full h-56 md:h-72 object-cover"
                >
            </div>
        </div>

        <form id="signupForm" action="{{ route('front.auth.signup.store') }}" method="POST" class="space-y-8">
            @csrf
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-border/50">
                <div data-slot="card-content" class="px-6 pt-6">
                    
                    <!-- Field 1: Full Name -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="fullName" required placeholder="Enter your full name" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 2: Age -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Age <span class="text-red-500">*</span></label>
                        <input type="number" name="age" required min="18" max="120" placeholder="Enter your age" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 3: City & Country -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">City & Country <span class="text-red-500">*</span></label>
                        <input type="text" name="cityCountry" required placeholder="e.g., Mumbai, India" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 4: Email -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required placeholder="Enter your email address" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 5: Mobile -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Mobile <span class="text-red-500">*</span></label>
                        <input type="tel" name="mobile" required placeholder="Enter your mobile number" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 6: Password -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Password <span class="text-red-500">*</span></label>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="Create a password"
                            class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                        >
                    </div>

                    <!-- Field 7: Confirm Password -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Confirm Password <span class="text-red-500">*</span></label>
                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="Re-enter your password"
                            class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                        >
                    </div>

                    <!-- Field 8: Education Level -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Describe your highest level of education <span class="text-red-500">*</span></label>
                        <select name="education" required class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                            <option value="">Select an option</option>
                            <option value="higher-secondary">Completed higher secondary (Class 12 / A-Levels)</option>
                            <option value="diploma">Diploma / Vocational training</option>
                            <option value="bachelors">Bachelor's degree</option>
                            <option value="masters">Master's degree</option>
                            <option value="professional">Professional degree (e.g., CA, CS, CFA, MBA, MD, JD, etc.)</option>
                            <option value="doctorate">Doctorate (PhD or equivalent)</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Field 7: Institute/University -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Which institute / university did you complete this highest qualification from? <span class="text-red-500">*</span></label>
                        <input type="text" name="institute" required placeholder="Enter institute/university name" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 8: What are you hoping to find -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">What are you hoping to find on Aurelia? (Select all that apply.) <span class="text-red-500">*</span></label>
                        <div class="checkbox-group">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="hopingToFind[]" value="companionship" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Companionship / deep friendship</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="hopingToFind[]" value="longterm-dating" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Long-term dating (not necessarily marriage)</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="hopingToFind[]" value="marriage" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Marriage / life partnership</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="hopingToFind[]" value="casual-dating" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Casual dating / open to seeing where it goes</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="hopingToFind[]" value="figuring-out" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">I'm still figuring it out</span>
                            </label>
                        </div>
                    </div>

                    <!-- Field 9: Marital Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">What is your current legal marital status? <span class="text-red-500">*</span></label>
                        <p class="text-sm text-foreground/60 mb-3">(This is about your legal status, not whether you're currently in a relationship.)</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="maritalStatus" value="single" required class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Single</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="maritalStatus" value="married" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Married</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="maritalStatus" value="separated" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Separated</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="maritalStatus" value="divorced" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Divorced</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="maritalStatus" value="widowed" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Widowed</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="maritalStatus" value="prefer-not-to-say" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Prefer not to say</span>
                            </label>
                        </div>
                    </div>

                    <!-- Field 10: Languages -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">Which languages are you comfortable using in conversations with people you connect with? (Select all that apply.) <span class="text-red-500">*</span></label>
                        <div class="checkbox-group">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="english" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">English</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="mandarin" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Mandarin</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="hindi" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Hindi</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="indian-regional" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Indian regional languages</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="spanish" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Spanish</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="french" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">French</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="arabic" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Arabic</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="russian" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Russian</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="portuguese" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Portuguese</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="urdu" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Urdu</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="indonesian" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Indonesian</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="vietnamese" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Vietnamese</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="german" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">German</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="dutch" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Dutch</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="japanese" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Japanese</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="turkish" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Turkish</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="korean" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Korean</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="languages[]" value="other" id="languageOther" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Other (please specify):</span>
                            </label>
                        </div>
                        <input type="text" name="languageOther" id="languageOtherInput" placeholder="Specify other language" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent mt-2 conditional-field" style="display: none;">
                    </div>

                    <!-- Field 11: Gender -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">How do you describe your gender? <span class="text-red-500">*</span></label>
                        <p class="text-sm text-foreground/60 mb-3">We ask this only so we can represent you accurately and offer more relevant matches.</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="woman" required class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Woman</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="man" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Man</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="non-binary" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Non-binary</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="genderqueer" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Genderqueer / Genderfluid</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="trans-woman" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Trans woman</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="trans-man" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Trans man</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="prefer-not-to-say-gender" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Prefer not to say</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="gender" value="self-describe" id="genderSelfDescribe" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Self-describe:</span>
                            </label>
                        </div>
                        <input type="text" name="genderSelfDescribe" id="genderSelfDescribeInput" placeholder="Please describe" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent mt-2 conditional-field" style="display: none;">
                    </div>

                    <!-- Field 12: Open to being matched with -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">Who are you open to being shown to / matched with on Aurelia? (Select all that apply.) <span class="text-red-500">*</span></label>
                        <div class="checkbox-group">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="openToMatch[]" value="women" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Women</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="openToMatch[]" value="men" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Men</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="openToMatch[]" value="non-binary-people" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Non-binary people</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="openToMatch[]" value="any-gender" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">People of any gender</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="openToMatch[]" value="figuring-out-match" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">I'm still figuring this out</span>
                            </label>
                        </div>
                    </div>

                    <!-- Field 13: Pronouns -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">What pronouns would you like us (and others) to use for you? <span class="text-red-500">*</span></label>
                        <p class="text-sm text-foreground/60 mb-3">We'll use these pronouns in how the app refers to you (for example, in intros or prompts).</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="pronouns" value="she-her" required class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">She / Her</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="pronouns" value="he-him" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">He / Him</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="pronouns" value="they-them" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">They / Them</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="pronouns" value="name-only" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Use my name only</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="pronouns" value="other-pronouns" id="pronounsOther" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Other (please specify):</span>
                            </label>
                        </div>
                        <input type="text" name="pronounsOther" id="pronounsOtherInput" placeholder="Please specify" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent mt-2 conditional-field" style="display: none;">
                    </div>

                    <!-- Field 14: Currently Working -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">Are you currently working in a professional role (paid or self-employed)? <span class="text-red-500">*</span></label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="currentlyWorking" value="yes" id="workingYes" required class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Yes</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="currentlyWorking" value="no" id="workingNo" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Field 15: Work Type (conditional) -->
                    <div class="mb-6 conditional-field" id="workTypeField" style="display: none;">
                        <label class="block text-sm font-medium text-foreground mb-3">Work type <span class="text-red-500">*</span></label>
                        <p class="text-sm text-foreground/60 mb-3">What best describes what you do?</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="workType" value="job" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Job</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="workType" value="entrepreneur" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Entrepreneur</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="workType" value="consultant" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Consultant</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="workType" value="other-work" id="workTypeOther" class="w-4 h-4 text-accent">
                                <span class="text-foreground/80">Other (please specify):</span>
                            </label>
                        </div>
                        <input type="text" name="workTypeOther" id="workTypeOtherInput" placeholder="Please specify" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent mt-2 conditional-field" style="display: none;">
                    </div>

                    <!-- Field 16: Organisation/Company Name (conditional) -->
                    <div class="mb-6 conditional-field" id="organisationField" style="display: none;">
                        <label class="block text-sm font-medium text-foreground mb-2">Organisation / company name <span class="text-red-500">*</span></label>
                        <p class="text-sm text-foreground/60 mb-2">Name of your company / organisation / consultancy</p>
                        <input type="text" name="organisation" placeholder="Enter organisation/company name" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>

                    <!-- Field 17: Accessibility Needs -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-2">Do you have any accessibility needs or comfort preferences you'd like us to be aware of?</label>
                        <p class="text-sm text-foreground/60 mb-2">(for example, sensory sensitivities, communication preferences, mobility needs, etc.)</p>
                        <p class="text-sm text-foreground/60 mb-2">You can share this only if you are comfortable. We use this to improve how we design prompts, events, or future features – not to limit you.</p>
                        <textarea name="accessibilityNeeds" rows="4" placeholder="Share any accessibility needs or preferences (optional)" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"></textarea>
                    </div>

                    <!-- Field 18: Membership Selection -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-foreground mb-3">Which Aurelia membership would you like to start with? <span class="text-red-500">*</span></label>
                        <p class="text-sm text-foreground/60 mb-3">You can always upgrade later as your journey evolves.</p>
                        
                        <div class="space-y-4">
                            <!-- Core Membership -->
                            <div class="border border-border rounded-lg p-4">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="radio" name="membership" value="core" required class="w-4 h-4 text-accent mt-1">
                                    <div class="flex-1">
                                        <div class="font-semibold text-foreground">Aurelia Core – Building Connections</div>
                                        <p class="text-sm text-foreground/70 mt-1">For those who want to understand themselves better and start meeting curated matches at a comfortable pace</p>
                                        <p class="text-sm font-semibold text-accent mt-2">Rs. 15,999 for 3 months</p>
                                        <p class="text-xs text-foreground/60 mt-1 italic">(Core is great if you want to go at your own pace with some support)</p>
                                        <button type="button" onclick="toggleDetails('coreDetails')" class="text-sm text-accent mt-2 hover:underline">Click here for details</button>
                                        
                                        <div id="coreDetails" class="membership-details">
                                            <p class="font-semibold mb-2">What you get:</p>
                                            <ul class="list-disc list-inside space-y-1 text-sm text-foreground/70">
                                                <li>Personality Assessment Report</li>
                                                <li>2–3 Curated Profiles Each Month</li>
                                                <li>"Where You'll Vibe" Suggestions</li>
                                                <li>Event & Experience Discounts</li>
                                                <li>Discounts on Relationship Coaching & Therapy</li>
                                                <li>Standard Support</li>
                                                <li>Expert-Supported First Meeting</li>
                                            </ul>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Elite Membership -->
                            <div class="border border-border rounded-lg p-4">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="radio" name="membership" value="elite" class="w-4 h-4 text-accent mt-1">
                                    <div class="flex-1">
                                        <div class="font-semibold text-foreground">Aurelia Elite – Curated Journeys</div>
                                        <p class="text-sm text-foreground/70 mt-1">For those who want high-touch support, deeper curation, and a guided relationship journey</p>
                                        <p class="text-sm font-semibold text-accent mt-2">₹51,000 for the first 3 months, plus a success fee of ₹1,00,000, applicable only if the match leads to marriage.</p>
                                        <p class="text-xs text-foreground/60 mt-1 italic">(Elite is what you choose if this is a top-3 priority in my life this year, and I want specialists walking with me)</p>
                                        <button type="button" onclick="toggleDetails('eliteDetails')" class="text-sm text-accent mt-2 hover:underline">Click here for details</button>
                                        
                                        <div id="eliteDetails" class="membership-details">
                                            <p class="font-semibold mb-2">What you get:</p>
                                            <ul class="list-disc list-inside space-y-1 text-sm text-foreground/70">
                                                <li>Personality Assessment Report + Guided Integration</li>
                                                <li>Up to 4 Curated Profiles Each Month</li>
                                                <li>Priority Event & Experience Access</li>
                                                <li>Background Verification Support</li>
                                                <li>1 Free Relationship Coaching / Therapy Session</li>
                                                <li>Concierge Support (Unlimited)</li>
                                                <li>Dedicated Aurelia Relationship Guide</li>
                                                <li>Monthly 1:1 Check-In Calls</li>
                                                <li>All First Meetings / Dates Supported by Aurelia Experts</li>
                                                <li>Family / Ecosystem Handling (for Marriage-Focused Users)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Safety Acknowledgment -->
                    <div class="mb-6">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="safetyAcknowledgment" required class="w-4 h-4 text-accent mt-1">
                            <span class="text-foreground/80 text-sm">
                                I understand that Aurelia is a space for respectful, consent-based interactions. I agree not to engage in harassment, stalking, threats, or any form of abusive behaviour, and I will follow basic safety practices when choosing to meet anyone offline.
                                <span class="text-red-500">*</span>
                            </span>
                        </label>
                        <p class="text-xs text-foreground/60 mt-1 ml-7">This is not a legal T&C (you already have that), but a simple, human check-box helps reinforce expectations.</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4 mt-8">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 h-10 px-6 bg-accent hover:bg-accent/90 text-white w-full">
                            Submit Registration
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/auth/signup.js')) !!}

    {!! JsValidator::formRequest('App\Http\Requests\Frontend\SignUpRequest', '#signupForm')->ignore(
        "input:hidden:not(input:hidden.required), [contenteditable='true']",
    ) !!}
@endpush