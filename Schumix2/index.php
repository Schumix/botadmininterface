<html>
<?php
session_start();

if(session_is_registered("acc"))
	header("location:admin.php?home");

include "functions/head.php";
$error = false;

if(isset($_GET['error']))
{
	$error = true;

	if($_GET['error'] == "user")
		head("Nem létezik ilyen felhasználó!");
	else if($_GET['error'] == "password")
		head("Rossz jelszó lett megadva!");
	else if($_GET['error'] == "notext")
		head("Nem lett megadva semmilyen adat se!");
	else
		head("Rossz felhasználói név, vagy jelszó!");
}
else
	head("Bejelentkező");
?>
<body>
	<div id="wpadminbar">
		<div class="quicklinks">
			<?php include "functions/website.php"; ?>
		</div>
	</div>
	<div id="container">
		<div id="login-center">
			<form method="post" action="login.php">
				<div id="login-text">Bejelentkező
					<a href="https://github.com/megax/Schumix2">
						<img src="./images/logo.png" style="height: 48px; width: 48px; margin-top: -30px; margin-left: 200px;" title="Schumix2">
					</a>
				</div>
<?php
if($error)
{
	if($_GET['error'] == "user")
	{
		echo '				Felhasználó<br /><input name="acc" type="text" class="form-error"><br /><br />';
		echo '				Jelszó<br /><input name="pass" type="password" class="form-error">';
		echo '				<div class="errormsg">Nem létezik ilyen felhasználó!</div>';
	}
	else if($_GET['error'] == "password")
	{
		echo '				Felhasználó<br /><input name="acc" type="text"><br /><br />';
		echo '				Jelszó<br /><input name="pass" type="password" class="form-error">';
		echo '				<div class="errormsg">Rossz jelszó lett megadva!</div>';
	}
	else if($_GET['error'] == "notext")
	{
		echo '				Felhasználó<br /><input name="acc" type="text" class="form-error"><br /><br />';
		echo '				Jelszó<br /><input name="pass" type="password" class="form-error">';
		echo '				<div class="errormsg">Nem lett megadva egy vagy több adat!</div>';
	}
	else
	{
		echo '				Felhasználó<br /><input name="acc" type="text"><br /><br />';
		echo '				Jelszó<br /><input name="pass" type="password" class="form-error">';
		echo '				<div class="errormsg">Rossz felhasználói név, vagy jelszó!</div>';
	}
}
else
{
	echo '				Felhasználó<br /><input name="acc" type="text"><br /><br />';
	echo '				Jelszó<br /><input name="pass" type="password"><br /><br />';
}
?>
				<input type="submit" value="Login">
			</form>
		</div>
	</div>
	<div style="position:absolute; left:50%; margin-left: -195px;  margin-top: 500px;"><h4>Copyright © 2011-2012 yeahunter.hu. Minden jog fenntartva.</h4></div>
</body>
</html>
