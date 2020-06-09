<?php if(isset($_POST['HUsername']) && isset($_POST['HPassword']) && isset($_POST['HPasscode']))
{

$HU = $_POST['HUsername'];
$HP = $_POST['HPassword'];
$HC = $_POST['HPasscode'];

$GetuserH = mysql_query("SELECT * FROM users WHERE username = '". $HU ."' AND password = '". md5($HP) ."' AND passcode = '". md5($HC) ."'");

if(empty($HU) || empty($HP) || empty($HC))
{
    $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Não deixe campos vazios</div></div>';
}

elseif($myrow['rank'] <= $MINHKR) 
{
    $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Você não pode acessar o Painel</div></div><meta http-equiv="refresh" content="5; url=index">';
}

elseif(mysql_num_rows($GetuserH) == 0)
{
    $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Nome de usuário incorreto</div></div>';
}

else
{
	if(mysql_num_rows($GetuserH) > 0)
	{
	$_SESSION['HUsername'] = $HU;
	$_SESSION['HPassword'] = $HP;
	$_SESSION['HPasscode'] = $HC;
	mysql_query("INSERT INTO stafflogs (action, message, note, userid, timestamp) VALUES ('Housekeeping', 'Entrou no Painel de Controle', '". $myrow['rank'] ."', '". $myrow['id'] ."', '". $date_full ."')");
	}
}
}

if(isset($_SESSION['HUsername']) && isset($_SESSION['HPassword']) && isset($_SESSION['HPasscode']))
{
$HSU = $_SESSION['HUsername'];
$HSP = $_SESSION['HPassword'];
$HSC = $_SESSION['HPasscode'];

$GetUserH = mysql_query("SELECT * FROM users WHERE username = '". $HSU ."' AND password = '". md5($HSP) ."' AND passcode = '". md5($HSC) ."'");
if(mysql_num_rows($GetUserH) > 0)
{
   $myrow = mysql_fetch_assoc($GetUserH);
   define("UserH", true);
}
} else {
   define("UserH", false);
}
?>