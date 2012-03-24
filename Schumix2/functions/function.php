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

function IsPage($page)
{
	$db = new Database();
	$page = $db->escape(stripslashes($page));
	$row = $db->select('pages', 'Include_PageName', "Include_PageName='".$page."'");

	if($row)
	{
		$r = $db->getResult();

		if($r["Include_PageName"] == "")
		{
			$row1 = $db->select('pages_subpages', 'Include_PageName', "Include_PageName='".$page."'");

			if($row1)
			{
				$r1 = $db->getResult();
				return ($r1["Include_PageName"] == "") ? false : true;
			}
			else
				return false;
		}
		else
			return true;
	}
	else
		return false;
}

function GetPageData($page)
{
	$db = new Database();
	$page = $db->escape(stripslashes($page));
	$row = $db->select('pages', 'PageName, SubPage, Title, Head, Include, Include_Link, Include_PageName, Page_Data', "Include_PageName='".$page."'");

	if($row)
	{
		$r = $db->getResult();

		if($r["Include_PageName"] == "")
		{
			$row1 = $db->select('pages_subpages', 'PageName, SubPage, Title, Head, Include, Include_Link, Page_Data', "Include_PageName='".$page."'");

			if($row1)
			{
				$r1 = $db->getResult();
				$array = array(
				"PageName" => $r1["SubPage"],
				"Title" => $r1["Title"],
				"Head" => $r1["Head"],
				"Include" => $r1["Include"],
				"Include_Link" => $r1["Include_Link"],
				"Page_Data" => $r1["Page_Data"]);
				return $array;
			}
			else
			{
				$array2 = array(
				"PageName" => "???",
				"Title" => "???",
				"Head" => "???",
				"Include" => "???",
				"Include_Link" => "???",
				"Page_Data" => "???");
				return $array2;
			}
		}

		$array = array(
		"PageName" => $r["PageName"],
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
	$db1 = new Database();
	$db->select('pages', 'PageName, SubPage, Include_PageName');

	$output = "";

	foreach($db->getResult() as $row)
	{
		if($row["Include_PageName"] == "logout" || $row["Include_PageName"] == "status=2")
			continue;

		if(strtolower($row["SubPage"]) == "false")
		{
			if($page == $row["Include_PageName"])
			{
				$output .= '
				<li class="current_page_item"><a href="admin.php?'.$row["Include_PageName"].'">'.$row["PageName"].'</a></li>';
			}
			else
			{
				$output .= '
				<li><a href="admin.php?'.$row["Include_PageName"].'">'.$row["PageName"].'</a></li>';
			}
		}
		else
		{
			$ou = "";
			$ispage = false;
			$db1->select('pages_subpages', 'SubPage, Include_PageName', "PageName='".$row["PageName"]."'");

			foreach($db1->getResult() as $row1)
			{
				if($page == $row1["Include_PageName"])
				{
					$ispage = true;
					$ou .= '
						<li class="current_page_item"><a href="admin.php?'.$row1["Include_PageName"].'">'.$row1["SubPage"].'</a></li>';
				}
				else
				{
					$ou .= '
						<li><a href="admin.php?'.$row1["Include_PageName"].'">'.$row1["SubPage"].'</a></li>';
				}
			}

			if($ispage)
			{
				/*$output .= '
				<li class="current_page_item"><a style="cursor:pointer;">'.$row["PageName"].'</a>
					<ul>';*/ // megjelölni hogy ebben van megnyitva egy link
				$output .= '
				<li><a style="cursor:pointer;">'.$row["PageName"].'</a>
					<ul style="display: none; visibility: hidden; ">';
			}
			else
			{
				$output .= '
				<li><a style="cursor:pointer;">'.$row["PageName"].'</a>
					<ul style="display: none; visibility: hidden; ">';
			}

			$output .= $ou;
			$output .= '
					</ul>
				</li>';
		}
	}

	return $output;
}
?>
