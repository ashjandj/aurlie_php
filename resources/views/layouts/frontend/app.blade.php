<!DOCTYPE html>
<html lang="{{config('app.locale')}}" class="js">

<head>
    <title> @yield('title') | {{getAppName()}} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="meta-keywords" content="@yield('meta-keywords')" />
    <meta name="meta-title" content="@yield('meta-title')" />
    <meta name="meta-description" content="@yield('meta-description')" />
    @include('layouts.frontend.head-link')
    @stack('css')
</head>

<body>
    <div id="root">
        <section aria-label="Notifications alt+T" tabindex="-1" aria-live="polite" aria-relevant="additions text" aria-atomic="false"></section>
        <div class="min-h-screen flex flex-col">
            @include('layouts.frontend.header')
            <div class="container">
            @yield('content')
            @include('layouts.frontend.footer')
            </div>
            @stack('scripts')
            @include('cookie-consent::index')
        </div>
    </div>
</body>

</html>