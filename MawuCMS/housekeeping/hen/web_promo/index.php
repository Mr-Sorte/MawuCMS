<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/inc/core.god.php');
if(Loged == TRUE && UserH == TRUE) {
if($myrow['rank'] >= $Holo['minhkr']) {
?>
<html lang="fr-FR" >
<head>
    <meta charset="utf-8"/>

    <title><?php echo $Holo['name']; ?> - Administration</title>
	<link rel="icon" type="image/png" href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/images/favicon.ico" />
    <meta name="description" content="Panel administrateur <?php echo $Holo['name']; ?> Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<?php

$imghotellink = $Holo['url'];
$imghklink = $Holo['panel'];

echo "Le chargement de toutes les images peut être long...<br> <i>Vide le cache de ton navigateur si des images ne s'affiche pas.</i><br><br>";

foreach (glob("*.png") as $imgfilename) {
    echo "<img src='$imghotellink/$imghklink/hen/web_promo/$imgfilename' alt=''>";
}

} else {
	echo "Acces interdit. Tu n'es pas staff.";
}

} else {
	echo 'Acces interdit. Merci de te connecter.';
}
?>
