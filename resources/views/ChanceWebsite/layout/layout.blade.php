<!DOCTYPE html>
<html lang="en">

<head>
    @include('ChanceWebsite.include.head')
</head>

<body>
    @include('ChanceWebsite.include.loader')
    <section id="content">
        <header class="relative" id="sc1">
            @yield('Header-background')
            @include('ChanceWebsite.include.nav')
            @yield('main-sec')
        </header>
        <section>
            @yield('content')
        </section>
        @include('ChanceWebsite.include.footer')
        @include('ChanceWebsite.include.js_scripte')
    </section>
</body>

</html>
