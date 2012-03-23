<?php
include "database/database.php";

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
echo '
		</div>
		<footer>
			<div align="center">
				<div id="bottom-footer">
					<div class="container">
						<p class="alignleft">
							Copyright © 2011-2012 <a href="http://yeahunter.hu" title="Yeahunter Team">yeahunter.hu</a> Minden jog fenntartva.
						</p>
					</div>
				</div>
			</div>
		</footer>';
}

/*function Home()
{
}*/

function IsPage($page)
{
	$db = new Database();
	$page = $db->escape(stripslashes($page));
	$row = $db->select('pages', 'Include_PageName', "Include_PageName='".$page."'");
	if($row)
	{
		$r = $db->getResult();
		return ($r["Include_PageName"] == "") ? false : true;
	}
	else
		return false;
}

function GetPageData($page)
{
	$db = new Database();
	$page = $db->escape(stripslashes($page));
	$row = $db->select('pages', 'PageName, SubPage, Title, Head, Include, Include_Link, Page_Data', "Include_PageName='".$page."'");

	if($row)
	{
		$r = $db->getResult();
		$page_name = "";

		if($r["PageName"] == "")
			$page_name = $r["SubPage"];
		else
			$page_name = $r["PageName"];

		$array = array(
		"PageName" => $page_name,
		"Title" => $r["Title"],
		"Head" => $r["Head"],
		"Include" => $r["Include"],
		"Include_Link" => $r["Include_Link"],
		"Page_Data" => $r["Page_Data"]);
		return $array;
	}
	else
	{
		$array = array(
		"PageName" => "???",
		"Title" => "???",
		"Head" => "???",
		"Include" => "???",
		"Include_Link" => "???",
		"Page_Data" => "???");
		return $array;
	}
}

function GetLinks($page)
{
	$db = new Database();
	$db->select('pages', 'PageName, SubPage, Include_PageName');

	$output = "";

	foreach($db->getResult() as $row)
	{
		if($row["Include_PageName"] == "logout" || $row["Include_PageName"] == "status=2")
			continue;

		//if($row["SubPage"] == "")
			$output .= '
				<li><a href="admin.php?'.$row["Include_PageName"].'">'.$row["PageName"].'</a></li>';
		//else
		//{
		//}
	}
				/*<li><a href="admin.php?home">Főoldal</a></li>
				<li><a href="admin.php?users">Felhasználók</a></li>
				<li><a style="cursor:pointer;">Parancsok /Fejlesztés alatt/</a>
					<ul>
						<li><a href="admin.php?irccommands">Irc parancsok</a></li>
						<li><a href="admin.php?chelp">Irc help parancsok</a></li>
						<li><a href="admin.php?ccommands">Konzol parancsok</a></li>
						<li><a href="admin.php?chelp">Konzol help parancsok</a></li>
					</ul>
				</li>
				<li><a style="cursor:pointer;">Beállítások</a>
					<ul>
						<li><a href="admin.php?newpass">Új jelszó</a></li>
						<li><a href="admin.php?asd">Teszt</a></li>
					</ul>
				</li>*/

	return $output;
}
?>
