<?php
session_start();
if (!isset($_SESSION['namauser']))
{
	?><script language="javascript">window.location = "index.php";</script><?php
exit;
}
?>