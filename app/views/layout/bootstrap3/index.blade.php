<html>
    <head>
        @include('layout.bootstrap3.head')
    </head>
    <body>
        @include('layout.bootstrap3.nav')
        @include('layout.bootstrap3.header')
        <div class="container">
            @yield('content')
        </div>
        @include('layout.bootstrap3.footer')
    </body>
</html>