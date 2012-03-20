<?php
if(!session_is_registered("acc"))
	header("location:index.php");

//include "database.php";

$db = new Database();
$acc = $db->escape(stripslashes($_POST['acc']));
$db->select('admins');

foreach($db->getResult() as $row)
{
	$output .= '<tr>';
	$output .= '<td><pre>'.$row["Name"].'</pre></td>';
	$output .= '<td><pre>'.vhost($row["Vhost"]).'</pre></td>';
	$output .= '<td>'.ranktostring($row["Flag"]).'</td>';
	$output .= '</tr>';
}

//<div align="right"><a href="javascript:history.go(-1)">Vissza</a></div>
?>

			<div id="pagename">
				<div class="inside">
					<h2>Felhasználók</h2>
					<p>Megtudható a felhasználó neve, vhostja (ha aktiválva van) és a rangja.</p>
				</div>
			</div>

			<div id="sidebar-border">
				<table cellpadding="5" cellspacing="1" width="500px" border="0">
					<tr>
						<td width="200px"><b>Felhasználó<b></td>
						<td width="200px"><b>Vhost<b></td>
						<td width="100px"><b>Rang<b></td>
					</tr>
					<?php echo $output; ?>
				</table>
			</div>
			<div id="kozep-a1"></div>

<? Copyright(); ?>
