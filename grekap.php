<?php
include_once "pencegahan.php";
include "endas.php";
?>

<table border='0' width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td><form action="gtrans.php" method="post" target="content"><font color="blue">
		Part Number : </font><input type="text" name="pn"></form></td>
		<td align="right"><form action="cek.php" method="post" target="content"><font color="blue">
		Part Number : </font><input type="text" name="cpn"> <font color="blue">
		Keterangan : </font><input type="text" name="cket"> <input type="submit" value="Periksa"></form></td>
		
	</tr>
</table>


<iframe name="content" width="100%" height="82%" align="center"></iframe>

<form action="logout.php">
<input type="submit" value="Keluar"></form>