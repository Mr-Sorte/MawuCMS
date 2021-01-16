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
			<h3 class="kt-portlet__head-title">Logs des erreurs
				<small>Si tu constate un problème sur l'hôtel ou qu'un joueur s'en plaint, vérifie ces logs. Si tu penses avoir trouvé le log lié à l'erreur, merci de me le montrer, cela pourrai beaucoup m'aider ! :p -Skorp</small>
			</h3>
		</div>
	</div>
		<div class="kt-portlet__body kt-portlet__body--fit">
			<!--begin: Datatable -->
			<div class="kt_datatable kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
				<table class="kt-datatable__table" style="display: block;">
					<thead class="kt-datatable__head">
						<tr class="kt-datatable__row" style="left: 0px;">
								<th data-field="hire_date" class="kt-datatable__cell kt-datatable__cell--sort">
									<span style="width: 110px;">ID</span>
								</th>
								<th data-field="name" class="kt-datatable__cell kt-datatable__cell--sort">
									<span style="width: 110px;">Date</span>
								</th>
								<th data-field="hire_date" class="kt-datatable__cell kt-datatable__cell--sort">
									<span style="width: 110px;">Version</span>
								</th>

								<th data-field="type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
									<span style="width: 500px;">Pile</span>
								</th>
							</tr>
						</thead>
						
<?php $emulatorlogs = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM emulator_errors ORDER BY id DESC LIMIT 550");
while($emulatorlog = mysqli_fetch_array($emulatorlogs)){
?>	
						<tbody class="kt-datatable__body" style="">
							<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
									<td data-field="hire_date" aria-label="3/18/2018" class="kt-datatable__cell">
										<span style="width: 110px;"><?php echo $emulatorlog['id']; ?></span>
									</td>
									<td data-field="name" aria-label="null" class="kt-datatable__cell">
										<span style="width: 110px;">le <?php echo date('d/m/Y', $emulatorlog['timestamp']); ?> <br>à <?php echo date('H:i:s', $emulatorlog['timestamp']); ?></span>
									</td>
									<td data-field="hire_date" aria-label="3/18/2018" class="kt-datatable__cell">
										<span style="width: 110px;"><?php echo $emulatorlog['version']; ?></span>
									</td>
									<td data-field="type" data-autohide-disabled="false" aria-label="2" class="kt-datatable__cell">
										<span style="width: 500px;"><button onclick="myFunction()">Copier l'erreur</button> 
											<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;
											<input type="text" class="kt-font-bold kt-font-primary" id="myInput" value="<?php echo $emulatorlog['stacktrace']; ?>" />
										</span>
									</td>
								</tr>
						</tbody>
<?php } ?>
						
						</table>
						</div>
						<!--end: Datatable -->
					</div>
				</div>
				
                  </div>
               </div>
            </div>
			
            <div class="kt-footer kt-grid__item" id="kt_footer" kt-hidden-height="65" style="">
               <div class="kt-container ">
				  <div class="kt-footer__wrapper">Xobbaz &copy; 2020. Tous droits réservés.<br>Powered by Arcturus Emulator.</div>
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
               header("Location: " . $Holo['url'] . "/");
	           exit;
             } } else {
                        header("Location: " . $Holo['url'] . "/");
	                    exit;
                      } ?>