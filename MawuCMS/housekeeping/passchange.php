<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

if(UserH == FALSE) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."");
	exit;
}

if(Loged == TRUE && UserH == TRUE) {
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

   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/select2.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/toastr.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/line-awesome.css?v=8" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/flaticon.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/flaticon2.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/fontawesome.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/style.bundle.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/css/wizard.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/jstree.bundle.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/web/user_settings.js" type="text/javascript"></script>
  
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

<?php require_once("../housekeeping/MWW/header.php"); ?>
			
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
              <i class="kt-font-brand flaticon-customer"></i>
              </span>
              <h3 class="kt-portlet__head-title">Changer mon passe staff</h3>
           </div>
        </div>
		
<div class="kt-portlet">

<?php 
if(isset($_POST['mdp']) && isset($_POST['spassACT']) && isset($_POST['spassNEW']) && isset($_POST['spassNEWC']))
{
    $mdp = filtro($_POST['mdp']);
    $spassACT = filtro($_POST['spassACT']);
    $spassNEW = filtro($_POST['spassNEW']);
	$spassNEWC = filtro($_POST['spassNEWC']);

    $Checkpass = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '". $myrow['id'] ."'");
    $passss = mysqli_fetch_assoc($Checkpass);
    
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
    if(empty($mdp) || empty($spassACT) || empty($spassNEW) || empty($spassNEWC))
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Ne laissez pas les champs vides.</div></div></div>";
    }
	elseif(HashSecur($mdp) != $passss['password'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Ton mot de passe est incorrect.</div></div></div>";
    }
    elseif($spassNEW != $spassNEWC)
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Les nouveaux passe staff ne correspondent pas.</div></div></div>";
    }
    elseif(HashSecurBis($spassACT) != $passss['passcode'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>L'ancien passe staff n'est pas correct.</div></div></div>";
    }
    elseif($mdp == $spassNEW)
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Ton passe staff doit etre different de ton mot de passe.</div></div></div>";
    }
    else
    {
        mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Passechange', note = 'A changer de passe staff', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
	    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET passcode = '". HashSecurBis($spassNEW) ."' WHERE id = '". $myrow['id'] ."' AND password = '". HashSecur($mdp) ."'");
		echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Ton passe staff a étais changer. Tu vas être déconnecté pour appliquer les changements...</div></div></div></div><meta http-equiv="refresh" content="2; url=https://www.xobbaz.fr/logout">';
    }
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Jeton de sécurité invalide.</div>";
}
}
?>

			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group form-group-last">
						<div class="alert alert-secondary" role="alert">
							<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
						  	<div class="alert-text">
								Ton passe staff est très importante pour garantir la sécurité de xobbaz ! Merci d'en choisir un different de ton mot de passe, faisant plus de 8 caractères, contenant des chiffres et des lettres (voir même des caractères spéciaux) et surtout pas facilement devinable ou utiliser ailleurs que sur xobbaz.
							</div>
						</div>
					</div>
					<div class="form-group">
                        <label>Ton mot de passe (le normal utiliser lors de la connexion):</label>
                        <input class="form-control" type="password" name="mdp" required>
                    </div>

                    <div class="form-group">
                        <label>Ton passe staff actuelle:</label>
                        <input class="form-control" type="password" name="spassACT" required>
                    </div>
					
					<div class="form-group">
                        <label>Ton nouveau passe staff:</label>
                        <input class="form-control" type="password" name="spassNEW" minlength="8" required>
                    </div>
					
					<div class="form-group">
                        <label>Confirme ton nouveau passe staff:</label>
                        <input class="form-control" type="password" name="spassNEWC" minlength="8" required>
                    </div>
					<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" name="dar" class="btn btn-success">Changer</button>
						<button type="reset" class="btn btn-secondary">Annuler</button>
					</div>
				</div>
			</form>
		</div>
</div>

			
</div></div></div>
	</div>
</div>

                  </div>
               </div>
            </div>		
<?php require_once("../housekeeping/MWW/footer.php"); ?>
			
         </div>
      </div>
	  
	  
   </div>

   <div id="kt_scrolltop" class="kt-scrolltop"><font color="#FFFFFF" size="4"><b>^</b></font></div>

   <script src="https://use.fortawesome.com/349cfdf6.js"></script>
   <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/vendors.bundle.js" type="text/javascript"></script>
   <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/scripts.bundle.js" type="text/javascript"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <script>if (window.module) module = window.module;</script>
   
</body>
</html>
<?PHP } else { 
               header("Location: " . $Holo['url'] . "/");
	           exit;
             } } else {
                        header("Location: " . $Holo['url'] . "/");
	                    exit;
                      } ?>