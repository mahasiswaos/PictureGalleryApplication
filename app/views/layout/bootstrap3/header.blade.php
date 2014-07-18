<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo URL::to('img/car1.jpg'); ?>" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="featurette-heading"><span class="glyphicon glyphicon-share"></span> Share Your Picture</h1>
                    <p>Bagikan Gambar-gambar aktifitas anda kepada teman-teman anda.</p>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo URL::to('/view'); ?>" role="button">See The Gallery</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URL::to('img/car2.jpg'); ?>" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="featurette-heading"><span class="glyphicon glyphicon-map-marker"></span> Found The Beautiful <br>Destination</h1>
                    <p>Temukan lokasi-lokasi tujuan terbaik.</p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo URL::to('img/car3.jpg'); ?>" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="featurette-heading"><span class="glyphicon glyphicon-send"></span> Login and Upload.</h1>
                    <p>Login dan lakukan Upload gambar-gambar terbaik Anda.</p>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo URL::to('/login'); ?>" role="button">Login Now</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->