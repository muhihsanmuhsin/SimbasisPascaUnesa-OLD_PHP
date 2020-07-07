<html>
<?php

$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
	if(empty($_POST['idem']) || empty($_POST['idpass'])){
		$error = "Masukkan email dan password yang benar!";
	}
	else
	{
		//Define $user and $pass
		$idem=$_POST['idem'];
		$idpass=$_POST['idpass'];
		//Establishing Connection with server by passing server_name, user_id and pass as a patameter
		$con = mysqli_connect("localhost", "root", "");
		//Selecting Database
		$db = mysqli_select_db($con, "dbwebsimbasis");
		//sql query to fetch information of registerd user and finds user match.
		$query = mysqli_query($con, "SELECT * FROM datautama WHERE password='$idpass' AND email='$idem'");
		//$user = $row['username'];
		
		$rows = mysqli_num_rows($query);
		if($rows == 1){
			session_start();
            $data = mysqli_fetch_array($query);
            $_SESSION['email'] = $data[email];
            $_SESSION['nama'] = $data[nama];
            $_SESSION['pangkat'] = $data[pangkat];
      
            if($_SESSION[pangkat] == admin){
              header("Location: ?page=dashboard1");
              }elseif($_SESSION[pangkat] == kaprodi){
              header("Location: ?page=dashboard2");
              }elseif($_SESSION[pangkat] == pembimbing){
              header("Location: ?page=dashboard3");
              }elseif($_SESSION[pangkat] == mahasiswa){
              header("Location: ?page=dashboard4");
              }else{
              header("Location: ?page=login");
              }

		}
		else
		{
			$error = "Email atau password salah!";
		}
		mysqli_close($con); // Closing connection
    }

 
}
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    
    <title>Login Web SIMBASIS</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstraplogin.css" rel="stylesheet">


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
    <link href="css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form method="post" class="form-signin">
  <div class="text-center mb-4">
    <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Login Web SIMBASIS</h1>
    <p>Silahkan login dengan Email dan Password anda</p>
  </div>

  <div class="form-label-group">
    <input type="email" id="idem" name="idem" class="form-control" placeholder="Email address" required="" autofocus="">
  </div>

  <div class="form-label-group">
    <input type="password" id="idpass" name="idpass" class="form-control" placeholder="Password" required="">
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Simpan?
    </label>
    <p><?php echo $error ?></p>
  </div>
  <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">
  <p class="mt-5 mb-3 text-muted text-center">© 2019 SIMBASIS Pasca UNESA</p>
</form>


</body>
</html>