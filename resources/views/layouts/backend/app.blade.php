<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="js">

<head>
    <title> @yield('title') | {{ getAppName() }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('layouts.backend.head-link')
    @stack('css')
</head>

<body
    class="nk-body bg-lighter npc-default no-touch nk-nio-theme chat-profile-autohide {{ Auth::check() && Auth::user()->user_type == \App\Models\User::TYPE_ADMIN ? 'has-sidebar' : 'pg-auth' }} {{ getCookieKey('theme_dark_mode') == 1 ? 'dark-mode' : '' }}">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @auth
                @if (Auth::check() && Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
                    @include('layouts.backend.sidebar')
                @endif
            @endauth
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div
                class="nk-wrap {{ Auth::check() && Auth::user()->user_type == \App\Models\User::TYPE_ADMIN ? '' : 'nk-wrap-nosidebar' }}">

                @auth
                    @if (Auth::check() && Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
                        @include('layouts.backend.header')
                    @endif
                @endauth
                <!-- content @s -->
                @yield('content')
                <!-- content @e -->
                <!-- footer @s -->
                @include('layouts.backend.footer')
                <!-- footer @e -->
            </div>

            <!-- main @e -->
        </div>
        @stack('scripts')
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    {{-- @include('cookie-consent::index') --}}
</body>

</html>
