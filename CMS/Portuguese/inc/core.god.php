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
					if($dias == 1) { $dias_str = 'dia'; }
					else { $dias_str = 'dias'; }
					$echo = ''.$dias.' '.$dias_str;
				}elseif($difference <= '2678399' && $difference >= '518400'){
					$semana = floor(date('d', $difference) / 7).'';
					if($semana == 1) { $semana_str = 'semana'; }
					else { $semana_str = 'semanas'; }
					$echo = ''.floor($semana).' '.$semana_str;
				}else { $echo = ''.floor(date('m', $difference)).' meses'; }
				return $echo;
			}else{ return $a; }
		}else{ return 'sem informações sobre data'; }
	}

function filtro($str) {
		$str = mysqli_real_escape_string(connect::cxn_mysqli(),$str);;
		$str = htmlspecialchars($str);
		$str = trim($str);
        $str = stripslashes($str);
		$texto = $str;
		$texto = str_replace('"','&#34;',$texto);
		$texto = str_replace("'","&#39;",$texto);
		$texto = str_replace("´","",$texto);
		$texto = str_replace("`","",$texto);
		return $str;
	}
	
function filtronosql($str) {
		$str = htmlspecialchars($str);
		$str = trim($str);
        $str = stripslashes($str);
		return $str;
	}
	
	
function HashSecur($themdp) {
	  
	  $themdp = hash('md5', $themdp);
      $themdp = hash('sha256', PASSWORD_SALT.$themdp.PASSWORD_SALT2);
	  return $themdp;
	}

function SacarIP() {
			
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $realip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $realip = $_SERVER['REMOTE_ADDR'];
    }
    return $realip;
	
}

$ip = SacarIP();

function Onlines()
{
    $on = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE online = '1'");
	$on1 = mysqli_num_rows($on);
	$ons = $on1;
	//$ons = $on1 . " no Hotel";
    return $ons;
}

function Onlinescombined()
{
    $on = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE online = '1'");
	$on1 = mysqli_num_rows($on);
	$ons = $on1 . " no Hotel";
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

if(isset($_SESSION['Username']) && isset($_SESSION['Password']))
{
	$Sesion = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($_SESSION['Username']) ."' AND password = '". HashSecur($_SESSION['Password']) ."'");

	if(mysqli_num_rows($Sesion) > 0)
	{
		$myrow = mysqli_fetch_assoc($Sesion);
		define("Loged", TRUE);
	} else {
	define("Loged", FALSE);
	session_destroy();	
	}
}
else
{
	define("Loged", FALSE);

}
if(Loged == TRUE)
{
$chb = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM bans WHERE user_id = '". $myrow['id'] ."' OR machine_id = '". $myrow['machine_id'] ."' OR ip = '". $myrow['ip_current'] ."'");
} else {
$chb = "0";
}

$mantenimiento = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_mantenimiento");
$mantenimientoo = mysqli_fetch_assoc($mantenimiento);
$mant = $mantenimientoo['mantenimiento'];
define("MANTENIMIENTO", $mant);
?>