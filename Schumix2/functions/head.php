<?php
function head($title = "")
{
	if($title != "")
		$title = " - ".$title;
	echo '
<head>
	<title>Schumix weboldala'.$title.'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Schumix weboldala'.$title.'" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/superfish.css" type="text/css" />
	<link rel="stylesheet" href="css/style-header.css" type="text/css" media="all">
	<script type="text/javascript" src="js/load-scripts.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/hoverIntent.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript">
		jQuery(function(){ jQuery(\'ul.sf-menu\').superfish(); });
	</script>
</head>
';
}

function head2($title = "")
{
	if($title != "")
		$title = " - ".$title;
	echo '
<head>
	<title>Schumix admin belépő'.$title.'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Schumix admin belépő'.$title.'" />
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<link rel="stylesheet" href="../css/superfish.css" type="text/css" />
	<link rel="stylesheet" href="../css/style-header.css" type="text/css" media="all">
	<script type="text/javascript" src="../js/load-scripts.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="../js/hoverIntent.js"></script>
	<script type="text/javascript" src="../js/superfish.js"></script>
	<script type="text/javascript">
		jQuery(function(){ jQuery(\'ul.sf-menu\').superfish(); });
	</script>
</head>
';
}
?>
