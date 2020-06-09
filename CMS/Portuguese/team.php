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
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Equipe</title>

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
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/team" class="nav-link active">Equipe</a>
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
						<a class="dropdown-item" href="/home/<?php echo $myrow['username']; ?>"><i class="fas fa-user text-muted mr-2"></i>Ver meu Perfil</a>
						<a class="dropdown-item" href="/account/prefer"><i class="fas fa-cog text-muted mr-2"></i> Configurações</a>
						<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt text-muted mr-2"></i> Desconectar</a>
					</div>
			</div>
		</div>
	</div>
	</nav>
	
	<main>
<div class="jumbotron jumbotron-fluid purple">
	<div class="container d-flex align-items-center">
		<h1>Equipe</h1>
	</div>
</div>

<section>
	<div class="container">
		<h4>Formais <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="A Equipe Formal é feita por membros a partir de Moderação até Criação geral."></i></h4>
			<div class="row">
			
			<?php $valores = mysql_query("SELECT * FROM permissions WHERE visible = '0' ORDER BY id DESC LIMIT 1");
			while($valor = mysql_fetch_assoc($valores)){ ?>
			<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
			while($isadm = mysql_fetch_assoc($isadmin)){
			$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$isadm['rank']."'")); ?>
			<div class="col-md-12">
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			    <div class="alert alert-secondary" role="alert"><b>Ei...</b> Como vimos que você é <b><?php echo $rank['rank_name']; ?></b>, precisamos lhe informar que existem cargos ocultos aqui, sendo eles - <?php $isadmin = mysql_query("SELECT * FROM permissions WHERE visible = '0'");
			while($isadm = mysql_fetch_assoc($isadmin)){ ?><b><?php echo $isadm['rank_name']; ?></b> <?php } ?></div>
			</div>
			</div>
			<?php } ?>
			<?php } ?>

<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '9' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '9' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '8' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '7' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '6' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
				
			</div>
			<br><hr>
			<h4>Informais <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="A Equipe Informal é feita por Embaixadores e Arquitetos oficializados pela gerencia."></i></h4>
			<div class="row">
<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '5' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
<?php $staffs = mysql_query("SELECT * FROM users WHERE rank = '3' AND visible = '1' ORDER BY rank DESC");
while($staff = mysql_fetch_array($staffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
<?php $visibles = mysql_query("SELECT * FROM permissions WHERE id = '".$staff['rank']."' AND visible = '1'");
while($visible = mysql_fetch_array($visibles)){
?>
				<div class="col-md-2">
				   <div class="section-topic">
							<div class="side">
								<div class="avatar pixel lg d-md-none">
									<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=4Queijos&amp;action=std&amp;direction=2&amp;head_direction=2&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=b" alt="">
								</div>

								<div class="infos">
									<h5 class="mb-md-3 mb-1"><a class="text-inherit" href="/home/<?php echo $staff['username']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?>"><?php echo mysql_real_escape_string(mb_strimwidth($staff['username'], 0, 16, "...")); ?></a></h5>

									<div class="avatar pixel xl d-none d-md-block">
										<img src="<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=0&amp;size=l" alt="">
									</div>
						
						<div class="rank" style="background-color: <?php echo $rank['prefix_color']; ?>;"><?php echo $rank['rank_name']; ?><div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo ''; } else { echo ''; } ?></div></div>

								</div>
							</div>
						</div>
				</div>
<?php } ?>
<?php } ?>
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