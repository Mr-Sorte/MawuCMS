<?php require_once("inc/core.god.php");
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

if(isset($_POST['Usuario']) && isset($_POST['Mail']) && isset($_POST['Contrasena']) && isset($_POST['RContrasena']) && isset($_POST['Contracode']))
{   

	$Getnombre = mysql_query("SELECT * FROM users WHERE username = '". $_POST['Usuario'] ."'");
	$Getmail = mysql_query("SELECT * FROM users WHERE mail = '". $_POST['Mail'] ."'");

	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Usuario']) || empty($_POST['Mail']) || empty($_POST['Contrasena']) || empty($_POST['RContrasena']) || empty($_POST['Contracode']))
	{
		$regerror = '<div class="alert alert-danger" role="alert">Something is wrong, try again.</div>';
	}
	elseif(mysql_num_rows($Getnombre) > 0)
	{
		$regerror = '<div class="alert alert-danger" role="alert">You need choose a Name.</div>';
	}
	elseif(mysql_num_rows($Getmail) > 0)
	{
		$regerror = '<div class="alert alert-danger" role="alert">You need put your real e-mail.</div>';
	}
	elseif($_POST['Contrasena'] !== $_POST['RContrasena'])
	{
		$regerror = '<div class="alert alert-danger" role="alert">Passwords are not the same, check and try again.</div>';
	}
    elseif(strlen($_POST['Usuario']) > 18 || strlen($_POST['Usuario']) < 3) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">Your username is too short.</div>';
	}
	elseif(strlen($_POST['Contracode']) > 11 || strlen($_POST['Contracode']) < 4) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">Your security code is too short.</div>';
	}
	elseif(strrpos($_POST['Usuario'], "á") || strrpos($_POST['Usuario'], "à") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "é") || strrpos($_POST['Usuario'], "è") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "í") || strrpos($_POST['Usuario'], "ì") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ó") || strrpos($_POST['Usuario'], "ò") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ú") || strrpos($_POST['Usuario'], "ù") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ㅤ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "õ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ã") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ñ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ý") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ç") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "~") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "|") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "¤") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "[") || strrpos($_POST['Usuario'], "]") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "{") || strrpos($_POST['Usuario'], "}") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "!") || strrpos($_POST['Usuario'], "#") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "$") || strrpos($_POST['Usuario'], "%") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "&") || strrpos($_POST['Usuario'], "*") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ê") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "û") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "î") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ô") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "â") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "MOD-") || strrpos($_POST['Usuario'], "MOD_") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Something is wrong with your name, try another.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "Wulles") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">You cannot create a user with this name.</div>';
    }
	elseif(strrpos($_POST['Usuario'], " ") || strrpos($_POST['Usuario'], " ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">You cannot create a user with this name.</div>';
	}
	elseif (!$captcha) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">Arent you a Robo? Verify your identity.</div>';
    }
	else
	{
		mysql_query("INSERT INTO users (username, password, passcode, mail, look, gender, motto, ip_register, credits, account_created, account_day_of_birth) VALUES ('". filtro($_POST['Usuario']) ."', '".md5($_POST['Contrasena'])."', '".md5($_POST['Contracode'])."', '". filtro($_POST['Mail']) ."', '". $Holo['look'] ."', '". $Holo['gender'] ."', '". $Holo['mision'] ."', '". $ip ."', '". $Holo['monedas'] ."', '" . time() ."', '" . time() ."')");
		$_SESSION['Username'] = mysql_real_escape_string($_POST['Usuario']);
		$_SESSION['Password'] = mysql_real_escape_string($_POST['Contrasena']);
		$_SESSION['Contracode'] = mysql_real_escape_string($_POST['Contracode']);
		header("Location: me");
	}
}

$_GET['Usuario'] = mysql_real_escape_string($_POST['Usuario']);
$_GET['Mail'] = mysql_real_escape_string($_POST['Mail']);
$_GET['Contrasena'] = mysql_real_escape_string($_POST['Contrasena']);
$_GET['RContrasena'] = mysql_real_escape_string($_POST['RContrasena']);
$_GET['Contracode'] = mysql_real_escape_string($_POST['Contracode']);

?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Register</title>

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
		<a href="/index" class="nav-link">Index</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/login" class="nav-link">Login</a>
	</li>
	<li class="menu-item menu-item-type-post_type menu-item-home current-menu-item page_item nav-item active">
		<a href="/register" class="nav-link active">Register</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/support" class="nav-link">Support</a>
	</li>
</ul>

<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		<a href="/login" class="btn btn-primary">Login</a>
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
						<h3 class="mb-4">Register</h3>
						
						<?php if($regerror !== NULL) { echo $regerror; } ?>
						
		<form id="loginform" method="POST">
			<p class="login-username">
				<label for="user_login">Choose a Name</label>
				<input type="text" name="Usuario" class="input" size="20" required>
				<p class="text-muted">Your name can contain uppercase, lowercase letters, numbers and special characters like _-=?!@:.,</p>
			</p>
			<p class="login-password">
				<label for="user_pass">Create a Password</label>
				<input type="password" name="Contrasena" class="input" size="20" required>
				<p class="text-muted">Repeat your password.</p>
				<input type="password" name="RContrasena" class="input" size="20" required>
			</p>
			<p class="login-username">
				<label for="user_login">Your e-mail</label>
				<input type="email" name="Mail" class="input" size="20" required>
			</p>
			<p class="login-submit">
			<label for="user_code">Create a Security Code</label>
			<input type="password" name="Contracode" class="input" size="20" required>
			<p class="text-muted">Create a unique code for your account security.</p>
			<br>
			<label for="user_code">Are you Human?</label>
                <script src="https://www.google.com/recaptcha/api.js"></script><center><div class="g-recaptcha" data-sitekey="<?php echo $Holo['recaptcha'] ?>" ></div></center>
				<hr class="my-4">

				<input name="register" type="submit" id="wp-submit" class="btn btn-lg btn-block btn-success" value="Register">
			</p>
		</form>
		
		<div class="text-center text-muted mt-4">Have an Account? <a class="text-link text-primary show-login">Login</a></div>

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