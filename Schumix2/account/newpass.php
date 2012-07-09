<?php
if(!session_is_registered("acc"))
{
	if(strstr($_SERVER["REQUEST_URI"], "index.php"))
		header("location:index.php");
	else
		header("location:../index.php");
}

//include "database.php";

echo '
				<div align="center">
					<table>
						<form method="post">
							<b>Régi jelszó</b><br /><input name="oldpass" type="password"><br /><br />
							<b>Új jelszó</b><br /><input name="newpass" type="password"><br />
							<b>Új jelszó újra</b><br /><input name="newpass2" type="password"><br /><br />
							<div align="center"><input type="submit" value="Módosítás"></div>
						</form>
					</table>
				</div>';

if(!$_POST)
	return;

if(empty($_POST['oldpass']) || empty($_POST['newpass']) || empty($_POST['newpass2']))
	echo 'Valamelyik mező nincs kitöltve!';
else if($_POST['oldpass'] == $_POST['newpass'])
	echo 'Megegyezik a régi jelszóval!';
else if($_POST['newpass'] != $_POST['newpass2'])
	echo 'Nem egyezik meg a két új jelszó mező!';
else
{
	$db = new Database();
	$row = $db->select('admins', 'Password', "Name='".$_SESSION["user"]."'");

	if($row)
	{
		$r = $db->getResult();
		if(sha1($_POST['oldpass']) == $r["Password"])
		{
			$db->update('admins', "Password='".sha1($_POST['newpass'])."'", "Name='".$_SESSION["user"]."'");
			echo '<div align="center">A jelszó sikeresen módosítva lett erre: '.$_POST['newpass'].'</div>';
		}
		else
			echo '<div align="center">Nem egyezik meg a régi jelszó a tárolt változattal!</div>';
	}
}

?>
