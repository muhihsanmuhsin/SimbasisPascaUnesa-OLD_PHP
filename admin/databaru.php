<?php session_start();
if($_SESSION[pangkat] == admin) { 
  ?>
<!DOCTYPE html>
<style>
table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th {
  cursor: pointer;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>

<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Buat Akun baru</title>

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
<?php
$target_dir="./zupload/";
$target_file = $target_dir . basename($_FILES["image-source"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (isset($_POST['tambah']) && isset($_FILES['image-source'])) {

    $check = getimagesize($_FILES["image-source"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image-source"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["image-source"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["image-source"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
		// print_r ($_POST) ;
	 $sql="INSERT INTO datautama (id, noinduk, nama, email, notlp, password, prodi, pangkat, foto) VALUES ('', '$_POST[noinduk]', '$_POST[nmlengkap]', '$_POST[email]', '$_POST[notlp]', '$_POST[passw]', '$_POST[prodi]', '$_POST[bagi]', '$target_file');";
  // echo $sql;
  //$con=mysqli_connect("localhost","root","","dbwebsimbasis");
	//$res=mysqli_query($con,$sql);
	};
?>

<main role="main" class="container">
<div class="container">
  <div class="py-5 text-center">
    <h2>Buat Akun User Baru</h2>
  </div>

  <?php echo $result; ?>  

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Foto Profil</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item text-center lh-condensed">
          <div>
          <img id="image-preview" class="d-block mx-auto mb-4" alt="" width="100" height="150">
          </div>
        </li>
      </ul>
      <form action="?page=data" method="post" enctype="multipart/form-data">
      <div class="card p-2">
        <div class="input-group">
        <div class="input-group-append">
            <input type="file" id="image-source" name="image-source" onchange="previewImage();" class="btn btn-secondary" value="Pilih" required="">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Data profil</h4>

        <div class="mb-3">
        <label for="no"><?php echo $sql ; echo $_FILES['image-source'] ?></label>
            <label for="no">No Induk</label>
            <input id="noinduk" name="noinduk" type="text" onkeypress="return isNumberKey(event)" class="form-control"  placeholder="..." required=""> 
            <div class="invalid-feedback">
              Masukkan !.
            </div>
        </div>

        <div class="mb-3">
            <label for="firstName">Nama Lengkap</label>
            <input id="nmlengkap" name="nmlengkap" type="text" class="form-control" placeholder="Nama Lengkap.." required="">
            <div class="invalid-feedback">
              Masukkan Nama Lengkap!.
            </div>
        </div>


        <div class="mb-3">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" class="form-control" placeholder="email@unesa.ac.id" required="">
          <div class="invalid-feedback">
            Masukkan email yang benar!.
          </div>
        </div>

        <div class="mb-3">
          <label for="emailss">No. Telepon</label>
          <input id="notlp" name="notlp" type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="08.../031..." required="">
          <div class="invalid-feedback">
            Masukkan email yang benar!.
          </div>
        </div>

        <div class="mb-3">
            <label for="no">Password Baru</label>
            <input id="passw" name="passw" type="password" class="form-control" placeholder="..." required=""> 
            <div class="invalid-feedback">
              Masukkan !.
            </div>
        </div>

        <div class="row">
          <div class="col-md-7 mb-3">
            <label for="country">Program Studi</label>
            <select id="prodi" name=prodi class="custom-select d-block w-100"  required="">
              <option value="" selected="selected">Pilih...</option>
              <option value="prodi1" >Program Studi 1</option>
              <option value="prodi2" >Program Studi 2</option>
              <option value="prodi3" >Program Studi 3</option>
            </select>
            <div class="invalid-feedback">
              Pilih Program Studi yang benar!.
            </div>
            <label for="country">Jabatan</label>
            <select id="bagi" name="bagi" class="custom-select d-block w-100"  required="">
              <option value="" selected="selected">Pilih...</option>
              <option value="admin">Admin</option>
              <option value="kaprodi">Kepala Prodi</option>
              <option value="pembimbing">Pembimbing</option>
              <option value="mahasiswa">Mahasiswa</option>
            </select>
            <div class="invalid-feedback">
              Pilih Program Studi yang benar!.
            </div>

          </div>
        </div>
        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" id="tambah" name="tambah" type="submit">Buat Data</button>
      </form>
    </div>
  </div>

<div class="py-5 text-center">
<h2>Data Saat ini</h2>
<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cari Nama</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
  </ul>
</nav>
<div style="overflow-x:auto; overflow-y: scroll; height:400px;">
  <table id="myTable">
  <tr>
   <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
    <th onclick="sortTable(0)">No.</th>
    <th onclick="sortTable(1)">Nama</th>
    <th onclick="sortTable(2)">Jabatan</th>
    <th>Email</th>
    <th>No.Telp</th>
    <th>Menu</th>
  </tr>
<?php
$number = 1;
$res = $con->query("SELECT * FROM datautama");
while ($row = $res->fetch_assoc()):  ?>
<tr>
<td class="text-center"><?php echo $number; ?>
<td class="text-center"><?php echo "" . $row['nama'] . ""; ?>
<td class="text-center"><?php echo "" . $row['pangkat'] . ""; ?>
<td class="text-center"><?php echo "" . $row['email'] . ""; ?>
<td class="text-center"><?php echo "" . $row['notlp'] . ""; ?>
<td class="text-center">
<a class="btn btn-danger" name="btndel" onclick="return  confirm('Anda ingin menghapus data bernama <? echo $row['nama']?> ?')" href="?page=delete&data=<? echo $row['noinduk'] ?>">Hapus?</a>
<a class="btn btn-warning" name="btnedt" href="?page=edit&data=<?php echo $row['noinduk']; ?>">Edit data</a>
</td></tr>
<?php   ++$number; ?>
<?php endwhile; ?> 

</table>
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

<?php 
  if ($error == false) {
$result='<!-- Success Alert -->
<div class="alert alert-success alert-dismissible fade show">
    <strong>Pembuatan Berhasil!</strong> Data telah tersimpan di database.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
}else {
    $result='<!-- Error Alert -->
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> Silahkan Coba mengisi dan menyimpan ulang, jika berulang hubungi Developer.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>';
} ?>

<script src="./js/jquery-3.js" ></script>
      <script src="./js/bootstrapoff.js"></script>
        <script src="./js/offcanvas.js"></script>

        <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };

</script>

</body></html>
<?php } else { header("Location: ?page=login"); } ?>