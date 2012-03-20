<?php
include "config.php";
include "functions/head.php";
include "functions/function.php";

echo '<html>';

if(isset($_GET['home']))
	head("Főoldal");
else
	head();

session_start();

if(!session_is_registered("acc"))
	header("location:index.php");

echo '<body>
	<div id="header">
		<div class="wrapper">
			<div class="navbar"></div>
			<h1>Schumix admin felület</h1>
			<div class="ablak">
				<font color="#FFFFFF">Felhasználó név: </font><font color="red">'.$_SESSION["user"].'</font><br />
				<font color="#FFFFFF">Ip címed: </font><font color="red">'.getenv("REMOTE_ADDR").'</font><br />
				<font color="#FFFFFF">Jelenlegi rangod: </font><font color="red">'.ranktostring($_SESSION["rank"]).'</font>
			</div>
		</div>
		<div align="center">
			<ul class="sf-menu">
				<li><a href="admin.php?home">Főoldal</a></li>
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
				</li>
				<li><a href="admin.php?status=1">Kilépés</a></li>
			</ul>
		</div>
		<div id="kozep-a1"></div>
		<div class="wrapper">';

//include "lvls/lvl".$_SESSION["rank"].".php"; // ezt majd a menű részhez kell igazítani

if(isset($_GET['home']))
{
	echo '
			<div id="pagename">
				<div class="inside">
					<h2>Teszt hír :)</h2>
					<p>Asdddddddddddddddddddddddddddddddddddddddddd</p>
				</div>
			</div>';

	echo '
			<div id="sidebar-border">
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
			</div>
			<div id="kozep-a1"></div>';
	Copyright();
}
else if($_GET['status'] == 2)
{
	echo '<div align="center">Sikeresen bejelentkeztél <font color="red">'.$_SESSION["user"].'</font>!</div>';
	header("refresh:1;url=admin.php?home");
	Copyright();
}
else if($_GET['status'] == 1)
{
	unset($_SESSION["user"]);
	unset($_SESSION["rank"]);
	session_unset();
	session_destroy();
	header("refresh:1;url=index.php");
	echo '<div align="center">Sikeresen kijelentkeztél.</div>';
	Copyright();
}
else if(isset($_GET['irccommands']))
{
	include "commands/irccommands.php";
}
else if(isset($_GET['irchelp']))
{
	include "commands/irchelp.php";
}
else if(isset($_GET['ccommands']))
{
	include "commands/ccommands.php";
}
else if(isset($_GET['chelp']))
{
	include "commands/chelp.php";
}
else if(isset($_GET['users']))
{
	include "users.php";
}
else if(isset($_GET['newpass']))
{
	include "account/newpass.php";
}
else
{
	echo '
		<div id="pagename">
			<div align="center">
				<h1><font color="red">Itt nincs semmi se! Át lesz írányítva a főoldalra.</font></h1>
			</div>
		</div>';

	header("refresh:2;url=admin.php?home");
	Copyright();
}

echo '
	</div>
</body>
</html>';
?>
