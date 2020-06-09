<?php
require_once("inc/core.god.php");

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
<?php if(Loged == FALSE) { ?>
<html lang="pt-BR" data-theme="light">
<?php } ?>
<?php if(Loged == TRUE) { ?>
<html lang="pt-BR" data-theme="<?php echo $myrow['theme']; ?>">
<?php } ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: Suporte</title>

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
<?php if(Loged == FALSE) { ?>
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
	<li class="menu-item menu-item-type-post_type menu-item-home current-menu-item page_item nav-item">
		<a href="/login" class="nav-link">Entrar</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/register" class="nav-link">Registro</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item active">
		<a href="/support" class="nav-link active">Suporte</a>
	</li>
</ul>

<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		<a href="/register" class="btn btn-success">Registrar</a>    
		<a href="/login" class="btn btn-primary">Entrar na sua Conta</a>
</div>

		</div>
	</nav>
<?php } ?>
<?php if(Loged == TRUE) { ?>
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
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/support" class="nav-link active">Suporte</a>
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
<?php } ?>

<main>
<div class="jumbotron jumbotron-fluid green">
		<div class="container">
		<h1>Suporte</h1>
	</div>
</div>

<section>

	<div class="container">
<?php if(Loged == FALSE) { ?>
			<div class="col-md-12">
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			    <div class="alert alert-secondary" role="alert"><b>Sabia?</b> A ferramenta de Suporte/Ajuda pode se tornar melhor se você estiver logado em uma conta! <a href="/login">Clique aqui para entrar</a></div>
			</div>
			</div>
		<div class="col-md-6 offset-md-3">
		<p><h3>Nosso e-mail</h3><br><b>Eita</b>, como você não está em conexão com nenhuma conta, não podemos te oferecer muitos recursos no quesito <i>Ajuda/Suporte</i>, mas podemos ser bem paciente e atenciosos com você caso queira nos mandar um e-mail, nosso endereço de e-mail para suporte é - <b><?php echo $Holo['contactemail']; ?></b>, as respostas podem demorar até 24h.<br><br><font color="dark orange">(Você pode utilizar o e-mail para informar algum erro no sistema, alguma sugestão ou tentar entrar em ação contra ou a favor de um banimento)</font></p>
		<hr>
		<p><h3>Outras formas de solicitar ajuda</h3><br>Se caso você não consiga ou ache muito difícil nos contatar via e-mail, temos também um grupo no aplicativo <b>Discord</b>, la sim você pode achar outros usuários e até mesmo conseguir ajuda de forma instantânea.<br><br><a href="<?php echo $Holo['discordinvl']; ?>" target="_blank" class="btn btn-primary">Entrar no grupo do Discord</a></p>
		</div>
<?php } ?>

<?php if(Loged == TRUE) { ?>
<?php 
if(isset($_POST['ticket']))
{ 
	$category = mysql_real_escape_string($_POST['category']);
	$texto = mysql_real_escape_string($_POST['texto']);

    if(!empty($_POST['category']) || empty($_POST['texto']))
    { 
        $query_NewTicket = mysql_query("INSERT INTO cms_tickets SET category = '".$category."', ticket = '". filtro($_POST['texto']) ."', date = '". time() . "', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."'");

        if($query_NewTicket) 
        { 
            echo '<div class="col-md-6 offset-md-3"><p class="alert alert-success">Você enviou um novo Ticket, agradecemos e pedimos que aguarde respostas.</p></div>';
        } 
        else 
        { 
            echo '<div class="col-md-6 offset-md-3"><p class="alert alert-danger">Alguma coisa deu errado, tente novamente.</p></div>';

        } 
    } 
    else 
    { 
        echo '<div class="col-md-6 offset-md-3"><p class="alert alert-warning">Você esqueceu de configurar alguma coisa.</p></div>';
    } 
	
} 

?>
    <p>
		<div class="col-md-6 offset-md-3">
		<h3>Enviar um Ticket</h3>
		    <form action="" method="post">
				<div class="form-group form-username">
					<label for="user_login">Nome de usuário:</label>
					<input disabled="" class="form-control" type="text" value="<?php echo $myrow['username']; ?>">
					<small class="form-text text-muted">Não é possível alterar nomes de usuário.</small>
				</div>

				<div class="form-group">
					<label for="category">Categoria:</label>
					<select class="custom-select" id="category" name="category" required >
					    <option selected="selected" disabled="" value="">Escolha uma categoria...</option>
						<option value="ajuda">Ajuda & Suporte</option>
						<option value="reclamacao">Reclamações</option>
						<option value="bugs">Erros & Bugs</option>
						<option value="sugestoes">Sugestões</option>
						<option value="contato">Quero entrar em Contato</option>
					</select>
				</div>
				
				<div class="form-group form-textarea">
					<label for="description">Conte o que acontece:</label>
					<textarea class="form-control" name="texto" id="texto" rows="5" cols="60" style="resize: none;" placeholder="Escreva algo..." required></textarea>
					<small class="form-text text-muted">Seja bem claro no que for digitar, em caso de abuso do sistema, você será permanentemente banido.</small>
				</div>

				<div class="form-group form-username">
					<button class="btn btn-success" type="submit" name="ticket">Enviar Ticket</button>
				</div>
			</form>
		
	</p>
		<hr>
		<p><h3>Nosso e-mail</h3><br>Se você quer algo mais formal ou complexo, nos mande um e-mail, nosso endereço de e-mail para suporte é - <b><?php echo $Holo['contactemail']; ?></b>, as respostas podem demorar até 24h.</p>
		<hr>
		<p><h3>Outras formas de solicitar ajuda</h3><br>Se caso você não consiga ou ache muito difícil nos contatar via e-mail, temos também um grupo no aplicativo <b>Discord</b>, la sim você pode achar outros usuários e até mesmo conseguir ajuda de forma instantânea.<br><br><a href="<?php echo $Holo['discordinvl']; ?>" target="_blank" class="btn btn-primary">Entrar no grupo do Discord</a></p>
		</div>
<?php } ?>
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