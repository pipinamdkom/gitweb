<?php
session_start();
include "pencegahan.php";
include "db.php";
$tgl = $_POST['tgl'];
$in = $_POST['in'];
$out = $_POST['out'];
$ket = $_POST['ket'];

if($tgl == 0)
{
	?>
	<script language="javascript">
	window.location = "grekap1.php";
	</script>
	<?php
}
elseif($in >= 2147483647 )
{
	?>
	<script language="javascript">
	window.location = "grekap1.php";
	</script>
	<?php
}
elseif($out >= 2147483647 )
{
	?>
	<script language="javascript">
	window.location = "grekap1.php";
	</script>
	<?php
}

elseif($in >= 1)
{
	$pipinsuhaipin = mysqli_query($connecty, "INSERT INTO `grekap` 
	(`tanggal`, `masuk`, `keterangan`, `nomor_id`) VALUES ('$tgl', '$in', '$ket', '$_SESSION[pn]')");

	$gquery = mysqli_query($connecty, "SELECT * FROM gmaster WHERE nomor_id = '$_SESSION[pn]'");
		while ($gdata = mysqli_fetch_array($gquery)) 
		{
			$in = $_POST['in'];
			$pipin = $gdata['stok'] + $in;
			$pipin_suhaipin = mysqli_query($connecty, "UPDATE gmaster SET stok = '$pipin' WHERE nomor_id = '$_SESSION[pn]'");	
		}
	?>
	<script language="javascript">
	window.location = "grekap1.php";
	</script>
	<?php


}
elseif($out >= 1)
{
	$pipinsuhaipin = mysqli_query($connecty, "INSERT INTO `grekap` 
	(`tanggal`, `keluar`, `keterangan`, `nomor_id`) VALUES ('$tgl', '$out', '$ket', '$_SESSION[pn]')");

	$gquery = mysqli_query($connecty, "SELECT * FROM gmaster WHERE nomor_id = '$_SESSION[pn]'");
		while ($gdata = mysqli_fetch_array($gquery)) 
		{
			$out = $_POST['out'];
			$pipin = $gdata['stok'] - $out;
			$pipin_suhaipin = mysqli_query($connecty, "UPDATE gmaster SET stok = '$pipin' WHERE nomor_id = '$_SESSION[pn]'");	
		}
	?>
	<script language="javascript">
	window.location = "grekap1.php";
	</script>
	<?php

	
}
else
{
	?>
	<script language="javascript">
	window.location = "grekap1.php";
	</script>
	<?php
}

?>


	


