<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

if(UserH == TRUE) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."/home.php");
	exit;
}

if(Loged == TRUE) {
if($myrow['rank'] >= $Holo['minhkr']) {


?>

<!DOCTYPE html>
<html lang="fr-FR" >
<head>
    <meta charset="utf-8"/>

    <title><?php echo $Holo['name']; ?> - Administration</title>
	<link rel="icon" type="image/png" href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/images/favicon.ico" />
    <meta name="description" content="Panel administrateur <?php echo $Holo['name']; ?> Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Asap+Condensed:500"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/login/login-3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body  class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading"  >
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/images/bg2.jpg); color: #FFFFFF !important;">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3><center>Administration</center></h3>
                        </div>
                        <form class="kt-form" action="" method="post">
						<p>Pour éviter le phishing, vérifie que tu es bien sur le site :<br></p>
						<p class="alert alert-secondary"><img src="<?php echo $Holo['url']; ?>/Mawu/image/securlink.png">&ensp;<?php echo $Holo['url']; ?></a></p>
                            <?php echo $msg; ?>
                            <div class="input-group loginform">
                                <input type="text" name='HUsername' class="form-control" placeholder="Ton mail" required>
                            </div>
                            <div class="input-group loginform">
                                <input type="password" name='HPassword' class="form-control" placeholder="Ton mot de passe" required>
                            </div>
							    <input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-success btn-elevate kt-login__btn-primary">Entrer</button>
                            </div>
                            <div class="kt-login__account">
                                <span>Contact un manager sur Discord si tu n'as pas de passe ou que tu la oublié.</span><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/scripts.bundle.js" type="text/javascript"></script>

</body>
</html>
<?PHP } else { 
               header("Location: " . $Holo['url'] . "/");
	           exit;
             } } else {
                        header("Location: " . $Holo['url'] . "");
	                    exit;
                      } ?>