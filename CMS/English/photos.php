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
        $id_photo = (int) mysql_real_escape_string($_GET['url']); 
        $query_photos = mysql_query("SELECT * FROM camera_web WHERE id = '".$id_photo."' LIMIT 1");
        if(mysql_num_rows($query_photos) > 0)
        { 
            $columna = mysql_fetch_assoc($query_photos);
			$user_n = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '". $columna['user_id'] ."'"));
			$room_n = mysql_fetch_assoc(mysql_query("SELECT * FROM rooms WHERE id = '". $columna['room_id'] ."'"));
			$roomowner_n = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '". $room_n['owner_id'] ."'"));
			$photo = '' . $columna['id'] . '';
			$photo2 = '' . $columna['user_id'] . '';
			$photo3 = '' . $columna['room_id'] . '';
			$photo4 = '' . $columna['likes'] . '';
			$photo5 = '' . $columna['timestamp'] . '';
			$photo6 = '' . $columna['url'] . '';
			
		} 
        else 
        { 
            header("Location: /gallery");
            exit;
        } 
    } 
    else 
    { 
        header("Location: /gallery");
        exit;
    } 
} 
else
{ 
        header("Location: /gallery");
        exit;  
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Photo by <?php echo $user_n['username']; ?></title>

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
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/articles" class="nav-link">News</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/gallery" class="nav-link active">Gallery</a>
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
		
	<section class="position-relative">
		<div class="container">
			<div class="reading-content size-b">

				<div class="d-flex">
					<a href="/home/<?php echo $user_n['username']; ?>" class="avatar pixel lg mr-3">
						<img src="<?php echo $Holo['avatar'] . $user_n['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
					</a>

					<div class="w-100 d-flex flex-column flex-md-row">
						<div class="w-100">
							<h4 class="mb-1"><?php echo $user_n['username']; ?></h4>
							<div class="text-muted">Published <?php echo GetLast($photo5); ?></strong></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
									
		<div class="img-gallery">
			<div class="reading-content size-b">
				<img src="<?php echo $photo6; ?>">
			</div>
		</div>
		<div class="container">
			<div class="reading-content size-b">
				<div class="row">

					<div class="col-md-12 pl-md-3">
						<div class="galery-infos">
								<div><i class="fas fa-calendar fa-fw mr-2"></i> <?php echo GetLast($photo5); ?></div>
								<div class="mb-2"><i class="fas fa-eye fa-fw mr-2"></i> Photo taken in <a href="/home/<?php echo $roomowner_n['username']; ?>"><span data-toggle="tooltip" title="" data-original-title="<?php echo $roomowner_n['username']; ?>"><?php echo $roomowner_n['username']; ?></span></a> Room</div>
						</div>
						
						<hr>
						
	<h6 class="mb-3"><a class="text-inherit" href="/home/<?php echo $user_n['username']; ?>">More of <span data-toggle="tooltip" title="" data-original-title="<?php echo $user_n['username']; ?>"><?php echo $user_n['username']; ?></span></a></h6>

						<div class="row">

<?php
$photos = mysql_query("SELECT * FROM camera_web WHERE user_id = '".$user_n['id']."' ORDER BY id DESC");
while($photo = mysql_fetch_assoc($photos)){
?>
	<div class="col-2">
	    <div class="card list gallery gallery-<?php echo $photo['id']; ?>">
	    	<a href="/photos/<?php echo $photo['id']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="Photo by <?php echo $user_n['username']; ?>">
	    <div class="cover">
	        <img src="<?php echo $photo['url']; ?>" alt="">
		</div>
		    </a>
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