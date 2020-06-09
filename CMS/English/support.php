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
	<title><?php echo $Holo['name']; ?>: Support</title>

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
		<a href="/index" class="nav-link">Index</a>
	</li>
	<li class="menu-item menu-item-type-post_type menu-item-home current-menu-item page_item nav-item">
		<a href="/login" class="nav-link">Login</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item">
		<a href="/register" class="nav-link">Register</a>
	</li>
	<li class="menu-item menu-item-type-post_type_archive nav-item active">
		<a href="/support" class="nav-link active">Support</a>
	</li>
</ul>

<div class="d-flex justify-content-center align-items-center ml-auto mt-3 mt-lg-0">
		<a href="/register" class="btn btn-success">Create an account</a>    
		<a href="/login" class="btn btn-primary">Login</a>
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
				<a href="/me" class="nav-link">Home</a>
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
			<li class="menu-item menu-item-type-post_type_archive nav-item active">
				<a href="/support" class="nav-link active">Support</a>
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
<?php } ?>

<main>
<div class="jumbotron jumbotron-fluid green">
		<div class="container">
		<h1>Support</h1>
	</div>
</div>

<section>

	<div class="container">
<?php if(Loged == FALSE) { ?>
			<div class="col-md-12">
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			    <div class="alert alert-secondary" role="alert"><b>Know?</b> The Support/Help tool can become better if you are logged in to an account! <a href="/login">Click here to login</a></div>
			</div>
			</div>
		<div class="col-md-6 offset-md-3">
		<p><h3>Our e-mail</h3><br><b>Wow</b>, as you are not connected to any account, we cannot offer you many resources in this regard <i>Support/Help tool</i>, but we can be very patient and considerate with you if you want to send us an email, our email address for support is - <b><?php echo $Holo['contactemail']; ?></b>, responses can take up to 24h.<br><br><font color="dark orange">(You can use e-mail to report an error in the system, any suggestions or try to take action against or in favor of a ban)</font></p>
		<hr>
		<p><h3>Other ways to request help</h3><br>If in case you are unable or find it very difficult to contact us via email, we also have a group in the <b> Discord </b> application, but you can find other users and even get help instantly.<br><br><a href="<?php echo $Holo['discordinvl']; ?>" target="_blank" class="btn btn-primary">Join in our Discord Group</a></p>
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
            echo '<div class="col-md-6 offset-md-3"><p class="alert alert-success">You have submitted a new Ticket, we thank you and ask you to wait for responses.</p></div>';
        } 
        else 
        { 
            echo '<div class="col-md-6 offset-md-3"><p class="alert alert-danger">Something went wrong, try again.</p></div>';

        } 
    } 
    else 
    { 
        echo '<div class="col-md-6 offset-md-3"><p class="alert alert-warning">You forgot to configure something.</p></div>';
    } 
	
} 

?>
    <p>
		<div class="col-md-6 offset-md-3">
		<h3>Send a Ticket</h3>
		    <form action="" method="post">
				<div class="form-group form-username">
					<label for="user_login">Your username:</label>
					<input disabled="" class="form-control" type="text" value="<?php echo $myrow['username']; ?>">
					<small class="form-text text-muted">Cannot change your username.</small>
				</div>

				<div class="form-group">
					<label for="category">Category:</label>
					<select class="custom-select" id="category" name="category" required >
					    <option selected="selected" disabled="" value="">Choose one...</option>
						<option value="ajuda">Help & Support</option>
						<option value="reclamacao">Claims</option>
						<option value="bugs">Errors & Bugs</option>
						<option value="sugestoes">Suggestions</option>
						<option value="contato">I want to contact</option>
					</select>
				</div>
				
				<div class="form-group form-textarea">
					<label for="description">Tell us what happens:</label>
					<textarea class="form-control" name="texto" id="texto" rows="5" cols="60" style="resize: none;" placeholder="Write something..." required></textarea>
					<small class="form-text text-muted">Be very clear in what you type, in case of abuse of the system, you will be permanently banned.</small>
				</div>

				<div class="form-group form-username">
					<button class="btn btn-success" type="submit" name="ticket">Submit Ticket</button>
				</div>
			</form>
		
	</p>
		<hr>
		<p><h3>Our e-mail</h3><br>We can be very patient and considerate with you if you want to send us an email, our email address for support is - <b><?php echo $Holo['contactemail']; ?></b>, responses can take up to 24h.<br><br><font color="dark orange">(You can use e-mail to report an error in the system, any suggestions or try to take action against or in favor of a ban)</font></p>
		<hr>
		<p><h3>Other ways to request help</h3><br>If in case you are unable or find it very difficult to contact us via email, we also have a group in the <b> Discord </b> application, but you can find other users and even get help instantly.<br><br><a href="<?php echo $Holo['discordinvl']; ?>" target="_blank" class="btn btn-primary">Join in our Discord Group</a></p>
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