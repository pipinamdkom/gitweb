<?php
session_start();
include "db.php";
$tgl = $_POST['tgl'];
$in = $_POST['in'];
$out = $_POST['out'];
$ket = $_POST['ket'];

$pipinsuhaipin = mysqli_query($connecty, "INSERT INTO `grekap`  
(`tanggal`, `masuk`, `keluar`, `keterangan`, `nomor_id`) VALUES ('$tgl', '$in', '$out', '$ket', '$_SESSION[pn]')");

?>
<script language="javascript">
window.location = "grekap1.php";
</script>

	


