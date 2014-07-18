<html>
    <head>
        @include('layout.bootstrap3.head')
        <style type="text/css">
            body {
                background: url(<?php echo URL::to('img/bg.jpg');?>) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @include('layout.bootstrap3.footer')
    </body>
</html>