<?php
unset($_SESSION["user"]);
unset($_SESSION["rank"]);
session_unset();
session_destroy();
echo '<div align="center">Sikeresen kijelentkeztél.</div>';
header("refresh:1;url=index.php");
?>
