<?php
include "pencegahan.php";
include "db.php";

if (isset($_GET['pipinsuhaipin']))
{
	if($_GET['pipinin']>=1)
	{
		$gquery = mysqli_query($connecty, "SELECT * FROM gmaster WHERE nomor_id = '$_SESSION[pn]'");
		while ($gdata = mysqli_fetch_array($gquery)) 
		{
			$in = $_GET['pipinin'];
			$pipin = $gdata['stok'] - $in;
			$pipin_suhaipin = mysqli_query($connecty, "UPDATE gmaster SET stok = '$pipin' WHERE nomor_id = '$_SESSION[pn]'");	
		}
		$suhaipin = $_GET['pipinsuhaipin'];
		mysqli_query($connecty, "DELETE FROM grekap WHERE transaksi_id = $suhaipin");
		?>
	
		<script language="javascript">
		window.location = "grekap1.php";
		</script>
		<?php
	}
	else
	{
		$gquery = mysqli_query($connecty, "SELECT * FROM gmaster WHERE nomor_id = '$_SESSION[pn]'");
		while ($gdata = mysqli_fetch_array($gquery)) 
		{
			$out = $_GET['pipinout'];
			$pipin = $gdata['stok'] + $out;
			$pipin_suhaipin = mysqli_query($connecty, "UPDATE gmaster SET stok = '$pipin' WHERE nomor_id = '$_SESSION[pn]'");	
		}
		$suhaipin = $_GET['pipinsuhaipin'];
		mysqli_query($connecty, "DELETE FROM grekap WHERE transaksi_id = $suhaipin");
		?>
	
		<script language="javascript">
		window.location = "grekap1.php";
		</script>
		<?php
	}
}	
?>
