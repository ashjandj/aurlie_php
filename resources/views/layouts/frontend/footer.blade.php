<footer class="bg-foreground/5 border-t border-border py-12">
    <div class="container">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
            <div class="mb-4"><img alt="Aurelia Logo" class="h-12 w-auto" src="{{asset_path('assets/images/frontend/aurelia-logo.png')}}"></div>
            <p class="text-sm text-foreground/60 mb-4">Love isn't a coincidence, its an introduction</p>
            </div>
            <div>
            <h4 class="font-semibold text-foreground mb-4">Product</h4>
            <ul class="space-y-2 text-sm text-foreground/60">
                <li><a href="#how-it-works" class="hover:text-foreground transition">How It Works</a></li>
                <li><a href="{{ route('frontend.membership') }}" class="hover:text-foreground transition">Membership</a></li>
                <li><a href="{{ route('frontend.events') }}" class="hover:text-foreground transition">Events</a></li>
                <li><a href="{{ route('frontend.referral') }}" class="hover:text-foreground transition">Refer &amp; Earn</a></li>
            </ul>
            </div>
            <div>
            <h4 class="font-semibold text-foreground mb-4">Company</h4>
            <ul class="space-y-2 text-sm text-foreground/60">
                <li><a href="/about-us" class="hover:text-foreground transition">About Us</a></li>
                <li><a href="{{ route('frontend.blog') }}" class="hover:text-foreground transition">Blog</a></li>
                <!-- <li><a href="{{ route('frontend.stories') }}" class="hover:text-foreground transition">Success Stories</a></li> -->
            </ul>
            </div>
            <div>
            <h4 class="font-semibold text-foreground mb-4">Legal</h4>
            <ul class="space-y-2 text-sm text-foreground/60">
                <li><a href="/privacy-policy" class="hover:text-foreground transition">Privacy Policy</a></li>
                <li><a href="/terms-and-condition" class="hover:text-foreground transition">Terms of Service</a></li>
                <li><a href="{{ route('users.contactUs') }}" class="hover:text-foreground transition">Contact</a></li>
            </ul>
            </div>
        </div>
        <div class="border-t border-border pt-8 text-center text-sm text-foreground/60">
            <p>© {{date('Y')}} The Aurelia Club. All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- <footer class="pt-4 mt-md-5 pt-md-5 border-top">
    <div class="row mb-md-5">
        <div class="col-4 text-center col-md">
            <h5>{{__('labels.about')}}</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="/about-us">{{__('labels.about_us')}}</a></li>
                <li><a class="text-muted" href="/terms-and-condition">{{__('labels.terms_n_condition')}}</a></li>
                <li><a class="text-muted" href="/privacy-policy">{{__('labels.privacy_n_policy')}}</a></li>
                <li><a class="text-muted" href="{{route('frontend.faq')}}">{{__('labels.faq')}}</a></li>
            </ul>
        </div>
        <div class="col-4 text-center col-md">
            <h5>{{__('labels.features')}}</h5>
            <ul class="list-unstyled text-small">
            </ul>
        </div>
        <div class="col-4 text-center col-md">
            <h5>{{__('labels.resources')}}</h5>
        </div>
    </div>
    <div class="row copyright border-top">
        <div class="col-12 col-md text-center">
            <small class="d-block my-3 text-muted">© {{date('Y')}} {{__('labels.all_right_reserve')}}</small>
        </div>
    </div>
</footer> -->
@if (getLoggedInUserDetail())
    <!-- <x-media-manager/>
    {!! returnScriptWithNonce(asset_path('assets/js/media-manager.js')) !!} -->
@endif
{{-- Change Password Modal  --}}
<!-- @include('frontend.profile.change-password') -->
{{-- Change Password Modal End  --}}

@if(session()->has('success'))
    <script nonce="{{ csp_nonce('script') }}">
        $(document).ready(function () {
            successToaster("{!! session('success') !!}");
        });
    </script>
@endif

@if(session()->has('error'))
    <script nonce="{{ csp_nonce('script') }}">
        $(document).ready(function () {
            errorToaster("{!! session('error') !!}");
        });
    </script>
@endif
