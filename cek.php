<?php
include "pencegahan.php";
include "db.php";

?>
<style>
#customers 
{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}


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
		<td width="65%"><b>Part Number :<?php echo $_POST['cpn']; ?> </b></td>
</tr></table>
<table border="1" cellpadding="5" cellspacing="0" width="70%" align="center">
	<tr bgcolor="lightgrey" align="center">
		<td width="25%"><b>Tanggal</b></td><td width="20%"><b>Masuk</b></td><td width="20%"><b>Keluar</b></td><td><b>Keterangan</b></td>
     </tr></table>


		 
	 
<table align="center"><tr><td>
<div style="padding:3px; overflow:auto; height:390px; width:920px; border:1px solid lightgrey;">

	
<table id="customers" border="1" cellpadding="5" cellspacing="0" width="100%">

	     <?php

	$query = mysqli_query($connecty, "SELECT * FROM grekap WHERE nomor_id = '$_POST[cpn]' AND keterangan = '$_POST[cket]'");
    while ($data = mysqli_fetch_array($query)) 
	{
    ?>
        <tr align="center">
            <td width="25%"><?php echo $data[0];?></td>
			<td width="20%"><?php 
			if($data[1]>=1)
			{
				$datasatu = number_format($data[1],0,",",".");
				echo $datasatu;
			}
			else
			{
				echo "";
			}
			?></td>
			<td width="20%"><?php
			if($data[2]>=1)
			{
				$datadua = number_format($data[2],0,",",".");
				echo $datadua;
			}
			else
			{
				echo "";
			}
			?></td>
			<td><?php echo $data[4];?></td>
		</tr>
		
	<?php
	}
	?>
	
</table>
</div>
</td></tr></table>

<table border="1" cellpadding="5" cellspacing="0" width="70%" align="center">
	<tr bgcolor="lightgrey" align="center">
		<td width="25%"><b>Jumlah</b></td>
		<td width="20%"><b>
		<?php
		$pssum = mysqli_query($connecty, "SELECT sum(masuk) as jumlah FROM grekap WHERE nomor_id = '$_POST[cpn]' AND keterangan = '$_POST[cket]'");
		$pin = mysqli_fetch_array($pssum);
		$suhaipinpin = number_format($pin['jumlah'],0,",",".");
		echo $suhaipinpin;	
		?>
		</b></td>
		<td width="20%"><b>
		<?php
		$pssum = mysqli_query($connecty, "SELECT sum(keluar) as jumlah FROM grekap WHERE nomor_id = '$_POST[cpn]' AND keterangan = '$_POST[cket]'");
		$pin = mysqli_fetch_array($pssum);
		$suhaipinpin1 = number_format($pin['jumlah'],0,",",".");
		echo $suhaipinpin1;	
		?>
		</b></td><td><b>&nbsp;</b></td>
     </tr></table>




