<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-picture"></i> Picture Gallery Application</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        if (Auth::check()) {
                            ?>
                            <li><a href="{{URL::to('/gambar');}}"><span class="glyphicon glyphicon-th"></span> Beranda</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="{{URL::to('/');}}"><span class="glyphicon glyphicon-th"></span> Beranda</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="{{URL::to('/lokasi');}}"><span class="glyphicon glyphicon-random"></span> Lokasi</a></li>
                        <li>
                            <?php
                            if (Auth::check()) {
                                ?>
                                <a href="{{URL::to('/gambar/view');}}"><span class="glyphicon glyphicon-picture"></span> Lihat Gallery</a>
                                <?php
                            } else {
                                ?>
                                <a href="{{URL::to('/view');}}"><span class="glyphicon glyphicon-picture"></span> Lihat Gallery</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (Auth::check()) {
                            $user = Auth::user();
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <?php echo $user->nama_user; ?>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (Auth::check()) {
                                        $lvl = Auth::user()->level;
                                        if ($lvl == "admin") {
                                            ?>
                                            <li><a href="{{URL::to('/users')}}"><span class="glyphicon glyphicon-cog"></span> Manajemen User</a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li><a href="{{URL::to('/gambar/add')}}"><span class="glyphicon glyphicon-picture"></span> Tambah Gambar</a></li>
                                    <li><a href="{{ URL::to('/users/update/' . Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span> Edit User</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{URL::to('/login/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li><a href="{{URL::to('/login');}}">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
                                    <?php
                                }
                                ?>
                    </ul>
                </div>                
            </div>
        </div>

    </div>
</div>