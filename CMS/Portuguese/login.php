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

if(isset($_POST['Username']) && isset($_POST['Password']))
{
	
	$Getuser = mysql_query("SELECT * FROM users WHERE username = '". $_POST['Username'] ."' AND password = '". md5($_POST['Password']) ."'");

	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Username']) || empty($_POST['Password']))
	{
		$loginerror = '<p class="alert alert-danger">Não deixe campos vazios.</p>';
	}

	elseif(mysql_num_rows($Getuser) == 0)
	{
		$loginerror = '<p class="alert alert-danger">Nome de usuário inválido.</p>';
	}
	
	elseif (!$captcha) 
	{
        $loginerror = '<p class="alert alert-danger">Você não é um Robo? Verifique sua identidade.</p>';
    }

	else 
	{
		if(mysql_num_rows($Getuser) > 0)
		{
			$_SESSION['Username'] = mysql_real_escape_string($_POST['Username']);
			$_SESSION['Password'] = mysql_real_escape_string($_POST['Password']);
			header("Location: me");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Entrar</title>

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
		<a href="/index" class="nav-link">Início</a>
	</li>
	<li class="menu-item menu-item-type-post_type menu-item-home current-menu-item page_item nav-item active">
		<a href="/login" class="nav-link active">Entrar</a>
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
</div>

		</div>
	</nav>

<main>
<section>
	<div class="container pt-3">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="toggle-login">
					<div class="login">
						<h3 class="mb-4">Entrar</h3>
						
						<?php if($loginerror !== NULL) { echo $loginerror; } ?>
						
		<form id="loginform" method="POST">
			<p class="login-username">
				<label for="user_login">Nome de Usuário(a)</label>
				<input type="text" name="Username" id="user_login" class="input" size="20" required>
			</p>
			<p class="login-password">
				<label for="user_pass">Sua Senha</label>
				<input type="password" name="Password" id="user_pass" class="input" size="20" required>
			</p>
			<p class="login-submit">
			<label for="user_code">Você é Humano?</label>
                <script src="https://www.google.com/recaptcha/api.js"></script><center><div class="g-recaptcha" data-sitekey="<?php echo $Holo['recaptcha'] ?>" ></div></center>
				<hr class="my-4">

				<input name="login" type="submit" id="wp-submit" class="button button-primary" value="Acessar">
			</p>
		</form>
		
		<hr class="ou my-4">

		<div class="text-center"><a href="/register" class="btn btn-lg btn-success">Criar nova conta</a></div>

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