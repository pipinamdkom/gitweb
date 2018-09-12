<?php
include_once "pencegahan.php";
include "db.php";
?>
<html>
<body>
<style>
#customers 
{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}


#customers tr:nth-child(odd){background-color: white;}
#customers tr:nth-child(even){background-color: #f2f2f2;}


#customers tr:hover {background-color: grey;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>




<table border="1" cellpadding="5" cellspacing="0" width="70%" align="center">
    <tr bgcolor="lightgrey">
		<td width="65%"><b>Part Number :<?php echo $_SESSION['pn']; ?> </b></td>
		<td><b>Stok PMC :
		<?php
		//cari stock pmc
		$pquery = mysqli_query($connecty, "SELECT * FROM pmaseter WHERE pnumber = '$_SESSION[pn]'");
		while ($pdata = mysqli_fetch_array($pquery)) 
		{
		 echo $pdata[2];
		}
		?>
		</td>
	</tr></table>
<table border="1" cellpadding="5" cellspacing="0" width="70%" align="center">
	<tr bgcolor="lightgrey" align="center">
		<td width="25%"><b>Tanggal</b></td><td width="20%"><b>Masuk</b></td><td width="20%"><b>Keluar</b></td>
		<td width="27%"><b>Keterangan</b><td><b>Hapus</b></td>
     </tr></table>


		 
	 
<table align="center"><tr><td>
<div style="padding:3px; overflow:auto; height:390px; width:920px; border:1px solid lightgrey;">

	

<table id="customers" border="1" cellpadding="5" cellspacing="0" width="100%">

	     <?php

	$query = mysqli_query($connecty, "SELECT * FROM grekap WHERE nomor_id = '$_SESSION[pn]'");
    while ($data = mysqli_fetch_array($query)) 
	{
    ?>
        <tr align="center">
            <td width="25%"><?php echo $data[0];?></td>
			<td width="20%"><?php 
			if($data[1]>=1)
			{
				$pinsu_1 = number_format($data[1],0,",",".");
				echo $pinsu_1;
			}
			else
			{
				echo "";
			}
			?></td>
			<td width="20%"><?php 
			if($data[2]>=1)
			{
				$pinsu_f1 = number_format($data[2],0,",",".");
				echo $pinsu_f1;
			}
			else
			{
				echo "";
			}
			?></td>
			<td><?php echo $data[4];?></td>
			<?php echo "<td><a href='ghapus.php?pipinsuhaipin=$data[6]&pipinin=$data[1]&pipinout=$data[2]'>Hapus</a></td>"; ?>
		</tr>
		
	<?php
	}
	?>
	 <tr>
		<td width="25%">
		<form method="post" action="pilihsimpan.php">
		<input type="date" name="tgl"></td>
		<td width="20%"><input type="text" name="in" size="16" autofocus></td>
		<td width="20%"><input type="text" name="out" size="16"></td>
		<td><input type="text" name="ket"></td>
     </tr>
</table>
</div>
</td></tr></table>


<table border="1" cellpadding="5" cellspacing="0" width="70%" align="center">
	 <tr bgcolor="lightgrey">
		<td width="65%"><b>Stok Gudang</b></td>
		<td align="center"><b>
		<?php

		$gquery = mysqli_query($connecty, "SELECT * FROM gmaster WHERE nomor_id = '$_SESSION[pn]'");
		while ($gdata = mysqli_fetch_array($gquery)) 
		{
			$pinsu_stok = number_format($gdata['stok'],0,",",".");
			echo $pinsu_stok;		
		}
		?>
		</td>
     </tr>
</table>

<table border="1" cellpadding="5" cellspacing="0" width="70%" align="center">
	 <tr bgcolor="lightgrey">
		<td align="right"><input type="submit" value="Simpan"></td>
     </tr></form>
</table>



