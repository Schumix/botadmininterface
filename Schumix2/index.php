<html>
<?php
session_start();

if(session_is_registered(acc))
	header("location:admin.php?home");

include "head.php";
$error = false;

if(isset($_GET['error']))
{
	head("Rossz felhasználónév, vagy jelszó!");
	$error = true;
}
else
	head("Bejelentkező");
?>
<body>
	<div id="container">
		<div id="login-center">
			<form method="post" action="login.php">
				<div id="login-text">Bejelentkező
					<a href="https://github.com/megax/Schumix2">
						<img src="./images/logo.png" style="height: 48px; width: 48px; margin-top: -30px; margin-left: 200px;" title="Schumix2">
					</a>
				</div>
				Felhasználó<br /><input name="acc" type="text"><br /><br />
				Jelszó
<?php
if($error)
{
	echo '				<input name="pass" type="password" class="form-error">';
	echo '				<div class="errormsg">A felhasználónév vagy jelszó hibás!</div>';
}
else
	echo '				<input name="pass" type="password"><br /><br />';
?>
				<input type="submit" value="Login">
			</form>
		</div>
	</div>
	<div style="position:absolute; left:50%; margin-left: -195px;  margin-top: 500px;"><h4>Copyright © 2011-2012 yeahunter.hu. Minden jog fenntartva.</h4></div>
</body>
</html>
