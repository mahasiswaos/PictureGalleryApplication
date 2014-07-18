@extends('layout.bootstrap3.users');

@section('title')
Picture Gallery App
@stop
@section('content')

<h1 class="page-header">Halaman
    <small>Pencarian Lokasi</small>
</h1>

<?php if (count($lokasi) == 0) { ?>
    <div class = "alert alert-warning fade in">
        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">x</button>
        <h4>Informasi!</h4>
        <p>Pencarian Lokasi Tidak Ditemukan</p>
        <p>
            <a href = "{{URL::to('/lokasi/add');}}" class = "btn btn-danger"><span class = "glyphicon glyphicon-plus-sign"></span> Tambah Lokasi</a>
            <a href = "<?php echo URL::to('/lokasi'); ?>" class = "btn btn-default"><span class = "glyphicon glyphicon-map-marker"></span> Kembali ke Lokasi</a>
        </p>
    </div>
<?php } else { ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-map-marker"></i> 
            Form Pencarian Lokasi
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="active">
                    <th>ID</th>
                    <th>Nama Lokasi</th>
                    <th>Tempat</th>
                    <th>Kabupaten</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lokasi as $val) { ?>
                    <tr>
                        <td>{{ $val['id'] }}</td>
                        <td>{{ $val['nama_lokasi'] }}</td>
                        <td>{{ $val['tempat'] }}</td>
                        <td>{{ $val['kabupaten'] }}</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="panel-footer">
            <div class="text-center">
                <a href="{{ URL::to('/lokasi') }}" class="btn btn-lg btn-default">
                    <i class="glyphicon glyphicon-map-marker"></i>
                    Kembali ke Lokasi
                </a>
            </div>
        </div>
    </div>
<?php } ?>

@stop

