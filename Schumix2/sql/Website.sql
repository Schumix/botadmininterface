/* MySql.sql */

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `PageName` varchar(30) NOT NULL default '',
  `SubPage` varchar(5) NOT NULL default '',
  `Title` Text NOT NULL default '',
  `Head` Text NOT NULL default '',
  `Include` varchar(5) NOT NULL default '',
  `Include_PageName` varchar(30) NOT NULL default '',
  `Include_Link` varchar(300) NOT NULL default '',
  `Page_Data` Text NOT NULL default '',
  PRIMARY KEY  (`Include_PageName`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

INSERT INTO `pages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Főoldal", "false", "asddddddddd", "Főoldal", "false", "home", "", "				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />
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
				Teszt hír, üzenet. Remélem majd lesz valami érdekes itt :P<br />");
INSERT INTO `pages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Kijelentkezés", "false", "Kijelentkezés a felhasználóból.", "Kijelentkezés", "true", "logout", "logout.php", "");
INSERT INTO `pages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Sikeres belépés", "false", "", "Sikeres belépés", "true", "status=2", "login_success.php", "");
INSERT INTO `pages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Felhasználók", "false", "Megtudható a felhasználó neve, vhostja (ha aktiválva van) és a rangja.", "Felhasználók", "true", "users", "users.php", "");
INSERT INTO `pages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Parancsok /Fejlesztés alatt/", "true", "Fejlesztés alatt.", "Parancsok /Fejlesztés alatt/", "false", "1", "allcommands", "");
INSERT INTO `pages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Beállítások", "true", "Felhasználok álltal konfugurálható beállítások összesége.", "Beállítások", "false", "settings", "", "");

-- ----------------------------
-- Table structure for pages_subpages
-- ----------------------------
DROP TABLE IF EXISTS `pages_subpages`;
CREATE TABLE `pages_subpages` (
  `PageName` varchar(30) NOT NULL default '',
  `SubPage` varchar(30) NOT NULL default '',
  `Title` Text NOT NULL default '',
  `Head` Text NOT NULL default '',
  `Include` varchar(5) NOT NULL default '',
  `Include_PageName` varchar(30) NOT NULL default '',
  `Include_Link` varchar(300) NOT NULL default '',
  `Page_Data` Text NOT NULL default '',
  PRIMARY KEY  (`Include_PageName`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Parancsok /Fejlesztés alatt/", "Irc parancsok", "Irc parancsok", "Irc parancsok", "true", "irccommands", "commands/irccommands.php", "");
INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Parancsok /Fejlesztés alatt/", "Irc help parancsok", "Irc help parancsok", "Irc help parancsok", "true", "irchelp", "commands/irchelp.php", "");
INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Parancsok /Fejlesztés alatt/", "Konzol parancsok", "Konzol parancsok", "Konzol parancsok", "true", "ccommands", "commands/ccommands.php", "");
INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Parancsok /Fejlesztés alatt/", "Konzol help parancsok", "Konzol help parancsok", "Konzol help parancsok", "true", "chelp", "commands/chelp.php", "");
INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Beállítások", "Új jelszó", "Ezen menüpont segítségével új jelszó generálható a régi helyett.", "Új jelszó", "true", "newpass", "account/newpass.php", "");
INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Beállítások", "Profil", "Fejlesztés alatt.", "Profil", "true", "profile", "account/profile.php", "");
INSERT INTO `pages_subpages` (`PageName`, `SubPage`, `Title`, `Head`, `Include`, `Include_PageName`, `Include_Link`, `Page_Data`) VALUES ("Beállítások", "Teszt", "Teszt", "Teszt", "false", "teszt", "", "Tesztttttttttttttttttttttttttttttttttttttt");
