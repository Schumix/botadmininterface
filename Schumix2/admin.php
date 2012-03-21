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
	<div id="wpadminbar">
		<div class="quicklinks">
';

include "functions/website.php";

echo '			<ul id="admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
				<li id="admin-bar-my-account" class="menupop with-avatar">
					<a class="ab-item" tabindex="10" aria-haspopup="true" title="Felhasználói fiókom">Üdvözlet '.$_SESSION["user"].'
						<img src="images/kprofil" class="avatar avatar-16 photo" height="16" width="16">
					</a>
					<div class="ab-sub-wrapper">
						<ul id="admin-bar-user-actions" class=" ab-submenu">
							<li id="admin-bar-user-info">
								<a class="ab-item" tabindex="-1">
									<img src="images/profil" class="avatar avatar-64 photo" height="64" width="64">
									<span class="display-name">'.$_SESSION["user"].'</span>
									<span class="username">Ip: '.getenv("REMOTE_ADDR").'</span>
									<span class="username">Rang: '.ranktostring($_SESSION["rank"]).'</span>
								</a>
							</li>
							<li id="admin-bar-logout">
								<a class="ab-item" tabindex="10" href="admin.php?status=1">Kijelentkezés</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="header">
		<div class="wrapper">
			<div class="navbar"></div>
			<h1>Schumix admin felület</h1>
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
else if(isset($_GET['status']))
{
if($_GET['status'] == 2)
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
