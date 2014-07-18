@extends('layout.bootstrap3.users');

@section('title')
Picture Gallery App
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Halaman
            <small>View Lokasi</small>
            <div class="col-lg-4 pull-right">
                <form action="{{ URL::to('/lokasi/cari') }}" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" id="tultip" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Masukkan Kata Kunci Pencarian Anda." 
                               placeholder="nama lokasi, tempat, kabupaten" required="">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                                Cari!
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </h1> 
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <a class="btn btn-primary" href="<?php echo URL::to('/lokasi/add') ?>">
            <i class="glyphicon glyphicon-plus-sign"></i>
            Tambah 
        </a>
        <br/>
        <br/>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-map-marker"></i> 
                Form View Lokasi
            </div>
            <div class="">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="active">
                            <th>ID</th>
                            <th>Nama Lokasi</th>
                            <th>Tempat</th>
                            <th>Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($isi as $val) { ?>
                            <tr>
                                <td><?php echo $val['id']; ?></td>
                                <td><?php echo $val['nama_lokasi']; ?></td>
                                <td><?php echo $val['tempat']; ?></td>
                                <td><?php echo $val['kabupaten']; ?></td>
                                <td><a href="<?php echo URL::to('/lokasi/edit/' . $val->id); ?>" class="btn btn-info">
                                        <i class="glyphicon glyphicon-edit"></i>
                                        Ubah
                                    </a>
                                    <a href="<?php echo URL::to('/lokasi/delete/' . $val->id); ?>" onclick="return confirm('Yakin ingin hapus data ini!')" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo $isi->links(); ?>
                </div>
            </div>
            <div class="panel-footer"></div>
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

