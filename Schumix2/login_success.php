<?php
echo '<div align="center">Sikeresen bejelentkeztél <font color="red">'.$_SESSION["user"].'</font>!</div>';
header("refresh:1;url=admin.php?home");
?>
