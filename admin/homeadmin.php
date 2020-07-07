<?php session_start();
if($_SESSION[pangkat] == admin) { 
  ?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Dashboard Admin</title>

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
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <img class="mr-3" src="./img/logo.png" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">UNESA</h6>
      <small>Dashboard Admin <?php // tes login echo $_SESSION[pangkat]; echo $_SESSION[email]; ?></small>
    </div>
  </div>

  <h2 class="text-center">Data Saat ini</h2>
  <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cari Nama</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
    </ul>
  </nav>
  <div style="overflow-x:auto; overflow-y: scroll; height:400px;">
    <table id="myTable">
    <tr> 
      <th onclick="sortTable(0)">Nama</th>
      <th onclick="sortTable(1)">Jabatan</th>
      <th>Email</th>
      <th>No.Telp</th>
      <th>Menu</th>
    </tr>
    <tr>
      <td class="text-center">Aku Dosen 1</td>
      <td class="text-center">Z Prodi</td>
      <td class="text-center">lalala</td>
      <td class="text-center">124</td>
      <td class="text-center">
      <a class="btn btn-warning" name="btnedit" href="?page=data&edit=<?php echo $row['id'] ?>">Edit</a>
      <a class="btn btn-danger" name="btndel" href="?page=data&del=<?php echo $row['id'] ?>">Delete</a>
      </td>
    </tr>
    <tr>
      <td>Aku Dosen 2</td>
      <td>C Prodi</td>
      <td>waeaw</td>
      <td>2333</td>
      <td></td>
    </tr>
    <tr>
      <td>Aku Dosen 3</td>
      <td>A Prodi</td>
      <td>awdaw</td>
      <td>122</td>
      <td></td>
    </tr>
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
</script>
</body></html>
<?php } else { header("Location: ?page=login"); } ?>