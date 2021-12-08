<!-- Biar bisa numpuk banyak modal dalam satu page -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#openBtn').click(function() {
            $('#myModal').modal({
                show: true
            })
        });

        $(document).on('show.bs.modal', '.modal', function(event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass(
                    'modal-stack');
            }, 0);
        });
    });
</script>

<div id="carouselExampleCaptions" class="carousel carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/carousel/download.jpg" class="d-block w-100" alt="..."
                style="height:695px; filter: brightness(27%);">
            <div class="carousel-caption d-none d-md-block">
                <ul class="list-inline">
                    <blockquote class="blockquote">
                        <li class="list-inline-item">
                            <h2 style="color:#0C68D8;">City</h2>
                        </li>
                        <li class="list-inline-item">
                            <h2 style="color:#B58411;">Ride</h2>
                        </li>
                    </blockquote>
                </ul>
                <br>
                <h5 class="lead">Jelajahi Semua Tempat Bersejarah di Yogyakarta</h5>
                <h5 class="lead">dengan Hemat Energi dan Ramah Lingkungan</h5>
                <h5 class="lead">Tak Perlu Khawatir Akan Polusi!!</h5>
                <br><br><br>
                <ul class="list-inline">
                    <!-- Button trigger modal -->
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            <h3>SUDAH TERDAFTAR?</h3>
                        </button>
                    </li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#SignIn">
                            <h3>MULAI SEKARANG!</h3>
                        </button>
                    </li>
                </ul>
                <br><br><br><br><br>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/carousel/download1.jpg" class="d-block w-100" alt="..."
                style="height:695px; filter: brightness(27%);">
            <div class="carousel-caption d-none d-md-block">
                <ul class="list-inline">
                    <blockquote class="blockquote">
                        <li class="list-inline-item">
                            <h2 style="color:#0C68D8;">City</h2>
                        </li>
                        <li class="list-inline-item">
                            <h2 style="color:#B58411;">Ride</h2>
                        </li>
                    </blockquote>
                </ul>
                <br>
                <h5 class="lead">Kami Bekerja Sama dengan Pemerintah Setempat</h5>
                <h5 class="lead">untuk Menjadi Pionir Penggunaan Moda Transportasi</h5>
                <h5 class="lead">Ramah Lingkungan dan Bebas Tersedia</h5>
                <br><br><br>
                <ul class="list-inline">
                    <!-- Button trigger modal -->
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            <h3>SUDAH TERDAFTAR?</h3>
                        </button>
                    </li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#SignIn">
                            <h3>MULAI SEKARANG!</h3>
                        </button>
                    </li>
                </ul>
                <br><br><br><br><br>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/carousel/download2.jpg" class="d-block w-100" alt="..."
                style="height:695px; filter: brightness(27%);">
            <div class="carousel-caption d-none d-md-block">
                <ul class="list-inline">
                    <ul class="list-inline">
                        <blockquote class="blockquote">
                            <li class="list-inline-item">
                                <h2 style="color:#0C68D8;">City</h2>
                            </li>
                            <li class="list-inline-item">
                                <h2 style="color:#B58411;">Ride</h2>
                            </li>
                        </blockquote>
                    </ul>
                    <br>
                    <h5 class="lead">Nikmati Suasana Nyaman Kota Yogyakarta</h5>
                    <h5 class="lead">dengan Beragam Sepeda yang Kami Sediakan</h5>
                    <h5 class="lead">Coba Sekarang Juga!!</h5>
                    <br><br><br>
                    <ul class="list-inline">
                        <!-- Button trigger modal -->
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                <h3>SUDAH TERDAFTAR?</h3>
                            </button>
                        </li>
                        <li class="list-inline-item"></li>
                        <li class="list-inline-item"></li>
                        <li class="list-inline-item"></li>
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#SignIn">
                                <h3>MULAI SEKARANG!</h3>
                            </button>
                        </li>
                    </ul>
                    <br><br><br><br><br>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>