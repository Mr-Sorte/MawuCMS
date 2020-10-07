<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

if(UserH == true) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."/home.php");
	exit;
}

if(mysql_num_rows($chb) > 0) {
    header("Location: " . $Holo['url'] . "/banned");
	exit;
}
?>
<?php if(Loged == TRUE) {
if($myrow['rank'] < $Holo['minhkr']) {
    header("Location: " . $Holo['url'] ."/error");
	exit;
}
} ?>
<!DOCTYPE html>
<html lang="pt" >
<head>
    <meta charset="utf-8"/>

    <title>Painel <?php echo $Holo['name']; ?> </title>
	<link rel="icon" type="image/png" href="/hen/admin/images/favicon.ico" />
    <meta name="description" content="Painel de Controle do <?php echo $Holo['name']; ?> Hotel">
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

    <link href="/hen/admin/login/login-3.css" rel="stylesheet" type="text/css" />
    <link href="/hen/admin/vendors/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/hen/admin/vendors/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body  class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading"  >
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(/hen/admin/images/bg.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Acesse o nosso Painel de Controle</h3>
                        </div>
                        <form class="kt-form" action="" method="post">
                            <?php echo $msg; ?>
                            <div class="input-group loginform">
                                <input type="text" name='HUsername' class="form-control" placeholder="Seu usuário" required>
                            </div>
                            <div class="input-group loginform">
                                <input type="password" name='HPassword' class="form-control" placeholder="Sua senha" required>
                            </div>
							<div class="input-group loginform">
                                <input type="password" name='HPasscode' class="form-control" placeholder="Seu código" required>
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-success btn-elevate kt-login__btn-primary">Entrar</button>
                            </div>
                            <div class="kt-login__account">
                                <span class="kt-login__account-msg">Acha que não deve estar aqui?</span>
                                <a href="<?php echo $Holo['url']; ?>/" id="kt_login_signup" class="kt-login__account-link">Volte para o Início</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/hen/admin/js/vendors.bundle.js" type="text/javascript"></script>
<script src="/hen/admin/js/scripts.bundle.js" type="text/javascript"></script>

</body>
</html>