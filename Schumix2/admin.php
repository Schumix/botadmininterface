<?php
include "config.php";
include "default_page.php";
include "functions/head.php";
include "functions/function.php";

session_start();

if(!session_is_registered("acc"))
	header("location:index.php");

Page($_SERVER["REQUEST_URI"], $_SESSION["user"], getenv("REMOTE_ADDR"), ranktostring($_SESSION["rank"]), $site_href);
?>
