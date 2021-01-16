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
                        <i class="kt-font-brand flaticon-open-box"></i>
                    </span>

                    <h3 class="kt-portlet__head-title">Créer un badge</h3>
                </div>
                </div>

                <div class="kt-portlet__body">
				
                    <form id="cuadro" method="post">
                    <div class="form-group">
                        <label>Code:</label>
                        <input type="text" class="form-control" name="codigo" required>
                    </div>

                    <div class="form-group">
                        <label>Titre:</label>
                        <input type="text" class="form-control" name="titulo" required>
                    </div>
					
					<div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
					<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
					
                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <input type="hidden" name="newsId">
                            <button type="submit" name="submit1" class="btn btn-brand addNews">Créer le code et le titre</button>
                        </div>
                    </div>
                </div>
                    </form>

<?php

if(isset($_POST['submit1']))
{
$codigo = filtro($_POST['codigo']);
$titulo = filtro($_POST['titulo']);
$description = filtro($_POST['description']);

if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
if(!empty($codigo) && !empty($titulo) && !empty($description)){

$conteudo = "\nbadge_name_$codigo=$titulo";
$conteudo2 = "\nbadge_desc_$codigo=$description";
$arquivo = "../swf/gamedata/override/external_flash_override_texts.txt";

if (!$abrir = fopen($arquivo, "a")) { 
echo "<div class='alert alert-success' role='alert'><div class='alert-text'>Quelque chose de mauvais s'est produit! Parle en à Skorp !</div></div>"; 
exit; 
} 

if (!fwrite($abrir,utf8_encode($conteudo)) || !fwrite($abrir,utf8_encode($conteudo2))) { 
print "<div class='alert alert-success' role='alert'><div class='alert-text'>Quelque chose de mauvais s'est produit! Parle en à Skorp !</div></div>"; 
exit; 
} 

echo "<div class='alert alert-success' role='alert'><div class='alert-text'>Le code et le titre du badge on etais créer ! Chargement...</div></div><meta http-equiv='refresh' content='2; url=/housekeeping/badges.php'>";
mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Badge', note = 'A cree le badge: $titulo', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
} else {
echo "<div class='alert alert-danger' role='alert'><div class='alert-text'>Il y a des champs sans information, vérifie tout et réessaye.</div></div>";
}
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Jeton de sécurité invalide.</div>";
}
}
?>
<div class="kt-portlet__foot"></div>

<form method="post" enctype="multipart/form-data">

                <div class="form-group">
				<label>Héberger l'image d'un badge:</label><br>
                    <input type="file" name="arquivo[]" required />
					<span class="form-text text-muted">Le nom de l'image du badge doit etre la meme que le code créer ! Exemple: ADM.gif pour le code ADM.</span>
                </div>
				<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">

                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <input type="hidden" name="newsId">
                            <button type="submit" name="submit" class="btn btn-brand addNews">Heberger l'image du badge</button>
                        </div>
                    </div>
                </div>
</form>

<?php
if(isset($_POST['submit']))
{
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
$numeroCampos = 5;
$tamanhoMaximo = 1000000;
$extensoes = array(".gif");
$caminho = "../swf/c_images/album1584/";
$substituir = false;
 
for ($i = 0; $i < $numeroCampos; $i++) {
 
	$nomeArquivo = $_FILES["arquivo"]["name"][$i];
	$tamanhoArquivo = $_FILES["arquivo"]["size"][$i];
	$nomeTemporario = $_FILES["arquivo"]["tmp_name"][$i];
 
	if (!empty($nomeArquivo)) {
 
		$erro = false;
 
		if ($tamanhoArquivo > $tamanhoMaximo) {
			$erro = "<div class='alert alert-danger' role='alert'><div class='alert-text'>Le badge ne peut pas dépasser la taille de " . $tamanhoMaximo. " octets.</div></div>";
		} 
		
		elseif (!in_array(strrchr($nomeArquivo, "."), $extensoes)) {
			$erro = "<div class='alert alert-danger' role='alert'><div class='alert-text'>Le type / l'extension du badge n'est pas autorisé! Utiliser seulement un <b>.gif</b>.</div></div>";
		} 

		elseif (file_exists($caminho . $nomeArquivo) and !$substituir) {
			$erro = "<div class='alert alert-danger' role='alert'><div class='alert-text'>Le badge " . $nomeArquivo . " existe deja.</div></div>";
		}
 
		if (!$erro) {
			move_uploaded_file($nomeTemporario, ($caminho . $nomeArquivo));
			echo "<div class='alert alert-success' role='alert'><div class='alert-text'>Tu a envoyer le badge ".$nomeArquivo." avec succes! Chargement...</div></div><meta http-equiv='refresh' content='2; url=/housekeeping/badges.php'>";
			mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Badge', note = 'A ajouter le badge: $nomeArquivo', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
		} 

		else {
			echo $erro . "<br />";
		}
	}
}
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Jeton de sécurité invalide.</div>";
}
}
?>
			
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