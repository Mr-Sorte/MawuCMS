<?php
require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: index");
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
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Home</title>

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
	<a class="navbar-brand"><?php echo $Holo['name']; ?> Hotel<span class="tag">Beta</span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul id="menu-principal" class="navbar-nav mr-auto">
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/me" class="nav-link active">Home</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/articles" class="nav-link">News</a>
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
	
<div class="jumbotron jumbotron-fluid hero">
	<div class="container">
		<h1 class="my-3"><img src="<?php echo $Holo['avatar'] . $myrow['look']; ?>&headonly=0&direction=2&head_direction=3&size=s" /> <font size="5"><?php echo $myrow['username']; ?></font></h1>
		<span ><b><?php echo Onlines(); ?></b> onlines Now</span>
	</div>
</div>

<section>
	<div class="container">

<div class="row">

			
<div class="col-md-3 pr-md-3">
	<div class="sidebar">
		<div id="custom_widget_publicidades-2" class="widget widget_custom_widget_publicidades mb-4">
			<div class="section-title">
				<h3>Featured rooms</h3>
			</div>
			<div id="carouselAds" class="carousel ads slide" data-ride="carousel">
				<div class="carousel-inner">
<?php
$sql_news_u = mysql_query("SELECT * FROM rooms ORDER BY score DESC LIMIT 1");
$sql_n_u = mysql_fetch_assoc($sql_news_u);
$user = mysql_fetch_assoc($user = mysql_query("SELECT * FROM users WHERE id = '".$sql_n_u['owner_id']."'"));
?>
					<div class="carousel-item active">
						<img src="<?php echo $Holo['thumbsurl']; ?><?php echo $sql_n_u['id']; ?>.png">
							<div class="carousel-caption">
								<h5><?php echo mysql_real_escape_string(strip_tags(mb_strimwidth($sql_n_u['name'], 0, 19, "..."))); ?></h5>
								<div>Created by <a href="/home/<?php echo $user['username']; ?>"><font color="white"><?php echo mysql_real_escape_string(mb_strimwidth($user['username'], 0, 16, "...")); ?></font></a></div>
								<div>With <b><?php echo $sql_n_u['score']; ?></b> likes</div>
								<div>Have <b><?php echo $sql_n_u['users']; ?></b> users in it</div>
							</div>
						</div>
<?php
$sql_news = mysql_query("SELECT * FROM rooms WHERE id <> '". $sql_n_u['id'] ."' ORDER BY score DESC LIMIT 5");
while($n_info = mysql_fetch_assoc($sql_news))
{
$user2 = mysql_fetch_assoc($user2 = mysql_query("SELECT * FROM users WHERE id = '".$n_info['owner_id']."'"));
?>
					<div class="carousel-item">
						<img src="<?php echo $Holo['thumbsurl']; ?><?php echo $n_info['id']; ?>.png">
							<div class="carousel-caption">
								<h5><?php echo mysql_real_escape_string(strip_tags(mb_strimwidth($n_info['name'], 0, 19, "..."))); ?></h5>
								<div>Created by <a href="/home/<?php echo $user2['username']; ?>"><font color="white"><?php echo mysql_real_escape_string(mb_strimwidth($user2['username'], 0, 16, "...")); ?></font></a></div>
								<div>With <b><?php echo $n_info['score']; ?></b> likes</div>
								<div>Have <b><?php echo $n_info['users']; ?></b> users in it</div>
							</div>
						</div>
<?php } ?>
						</div>
					</div>
				</div>
				
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			    <div class="alert alert-secondary" role="alert"><b>Confuse?</b> The six rooms with the most Likes will always be highlighted here.</div>
			</div>
			
							</div>
						</div>
			
			<div class="col-md-9 pl-md-3">
				<div>
					<div id="custom_widget_noticias-2" class="widget widget_custom_widget_noticias mb-4">
					<div class="section-title"><h3>Last news</h3></div>
					<div class="row row-news">
					
<?php $news = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 6");
while($new = mysql_fetch_array($news)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
	<div class="col">
		<div class="card news post-<?php echo $new['id']; ?>">
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"></a>
	<div class="card-body">
<?php $newsbadges = mysql_query("SELECT * FROM cms_news WHERE active_badge = '1' AND id = '".$new['id']."'");
while($newsbadge = mysql_fetch_array($newsbadges)){	
?>
		<div class="box" data-toggle="tooltip" title="" data-original-title="Ganhe este Emblema"><img src="<?php echo $Holo['url_badges']; ?><?php echo $newsbadge['badge']; ?>.gif"></div>
<?php } ?>
				<h5 class="card-title mb-4"><a href="/news/<?php echo $new['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string($new['title']); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($new['title'], 0, 30, "...")); ?></a></h5>
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
					<h3>With more Achievements</h3>
				</div>

				
<ul class="rank">

<?php
$getScore = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 5 ORDER BY users_settings.achievement_score DESC LIMIT 3");
while($scoreStats = mysql_fetch_array($getScore)) {

echo '<li class="card">
			<div class="avatar pixel lg">
				<a href="/home/'.$scoreStats['username'].'"><img src="'.$Holo['avatar'] . $scoreStats['look'].'&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="Visit their Profile"></a>
			</div>
			<div class="content">
				<h6 class="mb-1">
					<a class="text-inherit" href="/home/'.$scoreStats['username'].'" data-toggle="tooltip" title="" data-original-title="'.$scoreStats['username'].'">'.$scoreStats['username'].'</a>
				</h6>
				<div class="text-muted">
					<strong>'.$scoreStats['achievement_score'].'</strong> Achievements score
				</div>
			</div>
		</li>';


}
?>
		
</ul>   
            </div>
	
			<div class="col-sm-6 col-lg-4">
				<div class="section-title">
					<h3>With more Respects</h3>
				</div>

				<div class="list">

<?php
$getRespects = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 5 ORDER BY users_settings.respects_received DESC LIMIT 2");
while($respectStats = mysql_fetch_array($getRespects)) {
		
echo '<div class="card featured-user">
	<div class="card-body">
		<div class="avatar pixel lg">
			<a href="/home/'.$respectStats['username'].'"><img src="'.$Holo['avatar'] . $respectStats['look'].'&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="Visit their Profile"></a>
		</div>

		<div class="content w-100">
			<h5><a class="text-inherit" href="/home/'.$respectStats['username'].'" data-toggle="tooltip" title="" data-original-title="'.$respectStats['username'].'">'.$respectStats['username'].'</a></h5>
			<div class="text-muted"><p><b>'.$respectStats['respects_received'].'</b> Respects received.<br><b>'.$respectStats['respects_given'].'</b> Respects given.</p></div>
		</div>
	</div>
</div>';

}
?>

				</div>
				
			</div>
			
			<div class="col-sm-6 col-lg-4">
				<div class="section-title">
					<h3>Last photo</h3>
					<strong><a href="/gallery">See all</a></strong>
				</div>
				
<?php $photos = mysql_query("SELECT * FROM camera_web ORDER BY id DESC LIMIT 1");
while($photo = mysql_fetch_array($photos)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysql_fetch_assoc($roominfo = mysql_query("SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
	<div class="card gallery gallery-224">
		<a href="/photos/<?php echo $photo['id']; ?>" data-toggle="tooltip" title="" data-original-title="Photo by <?php echo $authorinfo['username']; ?>">
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

				<div class="section-title mt-4"><h3>Latest registered in <?php echo $Holo['name']; ?></h3></div>

				<div class="card">
					<div class="card-body last-users">
						<div class="row">
<?php $lasts = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 15");
while($last = mysql_fetch_array($lasts)){	
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
				<div class="alert alert-secondary" role="alert"><b>Curious:</b> Here you can check the last <b>Fifteen</b> registered in the <?php echo $Holo['name']; ?>, is that who you called is here?</div>
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