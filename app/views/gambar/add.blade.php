@extends('layout.bootstrap3.users')

@section('title')
Picture Gallery App
@stop
@section('content')
<div class="row">
    <div class="col-sm-8">
        <h1 class="page-header">Form
            <small>Upload Gambar <?php echo Auth::user()->nama_user; ?></small>
        </h1> 
        <div class="panel panel-success">
            <div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> Form Upload Gambar</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo URL::to("/gambar/proses_add"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama User</label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" name="users_id" value="<?php echo Auth::user()->id; ?>" checked="">
                                </span>
                                <input type="text" class="form-control" value="<?php echo Auth::user()->nama_user; ?>" readonly="">
                            </div>
                            <p style="color: red"> {{ $errors->first('users_id') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Judul</label>
                        <div class="col-sm-4">
                            <input type="text" name="judul" class="form-control " placeholder="Judul Gambar">
                            <p style="color: red"> {{ $errors->first('judul') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            <p style="color: red"> {{ $errors->first('deskripsi') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Lokasi</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="lokasi_id">
                                <option value="" disabled="" selected="">Pilih Lokasi...!</option>
                                <?php foreach ($isi_lokasi as $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->nama_lokasi." (".$value->kabupaten.")" ?></option>
                                <?php } ?>
                            </select>
                            <p style="color: red"> {{ $errors->first('lokasi_id') }} </p>
                        </div>
                        <label for="inputEmail3" class="control-label">
                            <a href="<?php echo URL::to("/lokasi/add"); ?>" target="_blank" id="tultip" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Refresh Halaman setelah menambah lokasi">
                                <span class="glyphicon glyphicon-plus"></span> Tambah Lokasi
                            </a>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar</label>
                        <div class="col-sm-5">
                            <input type="file" name="nama_file" class="form-control" placeholder="gambar">
                            <p style="color: red"> {{ $errors->first('nama_file') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-5">
                            <input type="text" name="kategori" class="form-control" placeholder="Kategori Foto">
                            <p style="color: red"> {{ $errors->first('kategori') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-saved"></i> Save</button>
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