<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Profil Admin</title>

    <!-- Bootstrap core CSS -->
<link href="./css/bootstrapoff.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-purple">
  <a class="navbar-brand mr-auto mr-lg-0" href="#">ADMIN</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php include "admin/menuadmin.php"; ?>
</nav>


<main role="main" class="container">
<div class="container">
  <div class="py-5 text-center">
    <h2>Profil Anda</h2>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Foto Profil</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item text-center lh-condensed">
          <div>
          <img class="d-block mx-auto mb-4" src="./img/profil.jpg" alt="" width="100" height="150">
          </div>
        </li>
      </ul>

      <form class="card p-2" action="?page=admprof" method="post">
        <div class="input-group">
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Pilih</button>
          </div>
          <input type="text" class="form-control" placeholder="Link..">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Data profil</h4>
      <form action="?page=admprof" method="post">
        <div class="mb-3">
            <label for="no">NIP</label>
            <input type="text" class="form-control" id="noinduk" placeholder="..." required="" disabled> 
            <div class="invalid-feedback">
              Masukkan !.
            </div>
        </div>

        <div class="mb-3">
            <label for="firstName">Nama Lengkap</label>
            <input type="text" class="form-control" id="nmlengkap" placeholder="Nama Lengkap.." required="">
            <div class="invalid-feedback">
              Masukkan Nama Lengkap!.
            </div>
        </div>


        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="email@unesa.ac.id" required="">
          <div class="invalid-feedback">
            Masukkan email yang benar!.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="Alamat.." required="">
          <div class="invalid-feedback">
            Masukkan alamat yang benar!.
          </div>
        </div>

        <div class="row">
          <div class="col-md-7 mb-3">
            <label for="country">Program Studi</label>
            <select class="custom-select d-block w-100" id="country" required="">
              <option value="" selected="selected">Pilih...</option>
              <option>Program Studi 1</option>
              <option>Program Studi 2</option>
              <option>Program Studi 3</option>
            </select>
            <div class="invalid-feedback">
              Pilih Program Studi yang benar!.
            </div>
          </div>

        </div>
        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Data</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2019 SIMBASIS Pasca UNESA</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

</main>
<script src="./js/jquery-3.js" ></script>
      <script src="./js/bootstrapoff.js"></script>
        <script src="./js/offcanvas.js"></script>

</body></html>