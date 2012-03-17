<?php
include "database.php";

function rank($nick)
{
	$db = new Database();
	$nick = $db->escape(stripslashes($nick));
	$row = $db->select('admins', 'Flag', "Name='".$nick."'");

	if($row)
	{
		$r = $db->getResult();
		return $r["Flag"];
	}
	else
		return "Te egy Senki vagy!";
}

function ranktostring($rank)
{
	if($rank == 0)
		return "Fél operátor";
	else if($rank == 1)
		return "Operátor";
	else if($rank == 2)
		return "Admin";
	else
		return "Ismeretlen";
}

function vhost($vhost_n)
{
	if(strpos($vhost_n, '.'))
		return $vhost_n;
	else
		return "Nincs aktiválva.";
}

function Copyright()
{
	echo '<br /><br /><div align="center"><h4>Copyright © 2011-2012 yeahunter.hu. Minden jog fenntartva.</h4></div>';
}
?>
