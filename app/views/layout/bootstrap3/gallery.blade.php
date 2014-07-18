<html>
    <head>
        @include('layout.bootstrap3.headgallery')
    </head>
    <body>
        @include('layout.bootstrap3.nav')
        <div class="container marketing">
            @yield('content')
        </div>
        @include('layout.bootstrap3.footergallery')
    </body>
</html>