<?php
header('Content-type: text/html; charset=utf-8');
include "head.php";
include "function.php";

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
			// Register $acc, $pass and redirect to file "login_success.php"
			session_register("acc");
			$_SESSION["user"] = $acc;
			$_SESSION["rank"] = rank($acc);
			session_register("pass"); 
			header("location:admin.php?status=2");
	}
	else
	{
			//include "function.php";
			head();
			echo '<div style="position:absolute; top:50%; left:50%; margin-left: -130px;">Rossz felhasználónév, vagy jelszó!</div>';
			echo '<div style="position:absolute; top:92%; left:50%; margin-left: -200px;"><h4>Copyright © 2011-2012 yeahunter.hu. Minden jog fenntartva.</h4></div>';
			header("refresh:1;url=index.html");
	}
}
else
{
		//include "function.php";
		head();
		echo '<div style="position:absolute; top:50%; left:50%; margin-left: -130px;">Rossz felhasználónév, vagy jelszó!</div>';
		echo '<div style="position:absolute; top:92%; left:50%; margin-left: -200px;"><h4>Copyright © 2011-2012 yeahunter.hu. Minden jog fenntartva.</h4></div>';
		header("refresh:1;url=index.html");
}

?>
