<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ensiklopedia | Identify</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Ensiklopedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricingg</a>
                </li> -->
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home/identify') ?>">Identify</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-5">Identify</h1>
            <p class="lead">Home / Identify</p>
        </div>
    </div>


    <div class="container">
        <form action="<?php echo base_url('Home/save') ?>" method="post">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h5>Silahkan Pilih Kriteria Yang Sesuai Dengan Ciri Dari Bunga Anda</h5>
                </div>
            </div>

            <div class="row mt-1 mb-5">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="1">Bagaimana Karakteristik Yang Terlihat Pada Genius ?</label>
                        <select class="form-control" id="1" name="genius">
                            <option value=""></option>
                            <option value="vanda">Vanda</option>
                            <option value="cattleya">Cattleya</option>
                            <option value="dendrobium">Dendrobium</option>
                            <option value="phalaenopsis">Phalaenopsis</option>
                            <option value="spathoglotis">Spathoglotis</option>
                            <option value="paphiopedilum">Paphiopedilum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="2">Bagaimana Karakteristik Yang Terlihat Pada Akar ?</label>
                        <select class="form-control" id="2" name="akar">
                            <option value=""></option>
                            <option value="epifit">Epifit</option>
                            <option value="litofit">Litofit</option>
                            <option value="terestrial">Terestrial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="3">Bagaimana Karakteristik Yang Terlihat Pada Batang ?</label>
                        <select class="form-control" id="3" name="batang">
                            <option value=""></option>
                            <option value="monopodial">Monopodial</option>
                            <option value="simpodial">Simpodial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="4">Bagaimana Karakteristik Yang Terlihat Pada Bentuk Daun ?</label>
                        <select class="form-control" id="4" name="daun">
                            <option value=""></option>
                            <option value="runcing">Runcing</option>
                            <option value="oval">Oval</option>
                            <option value="lonjong">Lonjong</option>
                            <option value="berlipat">Berlipat-lipat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="5">Jumlah Mahkota ?</label>
                        <select class="form-control" id="5" name="jumlah_mahkota">
                            <option value=""></option>
                            <option value="5 helai">5 helai</option>
                            <option value="3 helai">3 helai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="6">Bentuk Mahkota ?</label>
                        <select class="form-control" id="6" name="bentuk_mahkota">
                            <option value=""></option>
                            <option value="Memanjang ujung melengkung">Memanjang ujung melengkung</option>
                            <option value="Seperti bintang">Seperti bintang</option>
                            <option value="Oval ujung meruncing">Oval ujung meruncing</option>
                            <option value="Oval lebar">Oval lebar</option>
                            <option value="Elips lebar bertumpuk">Elips lebar bertumpuk</option>
                            <option value="Elips meruncing">Elips meruncing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="7">Bagaimana Karakteristik Yang Terlihat Pada Lidah ?</label>
                        <select class="form-control" id="7" name="lidah">
                            <option value=""></option>
                            <option value="Menjulur">Menjulur</option>
                            <option value="Ujung lancip">Ujung lancip</option>
                            <option value="Berkantong">Berkantong</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="8">Bagaimana Karakteristik Yang Terlihat Pada Motif ?</label>
                        <select class="form-control" id="8" name="motif">
                            <option value=""></option>
                            <option value="Dua warna">Dua warna</option>
                            <option value="Bercorak">Bercorak</option>
                            <option value="Polos">Polos</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Kirim</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>