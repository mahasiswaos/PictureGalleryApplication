<!-- Modal -->
<div class="modal fade" id="<?php echo $value['id']; ?>" 
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-picture"></span> Detail Gambar</h4>
            </div>
            <div class="modal-body">
                <img class="img-responsive" src="<?php echo URL::to($value['nama_file']); ?>" alt=""><br/>
                <p>
                <big><span class="label label-info">
                        Judul :</big></strong><strong> <?php echo $value['judul']; ?></strong>&nbsp;

                </p>
                <p>
                <big><span class="label label-info">
                        Kategori :</span></big><strong> <?php echo $value['kategori']; ?>, Lokasi : <?php echo $value->lokasi->nama_lokasi . ", " . $value->lokasi->kabupaten; ?></strong>

                </p>
                <p>
                <big><span class="label label-info">
                        Oleh :</span></big> <strong><?php echo $value->users->username; ?>, Email : <?php echo $value->users->email; ?></strong>

                </p>
                <p>
                <big><span class="label label-info">
                        Deskripsi :</span></big> <?php echo $value['deskripsi']; ?>

                </p>
                <p>
                <big><span class="label label-info">
                        Di Unggah Pada :</span></big> <strong><span class="glyphicon glyphicon-time"></span> 
                    <?php $y=(int)substr($value['tgl'],0,4); $m=(int)substr($value['tgl'],5,2); $d=(int)substr($value['tgl'],8,2); echo gmdate("d M Y", mktime(0,0,0,$m,$d,$y));?></strong>

                </p>
            </div>
            <div class="modal-footer">
                <?php
                if (Auth::check()) {
                    $lvl = Auth::user()->level;
                    if ($lvl == "admin") {
                        ?>
                        <a class="btn btn-danger" href="{{ URL::to('/gambar/delete/' . $value->id) }}"><span class="glyphicon glyphicon-trash"></span> Hapus Gambar Ini</a>
                        <?php
                    }
                }
                ?>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->