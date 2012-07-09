<?php
if(!session_is_registered("acc"))
	header("location:index.php");

//include "database.php";

$db = new Database();
$db->select('admins');
$output = "";

if($db->get_num_rows() == 1)
{
	$r = $db->getResult();
	$output .= '<tr>';
	$output .= '	<td><pre>'.$r["Name"].'</pre></td>';
	$output .= '	<td class="user-vhost border"><pre>'.vhost($r["Vhost"]).'</pre></td>';
	$output .= '	<td>'.ranktostring($r["Flag"]).'</td>';
	$output .= '</tr>';
}
else
{
	foreach($db->getResult() as $row)
	{
		$output .= '<tr>';
		$output .= '	<td><pre>'.$row["Name"].'</pre></td>';
		$output .= '	<td class="user-vhost border"><pre>'.vhost($row["Vhost"]).'</pre></td>';
		$output .= '	<td>'.ranktostring($row["Flag"]).'</td>';
		$output .= '</tr>';
	}
}

//<div align="right"><a href="javascript:history.go(-1)">Vissza</a></div>
?>

				<table cellpadding="5" cellspacing="0" width="500px" border="0">
					<tr>
						<td width="200px"><b>Felhasználó<b></td>
						<td width="200px"><b>Vhost<b></td>
						<td width="100px"><b>Rang<b></td>
					</tr>
					<?php echo $output; ?>
				</table>
