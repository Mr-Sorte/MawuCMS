<?php
require_once("inc/core.god.php");

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
	<title><?php echo $Holo['name']; ?>: <?php echo $Lang['famous.titulo']; ?></title>

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
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/gallery" class="nav-link"><?php echo $Lang['menu.gallery']; ?></a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/famous" class="nav-link active"><?php echo $Lang['menu.famous']; ?></a>
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
<div style="cursor:default" class="jumbotron jumbotron-fluid orange">
	<div class="container d-flex align-items-center">
		<h1><?php echo $Lang['famous.titulo']; ?></h1>
	</div>
</div>

<section>
	<div class="container">

<?php $oculte = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND visible = '0'");
while($ocult = mysqli_fetch_array($oculte)){ ?>
	<div style="cursor:default" class="alert alert-warning" role="alert"><b><?php echo $myrow['username']; ?></b>, <?php echo $Lang['famous.noshow']; ?></div>
<?php } ?>
	
		<div class="card" style="cursor:default">
			<div class="card-body p-md-5">
				<div class="row">
					<div class="col-md-4">
						<h3><?php echo $Lang['famous.morediamonds']; ?></h3>
						<br><br><br>
						<div class="text-muted mb-4 mb-md-0"><?php echo $Lang['famous.diadesc']; ?></div>
					</div>
					<div class="col-md-6 offset-md-2">

<?php
$getDaimands = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 5");
while($daimands = mysqli_fetch_array($getDaimands)) {

echo '							<div class="mb-3 topic-124">
								<div class="d-flex align-items-center">
									<a href="/home/'.$daimands['username'].'" class="avatar pixel sm mr-2">
										<img src="'.$Holo['avatar'] . $daimands['look'].'&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s">
									</a>
									<div class="w-100 d-md-flex align-items-center">
										<h5 class="card-title mb-0"><a href="/home/'.$daimands['username'].'" data-toggle="tooltip" title="" data-original-title="'.$daimands['username'].'">'.$daimands['username'].'</a></h5>
										<small class="text-muted ml-md-2 mt-1"> <img src="'.$Holo['url'].'/Mawu/image/icon/diamond.png">  <strong><font color="#0AA8EC">'.$daimands['amount'].' '.$Lang['famous.diamonds'].'</font></strong></small>
									</div>
								</div>
							</div>';

}
?>

					</div>
				</div>
			</div>
		</div>
		
		<div class="card" style="cursor:default">
			<div class="card-body p-md-5">
				<div class="row">
					<div class="col-md-4">
						<h3><?php echo $Lang['famous.moreduckets']; ?></h3>
						<br><br><br>
						<div class="text-muted mb-4 mb-md-0"><?php echo $Lang['famous.duckdesc']; ?></div>
					</div>
					<div class="col-md-6 offset-md-2">

<?php
$getDuckets = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 5");
while($ducketsStats = mysqli_fetch_array($getDuckets)) {

echo '							<div class="mb-3 topic-124">
								<div class="d-flex align-items-center">
									<a href="/home/'.$ducketsStats['username'].'" class="avatar pixel sm mr-2">
										<img src="'.$Holo['avatar'] . $ducketsStats['look'].'&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s">
									</a>
									<div class="w-100 d-md-flex align-items-center">
										<h5 class="card-title mb-0"><a href="/home/'.$ducketsStats['username'].'" data-toggle="tooltip" title="" data-original-title="'.$ducketsStats['username'].'">'.$ducketsStats['username'].'</a></h5>
										<small class="text-muted ml-md-2 mt-1"> <img src="'.$Holo['url'].'/Mawu/image/icon/ducket.png">  <strong><font color="#822273">'.$ducketsStats['amount'].' '.$Lang['famous.duckets'].'</font></strong></small>
									</div>
								</div>
							</div>';

}
?>

					</div>
				</div>
			</div>
		</div>
		
		<div class="card" style="cursor:default">
			<div class="card-body p-md-5">
				<div class="row">
					<div class="col-md-4">
						<h3><?php echo $Lang['famous.morecredits']; ?></h3>
						<br><br><br>
						<div class="text-muted mb-4 mb-md-0"><?php echo $Lang['famous.creditdesc']; ?></div>
					</div>
					<div class="col-md-6 offset-md-2">

<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 5");
while($user = mysqli_fetch_array($users)){ ?>
							<div class="mb-3 topic-124">
								<div class="d-flex align-items-center">
									<a href="/home/<?php echo $user['username']; ?>" class="avatar pixel sm mr-2">
										<img src="<?php echo $Holo['avatar'] . $user['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s">
									</a>
									<div class="w-100 d-md-flex align-items-center">
										<h5 class="card-title mb-0"><a href="/home/<?php echo $user['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
										<small class="text-muted ml-md-2 mt-1"> <img src="<?php echo $Holo['url']; ?>/Mawu/image/icon/credit.png">  <strong><font color="#FF9030"><?php echo $user['credits']; ?> <?php echo $Lang['famous.credits']; ?></font></strong></small>
									</div>
								</div>
							</div>
<?php } ?>

					</div>
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