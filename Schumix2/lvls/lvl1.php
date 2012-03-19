<?php
if(!session_is_registered(acc))
	header("location:index.php");
else
{
	include "lvl0.php";
}
?>
