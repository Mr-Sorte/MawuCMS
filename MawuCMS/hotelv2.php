<?php
require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}

if(maintenance == '1') 
{
    header("Location: error");
	exit;
}

define('SSO_SALT', $Holo['name']);
$ticket = hash('sha256', SSO_SALT . openssl_random_pseudo_bytes(25) . time());

mysqli_query(connect::cxn_mysqli(),"UPDATE users SET auth_ticket = '". filtro($myrow['username'])."-".$ticket."', ip_current = '".$ip."' WHERE id = '".$myrow['id']."'");
	
$ticketsql = mysqli_query(connect::cxn_mysqli(),"SELECT auth_ticket FROM users WHERE id = '".$myrow['id']."'");
$ticketrow = mysqli_fetch_assoc($ticketsql);
?>
<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Hotel</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script type="text/javascript">var andSoItBegins = (new Date()).getTime();</script>
	<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/Mawu/css/client.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/Mawu/css/client_icons.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/Mawu/css/buttons.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/Mawu/css/client_wulles.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/Mawu/css/client_news.css" type="text/css">
    <script type="text/javascript" src="<?php echo $Holo['url']; ?>/Mawu/js/swfobject.js"></script>
    <script type="text/javascript" src="<?php echo $Holo['url']; ?>/Mawu/js/fullscreen.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<link rel="icon" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-32x32.png" sizes="32x32" />
	<link rel="icon" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-192x192.png" sizes="192x192" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-180x180.png" />
	<meta name="msapplication-TileImage" content="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-270x270.png" />
	   
	<script>
	function goBack() {
	  window.history.back();
	}
	</script>
	   
        <iframe src="<?php echo $Holo['url']; ?>/nitro/index.html?sso=<?php echo $ticketrow['auth_ticket']; ?>" id="flash-container" width="100%" height="100%" frameborder="0"></iframe>
		
    </head>

    <body class="home page-template-default" onselectstart='return false' ondragstart='return false'>
		
		<div onclick="goBack()" id="habbo-web"></div>
		<div onclick="HotelFullScreen()" id="habbo-fullscreen"></div>
		<a href="/gallery" target="_blank"><div id="habbo-camera"></div></a>
		<a href="/support" target="_blank"><div id="habbo-support"></div></a>
		<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
        while($isadm = mysql_fetch_assoc($isadmin)){ ?><a href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>" target="_blank"><div id="habbo-panel"></div></a><?php } ?>

	</body>
</html>