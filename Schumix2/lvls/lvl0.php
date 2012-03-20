<?php
if(!session_is_registered(acc))
	header("location:../index.php");
else
{
	echo 'Neked itt semmi jogod nincs egyenlőre....';
}
?>
