<?php
require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}

if(maintenance == '1' && $myrow['rank'] < $Holo['minrank']) 
{
    header("Location: maintenance");
	exit;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: <?php echo $Lang['me.titulo']; ?></title>

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

<body class="home page-template-default" onselectstart='return false' ondragstart='return false'>

	<nav class="navbar fixed-top navbar-expand-lg navbar-light">
	<a style="cursor:default" class="navbar-brand"><?php echo $Holo['name']; ?> Hotel<span class="tag"><?php echo $Lang['logo.tag']; ?></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul id="menu-principal" class="navbar-nav mr-auto">
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/me" class="nav-link active"><?php echo $Lang['menu.index']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/articles" class="nav-link"><?php echo $Lang['menu.articles']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/gallery" class="nav-link"><?php echo $Lang['menu.gallery']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/famous" class="nav-link"><?php echo $Lang['menu.famous']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/team" class="nav-link"><?php echo $Lang['menu.team']; ?></a>
			</li>
			<!--<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/shop" class="nav-link"><font color="dark orange"><?php echo $Lang['menu.shop']; ?></font></a>
			</li>-->
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/support" class="nav-link"><?php echo $Lang['menu.support']; ?></a>
			</li>
		</ul>
		
		<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		
		<?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= ".$Holo['minhkr']."");
        while($isadm = mysqli_fetch_assoc($isadmin)){ ?><a href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>" target="_blank" class="btn btn-warning"><font color="white"><center><i class="fas fa-cogs"></i></center></font></a><span style="cursor:default">    </span><?php } ?>
		<a href="<?php echo $Holo['client_url']; ?>" class="btn btn-success"><?php echo $Lang['menu.hotel']; ?></a><span style="cursor:default">    </span>
		
			<div class="dropdown" style="cursor:cell">
			
				<div id="dropUser" class="d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="avatar pixel">
						<img src="<?php echo $Holo['avatar'] . $myrow['look']; ?> &amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s" alt="<?php echo $myrow['username']; ?>">
						</div>
				</div>
					
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropUser">
						<a class="dropdown-item" href="/home/<?php echo $myrow['username']; ?>"><i class="fas fa-user text-muted mr-2"></i><?php echo $Lang['menu.myprofile']; ?></a>
						<a class="dropdown-item" href="/account/prefer"><i class="fas fa-cog text-muted mr-2"></i> <?php echo $Lang['menu.settings']; ?></a>
						<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt text-muted mr-2"></i> <?php echo $Lang['menu.logout']; ?></a>
					</div>
			</div>
		</div>
	</div>
	</nav>

	<main>
	
<div class="jumbotron jumbotron-fluid hero">
	<div class="container">
		<h1 class="my-3" style="cursor:default"><img src="<?php echo $Holo['avatar'] . $myrow['look']; ?>&headonly=0&direction=2&head_direction=3&size=s" /> <font size="5"><?php echo $myrow['username']; ?></font></h1>
		<span style="cursor:default"><b><?php echo Onlines(); ?></b> <?php echo $Lang['menu.onlines']; ?></span>
	</div>
</div>

<section>
	<div class="container">

<div class="row">

			
<div class="col-md-3 pr-md-3">
	<div class="sidebar">
		<div id="custom_widget_publicidades-2" class="widget widget_custom_widget_publicidades mb-4">
			<div class="section-title">
				<h3 style="cursor:default"><?php echo $Lang['me.rooms']; ?></h3>
			</div>
			<div id="carouselAds" class="carousel ads slide" data-ride="carousel">
				<div class="carousel-inner">
<?php
$sql_news_u = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms ORDER BY score DESC LIMIT 1");
$sql_n_u = mysqli_fetch_assoc($sql_news_u);
$user = mysqli_fetch_assoc($user = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$sql_n_u['owner_id']."'"));
?>
					<div style="cursor:default" class="carousel-item active">
						<img src="<?php echo $Holo['thumbsurl']; ?><?php echo $sql_n_u['id']; ?>.png" style="background-image: url(<?php echo $Holo['url']; ?>/Mawu/image/default-room.png);">
							<div class="carousel-caption">
								<h5><?php echo filtro(strip_tags(mb_strimwidth($sql_n_u['name'], 0, 19, "..."))); ?></h5>
								<div><?php echo $Lang['me.roomby']; ?> <a href="/home/<?php echo $user['username']; ?>"><font color="white"><?php echo filtro(mb_strimwidth($user['username'], 0, 16, "...")); ?></font></a></div>
								<div><?php echo $Lang['me.roomwith']; ?> <b><?php echo $sql_n_u['score']; ?></b> <?php echo $Lang['me.roomlikes']; ?></div>
								<div><?php echo $Lang['me.roomhave']; ?> <b><?php echo $sql_n_u['users']; ?></b> <?php echo $Lang['me.roomusers']; ?></div>
							</div>
						</div>
<?php
$sql_news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE id <> '". $sql_n_u['id'] ."' ORDER BY score DESC LIMIT 5");
while($n_info = mysqli_fetch_assoc($sql_news))
{
$user2 = mysqli_fetch_assoc($user2 = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$n_info['owner_id']."'"));
?>
					<div style="cursor:default" class="carousel-item">
						<img src="<?php echo $Holo['thumbsurl']; ?><?php echo $n_info['id']; ?>.png" style="background-image: url(<?php echo $Holo['url']; ?>/Mawu/image/default-room.png);">
							<div class="carousel-caption">
								<h5><?php echo filtro(strip_tags(mb_strimwidth($n_info['name'], 0, 19, "..."))); ?></h5>
								<div><?php echo $Lang['me.roomby']; ?> <a href="/home/<?php echo $user2['username']; ?>"><font color="white"><?php echo filtro(mb_strimwidth($user['username'], 0, 16, "...")); ?></font></a></div>
								<div><?php echo $Lang['me.roomwith']; ?> <b><?php echo $n_info['score']; ?></b> <?php echo $Lang['me.roomlikes']; ?></div>
								<div><?php echo $Lang['me.roomhave']; ?> <b><?php echo $n_info['users']; ?></b> <?php echo $Lang['me.roomusers']; ?></div>
							</div>
						</div>
<?php } ?>
						</div>
					</div>
				</div>
				
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			    <div style="cursor:default" class="alert alert-secondary" role="alert"><?php echo $Lang['me.roomtext']; ?></div>
			</div>
			
							</div>
						</div>
			
			<div class="col-md-9 pl-md-3">
				<div>
					<div id="custom_widget_noticias-2" class="widget widget_custom_widget_noticias mb-4">
					<div style="cursor:default" class="section-title"><h3><?php echo $Lang['me.news']; ?></h3></div>
					<div class="row row-news">
					
<?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id DESC LIMIT 6");
while($new = mysqli_fetch_array($news)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
	<div class="col">
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
		<div class="box" data-toggle="tooltip" title="" data-original-title="<?php echo $Lang['news.winbadge']; ?>"><img src="<?php echo $Holo['url_badges']; ?><?php echo $newsbadge['badge']; ?>.gif"></div>
<?php } ?>
				<h5 class="card-title mb-4"><a href="/news/<?php echo $new['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo filtro($new['title']); ?>"><?php echo filtro(mb_strimwidth($new['title'], 0, 46, "...")); ?></a></h5>
		<div class="card-text">
			<div class="avatar pixel sm mr-2">
				<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $new['author']; ?>">
			</div>
			<a href="/home/<?php echo $new['author']; ?>" data-toggle="tooltip" title="<?php echo $new['author']; ?>"><?php echo $new['author']; ?></a> 
			<span style="cursor:default" class="ml-auto text-muted"><i class="fas fa-calendar-alt ml-3 mr-1"></i> <?php echo GetLast($new['date']); ?></span>			
		</div>
	</div>
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
	<div class="container pt-3">
		<div class="row">
			<div class="col-sm-6 col-lg-4">
				<div class="section-title">
					<h3 style="cursor:default"><?php echo $Lang['me.achievements']; ?></h3>
				</div>

				
<ul class="rank">

<?php $getScore = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 5 ORDER BY users_settings.achievement_score DESC LIMIT 3");
while($scoreStats = mysqli_fetch_array($getScore)) {

echo '<li class="card">
			<div class="avatar pixel lg">
				<a href="/home/'.$scoreStats['username'].'"><img src="'.$Holo['avatar'] . $scoreStats['look'].'&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="Wulles"></a>
			</div>
			<div class="content">
				<h6 class="mb-1">
					<a class="text-inherit" href="/home/'.$scoreStats['username'].'" data-toggle="tooltip" title="" data-original-title="'.$scoreStats['username'].'">'.$scoreStats['username'].'</a>
				</h6>
				<div class="text-muted" style="cursor:default">
					<strong>'.$scoreStats['achievement_score'].'</strong> '.$Lang['me.achievepoints'].'
				</div>
			</div>
		</li>';


}
?>
		
</ul>   
            </div>
	
			<div class="col-sm-6 col-lg-4">
				<div class="section-title">
					<h3 style="cursor:default"><?php echo $Lang['me.respects']; ?></h3>
				</div>

				<div class="list">

<?php $getRespects = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 5 ORDER BY users_settings.respects_received DESC LIMIT 2");
while($respectStats = mysqli_fetch_array($getRespects)) {
		
echo '<div class="card featured-user">
	<div class="card-body">
		<div class="avatar pixel lg">
			<a href="/home/'.$respectStats['username'].'"><img src="'.$Holo['avatar'] . $respectStats['look'].'&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="Wulles"></a>
		</div>

		<div class="content w-100">
			<h5><a class="text-inherit" href="/home/'.$respectStats['username'].'" data-toggle="tooltip" title="" data-original-title="'.$respectStats['username'].'">'.$respectStats['username'].'</a></h5>
			<div class="text-muted" style="cursor:default"><p><b>'.$respectStats['respects_received'].'</b> '.$Lang['me.respectreceived'].'<br><b>'.$respectStats['respects_given'].'</b> '.$Lang['me.respectgiven'].'</p></div>
		</div>
	</div>
</div>';

}
?>

				</div>
				
			</div>
			
			<div class="col-sm-6 col-lg-4">
				<div class="section-title">
					<h3 style="cursor:default"><?php echo $Lang['me.lastphoto']; ?></h3>
					<strong><a href="/gallery"><?php echo $Lang['me.seephotos']; ?></a></strong>
				</div>
				
<?php $photos = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM camera_web ORDER BY id DESC LIMIT 1");
while($photo = mysqli_fetch_array($photos)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysqli_fetch_assoc($roominfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
	<div class="card gallery gallery-224">
		<a href="/photos/<?php echo $photo['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo $Lang['me.photoby']; ?> <?php echo $authorinfo['username']; ?>">
		<div class="cover">
				<img src="<?php echo $photo['url']; ?>" alt="">
		</div>
		</a>
		<div class="card-body py-3">
			<div class="w-100">
				<div class="card-text text-muted d-flex justify-content-end">
					<div class="avatar pixel sm mr-2">
						<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>s&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $authorinfo['username']; ?>">
					</div>
						<a href="/home/<?php echo $authorinfo['username']; ?>" data-toggle="tooltip" title="<?php echo $authorinfo['username']; ?>"><?php echo $authorinfo['username']; ?></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
		<div class="col-lg-12 pl-lg-3">

				<div class="section-title mt-4" style="cursor:default"><h3><?php echo $Lang['index.latestusers']; ?></h3></div>

				<div class="card">
					<div class="card-body last-users">
						<div class="row">
<?php $lasts = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users ORDER BY id DESC LIMIT 15");
while($last = mysqli_fetch_array($lasts)){	
?>
									<div class="col">
										<div class="avatar pixel mx-auto" data-toggle="tooltip" title="<?php echo $last['username']; ?>">
											<a href="/home/<?php echo $last['username']; ?>"><img src="<?php echo $Holo['avatar'] . $last['look']; ?>&action=std&direction=2&head_direction=3&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $last['username']; ?>"></a>
										</div>
									</div>
<?php } ?>
						</div>
					</div>
				</div>
		</div>
		
		<div class="alert alert-secondary" style="cursor:default" role="alert"><?php echo $Lang['index.aboutlastusr']; ?></div>

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