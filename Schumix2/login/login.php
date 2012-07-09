<?php
include "../functions/head.php";
include "database.php";

function rank($nick)
{
	if($nick == "/ghost/")
		return 9;

	$db = new Database();
	$nick = $db->escape(stripslashes($nick));
	$row = $db->select('admins', 'Flag', "Name='".$nick."'");

	if($row)
	{
		$r = $db->getResult();
		return (int)$r["Flag"];
	}
	else
		return 9;
}

// username and password sent from form 
// To protect MySQL injection (more detail about MySQL injection)
$db = new Database();

if(!empty($_POST['acc']) && !empty($_POST['pass']))
{
	$acc = $db->escape(stripslashes($_POST['acc']));
	$db->select('admins', '*', "Name='".$acc."' and Password='".sha1($_POST['pass'])."'");

	if($db->get_num_rows() == 1)
	{
			//include "function.php";
			// Register $acc, $pass and redirect to file "login.php"
			session_register("acc");
			$_SESSION["user"] = $acc;
			$_SESSION["rank"] = rank($acc);
			session_register("pass");

			if(isset($_GET['redirect_to']))
				header("location:".$_GET['redirect_to']);
			else
				header("location:../index.php?status=2");
	}
	else
	{
		$db->select('admins', '*', "Name='".$acc."'");
		if($db->get_num_rows() == 1)
			header("location:index.php?error=password");
		else
			header("location:index.php?error=user");
	}
}
else
	header("location:index.php?error=notext");

?>
