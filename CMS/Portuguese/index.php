<?php
require_once("inc/core.god.php");
require_once("inc/class.recaptchalib.php");

if(Loged == TRUE)
{
	header("Location: me");
	exit;
}

if(MANTENIMIENTO == '1') 
{
    header("Location: mantenimiento");
	exit;
}

$lyrics = 'Crie uma conta agora mesmo.
O tempo é apenas uma ilusão.
Quando você menos esperar...
Chame os seus amigos.
Carregando mensagem divertida...
Já comeu pudim hoje?
Você quer batatas fritas?
O que acha que ser rico?
Olhe para um lado. Olhe para o outro.
Siga o pato amarelo.
Participe de nossos eventos.
Eu gosto da sua camiseta.
Ganhe lindos emblemas.
Carregando o universo de pixels.
Seja destaque em nosso Hotel.
Não é você, sou eu.';

$lyrics = explode("\n", $lyrics);
$chosen = $lyrics[ mt_rand(0, count($lyrics) - 1) ];
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Início</title>

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

</head>

<body class="home page-template-default page page-id-28 logged-in" onselectstart='return false' ondragstart='return false'>

	<nav class="navbar fixed-top navbar-expand-lg navbar-light">
		<a class="navbar-brand"><?php echo $Holo['name']; ?> Hotel<span class="tag">Beta</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
<ul id="menu-principal" class="navbar-nav mr-auto">
	<li class="menu-item menu-item-type-post_type menu-item-home current-menu-item page_item nav-item active">
		<a href="/index" class="nav-link active">Início</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/login" class="nav-link">Entrar</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/register" class="nav-link">Registro</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/support" class="nav-link">Suporte</a>
	</li>
</ul>

<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		<a href="/register" class="btn btn-success">Registrar</a>    
		<a href="/login" class="btn btn-primary">Entrar na sua Conta</a>
</div>

		</div>
	</nav>

	<main>
	
<div class="jumbotron jumbotron-fluid hero">
	<div class="container">
		<h1 class="my-3"><font size="4"><?php echo $chosen; ?></font></h1>
		<span><b><?php echo Onlines(); ?></b> Pessoas no Hotel</span>
	</div>
</div>

<section>
	<div class="container">

			<div class="section-title">
				<h3>Notícias</h3>
			</div>

		<div class="row">

<?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id DESC LIMIT 4");
while($new = mysqli_fetch_array($news)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
<div class="col-sm-6 col-md-4 col-lg-3">
		<div class="card news post-<?php echo $new['id']; ?>">
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'gratis' AND id = '".$new['id']."' AND livenews = '0'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>">
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Coisas Grátis">Coisas Grátis</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'hotel' AND id = '".$new['id']."' AND livenews = '0'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>">
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="<?php echo $Holo['name']; ?> Hotel"><?php echo $Holo['name']; ?> Hotel</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'mobis' AND id = '".$new['id']."' AND livenews = '0'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>">
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Mobís">Mobís</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'promocao' AND id = '".$new['id']."' AND livenews = '0'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>">
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Promoções">Promoções</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema' AND id = '".$new['id']."' AND livenews = '0'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>">
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Sistema">Sistema</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'gratis' AND id = '".$new['id']."' AND livenews = '1'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"><div class="live">AO VIVO</div>
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Coisas Grátis">Coisas Grátis</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'hotel' AND id = '".$new['id']."' AND livenews = '1'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"><div class="live">AO VIVO</div>
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="<?php echo $Holo['name']; ?> Hotel"><?php echo $Holo['name']; ?> Hotel</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'mobis' AND id = '".$new['id']."' AND livenews = '1'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"><div class="live">AO VIVO</div>
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Mobís">Mobís</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'promocao' AND id = '".$new['id']."' AND livenews = '1'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"><div class="live">AO VIVO</div>
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Promoções">Promoções</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema' AND id = '".$new['id']."' AND livenews = '1'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"><div class="live">AO VIVO</div>
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Sistema">Sistema</div></a>
<?php } ?>
	<div class="card-body">
<?php $newsbadges = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE active_badge = '1' AND id = '".$new['id']."'");
while($newsbadge = mysqli_fetch_array($newsbadges)){	
?>
		<div class="box" data-toggle="tooltip" title="" data-original-title="Ganhe este Emblema"><img src="<?php echo $Holo['url_badges']; ?><?php echo $newsbadge['badge']; ?>.gif"></div>
<?php } ?>
				<h5 class="card-title mb-4"><a href="/news/<?php echo $new['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo filtro($new['title']); ?>"><?php echo filtro(mb_strimwidth($new['title'], 0, 46, "...")); ?></a></h5>
		<div class="card-text">
			<div class="avatar pixel sm mr-2">
				<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $new['author']; ?>">
			</div>
			<a style="cursor:default" data-toggle="tooltip" title="<?php echo $new['author']; ?>"><?php echo $new['author']; ?></a> 
			<span style="cursor:default" class="ml-auto text-muted"><i class="fas fa-calendar-alt ml-3 mr-1"></i> <?php echo GetLast($new['date']); ?></span>			
		</div>
	</div>
		</div>
</div>
<?php } ?>

    <div class="alert alert-secondary" role="alert"><b>Atenção!</b> Você consegue ler as nossas notícias, mas para quaisquer interações, você precisa estar conectado(a) em sua conta!</div>
		</div>
		
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
		<div class="col-lg-12 pl-lg-3">

				<div class="section-title mt-4"><h3>Recentemente chegados no <?php echo $Holo['name']; ?></h3></div>

				<div class="card">
					<div class="card-body last-users">
						<div class="row">
<?php $lasts = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users ORDER BY id DESC LIMIT 15");
while($last = mysqli_fetch_array($lasts)){	
?>
									<div class="col">
										<div class="avatar pixel mx-auto" data-toggle="tooltip" title="<?php echo $last['username']; ?>">
											<a style="cursor:default"><img src="<?php echo $Holo['avatar'] . $last['look']; ?>&action=std&direction=2&head_direction=3&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $last['username']; ?>"></a>
										</div>
									</div>
<?php } ?>
						</div>
					</div>
				</div>
				</div>

		</div>
	</div>
</section>

<section>
	
<div class="container">
	<div>
		<div id="custom_widget_galeria-2" class="widget widget_custom_widget_galeria mb-4">
			<div class="section-title">
				<h3>Galeria de Fotos</h3>
			</div>
			<div class="row row-gallery">
			
<?php $photos = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM camera_web ORDER BY id DESC LIMIT 8");
while($photo = mysqli_fetch_array($photos)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysqli_fetch_assoc($roominfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
				<div class="col">
					<div class="card gallery gallery-228">
						<a style="cursor:default">
							<div class="cover">
							    <img src="<?php echo $photo['url'] ?>" alt="">
							</div>
						</a>
							<div class="card-body py-3">
								<div class="w-100">
									<div class="card-text text-muted d-flex justify-content-end">
										<div class="avatar pixel sm mr-2">
											<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>s&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $authorinfo['username']; ?>">
											</div>
											<a style="cursor:default"><?php echo $authorinfo['username']; ?></a>
									</div>
									</div>
								</div>
							</div>
						</div>
<?php } ?>

    <div class="alert alert-secondary" role="alert"><b>Psiu!</b> Quer publicar uma foto ou conferir mais fotos? Conecte em sua conta agora mesmo.</div>

			</div>

		</div>
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