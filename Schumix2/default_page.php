<?php

function Page($page_name, $user, $ip, $rank, $site_href)
{
echo '<html>';
$page_name = str_replace($site_href, "", $page_name);

if($page_name == "admin.php")
	$page_name = "home";
else
	$page_name = str_replace("admin.php?", "", $page_name);

$array = GetPageData($page_name);

if($page_name == "")
	head("Mit keresel?");
else
	head($array["Head"]);

echo '<body>
	<div id="wpadminbar">
		<div class="quicklinks">
';

include "functions/website.php";

echo '			<ul id="admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
				<li id="admin-bar-my-account" class="menupop with-avatar">
					<a class="ab-item" tabindex="10" aria-haspopup="true" href="admin.php?profile" title="Felhasználói adatlap">Üdvözlet '.$user.'
						<img src="./images/kprofil.png" class="avatar avatar-16 photo" height="16" width="16">
					</a>
					<div class="ab-sub-wrapper">
						<ul id="admin-bar-user-actions" class="ab-submenu">
							<li id="admin-bar-user-info">
								<a class="ab-item" tabindex="-1">
									<img src="./images/profil.png" class="avatar avatar-64 photo" height="64" width="64">
									<span class="display-name">'.$user.'</span>
									<span class="username">Ip: '.$ip.'</span>
									<span class="username">Rang: '.$rank.'</span>
								</a>
							</li>
							<li id="admin-bar-logout">
								<a class="ab-item" tabindex="10" href="admin.php?logout">Kijelentkezés</a>
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
		<div class="wrapper">
			<ul class="sf-menu">';

	echo GetLinks($page_name);
	echo '
			</ul>
			<div id="kozep-a1"></div>';

//include "lvls/lvl".$_SESSION["rank"].".php"; // ezt majd a menű részhez kell igazítani

			if(IsPage($page_name))
			{
	echo '
			<div id="pagename">
				<div class="inside">
					<h2>'.$array["PageName"].'</h2>
					<p>'.$array["Title"].'</p>
				</div>
			</div>
			<div id="sidebar-border">';

				if(strtolower($array["Include"]) == "true")
					include $array["Include_Link"];
				else
					echo $array["Page_Data"];
	echo '
			</div>';
			}
			else
			{
	echo '
		<div id="pagename">
			<div align="center">
				<h1><font color="red">Itt nincs semmi se! Át lesz írányítva a főoldalra.</font></h1>
			</div>
		</div>';

				Copyright();
				header("refresh:2;url=admin.php?home");
			}

	echo '
			<div id="kozep-a1"></div>';

if(IsPage($page_name))
	Copyright();

echo '
	</div>
</body>
</html>';
}
?>
