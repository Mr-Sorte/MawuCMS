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
	<title><?php echo $Holo['name']; ?>: Perfis</title>

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
				<a href="/me" class="nav-link">Início</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/articles" class="nav-link">Notícias</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/gallery" class="nav-link">Galeria</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/famous" class="nav-link">Famosos</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/team" class="nav-link">Equipe</a>
			</li>
			<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/support" class="nav-link">Suporte</a>
			</li>
			<!--<li class="menu-item menu-item-type-post_type_archive nav-item">
				<a href="/shop" class="nav-link"><font color="dark orange">Loja</font></a>
			</li>-->
		</ul>
		
		<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		
		<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
        while($isadm = mysql_fetch_assoc($isadmin)){ ?><a href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>" target="_blank" class="btn btn-warning"><font color="white">Painel</font></a>    <?php } ?>
		<a href="<?php echo $Holo['client_url']; ?>" class="btn btn-success">Entrar no Hotel</a>    
		
			<div class="dropdown" style="cursor:cell">
			
				<div id="dropUser" class="d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="avatar pixel">
						<img src="<?php echo $Holo['avatar'] . $myrow['look']; ?> &amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=s" alt="<?php echo $myrow['username']; ?>">
						</div>
				</div>
					
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropUser">
						<a class="dropdown-item active" href="/home/<?php echo $myrow['username']; ?>"><i class="fas fa-user text-muted mr-2"></i>Ver meu Perfil</a>
						<a class="dropdown-item" href="/account/prefer"><i class="fas fa-cog text-muted mr-2"></i> Configurações</a>
						<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt text-muted mr-2"></i> Desconectar</a>
					</div>
			</div>
		</div>
	</div>
	</nav>

<?php
$idd = mysql_real_escape_string($_GET['idd']);
$get = mysql_query("SELECT * FROM users WHERE username = '".$idd."' ");

if(mysql_num_rows($get) == 1)
{
    $usr = mysql_fetch_object($get);
}else
	
{
    $exits = '0';   
}

$user_n = mysql_fetch_assoc(mysql_query("SELECT * FROM users_settings WHERE user_id = '".mysql_real_escape_string($usr->id)."'"));
$user_dia = mysql_fetch_assoc(mysql_query("SELECT * FROM users_currency WHERE user_id = '".mysql_real_escape_string($usr->id)."' AND type = '5'"));
$user_duc = mysql_fetch_assoc(mysql_query("SELECT * FROM users_currency WHERE user_id = '".mysql_real_escape_string($usr->id)."' AND type = '0'"));
?>

      <?php if($exits == '0')
            {
                echo '<main>
<section class="e404">
	<div class="container text-center">
		<i class="fas fa-unlink fa-4x mb-4"></i>
		<h5>Página não encontrada</h5>
		<p class="text-muted">O link pode estar quebrado ou a página pode ter sido removida. Verifique se o link que você está tentando abrir está correto.</p>
		<a href="/index" class="btn btn-primary">Voltar a página inicial</a>
		<hr class="ou my-4">
		<a onclick="goBack()" class="btn btn-success">Voltar aonde estava</a>
	</div>
</section>
</main>';
            }else{   
      ?>

<?php $isvisibles = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($usr->id)."' AND visible = '0'");
while($isvisible = mysql_fetch_assoc($isvisibles)){ ?>
<main>
<section class="e404">
	<div class="container text-center">
		<i class="fas fa-unlink fa-4x mb-4"></i>
		<h5>Página não encontrada</h5>
		<p class="text-muted">O link pode estar quebrado ou a página pode ter sido removida. Verifique se o link que você está tentando abrir está correto.</p>
		<a href="/index" class="btn btn-primary">Voltar a página inicial</a>
		<hr class="ou my-4">
		<a onclick="goBack()" class="btn btn-success">Voltar aonde estava</a>
	</div>
</section>
</main>
<?php } ?>

<?php $isvisibles = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($usr->id)."' AND visible = '1'");
while($isvisible = mysql_fetch_assoc($isvisibles)){ ?>

<main>
	  
<div class="jumbotron jumbotron-fluid white py-0">

<?php $homecolors = mysql_query("SELECT home_color,home_image FROM users WHERE id = '".mysql_real_escape_string($usr->id)."'");
while($homecolor = mysql_fetch_assoc($homecolors)){ ?>
	<div class="profile-cover" style="background-color: <?php echo $homecolor['home_color']; ?>; background-image: url('<?php echo $homecolor['home_image']; ?>'); image-rendering: auto; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
		<br><br><br><br><br><br><br><br><br><br><br>
	</div>
<?php } ?>
	
	<div class="container py-3">
		<div class="row">
			<div class="col-md-8 offset-md-4 pl-md-3">
				<ul class="nav nav-pills" id="tabs" role="tablist">
				    <li class="nav-item active">
						<a class="nav-link active" id="infos-tab" data-toggle="tab" href="#infos" role="tab" aria-controls="infos" aria-selected="true">Curiosidades</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="quartos-tab" data-toggle="tab" href="#quartos" role="tab" aria-controls="quartos" aria-selected="true">Quartos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="emblemas-tab" data-toggle="tab" href="#emblemas" role="tab" aria-controls="emblemas" aria-selected="true">Emblemas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="true">Fotos</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4 pr-md-3">
			<div class="card" style="margin-top: -12rem">
				<div class="card-body py-5 text-center">

					<div class="avatar pixel xl mx-auto mb-2">
						<img src="<?php echo $Holo['avatar']; ?><?php echo mysql_real_escape_string($usr->look); ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l">
					</div>
<?php $tags = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($usr->id)."' AND rank = '1' ORDER BY id DESC LIMIT 1");
while($tag = mysql_fetch_array($tags)){
?>
					<h1 class="mb-0"><?php echo mysql_real_escape_string($usr->username); ?></h1>
<?php } ?>
<?php $tags = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($usr->id)."' AND rank = '2' ORDER BY id DESC LIMIT 1");
while($tag = mysql_fetch_array($tags)){
?>
					<h1 class="mb-0"><?php echo mysql_real_escape_string($usr->username); ?><a class="navbar-brand"><span class="vip">VIP</span></a></h1>
<?php } ?>
<?php $tags = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($usr->id)."' AND rank > 4 ORDER BY id DESC LIMIT 1");
while($tag = mysql_fetch_array($tags)){
?>
					<h1 class="mb-0"><?php echo mysql_real_escape_string($usr->username); ?><a class="navbar-brand"><span class="staff">STAFF</span></a></h1>
<?php } ?>
					<div class="mb-3 text-muted"><?php echo mysql_real_escape_string($usr->motto); ?></div>
					<hr>
					<div class="mb-1 text-muted"><font color="#FF9030"><strong><?php echo mysql_real_escape_string($usr->credits); ?></strong> Moedas</font></div>
					<div class="mb-1 text-muted"><font color="#822273"><strong><?php echo $user_duc['amount']; ?></strong> Duckets</font></div>
					<div class="mb-1 text-muted"><font color="#0aa8ec"><strong><?php echo $user_dia['amount']; ?></strong> Diamantes</font></div>
					<div class="mb-1 text-muted"><font color="#307213"><strong><?php echo mysql_real_escape_string($usr->premiar); ?></strong> Eventos Ganhos</font></div>
					<hr>
					<div class="mb-0 text-muted">
					<?php if($usr->online == '1') { 
					        echo '<strong>Está no Hotel agora mesmo.</strong>';
					    } elseif($usr->last_online == '0') { 
				            echo 'Nunca entrou no Hotel.';
					    } else {
					        echo 'Última conexão foi ' .GetLast($usr->last_online). '.';
					    } ?>
					</div>
					
				</div>
			</div>
		</div>

		<div class="col-md-8 pl-md-3">
			<section class="py-2">
				<div class="tab-content" id="tabsContent">
				
					<div class="tab-pane fade show active" id="infos" role="tabpanel" aria-labelledby="infos-tab">
					    <h3 class="mb-3">Curiosidades sobre <?php echo mysql_real_escape_string($usr->username); ?></h3>
                        <div class="row">
							<div class="card">
								<div class="card-body text-center text-muted">
									<strong><?php echo mysql_real_escape_string($usr->username); ?></strong> entrou no <?php echo $Holo['name']; ?> em <strong><?php echo date("d/m",mysql_real_escape_string($usr->account_created)); ?></strong> de <strong><?php echo date("Y",mysql_real_escape_string($usr->account_created)); ?></strong>, já recebeu <strong><?php echo $user_n['respects_received']; ?></strong> Respeitos, mas tambêm já deu <strong><?php echo $user_n['respects_given']; ?></strong> Respeitos, informamos também que <?php echo mysql_real_escape_string($usr->username); ?> tem <strong><?php echo $user_n['achievement_score']; ?></strong> Pontos no Placar de Conquistas, ganhou <strong><?php echo mysql_real_escape_string($usr->premiar); ?></strong> Eventos, e já comprou <strong><?php echo mysql_num_rows(mysql_query("SELECT * FROM items WHERE user_id = '".mysql_real_escape_string($usr->id)."'")) ?></strong> Mobis.
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="quartos" role="tabpanel" aria-labelledby="quartos-tab">
					<h3 class="mb-3"><?php echo mysql_real_escape_string($usr->username); ?> tem <?php echo mysql_num_rows(mysql_query("SELECT * FROM rooms WHERE owner_id = '".mysql_real_escape_string($usr->id)."'")) ?> quartos</h3>
						<div class="row">

<?php $rooms = mysql_query("SELECT * FROM rooms WHERE owner_id = '".mysql_real_escape_string($usr->id)."' ORDER BY id ASC");
while($room = mysql_fetch_array($rooms)){
?>
<div class="col-sm-6">
<div class="card topic topic-<?php echo $room['id']; ?>">
	<div class="card-body">
		<div class="avatar pixel lg mr-3">
			<img src="<?php echo $Holo['thumbsurl']; ?><?php echo $room['id']; ?>.png" alt="">
		</div>
		<div class="content">
			<h5 class="card-title mb-2 text-ellipsis" type="application/json"><?php echo mysql_real_escape_string(strip_tags(mb_strimwidth($room['name'], 0, 23, "..."))); ?></h5>
			<div class="card-text" type="application/json"><?php echo mysql_real_escape_string(strip_tags(mb_strimwidth($room['description'], 0, 36, "..."))); ?></div>
		</div>
	</div>
</div>
</div>
<?php } ?>

						</div>
					</div>
				
					<div class="tab-pane fade" id="emblemas" role="tabpanel" aria-labelledby="emblemas-tab">
					<h3 class="mb-3"><?php echo mysql_real_escape_string($usr->username); ?> tem <?php echo mysql_num_rows(mysql_query("SELECT * FROM users_badges WHERE user_id = '".mysql_real_escape_string($usr->id)."'")) ?> Emblemas</h3>
						<div class="row">

<?php $badges = mysql_query("SELECT * FROM users_badges WHERE user_id = '".mysql_real_escape_string($usr->id)."' ORDER BY slot_id DESC");
while($badge = mysql_fetch_array($badges)){
?>
<div class="col-4 col-sm-3 col-lg-2 ">
	<div class="card free post-<?php echo $badge['id']; ?>">
	    <a>
	        <div class="box pixel" data-toggle="tooltip" data-html="true" title="" data-original-title="<strong><?php echo mysql_real_escape_string(mb_strimwidth($badge['badge_code'], 0, 13, "...")); ?></strong>">
				<img src="<?php echo $Holo['url_badges']; ?><?php echo $badge['badge_code']; ?>.gif">
		    </div>
	    </a>
    </div>
</div>
<?php } ?>

						</div>
					</div>

					<div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
					<h3 class="mb-3"><?php echo mysql_real_escape_string($usr->username); ?> tem <?php echo mysql_num_rows(mysql_query("SELECT * FROM camera_web WHERE user_id = '".mysql_real_escape_string($usr->id)."'")) ?> Fotos</h3>
						<div class="row">
							
<?php
$photos = mysql_query("SELECT * FROM camera_web WHERE user_id = '".mysql_real_escape_string($usr->id)."' ORDER BY id DESC");
while($photo = mysql_fetch_assoc($photos)){
?>
	<div class="col-2">
	    <div class="card list gallery gallery-<?php echo $photo['id']; ?>">
	    <div class="cover">
	        <img src="<?php echo $photo['url']; ?>" alt="">
		</div>
	    </div>
	</div>
<?php } ?>

						</div>
					</div>
					
				</div>
			</section>
		</div>
	</div>
</div>

</main>
	
<?php } ?>
<?php } ?>
	
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