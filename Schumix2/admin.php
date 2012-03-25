<?php
include "config.php";
include "default_page.php";
include "functions/head.php";
include "functions/function.php";

session_start();

if(!session_is_registered("acc"))
{
	$page = str_replace($site_href, "", $_SERVER["REQUEST_URI"]);
	header("location:index.php?redirect_to=".$page);
}

Page($_SERVER["REQUEST_URI"], $_SESSION["user"], getenv("REMOTE_ADDR"), ranktostring($_SESSION["rank"]), $site_href);
?>
