<?php
function head($title = "")
{
	if($title != "")
		$title = " - ".$title;
	echo '<head>
	<title>Schumix2 admin felület'.$title.'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Schumix2 admin felület'.$title.'" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/superfish.css" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/hoverIntent.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript">
		jQuery(function(){ jQuery(\'ul.sf-menu\').superfish(); });
	</script>
</head>
';
}
?>
