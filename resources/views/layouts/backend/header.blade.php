<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{ route('admin.dashboard') }}" class="logo-link">
                    <x-logo logoClass="logo-dark"></x-logo>
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list nk-news-list d-flex">
                    <div class="nk-news-icon">
                        <em class="icon ni ni-calender-date"></em>
                    </div>
                    <p>{{ __('labels.today_date_and_time') }} {{ nowDate('jS M Y \a\t h:i A') }}</p>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <!-- <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="quick-icon border border-light">
                                <img class="icon" src="{{ getCurrentFlagImage() }}">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1" style="">
                            <ul class="language-list">
                                @foreach (config('languages') as $locale => $language)
                                    <li>
                                        <a href="{{ route('admin.change-language', ['locale' => $locale]) }}"
                                            class="language-item">
                                            <img src="{{ getFlagImage($language['flag']) }}" alt=""
                                                class="language-flag">
                                            <span class="language-name">{{ $language['display'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="dropdown securityIcon">
                        <a href="{{ route('admin.setting.index') }}?tab=login-security"
                            class="dropdown-toggle nk-quick-nav-icon" id="passwordSecurityIcon">
                           
                            @if (Auth::user()->login_security == 0)
                                <em class="icon ni ni-shield-off text-danger"
                                    title="{{ __('labels.googleTwoFactor.password_protection_disabled') }}"></em>
                            @else
                                <em class="icon ni ni-shield-check text-success"
                                    title="{{ __('labels.googleTwoFactor.password_protection_enabled') }}"></em>
                            @endif
                        </a>
                    </li> -->
                     <!-- 0 meaning of not password protected -->
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img src="{{ getProfileImageUrl(getLoggedInUserDetail()->id) ?? asset_path('assets/images/backend/default-user.jpg') }}"
                                        id="currentProfileImage" class="img-fluid h-100 object-fit-cover"
                                        alt="Not Found">
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
                                        <a href="{{ route('admin.profile.index') }}">
                                            <em class="icon ni ni-user-alt"></em>
                                            <span>{{ __('labels.profile') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="modal" data-bs-target="#changePassword">
                                            <em
                                                class="icon ni ni-lock-alt"></em><span>{{ __('labels.change_password') }}</span>
                                        </a>
                                    </li>
                                    @can('log-viewer.index')
                                        <!-- <li>
                                            <a href="{{ route('log-viewer.index') }}">
                                                <em class="icon ni ni-file-text"></em><span>{{ __('labels.logs') }}</span>
                                            </a>
                                        </li> -->
                                    @endcan
                                    <!-- <li>
                                        <a href="{{ route('admin.setting.index') }}">
                                            <em class="icon ni ni-setting"></em><span>{{ __('labels.setting') }}</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a class="dark-switch {{ getCookieKey('theme_dark_mode') == 1 ? 'active' : '' }}"
                                            href="#" id="themeDarkMode"
                                            data-theme_dark_mode="{{ getCookieKey('theme_dark_mode') }}">
                                            <em class="icon ni ni-moon"></em><span>{{ __('labels.dark_mode') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('admin.logout') }}">
                                            <em class="icon ni ni-signout"></em>
                                            <span>{{ __('labels.sign_out') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
