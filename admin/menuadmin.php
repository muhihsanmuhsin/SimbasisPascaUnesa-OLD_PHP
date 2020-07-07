<?php session_start();
if($_SESSION[pangkat] == admin) { 
  ?>
<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=dashboard1">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=admprof">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=data">Buat Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=dftrbimbingan">Daftar Bimbingan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=progbimbingan">Progres Bimbingan</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifikasi</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">1</a>
          <a class="dropdown-item" href="#">2</a>
          <a class="dropdown-item" href="#">3</a>
        </div>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <a class="btn btn-danger my-2 my-sm-0" href="?page=logout">Logout</a>
    </div>
  </div>
  <?php } else { header("Location: ?page=login"); } ?>