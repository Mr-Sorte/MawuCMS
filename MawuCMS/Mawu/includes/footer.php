	<div style="cursor:default" class="site-footer">
		<div class="container">
			<div class="menu-rodape-container">
			    <ul id="menu-rodape" class="menu">
				<?php if(Loged == FALSE) { ?>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="<?php echo $Holo['url']; ?>/" aria-current="page"><?php echo $Lang['menu.index']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/login"><?php echo $Lang['menu.login']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/register"><?php echo $Lang['menu.register']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/articles"><?php echo $Lang['menu.articles']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/support"><?php echo $Lang['menu.support']; ?></a></li>
				<?php } ?>
				<?php if(Loged == TRUE) { ?>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="<?php echo $Holo['url']; ?>/me" aria-current="page"><?php echo $Lang['menu.index']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/articles"><?php echo $Lang['menu.articles']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/gallery"><?php echo $Lang['menu.gallery']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/famous"><?php echo $Lang['menu.famous']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/team"><?php echo $Lang['menu.team']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="/support"><?php echo $Lang['menu.support']; ?></a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item"><a href="<?php echo $Holo['client_url']; ?>"><?php echo $Lang['menu.hotel']; ?></a></li>
				<?php } ?>
			    </ul>
			</div>
			<div class="mb-3"><strong>Mawu CMS</strong> © 2020 - 2021. <?php echo $Lang['footer.allrights']; ?></div>
			<?php echo $Lang['footer.text']; ?><br><br>
			<?php echo $Lang['footer.devby']; ?> <a href="https://github.com/MarcoCuel" target="_blank"><b><font color="#FFFFFF">Marco Cuel</font></b></a>, <a href="https://github.com/Wulles" target="_blank"><b><font color="#FFFFFF">Lucas Hen</font></b></a>, <a href="https://github.com/Itisyan" target="_blank"><b><font color="#FFFFFF">Yanis Skorp</font></b></a>.
		</div>
	</div>