@extends('layout.bootstrap3.users');

@section('title')
Picture Gallery App
@stop
@section('content')
<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Halaman
            <small>Form Tambah Lokasi</small>
        </h1> 
    </div>
</div>

<div class="row">
    <div class="col-sm-7">
        <div class="panel panel-success">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-plus"></i>
                Form Tambah
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo URL::to('/lokasi/add/proses'); ?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Lokasi</label>
                        <div class="col-sm-6">
                            <input type="text" name="nama_lokasi" placeholder="Nama Lokasi" class="form-control"/>
                            <p style="color: red">{{ $errors->first('nama_lokasi'); }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">        
                        <label class="control-label col-sm-3">Tempat</label>
                        <div class="col-sm-6">
                            <input type="text" name="tempat" placeholder="Tempat" class="form-control"/>
                            <p style="color: red">{{ $errors->first('tempat'); }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kabupaten</label>
                        <div class="col-sm-6">
                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten"/>
                            <p style="color: red">{{ $errors->first('kabupaten'); }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-3">
                            <button type="submit" name="simpan" class="btn btn-default">
                                <i class="glyphicon glyphicon-floppy-save"></i>
                                Simpan
                            </button>
                            <button type="reset" name="reset" class="btn btn-info">
                                <i class="glyphicon glyphicon-minus-sign"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
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

