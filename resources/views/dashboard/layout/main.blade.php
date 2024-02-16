<!DOCTYPE html>
<html lang="en">

@include('dashboard.partials.head')

<body>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('dashboard.partials.sidebar')
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('dashboard.partials.navbar')

            @yield('content')
            @include('dashboard.partials.footer')
        </div>
    </div>

    @include('dashboard.partials.script')
</body>

</html>
