@extends('layout.bootstrap3.index')

@section('title')
Picture Gallery App
@stop
@section('content')

<div class="col-lg-12">
    <h1 class="page-header"><span class="glyphicon glyphicon-picture"></span> Gallery Gambar 
        <small>Terbaru</small>
    </h1>
</div>
<br><br><br>
<!-- START THE FEATURETTES -->
<hr class="featurette-divider">
<?php
$num = 1;
foreach ($data as $gb) {
    ?>
    <div class="row featurette">
        <?php
        if ($num % 2) {
            ?>
            <div class="col-md-7">
                <h2 class="featurette-heading">{{$gb['judul'];}}. <span class="text-muted">at {{$gb->lokasi->nama_lokasi;}}.</span><small style="position: absolute;margin-top: 5px;"><span class="badge badge-success"><?php $y=(int)substr($gb->tgl,0,4); $m=(int)substr($gb->tgl,5,2); $d=(int)substr($gb->tgl,8,2); echo gmdate("d M Y", mktime(0,0,0,$m,$d,$y));?></span></small></h2>
                <p class="lead">{{$gb['deskripsi'];}} <small><span class="label label-primary">- By : {{$gb->users->nama_user}}</span></small></p>
            </div>
            <div class="col-md-5 well effect2">
                <img class="featurette-image img-responsive" src="<?php echo URL::to($gb['nama_file']); ?>" alt="Generic placeholder image">
            </div>
            <?php
        } else {
            ?>
            <div class="col-md-5 well effect2">
                <img class="featurette-image img-responsive" src="<?php echo URL::to($gb['nama_file']); ?>" alt="Generic placeholder image">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">{{$gb['judul'];}}. <span class="text-muted">at {{$gb->lokasi->nama_lokasi;}}.</span><small style="position: absolute;margin-top: 5px;"><span class="badge badge-success"><?php $y=(int)substr($gb->tgl,0,4); $m=(int)substr($gb->tgl,5,2); $d=(int)substr($gb->tgl,8,2); echo gmdate("d M Y", mktime(0,0,0,$m,$d,$y));?></span></small></h2>
                <p class="lead">{{$gb['deskripsi'];}} <small><span class="label label-primary">- By : {{$gb->users->nama_user}}</span></small></p>
            </div>
            <?php
        }
        ?>
    </div>

    <hr class="featurette-divider">
    <?php
    $num++;
}
?>
<!-- /END THE FEATURETTES -->
<div class="row text-center">

    <div class="col-lg-12">
        <div style="text-align: center">
            <?php echo $data->links(); ?>
        </div>
    </div>

</div>

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