<?php
if(!session_is_registered("acc"))
{
	if(strstr($_SERVER["REQUEST_URI"], $site_href + "index.php"))
		header("location:index.php");
	else
		header("location:../index.php");
}

echo '<div align="center">Sikeresen bejelentkeztél <font color="red">'.$_SESSION["user"].'</font>!</div>';
header("refresh:1;url=index.php?home");
?>
