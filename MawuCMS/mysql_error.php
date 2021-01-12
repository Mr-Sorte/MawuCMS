<?PHP
if ($mysqli -> connect_errno) {
require_once(DR .'/inc/config.god.php');
?>
<!DOCTYPE html>
<html lang="<?php echo $Holo['htmllang']; ?>">
<script>
    var themed = new Date();
    var themeh = themed.getHours();

    if(themeh > 20 || themeh < 6){
        document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="dark">');
    } else {
		document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="light">');
	};
</script>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>MySQL Error</title>

<link rel='dns-prefetch' href='//code.jquery.com' />
<link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
<link rel='dns-prefetch' href='//use.fontawesome.com' />
<link rel='dns-prefetch' href='//s.w.org' />

<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>

<link rel='stylesheet' id='wp-block-library-css'  href='/Mawu/css/style.min.css?ver=5.3.2' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='/Mawu/css/bootstrap.min.css?ver=4.4.1' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='https://use.fontawesome.com/releases/v5.12.1/css/all.css?ver=5.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css'  href='/Mawu/css/swiper.min.css?ver=5.3.1' type='text/css' media='all' />
<link rel='stylesheet' id='selectize-css'  href='/Mawu/css/selectize.css?ver=0.12.6' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='/Mawu/css/style.css?ver=1.1' type='text/css' media='all' />
<link rel='stylesheet' id='theme-styles-css'  href='/Mawu/css/style.css?ver=5.3.2' type='text/css' media='all' />
<script type='text/javascript' src='/Mawu/js/jquery.js?ver=1.12.4-wp'></script>
<script type='text/javascript' src='/Mawu/js/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='/Mawu/js/simple-likes-public.js?ver=0.5'></script>

<link rel="icon" href="/Mawu/image/favicon/cropped-favicon-1-32x32.png" sizes="32x32" />
<link rel="icon" href="/Mawu/image/favicon/cropped-favicon-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="/Mawu/image/favicon/cropped-favicon-1-180x180.png" />
<meta name="msapplication-TileImage" content="/Mawu/image/favicon/cropped-favicon-1-270x270.png" />

</head>

<body class="home page-template-default" onselectstart='return false' ondragstart='return false'>

	<nav style="cursor:default" class="navbar fixed-top navbar-expand-lg navbar-light">
	<a class="navbar-brand">MawuCMS <span class="tag">BETA</span></a>
	</nav>

<main>
<section style="cursor:default">
	<div class="container pt-3">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="toggle-login">
					<div class="login">
												
	<div class="text-center"> 
		<h4 class="mb-4">Mawu MySQL Error</h4>
		<p class="text-muted mb-0"><strong><i><?php echo $mysqli -> connect_error; ?></i>.</strong></p>
	</div>

 					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	</main>
	
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>

<script type='text/javascript' src='/Mawu/js/jquery.cookie.js?ver=1.4.1'></script>
<script type='text/javascript' src='/Mawu/js/bootstrap.min.js?ver=4.4.1'></script>
<script type='text/javascript' src='/Mawu/js/swiper.min.js?ver=5.3.1'></script>
<script type='text/javascript' src='/Mawu/js/selectize.min.js?ver=0.12.6'></script>
<script type='text/javascript' src='/Mawu/js/moment.min.js?ver=2.22.2'></script>
<script type='text/javascript' src='/Mawu/js/jquery.page.js?ver=0.1'></script>
<script type='text/javascript' src='/Mawu/js/main.js?ver=1.0'></script>
		
</body>
</html>
<?PHP
        } else {
				header("Location: /");
	            exit;
		}
?>