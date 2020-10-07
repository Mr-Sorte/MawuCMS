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
              <i class="kt-font-brand flaticon-customer"></i>
              </span>
              <h3 class="kt-portlet__head-title">Editar cargo</h3>
           </div>
        </div>
		
<div class="kt-portlet">

<?php 
$getrank = mysql_query("SELECT * FROM permissions ORDER BY id ASC");

if(isset($_POST['dar']))
{
$Rango = $_POST['rango'];
$Miembro = $_POST['miembro'];
$Fallo = false;

$Geturank = mysql_query("SELECT * FROM users WHERE username = '". $Miembro ."'");

if(empty($Rango) || empty($Miembro))
{
	echo '<div class="col s12 m12">
        <div class="card-panel red">
          <span class="white-text">
		  No dejes los campos vacíos
          </span>
        </div>
      </div>';
	$Fallo = true;
}
elseif(mysql_num_rows($Geturank) == 0)
{
	echo '<div class="col s12 m12">
        <div class="card-panel red">
          <span class="white-text">
		  El usuario que has introducido no existe
          </span>
        </div>
      </div>';
	$Fallo = true;
}
elseif($myrow['username'] == $Miembro)
{
	echo '<div class="col s12 m12">
        <div class="card-panel red">
          <span class="white-text">
		  No te puedes dar rango a ti mismo
          </span>
        </div>
      </div>';
	$Fallo = true;
}
elseif($Miembro == 'Wulles')
{
    echo '<div class="col s12 m12">
        <div class="card-panel red">
          <span class="white-text">
		  No puedes quitarle el rango
          </span>
        </div>
      </div>';
	$Fallo = true;
}
elseif($Fallo == false)
{
	mysql_query("UPDATE users SET rank = '". $Rango ."' WHERE username = '". $Miembro ."' LIMIT 1");
    mysql_query("INSERT INTO stafflogs (action, message, note, userid, timestamp) VALUES ('Housekeeping', 'Dió rango a $Miembro', '". $myrow['rank'] ."', '". $myrow['id'] ."', '". $date_full ."')");
    echo '<div class="col s12 m12">
        <div class="card-panel green">
          <span class="white-text">
		  Has dado rango a <b>'. $Miembro .'</b> éxitosamente
          </span>
        </div>
      </div>';
}
}
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
						<label>Nome de usuário:</label>
						<input type="text" name="miembro" class="form-control" placeholder="Insira um nome...">
						<span class="form-text text-muted">Coloque o nome de usuário da pessoa que você deseja mudar o Cargo.</span>
					</div>
					<div class="form-group">
						<label for="exampleSelect1">Escolha o Cargo:</label>
						<select class="form-control" name="rango">
							<?php while($rangos = mysql_fetch_assoc($getrank)) { ?>
							<option value="<?php echo $rangos['id']; ?>"><?php echo $rangos['rank_name']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" name="dar" class="btn btn-success">Pronto! Dar esse Cargo</button>
						<button type="reset" class="btn btn-secondary">Limpar</button>
					</div>
				</div>
			</form>
		</div>
</div>

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
           <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon-customer"></i>
              </span>
              <h3 class="kt-portlet__head-title">Nossos Staffs</h3>
           </div>
           <div class="kt-portlet__head-toolbar">
              <div class="kt-portlet__head-wrapper">
                 <div class="col-md-4 kt-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                       <div class="kt-form__label">
					        <form method="post" action="/housekeeping/rank.php" />
                                <button class="btn btn-secondary" type="submit" id="kt_datatable_reload">Atualizar</button>
						    </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>

	<div class="kt-portlet__body">
		<div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
<div class="row">
<div class="col-sm-12">
<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1" role="grid" style="width: 987px;">

<thead>
<tr role="row">
	<th class="sorting_asc" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 160.25px;">ID</th>
	<th class="sorting_asc" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 160.25px;">Staff</th>
	<th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 157.25px;">Cargo</th>
</tr>
</thead>
			
<tbody>	
			
<?php $ourstaffs = mysql_query("SELECT * FROM users WHERE rank > 4 ORDER BY rank DESC");
while($ourstaff = mysql_fetch_array($ourstaffs)){
$rank = mysql_fetch_assoc($rank = mysql_query("SELECT * FROM permissions WHERE id = '".$ourstaff['rank']."'"));
?>	
<tr role="row">
    <td><?php echo $ourstaff['id']; ?></td>
	<td class="sorting_1" tabindex="0">
		<div class="kt-user-card-v2">
			<div class="kt-user-card-v2__pic">
				<div class="kt-badge kt-badge--xl kt-badge--accent">
					<span><img src="<?php echo $Holo['avatar'] . $ourstaff['look']; ?> &amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=1&amp;size=m" /></span>
				</div>
			</div>
			<div class="kt-user-card-v2__details">
				<a href="/home/<?php echo $ourstaff['username']; ?>" target="_blank" class="kt-user-card-v2__name kit_link"><?php echo $ourstaff['username']; ?></a>
				<span class="kt-user-card-v2__email"><?php if($ourstaff['online'] == '1') { echo '<b>Online</b> agora mesmo.'; } else { echo '<b>Offline</b>.'; } ?></span>
			</div>
		</div>
	</td>
	<td><b><?php echo $rank['rank_name']; ?></b> - ID: <?php echo $ourstaff['rank']; ?>.</td>
</tr>
<?php } ?>
										
</tbody>
			
</table></div></div></div>
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