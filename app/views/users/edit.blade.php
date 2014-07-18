@extends('layout.bootstrap3.users')

@section('title')
Picture Gallery App
@stop
@section('content')
<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Form Edit
            <small>User <strong><?php echo $isi->nama_user; ?></strong></small>
        </h1> 
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-edit"></i> 
                Form Update Users
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo URL::to("/users/pupdate/" . $isi->id); ?>" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" name="username" value="<?php echo $isi->username ?>" class="form-control ">
                            <p style="color: red"> {{ $errors->first('username') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-4">
                            <input type="text" name="password" value="<?php echo Crypt::decrypt($isi->password) ?>" class="form-control">
                            <p style="color: red"> {{ $errors->first('password') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" name="email" value="<?php echo $isi->email ?>" class="form-control">
                            <p style="color: red"> {{ $errors->first('email') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama User</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama_user" value="<?php echo $isi->nama_user ?>" class="form-control">
                            <p style="color: red"> {{ $errors->first('nama_user') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-saved"></i> Update</button>
                            <a href="<?php echo URL::to("/users"); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
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
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p><span class="glyphicon glyphicon-copyright-mark"></span> 2014 Pemrograman Web II &middot; 
        <a href="http://www.stmikbumigora.ac.id"><span class="glyphicon glyphicon-link"></span>STMIK Bumigora Mataram</a>
    </p>
    <p>
        <span class="glyphicon glyphicon-bullhorn"></span> Ayat Hidayat &middot; Sapri Al-Islah &middot; Yhan Saja
    </p>
</footer>
@stop