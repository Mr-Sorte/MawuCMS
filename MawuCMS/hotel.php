<?php require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /login?redir=hotel");
	exit;
}

if(maintenance == '1') 
{
    header("Location: error");
	exit;
}

$_config['client'] = array(
	'host' 				 				=> 'localhost',
	'port' 				 				=> '30000',
	'client_starting' 		 		 	=> ''.$Holo['name'].' está carregando',
	'external_variables' 			 	=> 'http://localhost/WulezSWF/gamedata/external_variables.txt',
	'external_variables_override' 		=> 'http://localhost/WulezSWF/gamedata/override/external_override_variables.txt',
	'external_flash_texts'  			=> 'http://localhost/WulezSWF/gamedata/external_flash_texts.txt',
	'external_flash_texts_override' 	=> 'http://localhost/WulezSWF/gamedata/override/external_flash_override_texts.txt',
	'productdata' 			 			=> 'http://localhost/WulezSWF/gamedata/productdata.txt',
	'furnidata' 			 			=> 'http://localhost/WulezSWF/gamedata/furnidata.xml',	
	'external_figurepartlist' 			=> 'http://localhost/WulezSWF/gamedata/figuredata.xml',	
	'avatareditor_promohabbos' 			=> 'http://localhost/WulezSWF/gamedata/hotlooks.xml',	
	'flash_client_url' 	 				=> 'http://localhost/WulezSWF/gordon/PRODUCTION-201904011212-888653470/',
	'habbo_swf' 		 				=> 'Habbooriginal.swf'
);

define('SSO_SALT', $Holo['name']);
$ticket = hash('sha256', SSO_SALT . openssl_random_pseudo_bytes(25) . time());

mysqli_query(connect::cxn_mysqli(),"UPDATE users SET auth_ticket = '". filtro($myrow['username'])."-".$ticket."', ip_current = '".$ip."' WHERE id = '".$myrow['id']."'");
	
$ticketsql = mysqli_query(connect::cxn_mysqli(),"SELECT auth_ticket FROM users WHERE id = '".$myrow['id']."'");
$ticketrow = mysqli_fetch_assoc($ticketsql);
?>
<html lang="fr-FR" data-theme="dark">
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
	<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/Mawu/css/app.5df30421.css?v=554" type="text/css">
	
    <script type="text/javascript" src="<?php echo $Holo['url']; ?>/Mawu/js/swfobject.js"></script>
    <script type="text/javascript" src="<?php echo $Holo['url']; ?>/Mawu/js/fullscreen.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $Holo['url']; ?>/Mawu/image/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	   
	<script>
	function goBack() {
	  window.history.back();
	}
	</script>
	    
        <script type="text/javascript">
            var BaseUrl = "<?php echo $_config['client']['flash_client_url']; ?>";
            var flashvars =
            {
                "client.starting" : "<?php echo $_config['client']['client_starting']; ?>", 
                "client.allow.cross.domain" : "1", 
                "client.notify.cross.domain" : "1", 
                "connection.info.host" : "<?php echo $_config['client']['host']; ?>", 
                "connection.info.port" : "<?php echo $_config['client']['port']; ?>", 
                "site.url" : "<?php echo $Holo['url']; ?>", 
                "url.prefix" : "<?php echo $Holo['url']; ?>", 
                "client.reload.url" : "<?php echo $Holo['url']; ?>/hotel", 
                "client.fatal.error.url" : "<?php echo $Holo['url']; ?>/client_error", 
                "client.connection.failed.url" : "<?php echo $Holo['url']; ?>/client_error", 
				"logout.url" : "<?php echo $Holo['url']; ?>/hotel?action=logout", 
				"logout.disconnect.url" : "<?php echo $Holo['url']; ?>/hotel?action=logout", 
                "external.variables.txt" : "<?php echo $_config['client']['external_variables']; ?>", 
                "external.texts.txt" : "<?php echo $_config['client']['external_flash_texts']; ?>", 
				"external.override.texts.txt" : "<?php echo $_config['client']['external_flash_texts_override']; ?>", 
				"external.override.variables.txt" : "<?php echo $_config['client']['external_variables_override']; ?>", 
                "productdata.load.url" : "<?php echo $_config['client']['productdata']; ?>", 
                "furnidata.load.url" : "<?php echo $_config['client']['furnidata']; ?>", 
				"external.figurepartlist.txt" : "<?php echo $_config['client']['external_figurepartlist']; ?>", 
				"use.sso.ticket" : "1", 
                "sso.ticket" : "<?php echo $ticketrow['auth_ticket']; ?>", 
                "processlog.enabled" : "1",
                "flash.client.url" : BaseUrl, 
                "flash.client.origin" : "popup" 
            };
            var params =
            {
                "base" : "<?php echo $_config['client']['flash_client_url']; ?>",
                "allowScriptAccess" : "always",
                "menu" : "false"                
            };
			FlashExternalInterface = {};
            swfobject.embedSWF(BaseUrl + "<?php echo $_config['client']['habbo_swf']; ?>", "client", "100%", "100%", "11.0.0", "<?php echo $Holo['url']; ?>/web-gallery/WulezSWF/expressInstall.swf", flashvars, params, null, null);
			FlashExternalInterface.signoutUrl = "<?php echo $Holo['url']; ?>/logout";
		</script>

		
    </head>

    <body class="home page-template-default" onselectstart='return false' ondragstart='return false'>
		
		<div onclick="goBack()" id="habbo-web"></div>
		<div onclick="HotelFullScreen()" id="habbo-fullscreen"></div>
		<a href="<?php echo $Holo['url']; ?>/gallery" target="_blank"><div id="habbo-camera"></div></a>
		<a href="<?php echo $Holo['url']; ?>/support" target="_blank"><div id="habbo-support"></div></a>
		
        <div id="client">
			<habbo-client-error>
				<div class="client-error__background-frank">
					<span class="client-error__text-contents">
						<h1 class="client-error__title" translate="CLIENT_ERROR_TITLE">VOCÊ ESTÁ QUASE LÁ!</h1>
						<p translate="CLIENT_ERROR_FLASH"><b>Calma aí <?php echo $myrow['username']; ?>!</b><br><br>Você precisa ativar manualmente o Flash Player nas configurações do seu navegador antes de entrar no <?php echo $Holo['name']; ?> Hotel! Depois que o Flash estiver ativado, clique no botão Hotel e clique em "Executar Flash".</p>
					</span>
					<div class="client-error__hotel-button-div">
						<a target="_blank" rel="noopener noreferrer" class="hotel-button" href="https://www.adobe.com/go/getflashplayer"><span class="hotel-button__text" translate="NAVIGATION_HOTEL">Hotel</span></a>
					</div>
				</div>
			</habbo-client-error>
		</div>
		
		<div id="app"></div>
        <script type="text/javascript" src="<?php echo $Holo['url']; ?>/Mawu/js/chunk-vendors.fba5afa5.js"></script>
        <script type="text/javascript" src="<?php echo $Holo['url']; ?>/Mawu/js/app.22f7fc80.js"></script>
		
	</body>
</html>