<title>@yield('title')</title>
<link rel="shortcut icon" href="<?php echo URL::to('img/fav_picture.png'); ?>">
@include('layout.bootstrap3.css')
<style type="text/css">
            body {
                background: url(<?php echo URL::to('img/bg.jpg');?>) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>