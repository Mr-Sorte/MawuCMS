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
                        

<div class="row">
    <div class="col-xl-12" id="editNews">
        <div class="kt-portlet">
		
                <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon-globe"></i>
                    </span>

                    <h3 class="kt-portlet__head-title">Gestions des bans</h3>
                </div>
                </div>

        <div class="kt-portlet__body">

<?php
$do = filtro($_GET['do']);
$key = filtro($_GET['key']);
if($do == "dele"){
	if(isset($_GET['jeton']) && ($_GET['jeton'] == $_SESSION['jeton']))
{
	$check = mysqli_query(connect::cxn_mysqli(),"SELECT id FROM bans WHERE id = '". $key ."' LIMIT 1");
	if(mysqli_num_rows($check) > 0){
		mysqli_query(connect::cxn_mysqli(),"DELETE FROM bans WHERE id = '". $key ."' LIMIT 1");
		mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Deban', note = 'Deban de: $key', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'"); 
		echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Terminer ! Tu a deban un joueur ! Chargement...</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/bans.php">';
	} else {
		echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Un probleme est survenu, essaie à nouveau.</div></div></div>';
	}
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Jeton de sécurité invalide.</div>";
}
}
?>

      <table class="centered">
        <thead>
        <tr>
		  
            <th data-field="ban">ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th data-field="ban">Utilisateur:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th data-field="day">Banni le:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th data-field="expire">Expire le:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th data-field="category">Catégorie:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th data-field="banned">Staff:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th data-field="option">Action:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	    </tr>
        </thead>

<?php
$getbans = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM bans ORDER BY id DESC");
while($getb = mysqli_fetch_assoc($getbans)){
$user = mysqli_fetch_assoc($user = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$getb['user_id']."'"));
$staff = mysqli_fetch_assoc($staff = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$getb['user_staff_id']."'"));
?>
        <tbody>
          <tr>
            <td><?php echo $getb['id']; ?></td>
            <td><a href="/home/<?php echo $user['username']; ?>" target="_blank"><?php echo $user['username']; ?></font></td>
            <td><?php echo date('d/m/Y', $getb['timestamp']); ?><br><?php echo date('H:i', $getb['timestamp']); ?></td>
            <td><?php echo date('d/m/Y', $getb['ban_expire']); ?><br><?php echo date('H:i', $getb['ban_expire']); ?></td>
			<td><?php echo $getb['type']; ?></td>
			<td><?php echo $staff['username']; ?></td>
			<td><a href="bans.php?do=dele&key=<?php echo $getb['id']; ?>&jeton=<?php echo $_SESSION['jeton']; ?>" class="flaticon-delete"> Deban</a></td>
          </tr>	  
        </tbody>
<?php } ?>
	  </table>
			
        </div>
    </div>
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