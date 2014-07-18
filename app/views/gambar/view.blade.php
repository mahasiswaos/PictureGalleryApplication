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
        <h1 class="page-header">Welcome
            <small>In <?php echo Auth::user()->nama_user; ?> Gallery</small>
        </h1>              

    </div>

</div>

<?php
if (count($gambar)==0) {
    ?>
    <div class="alert alert-warning fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Informasi!</h4>
        <p>Anda Tidak Memiliki Gambar di dalam Gallery Anda. Silahkan Upload Gambar Anda dengan menekan tombol Upload Gambar</p>
        <p>
            <a href="{{URL::to('/gambar/add');}}" class="btn btn-danger"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</a>
            <a href="{{URL::to('/gambar/view');}}" class="btn btn-default"><span class="glyphicon glyphicon-picture"></span> Lihat Gallery Foto</a>
        </p>
    </div>
    <?php
} else {
    foreach ($gambar as $value) {
        ?>
        <div class="row">

            <div class="col-lg-4 col-md-4 well effect2">
                <a href="#">
                    <img class="img-responsive" src="<?php echo URL::to($value['nama_file']); ?>" alt="">
                </a>
            </div>

            <div class="col-lg-8 col-md-8">
                <h3>
                    <?php echo $value['judul']; ?>&nbsp;&nbsp;
                    <span class="label label-info">
                        <span class="glyphicon glyphicon-time"></span> 
                        <?php echo $value['tgl']; ?></span>

                </h3>
                <h4><small>Kategori : <?php echo $value['kategori']; ?>, Lokasi : <?php echo $value->lokasi->nama_lokasi . ", " . $value->lokasi->kabupaten; ?></small></h4>
                <h4><small><span class="label label-default">Pemilik : <?php echo $value->users->username; ?>, Email : <?php echo $value->users->email; ?></span></small></h4>

                <p><?php echo $value['deskripsi']; ?></p>

                <a class="btn btn-default" href="#" title="Lihat Ukuran Besar" data-toggle="modal" data-target="#<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-fullscreen"></span></a>
                <a class="btn btn-warning" href="{{ URL::to('/gambar/edit/' . $value->id) }}" title="Ubah Tentang Gambar"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-danger" href="{{ URL::to('/gambar/delete/' . $value->id) }}" title="Hapus" onclick="return confirm('Anda Yakin Ingin Mengahapus File gambar dengan Judul : <?php echo $value['judul'];?>?')"><span class="glyphicon glyphicon-trash"></span></a>
            </div>
        </div>
        @include('gambar.viewmodal',$value)
        <?php
    }
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