<?php require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="<?php echo $myrow['theme']; ?>">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: <?php echo $Lang['gallery.titulo']; ?></title>

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
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/me" class="nav-link"><?php echo $Lang['menu.index']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/articles" class="nav-link"><?php echo $Lang['menu.articles']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/gallery" class="nav-link active"><?php echo $Lang['menu.gallery']; ?></a>
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
		<?php if(maintenance == '0') { ?><a href="<?php echo $Holo['client_url']; ?>" class="btn btn-success"><?php echo $Lang['menu.hotel']; ?></a><span style="cursor:default">    </span><?php } ?>
		
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
<div style="cursor:default" class="jumbotron jumbotron-fluid pink">
	<div class="container d-flex align-items-center">
		<h1><?php echo $Lang['gallery.titulo']; ?></h1> <a href="<?php echo $Holo['client_url']; ?>" class="btn btn-success ml-4"><?php echo $Lang['gallery.desc']; ?></a>
	</div>
</div>

<section>
	<div class="container">
	
<?php if(maintenance == '1') { ?>
	<div class="alert alert-danger" role="alert"><div id="p141"></div><br><center><?php echo $Lang['maintenance.text1']; ?> <b><?php echo $main['motivo']; ?></b>.<br><?php echo $Lang['maintenance.text2']; ?></center><br></div>
<?php } ?>
	
		<div class="row">
			<div class="col-md-3 pr-md-3 mb-4">
<?php
if($myrow['rank'] >= $Holo['minhkr']) {
if($_GET['supprphoto']) {
if(isset($_GET['jeton']) && ($_GET['jeton'] == $_SESSION['jeton']))
{
if(isset($_GET['supprphoto']) && $_GET['supprphoto'] !== '')
{
$getsupprphoto = filtrolow($_GET['supprphoto']);

$checkphtotomoder = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM camera_web WHERE id = '". $getsupprphoto ."' LIMIT 1");
$photoinfomod = mysqli_fetch_assoc($checkphtotomoder);

	if(mysqli_num_rows($checkphtotomoder) > 0){
		$photoinfomodLink = filtrolow($photoinfomod['url']);
		$photoinfomodPoster = filtrolow($photoinfomod['user_id']);
		mysqli_query(connect::cxn_mysqli(),"DELETE FROM camera_web WHERE id = '". $getsupprphoto ."' LIMIT 1");
		mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Photo', note = 'Suppr photo. Lien: $photoinfomodLink - Poste par (id): $photoinfomodPoster', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'"); 
		echo "<div class='alert alert-success' role='alert'>".$Lang['gallery.error1']."</div>";
	} else {
		echo "<div class='alert alert-danger' role='alert'>".$Lang['gallery.error2']."</div>";
	}

} else {
		echo "<div class='alert alert-danger' role='alert'>".$Lang['gallery.error3']."</div>";
	}
} else {
	echo "<div class='alert alert-danger' role='alert'>".$Lang['gallery.error4']."</div>";
}
}
}

?>
				<h5 style="cursor:default" class="mb-3"><?php echo $Lang['gallery.whatis']; ?></h5>
				<div style="cursor:default" class="tags grey">
					<small><?php echo $Lang['gallery.whatdesc']; ?></small>
				</div>

				<h5 style="cursor:default" class="mb-3 mt-5"><?php echo $Lang['gallery.aleatorys']; ?></h5>

<?php $photos = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM camera_web ORDER BY rand() DESC LIMIT 1");
while($photo = mysqli_fetch_array($photos)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysqli_fetch_assoc($roominfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
	<div class="card gallery gallery-<?php echo $photo['id']; ?>">
		<div class="cover">
			<div class="featured" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $Lang['gallery.fixed']; ?>"><i class="fas fa-star"></i></div>
			<img src="<?php echo $photo['url']; ?>" alt="cover">
			<div class="infos">
				<h5 class="mb-3"><?php echo $Lang['gallery.photoby']; ?> <?php echo $authorinfo['username']; ?></h5>
				<div class="text-muted mb-3"></div>
				<small style="cursor:default" class="text-muted mt-auto"><?php echo GetLast($photo['timestamp']); ?></small>
			</div>
		</div>
		<div class="card-body py-3">
			<div class="w-100">
				<div class="card-text text-muted d-flex justify-content-end">
					<div class="avatar pixel sm mr-2">
						<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>s&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $authorinfo['username']; ?>">
					</div>
						<a href="/home/<?php echo $authorinfo['username']; ?>" data-toggle="tooltip" title="<?php echo $authorinfo['username']; ?>"><?php echo $authorinfo['username']; ?></a>
						<span style="cursor:default" class="ml-auto text-muted"><i class="fas fa-calendar-alt ml-3 mr-1"></i> <?php echo GetLast($photo['timestamp']); ?></span>
				</div>
				<?PHP if($myrow['rank'] >= $Holo['minhkr']) { ?>
					<br><font size="-2"><b><font color="orange"><?php echo $Lang['gallery.moderation']; ?></font></b> <a href="?supprphoto=<?php echo $photo['id']; ?>&jeton=<?php echo $_SESSION['jeton']; ?>"><?php echo $Lang['gallery.moddelete']; ?></a></font> 
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

			</div>
			<div class="col-md-9 pl-md-3">
				<div class="row">
				
<?php $photos = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM camera_web ORDER BY id DESC LIMIT 45");
while($photo = mysqli_fetch_array($photos)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysqli_fetch_assoc($roominfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
						<div class="col-sm-6 col-md-4 mb-4">
	<div class="card gallery gallery-<?php echo $photo['id']; ?>">
		<a href="/photos/<?php echo $photo['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo $Lang['gallery.photoby']; ?> <?php echo $authorinfo['username']; ?>">
		<div class="cover">
						<img src="<?php echo $photo['url']; ?>" alt="">
			<div class="infos">
				<h5 class="mb-3"><?php echo $Lang['gallery.photoby']; ?> <?php echo $authorinfo['username']; ?></h5>
				<div class="text-muted mb-3"></div>
				<small style="cursor:default" class="text-muted mt-auto"><?php echo GetLast($photo['timestamp']); ?></small>
			</div>
		</div>
		</a>
		<div class="card-body py-3">
			<div class="w-100">
				<div class="card-text text-muted d-flex justify-content-end">
					<div class="avatar pixel sm mr-2">
						<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>s&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $authorinfo['username']; ?>">
					</div>
						<a href="/home/<?php echo $authorinfo['username']; ?>" data-toggle="tooltip" title="<?php echo $authorinfo['username']; ?>"><?php echo $authorinfo['username']; ?></a>
						<span style="cursor:default" class="ml-auto text-muted"><i class="fas fa-calendar-alt ml-3 mr-1"></i> <?php echo GetLast($photo['timestamp']); ?></span>
				</div>
				<?PHP if($myrow['rank'] >= $Holo['minhkr']) { ?>
					<br><font size="-2"><b><font color="orange"><?php echo $Lang['gallery.moderation']; ?></font></b> <a href="?supprphoto=<?php echo $photo['id']; ?>&jeton=<?php echo $_SESSION['jeton']; ?>"><?php echo $Lang['gallery.moddelete']; ?></a></font> 
				<?php } ?>
			</div>
		</div>
	</div>
						</div>
<?php } ?>

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