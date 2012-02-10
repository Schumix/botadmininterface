<?php
if(!session_is_registered(acc))
{
	header("location:index.html");
}

function commands()
{
    $sqlConn = mysql_connect($host, $username, $password);
    mysql_select_db($db_name, $sqlConn);
    mysql_query("set names utf8");
    $account_id = mysql_query("SELECT * FROM commands ORDER BY id");
    $asd .= '<table>';
    while ( ($account_show_id = mysql_fetch_assoc( $account_id )) )
    {
    $asd .= '<tr>';
    $asd .= '<td align="center">'.$account_show_id["id"].'</td>';
    $asd .= '<td>'.$account_show_id["main1"].' '.$account_show_id["main2"].' '.$account_show_id["name"].'</td>';
    $asd .= '<td align="center">'.$account_show_id["rank"].'</td>';
    if($_SESSION["rank"] >= 5){
        $asd .= '<form method="post" action="admin.php?commands">';
        if(!empty($_POST['help_'.$account_show_id["id"]]))
        {
        $asd .= '<td><input type="text" value="'.$_POST['help_'.$account_show_id["id"]].'" name="help_'.$account_show_id["id"].'"></td>';
        }
        else {
            $asd .= '<td><input type="text" value="'.$account_show_id["help"].'" name="help_'.$account_show_id["id"].'"></td>';
        }
        $asd .= '<td><input type="submit" value="Változtat!" name="op_'.$account_show_id["id"].'"></td></form>';
        if (isset($_POST['op_'.$account_show_id["id"]])){
            include "conf.php";
            $sqlConn = mysql_connect($host, $username, $password);
            mysql_select_db($db_name, $sqlConn);
            mysql_query("set names utf8");
            mysql_query("UPDATE commands SET help = '".$_POST['help_'.$account_show_id["id"]]."' WHERE id = '".$account_show_id["id"]."'");
            mysql_close($sqlConn);
            $asd .= '<td>Erre megváltoztattad: '.$_POST['help_'.$account_show_id["id"]].'</td>';
        }
    }
    else{ $asd .= '<td>'.$account_show_id["help"].'</td>'; }
    // $asd .= '<td>'.$_SESSION["rank"].'</td>';
    $asd .= '</tr>';
    }
    $asd .= '</table>';
    return $asd;
}
echo commands();
?>
