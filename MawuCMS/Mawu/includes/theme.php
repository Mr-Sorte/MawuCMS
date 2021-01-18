<?php if(isset($Holo)) { ?>
<html lang="<?php echo $Holo['htmllang']; ?>">  
<?php if(Loged == FALSE) { ?>
<script>
    var themed = new Date();
    var themeh = themed.getHours();

    if(themeh > <?php echo $Holo['in_auto_dark']; ?>-1 || themeh < <?php echo $Holo['en_auto_dark']; ?>-1){
        document.write('<html data-theme="dark">');
    } else {
		document.write('<html data-theme="light">');
	};
</script>
<?php } elseif(Loged == TRUE) { 
$theusertheme = $myrow['theme'];
if($theusertheme == "auto") { ?>
<script>
    var themed = new Date();
    var themeh = themed.getHours();

    if(themeh > <?php echo $Holo['in_auto_dark']; ?>-1 || themeh < <?php echo $Holo['en_auto_dark']; ?>-1){
        document.write('<html data-theme="dark">');
    } else {
		document.write('<html data-theme="light">');
	};
</script>
<?php } else { ?>
<html data-theme="<?php echo $myrow['theme']; ?>">
<?PHP } } ?>
	    
<?PHP } else { 
    header("Location: /");
    exit; 
             } ?>
