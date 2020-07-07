<?php
error_reporting(E_ALL^(E_NOTICE));
date_default_timezone_set("Asia/Jakarta");
if (isset ($_GET['page'])){
	$page=$_GET['page'];

}else{

	$page="login";

}

switch($page){

    case "login";
        include "dbconf.php";
		include "login.php";

        break;
    
    case "logout";
        include "dbconf.php";
		include "login.php";

        break;

    case "dashboard1";
        include "dbconf.php";
        include "admin/homeadmin.php";

        break;

    case "admprof";
        include "dbconf.php";
        include "admin/profil.php";

        break; 
    
    case "data";
        include "dbconf.php";
        include "admin/databaru.php";

        break; 

    case "dftrbimbingan";
        include "dbconf.php";
        include "admin/databimbingan.php";

        break; 

    case "progbimbingan";
        include "dbconf.php";
        include "admin/progress.php";

        break; 

    case "lhtriwayat";
        include "dbconf.php";
        include "admin/riwayattesis.php";

        break;


    case "dashboard2";
        include "kaprodi/homekaprodi.php";

        break;

    case "dashboard3";
        include "pembimbing/homepembimbing.php";

        break;

    case "dashboard4";
        include "mahasiswa/homemahasiswa.php";

        break;
}
?>