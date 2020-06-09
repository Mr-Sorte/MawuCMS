<?php require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}

if(mysql_num_rows($chb) > 0) 
{
    header("Location: banned");
	exit;
}

if(MANTENIMIENTO == '1' && $myrow['rank'] < $Holo['minrank']) 
{
    header("Location: mantenimiento");
	exit;
}

if(isset($_GET['url'])) 
{ 
    if(!empty($_GET['url']))
    { 
        $id_noticia = (int) mysql_real_escape_string($_GET['url']); 
        $query_noticias = mysql_query("SELECT * FROM cms_news WHERE id = '".$id_noticia."' LIMIT 1");
        if(mysql_num_rows($query_noticias) > 0)
        { 
            $columna = mysql_fetch_assoc($query_noticias);
			$user_n = mysql_fetch_assoc(mysql_query("SELECT id,username,look,user_style FROM users WHERE username = '". $columna['author'] ."'"));
			$noticia = '' . $columna['id'] . '';
			$noticia2 = '' . $columna['image'] . '';
			$noticia3 = '' . $columna['title'] . '';
			$noticia4 = '' . $columna['shortstory'] . '';
			$noticia5 = '' . $columna['longstory'] . '';
			$noticia6 = '' . $columna['author'] . '';
			$noticia7 = '' . $columna['date'] . '';
			
		} 
        else 
        { 
            header("Location: /articles");
            exit;
        } 
    } 
    else 
    { 
        header("Location: /articles");
        exit;
    } 
} 
else
{ 
        header("Location: /articles");
        exit;  
}

if(isset($_POST['resultado']))
{
	$urlresultado = mysql_real_escape_string($_POST['urlresultado']);

    mysql_query("INSERT INTO cms_news_form SET user_id = '". $myrow['id'] ."', news_id = '". $noticia8 ."', urlresultado = '". $urlresultado ."', date = '". time() . "'");
    $aok = 'Form successfully sent.';
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: <?php echo $noticia3; ?></title>

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

<link rel='stylesheet' id='wp-block-library-css'  href='<?php echo $Holo['url']; ?>/Mawu/css/style.min.css?ver=5.3.2' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo $Holo['url']; ?>/Mawu/css/bootstrap.min.css?ver=4.4.1' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='https://use.fontawesome.com/releases/v5.12.1/css/all.css?ver=5.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css'  href='<?php echo $Holo['url']; ?>/Mawu/css/swiper.min.css?ver=5.3.1' type='text/css' media='all' />
<link rel='stylesheet' id='selectize-css'  href='<?php echo $Holo['url']; ?>/Mawu/css/selectize.css?ver=0.12.6' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='<?php echo $Holo['url']; ?>/Mawu/css/style.css?ver=1.1' type='text/css' media='all' />
<link rel='stylesheet' id='theme-styles-css'  href='<?php echo $Holo['url']; ?>/Mawu/css/style.css?ver=5.3.2' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.js?ver=1.12.4-wp'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/simple-likes-public.js?ver=0.5'></script>

<link rel="icon" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-32x32.png" sizes="32x32" />
<link rel="icon" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-180x180.png" />
<meta name="msapplication-TileImage" content="<?php echo $Holo['url']; ?>/Mawu/image/favicon/cropped-favicon-1-270x270.png" />

<script>
function goBack() {
  window.history.back();
}
</script>

</head>

<body class="home page-template-default" onselectstart='return false' ondragstart='return false'>

	<nav class="navbar fixed-top navbar-expand-lg navbar-light">
	<a class="navbar-brand"><?php echo $Holo['name']; ?> Hotel<span class="tag">Beta</span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul id="menu-principal" class="navbar-nav mr-auto">
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/me" class="nav-link">Home</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/articles" class="nav-link active">News</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/gallery" class="nav-link">Gallery</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/famous" class="nav-link">Hall</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/team" class="nav-link">Team</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/support" class="nav-link">Support</a>
			</li>
			<!--<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/shop" class="nav-link"><font color="dark orange">Shop</font></a>
			</li>-->
		</ul>
		
		<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		
		<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
        while($isadm = mysql_fetch_assoc($isadmin)){ ?><a href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>" target="_blank" class="btn btn-warning"><font color="white">Panel</font></a>    <?php } ?>
		<a onclick="goBack()" class="btn btn-danger"><font color="white">Back</font></a>    
		<a href="<?php echo $Holo['client_url']; ?>" class="btn btn-success">Join in Hotel</a>    
		
			<div class="dropdown" style="cursor:cell">
			
				<div id="dropUser" class="d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="avatar pixel">
						<img src="<?php echo $Holo['avatar'] . $myrow['look']; ?> &amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s" alt="<?php echo $myrow['username']; ?>">
						</div>
				</div>
					
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropUser">
						<a class="dropdown-item" href="/home/<?php echo $myrow['username']; ?>"><i class="fas fa-user text-muted mr-2"></i>Visit my Profile</a>
						<a class="dropdown-item" href="/account/prefer"><i class="fas fa-cog text-muted mr-2"></i> Settings</a>
						<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt text-muted mr-2"></i> Logout</a>
					</div>
			</div>
		</div>
	</div>
	</nav>

	<main>

<div class="jumbotron jumbotron-fluid news cover">
					<img src="<?php echo $noticia2; ?>" class="full">
		
		<div class="container text-center">

			<h1><?php echo $noticia3; ?></h1>
			<p><small><?php echo $noticia4; ?></small></p>

			<div class="infos">
				<div class="mx-3 mt-3">
					<a href="/home/<?php echo $user_n['username']; ?>" class="d-flex align-items-center">
						<div class="avatar pixel sm mr-2">
							<img src="<?php echo $Holo['avatar'] . $user_n['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s" alt="">
						</div>

						<span data-toggle="tooltip" title="" data-original-title="<?php echo $user_n['username']; ?>"><?php echo $user_n['username']; ?></span>
					</a>
				</div>

				<div class="mx-3 mt-3">
					<i class="fas fa-calendar mr-2"></i> <?php echo GetLast($noticia7); ?>
				</div>

			</div>
			
		</div>
	</div>

	<section>
		<div class="container">
			<div class="reading-content">
				<div class="article-text">
			        <p><?php echo $noticia5; ?></p>
				</div>
			</div>
			<hr>
			<div class="reading-content size-b my-4">
<div class="swiper-container related swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
	
<?php $news = mysql_query("SELECT * FROM cms_news WHERE author = '".$noticia6."' ORDER BY id DESC LIMIT 6");
while($new = mysql_fetch_array($news)){

$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
	<div class="swiper-slide swiper-slide-next" style="width: 232.667px;">
		<div class="card news post-<?php echo $new['id']; ?>">
		<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"></a>
	<div class="card-body">
				<h5 class="card-title mb-4"><a href="/news/<?php echo $new['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string($new['title']); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($new['title'], 0, 26, "...")); ?></a></h5>
		<div class="card-text">
			<div class="avatar pixel sm mr-2">
				<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $new['author']; ?>">
			</div>
			<a href="/home/<?php echo $new['author']; ?>" data-toggle="tooltip" title="<?php echo $new['author']; ?>"><?php echo $new['author']; ?></a> 
			<span class="ml-auto text-muted"><i class="fas fa-calendar-alt ml-3 mr-1"></i> <?php echo GetLast($new['date']); ?></span>			
		</div>
	</div>
		</div>
	</div>
	<?php } ?>
	
</div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
			</div>

		</div>
	</section>

	</main>
	
	<?php require_once("Mawu/includes/footer.php"); ?>
	
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>

<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.cookie.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js?ver=4.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/swiper.min.js?ver=5.3.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/selectize.min.js?ver=0.12.6'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/moment.min.js?ver=2.22.2'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.page.js?ver=0.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js?ver=1.0'></script>
		
</body>
</html>