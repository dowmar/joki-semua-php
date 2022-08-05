<?php
session_start();
define("TITLE", "Home | PetsQu Shop");
include('includes/header.php');

?>
<main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/caro1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/caro2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/caro3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="services  d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Apakah Kamu Tau?</h2>
                    <p>PetSqu Shop memiliki beragam jenis makanan hewan terlengkap di Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#d8b6e7" fill-opacity="1" d="M0,320L80,277.3C160,235,320,149,480,106.7C640,64,800,64,960,58.7C1120,53,1280,43,1360,37.3L1440,32L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg> -->


    <div class="items-news">
        <div class="container row py-5 justify-content-evenly border border-primary mx-auto text-center">
            <h2>Rekomendasi Untukmu</h2>
            <div class="item col-4">
                <div class="card my-2 bg-white text-dark">
                    <img src="img/cat1.png" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                    <h3 class="mx-2" name="nama_item">Makanan Kucing</h3>
                    <p class="mx-2">Makanan kucing special</p>


                </div>
            </div>
            <div class="item col-4">
                <div class="card my-2 bg-white text-dark">

                    <img src="img/cat1.png" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                    <h3 class="mx-2" name="nama_item">Makanan Kucing</h3>
                    <p class="mx-2">Makanan kucing special</p>


                </div>
            </div>
            <div class="item col-4">
                <div class="card my-2 bg-white text-dark">

                    <img src="img/cat1.png" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                    <h3 class="mx-2" name="nama_item">Makanan Kucing</h3>
                    <p class="mx-2">Makanan kucing special</p>


                </div>
            </div>
        </div>
</main>
<?php include('includes/footer.php'); ?>