<?php
session_start();						
include "db.php";
$username = $_POST['nama'];
$password = $_POST['password'];
$_SESSION['namauser'] = $_POST['nama'];

//$query = "SELECT * FROM user WHERE nama = '$username'";
//$hasil = mysqli_query($query);
//$data = mysqli_fetch_array($hasil);


//$sql = "EXPLAIN SELECT * FROM `USER` WHERE nama = \'$username\'";

$ss = mysqli_query($connecty, "SELECT * FROM user WHERE nama = '$username'");

$data = mysqli_fetch_array($ss);





if($username == !isset($username))
{
	?><script language="javascript">
		alert("Isi Nama");
		window.location = "index.php";
		</script><?php
}
else if($password == !isset($password))
{
	?><script language="javascript">
		alert("Isi Password");
		window.location = "index.php";
		</script><?php
}
else if($data['password'] == $password)
{
	?><script language="javascript">
	window.location = "grekap.php"
	</script><?php
}
else
{

	?><script language="javascript">
		alert("Nama Atau Password Salah");
		window.location = "index.php";
		</script>
	<?php

}


?>
