@extends('layout.bootstrap3.users')

@section('title')
Picture Gallery App
@stop
@section('content')
@if (Session::has('message'))
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Halaman
            <small>View User</small>
        </h1> 
    </div>
</div>

<div class="row">
    <?php
    if (Auth::check()) {
        $level = Auth::user();
        if ($level->level == 'admin') {
            ?>
            <div class="col-lg-12">
                <a href="<?php echo URL::to('/users/add'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Add User</a><br/><br/>
                <div class="panel panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> Tabel Users</div>

                    <!-- Table -->
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr class="panel-default">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nama User</th>
                                <th>Level</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($users as $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['username']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['nama_user']; ?></td>
                                    <td><?php echo $value['level']; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        if (Auth::check()) {
                                            $user = Auth::user();
                                            if ($user->username == $value['username']) {
                                                ?>
                                                <a class="btn btn-small btn-primary" title="Update" href="{{ URL::to('/users/update/' . $value->id) }}"><span class=" glyphicon glyphicon-edit"></span> </a>
                                                <?php
                                            } else if ($value['username'] != 'admin') {
                                                ?>
                                                <div class="btn btn-group">
                                                    <a class="btn btn-small btn-danger" title="Delete" href="{{ URL::to('/users/delete/' . $value->id) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                                                    <a class="btn btn-small btn-primary" title="Update" href="{{ URL::to('/users/update/' . $value->id) }}"><span class=" glyphicon glyphicon-edit"></span> </a>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </table>

                        <div style="text-align: center">
                            <?php echo $users->links(); ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer"></div>
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-warning fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>Informasi!</h4>
                <p>Anda Belum Berhak mengakses halaman ini.</p>
            </div>
            <?php
        }
    }
    ?>
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