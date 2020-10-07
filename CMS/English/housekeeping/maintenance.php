<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

if(Loged == false) { 
    header("Location: " . $Holo['url'] ."");
	exit;
}
if(UserH == false) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."");
	exit;
}
if($myrow['rank'] < $Holo['minhkr']) {
    header("Location: " . $Holo['url'] ."");
	exit;
}
if(mysql_num_rows($chb) > 0) {
    header("Location: " . $Holo['url'] . "/banned");
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt" >
<head>
    <meta charset="utf-8"/>

    <title>Painel <?php echo $Holo['name']; ?></title>
	<link rel="icon" type="image/png" href="/hen/admin/images/favicon.ico" />
    <meta name="description" content="Painel de Controle do <?php echo $Holo['name']; ?> Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <style>
     html {overflow-y: scroll;}
     .toast {
       opacity: 1 !important;
     }

     #toast-container > div {
       opacity: 1 !important;
     }

     .modal-open{
       margin-right:0px !important;
     }
   </style>

   <link href="/hen/admin/vendors/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/select2.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/toastr.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/line-awesome.css?v=8" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/flaticon.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/flaticon2.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/fontawesome.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/style.bundle.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/css/wizard.css" rel="stylesheet" type="text/css" />
   <link href="/hen/admin/vendors/css/jstree.bundle.css" rel="stylesheet" type="text/css" />
   
    <script src="/hen/admin/js/web/user_settings.js" type="text/javascript"></script>
    <script src="/hen/admin/ckeditor/ckeditor.js"></script>
  
   <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
</head>
<body class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">

   <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__toolbar">
         <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
         <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
      </div>
   </div>

   <div class="kt-grid kt-grid--hor kt-grid--root">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
         <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed "  data-ktheader-minimize="on" >
               <div class="kt-container  kt-container--fluid ">
                  <div class="kt-header__brand " id="kt_header_brand">Painel de Controle</div>
                  <div class="kt-header__topbar">
                     <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                           <span class="kt-header__topbar-welcome kt-visible-desktop">Olá,</span>
                           <span class="kt-header__topbar-username kt-visible-desktop"><?php echo $myrow['username']; ?></span>
                           <span class="kt-header__topbar-icon kt-bg-brand kt-hidden"><b>{{player.username|slice(0,1)|upper}}</b></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                           <div class="kt-notification">
                              <div class="kt-notification__custom kt-space-between">
                                 <a href="/hotel" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Entrar no Hotel</a>
                                 <a href="/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">Desconectar</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
			
            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
               <div class="kt-container  kt-grid kt-grid--ver">
                  <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                  <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
				    <?php require_once("../housekeeping/MWW/navbar.php"); ?>
                  </div>
                  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                     <div class="kt-container  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
                      
<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
           <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon2-settings"></i>
              </span>
              <h3 class="kt-portlet__head-title">Manutenção</h3>
           </div>
        </div>
		
<?php
if(isset($_POST['motivo']))
{
$Motivo = $_POST['motivo'];

if(empty($Motivo))
{
echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Alguma coisa deu errado, tente novamente.</div></div></div></div>';
} else {
mysql_query("UPDATE cms_mantenimiento SET mantenimiento = '1', motivo = '". $Motivo ."', timestamp = '". time() ."'");
mysql_query("INSERT INTO cms_hklogs SET type = 'Manutenção', note = 'Colocou o Hotel em Manutenção', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Parabéns! Você colocou o Hotel em Manutenção! Aguarde.</div></div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/maintenance.php">';
}
}
if(isset($_POST['quitar']))
{
mysql_query("UPDATE cms_mantenimiento SET mantenimiento = '0', motivo = '', timestamp = ''");
mysql_query("INSERT INTO cms_hklogs SET type = 'Manutenção', note = 'Tirou o Hotel da Manutenção', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-warning" role="alert"><div class="alert-text">Parabéns! Você removeu uma Manutenção do Hotel! Aguarde.</div></div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/maintenance.php">';
}
?>
<?php 
$sqlputo = mysql_query("SELECT * FROM cms_mantenimiento");
$putito = mysql_fetch_assoc($sqlputo);
if($putito['mantenimiento'] == '0') {
?>
			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group form-group-last">
						<div class="alert alert-secondary" role="alert">
							<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
						  	<div class="alert-text">
								Você está em uma parte super importante de todo o Hotel, pedimos por favor que <code>tome muito cuidado</code> com o que for fazer aqui.
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Responsável pela manutenção:</label>
						<input type="text" class="form-control" disabled="disabled" value="<?php echo $myrow['username']; ?>">
					</div>
					<div class="form-group">
						<label for="exampleTextarea">Motivo da manutenção:</label>
						<textarea type="text" name="motivo" class="form-control" rows="3" required placeholder="Escreva algo..."></textarea>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-success">Pronto! Botar em Manutenção</button>
						<button type="reset" class="btn btn-secondary">Limpar</button>
					</div>
				</div>
			</form>
<?php
} else {
?>
			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group form-group-last">
						<div class="alert alert-secondary" role="alert">
							<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
						  	<div class="alert-text">
								Você está em uma parte super importante de todo o Hotel, pedimos por favor que <code>tome muito cuidado</code> com o que for fazer aqui.
							</div>
						</div>
					</div>
							<div class="kt-section kt-section--last">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-3 col-form-label">Sobre a Manutenção atual:</label>
										<div class="col-9">
											<span class="form-text text-muted">Já estamos em uma Manutenção, se você tem total consciência do que está fazendo, siga em frente e retire o Hotel de manutenção.</span>
										</div>
									</div>
									<div class="form-group row kt-margin-t-10 kt-margin-b-10">
										<label class="col-3 col-form-label"></label>
										<div class="col-9">
											<button type="submit" name="quitar" class="btn btn-outline-danger btn-sm kt-margin-t-5 kt-margin-b-5">Deseja realmente remover a Manutenção atual do Hotel ?</button>
										</div>
									</div>
								</div>
							</div>
				</div>
			</form>
<?php } ?>
		
</div>
                  </div>
               </div>
            </div>
			
            <div class="kt-footer kt-grid__item" id="kt_footer" kt-hidden-height="65" style="">
               <div class="kt-container ">
                  <div class="kt-footer__wrapper">&copy; Dabliu Servers - 2020<br />Powered by ArcturusEmulator, todos os direitos reservados.</div>
               </div>
            </div>
			
         </div>
      </div>
	  
	  
   </div>

   <div id="kt_scrolltop" class="kt-scrolltop"><font color="#FFFFFF">Subir</font></div>

   <script src="https://use.fortawesome.com/349cfdf6.js"></script>
   <script src="/hen/admin/js/vendors.bundle.js" type="text/javascript"></script>
   <script src="/hen/admin/js/scripts.bundle.js" type="text/javascript"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <script>if (window.module) module = window.module;</script>
   
</body>
</html>