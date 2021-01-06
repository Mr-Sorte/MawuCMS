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

if(isset($_POST['email_a']) && isset($_POST['email_n']) && isset($_POST['email_nr']))
{
    $EA = mysql_real_escape_string($_POST['email_a']);
    $EN = mysql_real_escape_string($_POST['email_n']);
    $ENR = mysql_real_escape_string($_POST['email_nr']);

    $Checkmail = mysql_query("SELECT * FROM users WHERE mail = '". $EN ."'");

    if(empty($EA) || empty($EN) || empty($ENR))
    {
        $aerror = 'Não deixe campos vazios.';
    }
    elseif(mysql_num_rows($Checkmail) > 0) 
    {
        $aerror = 'O e-mail que você colocou já existe, coloque outro.';
    }
    elseif($EN != $ENR)
    {
        $aerror = 'Os e-mails não são os mesmos, tente novamente.';
    }
    elseif($EA != $myrow['mail'])
    {
        $aerror = 'O e-mail antigo não é o correto.';
    }
    else
    {
        mysql_query("UPDATE users SET mail = '". $EN ."' WHERE id = '". $myrow['id'] ."'");
        $aok = 'Você mudou seu e-mail corretamente!<META http-equiv="refresh" content="2;URL=/account/correo">';
    }
}

if(isset($_POST['theme']))
{
    $THM = mysql_real_escape_string($_POST['theme']);

    mysql_query("UPDATE users SET theme = '". $THM ."' WHERE id = '". $myrow['id'] ."'");
    $aok = 'Você modificou o Tema com Sucesso.<META http-equiv="refresh" content="2;URL=/account/site">';
}

if(isset($_POST['homecolor']))
{
    $THM = mysql_real_escape_string($_POST['homecolor']);

    mysql_query("UPDATE users SET home_color = '". $THM ."' WHERE id = '". $myrow['id'] ."'");
    $aok = 'Você modificou a Cor da sua Home com Sucesso.<META http-equiv="refresh" content="2;URL=/account/site">';
}

if(isset($_POST['blockvisible']))
{
    $BVS = mysql_real_escape_string($_POST['blockvisible']);

    mysql_query("UPDATE users SET visible = '". $BVS ."' WHERE id = '". $myrow['id'] ."'");
    $aok = 'Você atualizou suas preferencias com Sucesso.<META http-equiv="refresh" content="2;URL=/account/prefer">';
}


if(isset($_POST['blockfriendship']))
{
    $BFR = mysql_real_escape_string($_POST['blockfriendship']);

    mysql_query("UPDATE users_settings SET block_friendrequests = '". $BFR ."' WHERE user_id = '". $myrow['id'] ."'");
    $aok = 'Você atualizou suas preferencias com Sucesso.<META http-equiv="refresh" content="2;URL=/account/prefer">';
}

if(isset($_POST['blockfollow']))
{
    $RIN = mysql_real_escape_string($_POST['blockfollow']);

    mysql_query("UPDATE users_settings SET block_roominvites = '". $RIN ."' WHERE user_id = '". $myrow['id'] ."'");
    $aok = 'Você atualizou suas preferencias com Sucesso.<META http-equiv="refresh" content="2;URL=/account/prefer">';
}

if(isset($_POST['blockalerts']))
{
    $BAL = mysql_real_escape_string($_POST['blockalerts']);

    mysql_query("UPDATE users_settings SET block_alerts = '". $BAL ."' WHERE user_id = '". $myrow['id'] ."'");
    $aok = 'Você atualizou suas preferencias com Sucesso.<META http-equiv="refresh" content="2;URL=/account/prefer">';
}

if(isset($_POST['Pass']) && isset($_POST['NPass']) && isset($_POST['RNPass']))
{
    $Pass = mysql_real_escape_string($_POST['Pass']);
    $NPass = mysql_real_escape_string($_POST['NPass']);
    $RNPass = mysql_real_escape_string($_POST['RNPass']);

    $Checkpass = mysql_query("SELECT * FROM users WHERE id = '". $myrow['id'] ."'");
    $passss = mysql_fetch_assoc($Checkpass);

    if(empty($Pass) || empty($NPass) || empty($RNPass))
    {
        $aerror = 'Não deixe campos vazios';
    }
    elseif($NPass != $RNPass)
    {
        $aerror = 'Novas senhas não correspondem';
    }
    elseif(md5($Pass) != $passss['password'])
    {
        $aerror = 'A senha antiga não está correta';
    }
    else
    {
        mysql_query("UPDATE users SET password = '". md5($NPass) ."' WHERE id = '". $myrow['id'] ."'");
		echo '<META http-equiv="refresh" content="1;URL=/logout">';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="<?php echo $myrow['theme']; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Configurações</title>

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
						<a class="dropdown-item" href="/home/<?php echo $myrow['username']; ?>"><i class="fas fa-user text-muted mr-2"></i>Ver meu Perfil</a>
						<a class="dropdown-item active" href="/account/correo"><i class="fas fa-cog text-muted mr-2"></i> Configurações</a>
						<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt text-muted mr-2"></i> Desconectar</a>
					</div>
			</div>
		</div>
	</div>
	</nav>
	
	<main>
<div class="jumbotron jumbotron-fluid yellow">
	<div class="container">
<?php if($_GET['item'] == "correo"){ ?>
		<h1>Configurações <a href="/account/prefer" class="btn btn-warning ml-4"><font color="white">Preferências</font></a> <a href="/account/site" class="btn btn-warning ml-4"><font color="white">Site</font></a> <a href="/account/correo" class="btn btn-warning ml-4 active"><font color="white">E-mail</font></a> <a href="/account/contra" class="btn btn-warning ml-4"><font color="white">Senha</font></a></h1>
<?php }elseif($_GET['item'] == "contra"){ ?>
		<h1>Configurações <a href="/account/prefer" class="btn btn-warning ml-4"><font color="white">Preferências</font></a> <a href="/account/site" class="btn btn-warning ml-4"><font color="white">Site</font></a> <a href="/account/correo" class="btn btn-warning ml-4"><font color="white">E-mail</font></a> <a href="/account/contra" class="btn btn-warning ml-4 active"><font color="white">Senha</font></a></h1>
<?php }elseif($_GET['item'] == "site"){ ?>
		<h1>Configurações <a href="/account/prefer" class="btn btn-warning ml-4"><font color="white">Preferências</font></a> <a href="/account/site" class="btn btn-warning ml-4 active"><font color="white">Site</font></a> <a href="/account/correo" class="btn btn-warning ml-4"><font color="white">E-mail</font></a> <a href="/account/contra" class="btn btn-warning ml-4"><font color="white">Senha</font></a></h1>
<?php }elseif($_GET['item'] == "prefer"){ ?>
		<h1>Configurações <a href="/account/prefer" class="btn btn-warning ml-4 active"><font color="white">Preferências</font></a> <a href="/account/site" class="btn btn-warning ml-4"><font color="white">Site</font></a> <a href="/account/correo" class="btn btn-warning ml-4"><font color="white">E-mail</font></a> <a href="/account/contra" class="btn btn-warning ml-4"><font color="white">Senha</font></a></h1>
<?php } ?>
	</div>
</div>

<section>
	<div class="container">
		
			<div class="row">
			
			    <div class="col-md-3"></div>
<?php if($_GET['item'] == "correo"){ ?>
				<div class="col-md-6">
				    <h3 class="mb-3 mt-4">Configurar seu E-mail</h3>
		
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
						<div class="form-group form-username">
							<label for="inputEmail">Seu e-mail atual</label>
							<input class="form-control" type="email" name="email_a" id="inputEmail" value="<?php echo $myrow['mail']; ?>" required >
						</div>
						
						<hr>
						
						<div class="form-group form-username">
							<label for="inputEmail">Agora o seu novo e-mail</label>
							<input class="form-control" type="email" name="email_n" id="inputEmail" required >
						</div>
						
						<div class="form-group form-username">
							<label for="inputEmail">Repita o seu novo e-mail</label>
							<input class="form-control" type="email" name="email_nr" id="inputEmail" required >
						</div>

						<p class="form-submit">
							<input type="submit" name="account" class="btn btn-primary" value="Atualizar e-mail">
						</p>
					</form>
					
				</div>
<?php }elseif($_GET['item'] == "contra"){ ?>
				<div class="col-md-6">
				    <h3 class="mb-3 mt-4">Atualizar sua Senha</h3>
					
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
						<div class="form-group form-password">
							<label for="pass1">Sua senha atual</label>
							<input class="form-control" type="password" name="Pass" id="inputPassword" required >
						</div>
						
						<hr>
						
						<div class="form-group form-password">
							<label for="pass2">Agora crie uma nova senha</label>
							<input class="form-control" type="password" name="NPass" id="inputPassword" required >
						</div>
						
						<div class="form-group form-password">
							<label for="pass2">Repita a sua nova senha</label>
							<input class="form-control" type="password" name="RNPass" id="inputPassword" required >
							<small class="form-text text-muted">Tenha certeza que não errou nenhuma letra e que não vai esquecer.</small>
						</div>

						<p class="form-submit">
							<input type="submit" name="account" class="btn btn-primary" value="Atualizar senha">
						</p>
					</form>
					
				</div>
<?php }elseif($_GET['item'] == "site"){ ?>
				<div class="col-md-6">
				    <h3 class="mb-3 mt-4">Preferências do nosso Site</h3>
					
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
						<div class="form-group form-display_name">
							<label for="display_name">Escolha o Tema que deseja</label>
<?php $actuals = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND theme = 'light'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="theme" id="theme">
								<option value="light" selected="selected">Tema Claro</option>
								<option value="dark">Tema Escuro</option>
							</select>
<?php } ?>
<?php $actuals = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND theme = 'dark'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="theme" id="theme">
								<option value="dark" selected="selected">Tema Escuro</option>
								<option value="light">Tema Claro</option>
							</select>
<?php } ?>
							<small class="form-text text-muted">Se você alterar isso, mudaremos totalmente as cores de como você vê o site atual do <?php echo $Holo['name']; ?> Hotel, adaptaremos tanto para o tema Escuro, quanto para o tema Claro(visto por padrão).</strong></small>
						</div>
						
						<div class="form-group form-display_name">
							<label for="display_name">Escolha a <font color="<?php echo $myrow['home_color']; ?>"><b>Coloração</b></font> do topo da sua <a href="/home/<?php echo $myrow['username']; ?>"><?php echo $Holo['name']; ?> Home</a></label>
							<input class="form-control" type="color" value="<?php echo $myrow['home_color']; ?>" name="homecolor" id="homecolor">
							<small class="form-text text-muted">Sua cor preferida para mostrar no seu Perfil dentro do <?php echo $Holo['name']; ?> Hotel.</strong></small>
						</div>

						<p class="form-submit">
							<input type="submit" name="account" id="updateuser" class="btn btn-primary" value="Atualizar preferências">
						</p>
					</form>
					
				</div>
<?php }elseif($_GET['item'] == "prefer"){ ?>
				<div class="col-md-6">
<?php $actuals = mysql_query("SELECT * FROM users WHERE online = '1' AND id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
        <div class="alert alert-danger" role="alert">Eita <?php echo $myrow['username']; ?>, você está <b>Conectado</b> no <?php echo $Holo['name']; ?> Hotel, e então a gente não vai poder realizar modificações em sua conta, para acessar as mudanças você precisa estar <b>Desconectado</b> do <?php echo $Holo['name']; ?> Hotel.</div>
<?php } ?>
<?php $actuals = mysql_query("SELECT * FROM users WHERE online = '0' AND id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
				    <h3 class="mb-3 mt-4">As suas Preferências</h3>
					
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
					
						<div class="form-group form-display_name">
							<label for="display_name">Visibilidade do Perfil <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="Se você escolher Não ter Perfil, nem você mesmo vai conseguir visualizar a sua <?php echo $Holo['name']; ?> Home."></i></label>
<?php $actuals = mysql_query("SELECT * FROM users WHERE visible = '1' AND id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockvisible" id="blockvisible">
								<option value="1" selected="selected">Todo mundo pode ver meu perfil</option>
								<option value="0">Não quero ter perfil</option>
							</select>
<?php } ?>
<?php $actuals = mysql_query("SELECT * FROM users WHERE visible = '0' AND id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockvisible" id="blockvisible">
								<option value="1">Todo mundo pode ver meu perfil</option>
								<option value="0" selected="selected">Não quero ter perfil</option>
							</select>
<?php } ?>
						</div>
					
						<div class="form-group form-display_name">
							<label for="display_name">Configurações do "Siga-me"</label>
<?php $actuals = mysql_query("SELECT * FROM users_settings WHERE block_friendrequests = '0' AND user_id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockfollow" id="blockfollow">
								<option value="0" selected="selected">Meus amigos podem me seguir</option>
								<option value="1">Não quero que me sigam</option>
							</select>
<?php } ?>
<?php $actuals = mysql_query("SELECT * FROM users_settings WHERE block_friendrequests = '1' AND user_id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockfollow" id="blockfollow">
								<option value="0">Meus amigos podem me seguir</option>
								<option value="1" selected="selected">Não quero que me sigam</option>
							</select>
<?php } ?>
						</div>

						<div class="form-group form-display_name">
							<label for="display_name">Pedidos de Amizade</label>
<?php $actuals = mysql_query("SELECT * FROM users_settings WHERE block_friendrequests = '0' AND user_id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockfriendship" id="blockfriendship">
								<option value="0" selected="selected">Outros <?php echo $Holo['name']; ?> podem enviar-me pedidos de amizade</option>
								<option value="1">Não quero receber pedidos de amizade</option>
							</select>
<?php } ?>
<?php $actuals = mysql_query("SELECT * FROM users_settings WHERE block_friendrequests = '1' AND user_id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockfriendship" id="blockfriendship">
								<option value="0">Outros <?php echo $Holo['name']; ?> podem enviar-me pedidos de amizade</option>
								<option value="1" selected="selected">Não quero receber pedidos de amizade</option>
							</select>
<?php } ?>
						</div>
						
						<div class="form-group form-display_name">
							<label for="display_name">Alertas dentro do Hotel <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="Desativando as alertas de dentro do Hotel, você não vai conseguir ver alertas de Eventos e nem alertas normais como avisos de membros da nossa equipe."></i></label>
<?php $actuals = mysql_query("SELECT * FROM users_settings WHERE block_alerts = '0' AND user_id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockalerts" id="blockalerts">
								<option value="0" selected="selected">Eu quero ver alertas dentro do <?php echo $Holo['name']; ?></option>
								<option value="1">Não quero ver alertas</option>
							</select>
<?php } ?>
<?php $actuals = mysql_query("SELECT * FROM users_settings WHERE block_alerts = '1' AND user_id = '". $myrow['id'] ."'");
while($actual = mysql_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockalerts" id="blockalerts">
								<option value="0">Eu quero ver alertas dentro do <?php echo $Holo['name']; ?></option>
								<option value="1" selected="selected">Não quero ver alertas</option>
							</select>
<?php } ?>
						</div>
						
						<p class="form-submit">
							<input type="submit" name="account" id="updateuser" class="btn btn-primary" value="Atualizar preferências">
						</p>
						
					</form>
<?php  } ?>
			</div>
<?php  } ?>
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