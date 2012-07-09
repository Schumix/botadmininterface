<?php
if(!session_is_registered("acc"))
{
	if(strstr($_SERVER["REQUEST_URI"], "index.php"))
		header("location:index.php");
	else
		header("location:../index.php");
}
?>

Itt lehet majd megnézni a help parancsokat és a használatát megtudni.
