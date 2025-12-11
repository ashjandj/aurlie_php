<div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <x-sidebar />
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>

                <ul class="nk-menu">
                    {{-- Dashboard  --}}
                    @can('admin.dashboard')
                        <li class="nk-menu-item {{ sidebarRouteCheck('admin.dashboard') }} ">
                            <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                <span class="nk-menu-text">{{ __('labels.dashboard') }}</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    @endcan

                    {{-- User Management  --}}
                    @can('admin.users.index')
                        {{-- Roles --}}
                        <li class="nk-menu-item {{ sidebarRouteCheck('admin.users') }} ">
                            <a href="{{ route('admin.users.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                <span class="nk-menu-text">{{ __('labels.user_management') }}</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    @endcan

                    {{-- Match & Recommend  --}}
                    @can('admin.users.index')
                        <li class="nk-menu-item {{ sidebarRouteCheck('admin.matching') }} ">
                            <a href="{{ route('admin.matching.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-heart-fill"></em></span>
                                <span class="nk-menu-text">Match & Recommend</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    @endcan

                    {{-- Role Management  --}}
                    @if(false)
                        @can('admin.roles.index')
                            <li class="nk-menu-item {{ sidebarRouteCheck('admin.roles') }} ">
                                <a href="{{ route('admin.roles.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-security"></em></span>
                                    <span class="nk-menu-text">{{ __('labels.role_management') }}</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcan
                    @endif

                    {{-- Media Manager  --}}
                    @can('admin.media.view')
                        <!-- <li class="nk-menu-item mediaSidebar">
                            <a href="{{ route('admin.media.view') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
                                <span class="nk-menu-text">{{ __('labels.media_manager') }}</span>
                            </a>
                        </li>--> <!-- .nk-menu-item -->
                    @endcan

                    {{-- Subscription Plans  --}}
                    @if(false)
                        @canany(['admin.subscription-plan.index', 'admin.subscription-price.index'])
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-reports-alt"></em></span>
                                    <span class="nk-menu-text">{{ __('labels.subscription') }}</span>
                                </a>
                                <ul class="nk-menu-sub">

                                    @can('admin.subscription-plan.index')
                                        {{-- subscription plan  --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('admin.subscription-plan.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-report-profit"></em></span>
                                                <span class="nk-menu-text">{{ __('labels.subscription_plan') }}</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('admin.subscription-price.index')
                                        {{-- subscription price --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('admin.subscription-price.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                                <span class="nk-menu-text">{{ __('labels.subscription_price') }}</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('admin.transaction.index')
                                        {{-- transaction Management  --}}
                                        <li class="nk-menu-item {{ sidebarRouteCheck('admin.transaction.index') }} ">
                                            <a href="{{ route('admin.transaction.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                                                <span class="nk-menu-text">{{ __('labels.transactions') }}</span>
                                            </a>
                                        </li>
                                        <!-- .nk-menu-item -->
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                    @endif

                    {{-- CMS Management --}}
                    @can('admin.cms.edit')
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle {{ sidebarRouteCheck() }}">
                                <span class="nk-menu-icon"><em class="icon ni ni-file-text-fill"></em></span>
                                <span class="nk-menu-text">{{ __('labels.cms') }}</span>
                            </a>
                            <ul class="nk-menu-sub">
                                @if(false)
                                    <li class="nk-menu-item {{ sidebarRouteCheck() }} ">
                                        <a href="{{ route('admin.cms.edit', 'about-us') }}" class="nk-menu-link">
                                            <span class="nk-menu-text">{{ __('labels.about_us') }} </span></a>
                                        </a>
                                    </li>
                                @endif
                                <li class="nk-menu-item {{ sidebarRouteCheck() }} ">
                                    <a href="{{ route('admin.cms.edit', 'terms-and-condition') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">{{ __('labels.terms_n_condition') }} </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item {{ sidebarRouteCheck() }} ">
                                    <a href="{{ route('admin.cms.edit', 'privacy-policy') }}" class="nk-menu-link">
                                        <span class="nk-menu-text">{{ __('labels.privacy_n_policy') }} </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    {{-- FAQ Management  --}}
                    @if(false)
                        @can('admin.faq.index')
                            <li class="nk-menu-item {{ sidebarRouteCheck('admin.faq.index') }} ">
                                <a href="{{ route('admin.faq.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-help-fill"></em></span>
                                    <span class="nk-menu-text">{{ __('labels.faqs') }}</span>
                                </a>
                            </li>
                        @endcan
                    @endif


                    @can('admin.contactUs')
                        {{-- Contact Us Management  --}}
                        <li class="nk-menu-item {{ sidebarRouteCheck('admin.contactUs') }} ">
                            <a href="{{ route('admin.contactUs') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-contact"></em></span>
                                <span class="nk-menu-text">{{ __('labels.contact_us') }}</span>
                            </a>
                        </li>
                    @endcan

                    {{-- Activity Management --}}
                    @can('admin.activity.index')
                        <li class="nk-menu-item {{ sidebarRouteCheck('admin.activity.index') }} ">
                            <a href="{{ route('admin.activity.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-activity"></em></span>
                                <span class="nk-menu-text">{{ __('labels.activity') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
