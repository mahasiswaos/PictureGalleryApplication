@extends('layout.bootstrap3.login')

@section('title')
Picture Gallery App
@stop
@section('content')

@if (Session::has('message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message')}}
</div>
@endif

<div class="row">
    <div class="col-xs-6 col-sm-offset-3 well text-right">
        <strong><big>Welcome</big></strong> in Login Page Users
    </div>
    <div class="col-xs-6 col-sm-offset-3">
        <div class="panel panel-primary effect2">
            <div class="panel-heading">
                <h2 class="panel-title"><span class="glyphicon glyphicon-off"></span> Login System</h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo URL::to('/login/proses'); ?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                            <p style="color:red">{{$errors->first('email')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                            <p style="color:red">{{$errors->first('password')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success btn-lg">Sign in <span class="glyphicon glyphicon-log-in"></span></button>
                            <a href="{{URL::to('/')}}" type="button" class="btn btn-danger btn-lg">Kembali Ke Beranda <span class="glyphicon glyphicon-send"></span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- FOOTER -->
<footer>
    <p><span class="glyphicon glyphicon-copyright-mark"></span> 2014 Pemrograman Web II &middot; 
        <a href="http://www.stmikbumigora.ac.id"><span class="glyphicon glyphicon-link"></span>STMIK Bumigora Mataram</a>
    </p>
    <p>
        <span class="glyphicon glyphicon-bullhorn"></span> Ayat Hidayat &middot; Sapri Al-Islah &middot; Yhan Saja
    </p>
</footer>
@stop
