<?php 
session_start();

define("DR", $_SERVER['DOCUMENT_ROOT']);
ini_set('display_errors', 0);

if(file_exists(DR .'/inc/config.god.php')) {
    require_once(DR .'/inc/config.god.php');
} else { 
    require_once('config.god.php');
}

$H = date('H');
$i = date('i');
$s = date('s');
$m = date('m');
$d = date('d');
$Y = date('Y');
$j = date('j');
$n = date('n');
$today = $d;
$month = $m;
$year = $Y;
$getmoney_date = date('d/m/Y',mktime($m,$d,$Y));
$birthday_date = date('d/m', mktime($m,$d));
$date_normal = date('d/m/Y',mktime($m,$d,$Y));
$date_full = date('d/m/Y - H:i:s',mktime($H,$i,$s,$m,$d,$Y));

function GetLast($a){
		if(!empty($a) || !$a == ''){
			if(is_numeric($a)){
				$date = $a;
				$date_now = time();
				$difference = $date_now - $date;
				if($difference <= '59'){ $echo = ''. $difference .' segundos'; }
				elseif($difference <= '3599' && $difference >= '60'){ 
					$minutos = date('i', $difference);
					if($minutos[0] == 0) { $minutos = $minutos[1]; }
					if($minutos == 1) { $minutos_str = 'minuto'; }
					else { $minutos_str = 'minutos'; }
					$echo = ''.$minutos.' '.$minutos_str;
				}elseif($difference <= '86399' && $difference >= '3600') {
				    $horas = floor(date('H', $difference));
					if($horas == 1) { $horas_str = 'hora'; }
					else { $horas_str = 'horas'; }
					$echo = ''.$horas.' '.$horas_str;
				}elseif($difference <= '518399' && $difference >= '86400'){
					$dias = floor(date('d', $difference));
					if($dias == 1) { $dias_str = 'd&iacute;a'; }
					else { $dias_str = 'd&iacute;as'; }
					$echo = ''.$dias.' '.$dias_str;
				}elseif($difference <= '2678399' && $difference >= '518400'){
					$semana = floor(date('d', $difference) / 7).'<!-- WTF -->';
					if($semana == 1) { $semana_str = 'semana'; }
					else { $semana_str = 'semanas'; }
					$echo = ''.floor($semana).' '.$semana_str;
				}else { $echo = ''.floor(date('m', $difference)).' meses'; }
				return $echo;
			}else{ return $a; }
		}else{ return 'Sem informações sobre data.'; }
	}

function filtro($str) {
		$str = mysql_real_escape_string(htmlspecialchars(trim($str)));;
		$texto = $str;
		$texto = str_replace("INSERT","IN-SER-T",$texto);
		$texto = str_replace("DELETE","DE-LE-TE",$texto);
		$texto = str_replace("TRUNCATE","TRUN-CA-TE",$texto);
		$texto = str_replace("SELECT","SE-LEC-T",$texto);
		$texto = str_replace("ALTER","AL-TER",$texto);
		$texto = str_replace("UPDATE","UP-DA-TE",$texto);
		$texto = str_replace("inert","IN-SER-T",$texto);
		$texto = str_replace("delete","DE-LE-TE",$texto);
		$texto = str_replace("truncate","TRUN-CA-TE",$texto);
		$texto = str_replace("select","SE-LEC-T",$texto);
		$texto = str_replace("alter","AL-TER",$texto);
		$texto = str_replace("update","UP-DA-TE",$texto);
		$texto = str_replace("script","",$texto);
		$texto = str_replace("SCRIPT","",$texto);
		$texto = str_replace('"','&#34;',$texto);
		$texto = str_replace("'","&#39;",$texto);
		$texto = str_replace("<","&#60;",$texto);
		$texto = str_replace(">","&#62;",$texto);
		$texto = str_replace("(","",$texto);
		$texto = str_replace(")","",$texto);
		$texto = str_replace("´","",$texto);
		$texto = str_replace("`","",$texto);
		$texto = str_replace("ㅤ","",$texto);
		return $str;
	}

function SacarIP() {
	if($_SERVER) {
		if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
		$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif ($_SERVER["HTTP_CLIENT_IP"]) {
		$realip = $_SERVER["HTTP_CLIENT_IP"];
		} else {
		$realip = $_SERVER["REMOTE_ADDR"];
		}
	} else {
				if(getenv("HTTP_X_FORWARDED_FOR")) {
					$realip = getenv("HTTP_X_FORWARDED_FOR");
				} elseif(getenv("HTTP_CLIENT_IP")) {
					$realip = getenv("HTTP_CLIENT_IP");
				} else {
					$realip = getenv("REMOTE_ADDR");
				}
			}
	return $realip;
}

$ip = SacarIP();

function Onlines()
{
    $on = mysql_query("SELECT * FROM users WHERE online = '1'");
	$on1 = mysql_num_rows($on);
	$ons = $on1;
    return $ons;
}

function IsEven($intNumber)
{
	if($intNumber % 2 == 0){
		return true;
	} else {
		return false;
	}
}

function OnlineStatusHotel()
{
$host = "127.0.0.1";
$port = 30000;

$waitTimeoutInSeconds = 0;

if($fp = @fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)) {

    echo("");

    fclose($fp);

} else {

    echo("<meta http-equiv='refresh' content='60'>");
    die("<link rel='stylesheet' href='/css/client.css'><div id='client'><habbo-client-error><div class='client-error__background-frank'><div class='client-error__text-contents'><h1 class='client-error__title'>Frank está dormindo</h1><p>Parece que o nosso gerente tirou um tempinho para cochilar, aliás todos merecem descansar um pouco, não concorda com a gente?<br><br>Volte em breve, talvez ele já tenha acordado!</p></div></div></habbo-client-error></div>");
	}
}

if(isset($_SESSION['Username']) && isset($_SESSION['Password']))
{
	$Sesion = mysql_query("SELECT * FROM users WHERE username = '". $_SESSION['Username'] ."' AND password = '". md5($_SESSION['Password']) ."'");

	if(mysql_num_rows($Sesion) > 0)
	{
		$myrow = mysql_fetch_assoc($Sesion);
		define("Loged", TRUE);
	}
}
else
{
	define("Loged", FALSE);
}

$chb = mysql_query("SELECT * FROM bans WHERE user_id = '". $myrow['id'] ."' OR machine_id = '". $myrow['machine_id'] ."'");

$mantenimiento = mysql_query("SELECT * FROM cms_mantenimiento");
$mantenimientoo = mysql_fetch_assoc($mantenimiento);
$mant = $mantenimientoo['mantenimiento'];
define("MANTENIMIENTO", $mant);
?>