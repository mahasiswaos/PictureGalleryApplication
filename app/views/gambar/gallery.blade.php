@extends('layout.bootstrap3.gallery')

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
<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Halaman 
                <small>Gallery Gambar</small>
                <div class="col-lg-4 pull-right">
                        <form action="{{(Auth::check())? URL::to('/gambar/search'):URL::to('/view/search')}}" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="value" id="tultip" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Masukkan Kata Kunci Pencarian Anda.">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> Cari!</button>
                                </span>
                            </div>
                        </form>
                </div>
            </h1>              

        </div>

    </div>

    <?php
    if (count($gambar) == 0) {
        ?>
        <div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>Informasi!</h4>
            <p>Anda Tidak Memiliki Gambar di dalam Gallery Anda. Silahkan Upload Gambar Anda dengan menekan tombol Upload Gambar</p>
            <p>
                <a href="{{URL::to('/gambar/add');}}" class="btn btn-danger"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Gambar Baru</a>
                <a href="<?php echo (Auth::check())? URL::to('/gambar/view'):URL::to('/view');?>" class="btn btn-default"><span class="glyphicon glyphicon-picture"></span> Lihat Kembali Gallery Foto</a>
            </p>
        </div>
        <?php
    } else {
        ?>
        <div class="row">
            <div class="container demo-3">
                <ul class="grid cs-style-3">
                    <?php
                    foreach ($gambar as $value) {
                        ?>
                        <li>
                            <figure>
                              <img class="img-rounded" src="<?php echo URL::to($value['nama_file']); ?>" alt="img04">
                                <figcaption>
                                    <h3><?php echo $value['judul']; ?></h3>
                                    <span>
                                        <?php echo $value->users->nama_user; ?>
                                    </span>
                                    <small><a href="#" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Lihat Detail</a></small>

                                </figcaption>
                            </figure>
                        </li>
                        @include('gambar.viewmodal',$value)
                        <?php
                    }
                    ?>
                </ul>
            </div><!-- /container -->
        </div>
        <?php
//        }
    }
    ?>
    <hr />

    <div class="row text-center">

        <div class="col-lg-12">
            <div style="text-align: center">
                <?php echo $gambar->links(); ?>
            </div>
        </div>

    </div>
</div>
<hr>

<!-- FOOTER -->
<footer>
    <small>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p><span class="glyphicon glyphicon-copyright-mark"></span> 2014 Pemrograman Web II &middot; 
        <a href="http://www.stmikbumigora.ac.id"><span class="glyphicon glyphicon-link"></span>STMIK Bumigora Mataram</a>
    </p>
    <p>
        <span class="glyphicon glyphicon-bullhorn"></span> Ayat Hidayat &middot; Sapri Al-Islah &middot; Yhan Saja
    </p>
    </small>
</footer>



@stop