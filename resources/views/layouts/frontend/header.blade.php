<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-border shadow-sm">
    <div class="container flex items-center justify-between py-4">        
        <a href="{{ route('frontend.home') }}" class="flex items-center gap-2 hover:opacity-80 transition"><img alt="Aurelia" class="h-12 w-auto" src="{{asset_path('assets/images/frontend/aurelia-logo.png')}}"></a>
        <div class="hidden md:flex items-center gap-8">
            <a href="/about-us" class="text-sm text-foreground/70 hover:text-foreground transition">About Us</a>
            <a href="#how-it-works" class="text-sm text-foreground/70 hover:text-foreground transition">How It Works</a>
            <a href="{{ route('frontend.membership') }}" class="text-sm text-foreground/70 hover:text-foreground transition">Membership</a>
            <a href="{{ route('frontend.blog') }}" class="text-sm text-foreground/70 hover:text-foreground transition">Blog</a>
            <a  href="{{ route('frontend.referral') }}" class="text-sm text-foreground/70 hover:text-foreground transition">Refer &amp; Earn</a>
            <!-- <a href="{{ route('frontend.stories') }}" class="text-sm text-foreground/70 hover:text-foreground transition">Stories</a> -->
        </div>
        <div class="flex items-center gap-3">
            @if (getLoggedInUserDetail() && isTypeUser())
                <a href="{{ route('frontend.profile.index') }}">
                    <button
                        data-slot="button"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-transparent shadow-xs hover:bg-accent dark:bg-transparent dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5"
                    >
                        Dashboard
                    </button>
                </a>
                <button
                    id="logoutButton"
                    type="button"
                    data-slot="button"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-accent hover:bg-accent/90 text-white"
                >
                    Logout
                </button>
            @else
                <a href="{{ route('frontend.auth.login.get') }}">
                    <button
                        data-slot="button"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-transparent shadow-xs hover:bg-accent dark:bg-transparent dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5"
                    >
                        Login
                    </button>
                </a>
                <a href="{{ route('front.auth.signup') }}">
                    <button
                        data-slot="button"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*=&#39;size-&#39;])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-accent hover:bg-accent/90 text-white"
                    >
                        Sign Up
                    </button>
                </a>
            @endif
        </div>
    </div>
</nav>

<!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{ route('frontend.home') }}"
            class="app-name">{{ getAppName() }}</a></h5>
    <nav class="my-2 my-md-0 mr-md-3 front-end-nav">
        <a class="p-2 text-dark" href="/about-us">{{ __('labels.about_us') }}</a>
        <a class="p-2 text-dark" href="/terms-and-condition">{{ __('labels.terms_n_condition') }}</a>
        <a class="p-2 text-dark" href="/privacy-policy">{{ __('labels.privacy_n_policy') }}</a>
        <a class="p-2 text-dark" href="{{ route('frontend.faq') }}">{{ __('labels.faq') }}</a>
        <a class="p-2 text-dark" href="{{ route('users.contactUs') }}">{{ __('labels.contact_us') }}</a>
    </nav>
    <a class="btn btn-primary me-2" href="{{ route('frontend.pricing') }}"><em class="icon ni ni-star-fill"></em>{{ __('labels.upgrade') }}</a>
    @if (getLoggedInUserDetail() && isTypeUser())
        <li class="dropdown user-dropdown me-2">
            <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                <div class="user-toggle">
                    <div class="user-avatar sm">
                        <img src="{{ getProfileImageUrl(getLoggedInUserDetail()->id) ?? asset_path('assets/images/backend/default-user.jpg') }}"
                            id="currentProfileImage" class="img-fluid h-100 object-fit-cover" alt="Not Found">
                    </div>
                    <div class="user-info d-none d-xl-block">
                        <div class="user-name dropdown-indicator">{{ getLoggedInUserDetail()->name }}</div>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                    <div class="user-card">
                        <div class="user-avatar overflow-hidden">
                            <img src="{{ getProfileImageUrl(getLoggedInUserDetail()->id) ?? asset_path('assets/images/backend/default-user.jpg') }}"
                                class="w-100 h-100 object-fit-cover rounded-0"
                                alt="{{ getLoggedInUserDetail()->name }}">
                        </div>
                        <div class="user-info">
                            <span class="lead-text">{{ getLoggedInUserDetail()->name }}</span>
                            <span class="sub-text">{{ getLoggedInUserDetail()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li>
                            <a href="{{ route('frontend.profile.index') }}">
                                <em class="icon ni ni-user-alt"></em>
                                <span>{{ __('labels.profile') }}</span>
                            </a>
                        </li>
                        <li>
                            <a 
                                href="{{ !auth()->user()->login_security && !auth()->user()->login_type ? route('otp.security.show') : '#' }}" 
                                id="{{ !auth()->user()->login_security && !auth()->user()->login_type ? '' : 'mediaManagerBtn' }}" 
                                data-type="default"
                                data-id="{{ getLoggedInUserDetail()->id }}">
                                <em class="icon ni ni-file"></em>
                                <span>{{ __('labels.media') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subscription.details') }}">
                                <em class="icon ni ni-money"></em>
                                <span>{{ __('labels.membership') }}</span>
                            </a>
                        </li>
                        @if (!auth()->user()->login_type)
                            <li>
                                @if (!auth()->user()->login_security)
                                    <a href="{{ route('otp.security.show') }}">
                                @else
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#changePassword">
                                @endif
                                    <em class="icon ni ni-lock-alt"></em><span>{{ __('labels.change_password') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{!auth()->user()->login_security ? route('otp.security.show') : route('frontend.settings')}}">
                                    <em class="icon ni ni-setting"></em><span>{{ __('labels.settings') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li>
                            <a href="#" id="logoutButton">
                                <em class="icon ni ni-signout"></em>
                                <span>{{ __('labels.sign_out') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        @if (!auth()->user()->login_type)
            <li class="dropdown securityIcon ml-5">
                <a href="{{route('frontend.settings')}}" class="dropdown-toggle nk-quick-nav-icon" id="passwordSecurityIcon">
                   
                    @if (!Auth::user()->login_security)
                        <em 
                            class="icon ni ni-shield-off text-danger" 
                            data-toggle="tooltip"
                            title="{{__('labels.googleTwoFactor.password_protection_disabled')}}">
                        </em>
                    @else
                        <em 
                            class="icon ni ni-shield-check text-success" 
                            data-toggle="tooltip"
                            title="{{__('labels.googleTwoFactor.password_protection_enabled')}}">
                        </em>
                    @endif
                </a>
            </li>
        @endif
    @else
        <a class="btn btn-outline-primary"
            href="{{ route('front.auth.signup') }}">{{ __('labels.sign_up_btn') }}</a>&nbsp;
        <a class="btn btn-outline-primary"
            href="{{ route('frontend.auth.login.get') }}">{{ __('labels.sign_in') }}</a>
    @endif
    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="quick-icon border border-light">
                <img class="icon" src="{{getCurrentFlagImage()}}">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1" style="">
            <ul class="language-list">
                @foreach (config('languages') as $locale => $language)
                    <li>
                        <a href="{{route('change-language', ['locale' => $locale])}}" class="language-item">
                            <img src="{{getFlagImage($language['flag'])}}" alt="" class="language-flag">
                            <span class="language-name">{{$language['display']}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
</div> -->
