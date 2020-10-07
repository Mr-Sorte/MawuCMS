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
                        

<div class="row">
    <div class="col-xl-12" id="editNews">
        <div class="kt-portlet">
		
                <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-rectangular"></i>
                    </span>

                    <h3 class="kt-portlet__head-title">Gerenciar notícias</h3>
                </div>
                </div>

                <div class="kt-portlet__body">

	<?php
	$do = $_GET['do'];
	$key = $_GET['key'];
	if($do == "dele"){
		$check = mysql_query("SELECT id FROM cms_news WHERE id = '". $key ."' LIMIT 1");
		if(mysql_num_rows($check) > 0){
			mysql_query("DELETE FROM cms_news WHERE id = '". $key ."' LIMIT 1");
			mysql_query("INSERT INTO cms_hklogs SET type = 'Notícias', note = 'Apagou uma notícia', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
			echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Parabéns! Você apagou uma notícia com sucesso! Aguarde.</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/newsger.php">';
		} else {
			echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Alguma coisa deu errado, tente novamente.</div></div></div>';
		}
	}

	if(isset($_POST['modificar'])) // Se o botão "modificar" for pressionado, ele executará o restante do código
	{ 
		$idM = (int) mysql_real_escape_string($_POST['idM']); 
		$tituloM = mysql_real_escape_string($_POST['tituloM']);
		$texto_cortoM = mysql_real_escape_string($_POST['texto_cortoM']);
		$ImagemM = mysql_real_escape_string($_POST['topstoryM']);
		$textoM = mysql_real_escape_string($_POST['textoM']);
		$livenewsM = mysql_real_escape_string($_POST['livenewsM']);
		$active_formM = mysql_real_escape_string($_POST['active_formM']);
		$active_badgeM = mysql_real_escape_string($_POST['active_badgeM']);
		$categoryM = mysql_real_escape_string($_POST['categoryM']);
		$badgeM = mysql_real_escape_string($_POST['badgeM']);
		
		$query_modificar = mysql_query("UPDATE cms_news SET title = '".$tituloM."', image = '". $ImagemM ."' , shortstory = '".$texto_cortoM."', longstory = '". ($textoM) ."', date = '". time() . "', livenews = '".$livenewsM."', active_form = '".$active_formM."', active_badge = '".$active_badgeM."', category = '".$categoryM."', badge = '".$badgeM."' WHERE id = '".$idM."'");
		mysql_query("INSERT INTO cms_hklogs SET type = 'Notícias', note = 'Editou a notícia: $tituloM', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'"); 
	  
		if($query_modificar) 
		{ 
			echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Parabéns! Você editou uma nova notícia! Aguarde.</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/newsger.php">';
		} 
		else 
		{ 
			echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Alguma coisa deu errado, tente novamente.</div></div></div>';
		} 
	}

	if(isset($_GET['noticia'])) 
	{ 
		$id_noticia = (int) mysql_real_escape_string($_GET['noticia']); // Recebemos o ID das notícias por meio de GET
		$query_NoticiaCompleta = mysql_query("SELECT * FROM cms_news WHERE id = '".$id_noticia."' LIMIT 1"); // Nós executamos a consulta
		$columna_MostrarNoticia = mysql_fetch_assoc($query_NoticiaCompleta); 
		echo '<form action="" method="post">
		        <center><font size="4"><b>'. $myrow['username'] .'</b>, você vai editar a Notícia: <b>'. $columna_MostrarNoticia['title'] .'</b>.</font></center><hr>
                <div class="kt-portlet__body">
				    
                    <div class="form-group">
                        <label>Título:</label>
                        <input type="text" class="form-control" name="tituloM" value="'.$columna_MostrarNoticia['title'].'">
                    </div>

                    <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" class="form-control" name="texto_cortoM" value="'. $columna_MostrarNoticia['shortstory'].'">
                    </div>

                    <div class="form-group">
                        <label>Categoria:</label>
                        <select class="form-control" name="categoryM">
                        <option value="hotel" selected="">'. $Holo['name'].' Hotel</option>
                        <option value="sistema">Sistema</option>
                        <option value="promocao">Promoções</option>
                        <option value="gratis">Coisas grátis</option>
                        <option value="mobis">Mobís</option>
                        </select>
						<span class="form-text text-muted">Selecione a categoria que esta notícia se encaixa</span>
                    </div>
					
					<div class="form-group">
                        <label>AO-VIVO:</label>
						<select class="form-control" name="livenewsM">
                        <option value="0" selected="">Não</option>
                        <option value="1">Sim</option>
                        </select>
						<span class="form-text text-muted">Ative/Desative a marcação de AO-VIVO na notícia</span>
                    </div>
					
					<div class="form-group">
                        <label>Formulário:</label>
						<select class="form-control" name="active_formM">
                        <option value="0" selected="">Conteúdo sem formulário</option>
                        <option value="1">Mostrar formulário no conteúdo</option>
                        </select>
						<span class="form-text text-muted">Ative/Desative o formulário na notícia</span>
                    </div>
					
					<div class="form-group">
                        <label>Emblema:</label>
						<input type="text" class="form-control" name="badgeM" value="'. $columna_MostrarNoticia['badge'] .'">
						<span class="form-text text-muted"><b>Por favor</b> coloque apenas o código do emblema</span>
						<br>
                        <select class="form-control" name="active_badgeM">
                        <option value="0" selected="">Ocultar emblema</option>
                        <option value="1">Mostrar emblema</option>
                        </select>
						<span class="form-text text-muted">Caso tenha emblema nesta notícia, selecione aqui a opção Mostrar emblema.</span>
                    </div>

                    <div class="form-group">
                        <label>Imagem:</label>
                        <input type="text" class="form-control" name="topstoryM" value="'. $columna_MostrarNoticia['image'] .'">
                    </div>

                    <div class="form-group">
                        <label>Conteúdo:</label>
                        <textarea name="textoM">'. $columna_MostrarNoticia['longstory'] .'</textarea>
						<script>CKEDITOR.replace( "textoM" );</script>
                    </div>
					
					<div class="form-group">
                        <label>Autor:</label>
                        <input type="text" class="form-control" value="'. $columna_MostrarNoticia['author'] .'" disabled>
						<span class="form-text text-muted">Não é possível modificar o autor deste conteúdo.</span>
                    </div>
					
                </div>
				
                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                            Ação:
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <input type="hidden" name="newsId" value="'.$columna_MostrarNoticia['id'].'">
							<input type="hidden" name="idM" value="'.$columna_MostrarNoticia['id'].'" />
                            <input class="btn waves-effect waves-light" type="button" value="Cancelar" name="Back2" onclick="history.back()" />
			<input class="btn waves-effect waves-light" type="submit" name="modificar" value="Modificar" />
                        </div>
                    </div>
                </div>
		</form>'; 
	} else {  
	$noticias = mysql_query("SELECT * FROM cms_news ORDER BY id DESC");
	while($columnas = mysql_fetch_assoc($noticias)) {
	?>    

<table class="striped centered" style="width: 100%;">
        <thead>
          <tr>
              <th data-field="id">ID:</th>
              <th data-field="title">Título:</th>
              <th data-field="author">Autor:</th>
              <th data-field="date">Data:</th>
			  <th data-field="see">Visualizar:</th>
			  <th data-field="edit">Editar:</th>
			  <th data-field="delete">Apagar:</th>
          </tr>
        </thead>

        <tbody>	<?php
	$noticias = mysql_query("SELECT * FROM cms_news ORDER BY id DESC");
	while($noticia = mysql_fetch_assoc($noticias)) {
	?>
          <tr>
            <td><b><?php echo $noticia['id']; ?></b></td>
            <td><?php echo mysql_real_escape_string(mb_strimwidth($noticia['title'], 0, 33, "...")); ?></td>
            <td><a href="/home/<?php echo $noticia['author']; ?>" target="_blank"><?php echo $noticia['author']; ?></a></td>
            <td><?php echo date('d/m/Y', $noticia['date']); ?></td>
			<td><a href="/news/<?php echo $noticia['id']; ?>" target="_blank" class="flaticon-eye"> Visualizar</a></td>
			<td><a href="newsger.php?noticia=<?php echo $noticia['id']; ?>&key=<?php echo $noticia['id']; ?>" class="flaticon-edit-1"> Editar</a></td>
			<td><a href="newsger.php?do=dele&key=<?php echo $noticia['id']; ?>" class="flaticon-delete"> Apagar</a></td>
          </tr>
	<?php } ?>
        </tbody>
</table>

<?php } } ?> 
					
                </div>

        </div>
    </div>
</div>

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