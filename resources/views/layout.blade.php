<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- <link rel="shortcut icon" style="" href="/assets/img/logo-copy.png" type="image/x-icon" /> --}}
    @yield('styles')

</head>

<body>
    {{-- @if (Route::currentRouteName() != 'password.request' && Route::currentRouteName() != 'admin-dashboard' && Route::currentRouteName() != 'password.reset' && Route::currentRouteName() != 'login.admin' && Route::currentRouteName() != 'register.admin')
        @include('partials/navbar')
    @endif --}}
    <div class="">
        @yield('content')
    </div>

    @yield('script')
    
</body>

</html>
