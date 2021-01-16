 <?php if(isset($myrow)) { ?>
<style>
body {
 background-image: url(<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/images/bg.jpg);
 background-color: #cccccc;
}
</style>
			<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed "  data-ktheader-minimize="on" >
               <div class="kt-container  kt-container--fluid ">
                  <div class="kt-header__brand " id="kt_header_brand">Administration</div>
                  <div class="kt-header__topbar">
                     <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                           <span class="kt-header__topbar-welcome kt-visible-desktop">Salut,</span>
                           <span class="kt-header__topbar-username kt-visible-desktop"><?php echo $myrow['username']; ?></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                           <div class="kt-notification">
                              <div class="kt-notification__custom kt-space-between">
                                 <a href="/me" class="btn btn-label btn-label-brand btn-sm btn-bold">Retour sur le site</a>
								 <a href="/hotel" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Entrer dans l'hotel</a>
                                 <a href="/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">Deconnexion</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
 <?PHP } else { 
    header("Location: /");
    exit; 
              } ?>