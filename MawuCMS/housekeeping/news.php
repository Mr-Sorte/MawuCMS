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
	<script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/ckeditor/ckeditor.js"></script>
  
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
                        <i class="kt-font-brand flaticon-list"></i>
                    </span>

                    <h3 class="kt-portlet__head-title">Créer un article</h3>
                </div>
                </div>

                <form action="" method="post">
                <div class="kt-portlet__body">
				
<?php
if(isset($_POST['añadir']))
{
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {	
    $titulo = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['titulo']);
    $texto_corto = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['texto_corto']);
	$Imagem = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['topstory']);
	$texto = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['texto']);
	$livenews = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['livenews']);
	$active_form = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['active_form']);
	$active_badge = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['active_badge']);
	$category = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['category']);
	$badge = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['badge']);
    if(!empty($titulo) && !empty($texto_corto) && !empty($Imagem) && !empty($texto))
    { 
        $query_NuevaNoticia = mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_news SET title = '".$titulo."', image = '". $Imagem ."' , shortstory = '".$texto_corto."', longstory = '". $texto ."', date = '". time() . "', livenews = '".$livenews."', author = '". $myrow['username'] ."', active_comment = '".$active_form."', active_badge = '".$active_badge."', category = '".$category."', badge = '".$badge."'");
		mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'News', note = 'A publier: $titulo', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
  
        if($query_NuevaNoticia) 
        { 
            echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Terminer ! La news a etais poster ! Chargement...</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/news.php">';
        } 
        else 
        { 
            echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Un probleme est survenu, essaie à nouveau.</div></div></div>';

        } 
    } 
    else 
    { 
        echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Il y a des champs vide, vérifie tout et réessaye.</div></div></div>';
    } 
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Jeton de sécurité invalide.</div>";
}
}

?>
				    
                    <div class="form-group">
                        <label>Titre:</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="texto_corto">
                    </div>

                    <div class="form-group">
                        <label>Catégorie:</label>
                        <select class="form-control" name="category">
                        <option value="hotel" selected=""><?php echo $Holo['name']; ?> Hotel</option>
                        <option value="sistema">Système</option>
                        <option value="promocao">Offres spéciales</option>
                        <option value="gratis">Offres gratuites</option>
                        <option value="mobis">Mobis ou rares</option>
                        </select>
						<span class="form-text text-muted">Sélectionne la catégorie qui correspond à cette actualité</span>
                    </div>
					
					<div class="form-group">
                        <label>LIVE:</label> <font color="#6319b1"><i>Bientot disponible !</i></font>
						<select disabled="" class="form-control" name="livenews">
                        <option value="0" selected="">Désactiver</option>
                        <option value="1">Activer</option>
                        </select>
						<span class="form-text text-muted">Activer/Désactiver le balisage LIVE sur cette actualité</span>
                    </div>
					
					<div class="form-group">
                        <label>Commentaires:</label>
						<select class="form-control" name="active_form">
                        <option value="0">Désactiver</option>
                        <option value="1" selected="">Activer</option>
                        </select>
						<span class="form-text text-muted">Activer/Désactiver les commentaires des joueurs sur cette actualité</span>
                    </div>
					
					<div class="form-group">
                        <label>Badge:</label>
						<input type="text" class="form-control" name="badge">
						<span class="form-text text-muted">Il suffit de mettre le code du badge</span>
						<br>
                        <select class="form-control" name="active_badge">
                        <option value="0" selected="">Cacher</option>
                        <option value="1">Montrer</option>
                        </select>
						<span class="form-text text-muted">Si tu as un badge à faire gagner ou juste à montrer, sélectionnez l'option Montrer.</span>
                    </div>

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="text" class="form-control" name="topstory">
						<span class="form-text text-muted"><a href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/web_promo/index.php" target="_blank">Clique ici</a> pour voir les images disponible sur Xobbaz. Il te suffit de copier l'url et de la coller ici. Tu peux aussi utiliser une image externe, mais attention à la source !</span>
                    </div>

                    <div class="form-group">
                        <label>Contenu:</label><br>
                        <textarea name="texto"></textarea>
						<script>CKEDITOR.replace( 'texto' );</script>
                    </div>
					
					<div class="form-group">
                        <label>Auteur:</label>
                        <input type="text" class="form-control" value="<?php echo $myrow['username']; ?>" disabled>
						<span class="form-text text-muted">Il n'est pas possible de modifier l'auteur de ce contenu.</span>
                    </div>
					
                </div>
				
                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                           Action:
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <input type="hidden" name="newsId">
							<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
                            <button type="submit" name="añadir" class="btn btn-brand addNews">Publier</button>
                            <span class="kt-margin-left-10">ou <a href="/housekeeping/home.php" class="kt-link kt-font-bold">Annuler</a></span>
                        </div>
                    </div>
                </div>
            </form>
			
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