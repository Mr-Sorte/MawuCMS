<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");
require_once("../inc/plugins/vendor/autoload.php");


if(Loged == TRUE) {
if($myrow['rank'] >= $Holo['hkr_owner']) {



?>
<!DOCTYPE html>
<html lang="fr-FR" >
<head>
    <meta charset="utf-8"/>

    <title><?php echo $Holo['name']; ?> - Owner passe create</title>
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

			
            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
               <div class="kt-container  kt-grid kt-grid--ver">
                  <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                  <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                  </div>
                  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                     <div class="kt-container  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
                      
<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
           <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon-customer"></i>
              </span>
              <h3 class="kt-portlet__head-title">Générer mon premier passe staff (owner)</h3>
           </div>
        </div>
		
<div class="kt-portlet">

<?php				  
if(isset($_POST['staffname']) && isset($_POST['staffmail']))
{
	if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {	
    $staffname = filtro($_POST['staffname']);
    $staffmail = filtro($_POST['staffmail']);

    $Checkuser = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". $staffname ."' AND mail = '". $staffmail ."'");
    $userrr = mysqli_fetch_assoc($Checkuser);

    if(empty($staffname) || empty($staffmail))
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Ne laissez pas les champs vides.</div></div></div>";
    }
	elseif($staffname != $userrr['username'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Le pseudo est incorrect.</div></div></div>";
    }
	elseif($userrr['rank'] < $Holo['minhkr'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Tu ne peux pas généré un passe owner pour cette utilisateur qui n'est pas encore fondateur, rank toi avant.</div></div></div>";
    }
    elseif($staffmail != $userrr['mail'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Le mail est incorrect.</div></div></div>";
    }
    else
    {
        function passegenerator($nbChar){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); 
                                        }	
	    $generatedpasse = passegenerator(15);
		$hotelreset = $Holo['name'];
		
        mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Ownerpasse', note = 'A attribué un passe owner à: ". $staffname ."', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
	    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET passcode = '". HashSecurBis($generatedpasse) ."' WHERE username = '". $staffname ."' AND mail = '". $staffmail ."'");
        // Create the Transport
        $transport = (new Swift_SmtpTransport(SMTP_HOST, SMTP_PORT))        ### SMTP HOST and PORT
          ->setUsername(SMTP_USERNAME)                                      ### SMTP MAIL
          ->setPassword(SMTP_PASSWORD)                                      ### SMTP PASS
		  ->setEncryption(SMTP_ENCRYPTION)                                  ### SMTP Encryption (null / ssl / tls)
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Ton nouveau passe staff ' . $Holo['name'] .''))
          ->setFrom([SMTP_USERNAME => "$hotelreset"])
          ->setTo(["$staffmail" => "$staffname"])
		  ->setBody(
            '<html>' .
            ' <body>' .
			'  Hey ' . $staffname . ' !<br>' .
            '  <br>Voici ton nouveau passe staff:<br><b>' . $generatedpasse . '</b><br>' .
			"  <br><i>Note le bien et supprime definitivement ce mail. Tu peux aussi le changer en te connectant sur l'administration, section Changer mon passe.</i>" .
            '  <br><br>PS: Ceci est un message automatique, merci de ne pas répondre.' .
            ' </body>' .
            '</html>',
            'text/html' // Mark the content-type as HTML
                   );

        // Send the message
        $result = $mailer->send($message);
		echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Le passe staff à etais généré ! Tu va le recevoir par mail à <b><u></u>' . $staffmail . '</b> ! Clique <a href="/housekeeping/index.php">ICI</a> pour te connecter.</div></div></div></div><meta http-equiv="refresh" content="120; url=/housekeeping/index.php">';
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
								Le nouveau passe sera généré aléatoirement. Cette page sert seulement a créer un passe pour le fondateur, qui pourra ensuite creer des passes pour les staffs en ce connectant à l'administration. <b><u>Une fois fait, sauvegarde sur ton pc et supprimer cette page (owner-passcreat.php) de ton serveur pour plus de securité.</u></b>
							</div>
						</div>
					</div>
					<div class="form-group">
                        <label>Ton pseudo:</label>
                        <input class="form-control" type="text" name="staffname" required>
                    </div>

                    <div class="form-group">
                        <label>Ton mail:</label>
                        <input class="form-control" type="text" name="staffmail" required>
                    </div>
					<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" name="dar" class="btn btn-success">Générer et envoyer</button>
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
               echo "Acces interdit - Rank toi au grade maximum avec phpMyAdmin avant d'ouvrir cette page";
	           exit;
             } } else {
                        header("Location: " . $Holo['url'] . "/");
	                    exit;
                      } ?>