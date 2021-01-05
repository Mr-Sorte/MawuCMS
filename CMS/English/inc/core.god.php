<?php

# MawuCMS                                    
# Marco Cuel(Frontend) (https://github.com/MarcoCuel)
# Lucas Hen(Frontend/Backend) (https://github.com/Wulles)
# Yanis Skorp(Backend) (https://github.com/Itisyan)
# GPL-3.0 License

session_start();
define("DR", $_SERVER['DOCUMENT_ROOT']);
require_once(DR .'/inc/config.god.php');

class connect {
public static function cxn_mysqli() {

$mysqld = array (

	'host'  =>  'localhost',
	'user'  =>  'root',
	'pass'  =>  '',
	'db'    =>  ''

	 );
		
		$mysqli = new mysqli($mysqld['host'],$mysqld['user'],$mysqld['pass'],$mysqld['db']);
		$mysqli->set_charset('utf8');
		
		if ($mysqli -> connect_errno) {
        require_once("mysql_error.php");
        exit();
        } else {
			return $mysqli;
		}
	}
}

connect::cxn_mysqli();

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
				if($difference <= '59'){ $echo = ''. $difference .' seconds'; }
				elseif($difference <= '3599' && $difference >= '60'){ 
					$minutos = date('i', $difference);
					if($minutos[0] == 0) { $minutos = $minutos[1]; }
					if($minutos == 1) { $minutos_str = 'minute'; }
					else { $minutos_str = 'minutes'; }
					$echo = ''.$minutos.' '.$minutos_str;
				}elseif($difference <= '86399' && $difference >= '3600') {
				    $horas = floor(date('H', $difference));
					if($horas == 1) { $horas_str = 'hour'; }
					else { $horas_str = 'hours'; }
					$echo = ''.$horas.' '.$horas_str;
				}elseif($difference <= '518399' && $difference >= '86400'){
					$dias = floor(date('d', $difference));
					if($dias == 1) { $dias_str = 'day'; }
					else { $dias_str = 'days'; }
					$echo = ''.$dias.' '.$dias_str;
				}elseif($difference <= '2678399' && $difference >= '518400'){
					$semana = floor(date('d', $difference) / 7).'';
					if($semana == 1) { $semana_str = 'week'; }
					else { $semana_str = 'weeks'; }
					$echo = ''.floor($semana).' '.$semana_str;
				}else { $echo = ''.floor(date('m', $difference)).' months'; }
				return $echo;
			}else{ return $a; }
		}else{ return 'no data information'; }
	}

function filtro($str) { # Filtre strict. Filtre quotes, balises html, espaces et antislash
		$str1 = mysqli_real_escape_string(connect::cxn_mysqli(),$str);;
		$str2 = htmlspecialchars($str1);
		$str3 = trim($str2);
        $str4 = stripslashes($str3);
		return $str4;
	}
	
function filtrolow($str) { # Filtre leger. Filtre quotes et balises html
		$str1 = mysqli_real_escape_string(connect::cxn_mysqli(),$str);;
		$str2 = htmlspecialchars($str1);
		return $str2;
	}
	
function filtronosql($str) { # Filtre pour affichage html seulement. Filtre balises html et antislash
		$str1 = htmlspecialchars($str);
        $str2 = stripslashes($str1);
		return $str2;
	}
	
function HashSecur($themdp) {
	  
	  $themdp1 = hash('whirlpool', $themdp);
      $themdp2 = hash('sha256', PASSWORD_SALT.$themdp1.PASSWORD_SALT2);
	  return $themdp2;
	}
	
function HashSecurBis($thestaffpass) {
	  
	  $thestaffpass1 = hash('whirlpool', $thestaffpass);
      $thestaffpass2 = hash('sha512', PASSSTAFF_SALT.$thestaffpass1.PASSSTAFF_SALT2);
	  return $thestaffpass2;
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
    return $ons;
}

function Onlinescombined()
{
    $on = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE online = '1'");
	$on1 = mysqli_num_rows($on);
	$ons = $on1 . " Connectés";
    return $ons;
}

if (!isset($_SESSION['jeton'])) { # Anti-CSRF token
   $_SESSION['jeton'] = hash('sha256', bin2hex(openssl_random_pseudo_bytes(10)));
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

if(Loged == TRUE) {
   $chb = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM bans WHERE user_id = '". $myrow['id'] ."'");
   if(mysqli_num_rows($chb) > 0) {
      $chbe = mysqli_fetch_assoc($chb);
      if($chbe['ban_expire'] > time()) {
      $chbtype= "Compte";
	  $chbactive= "True";
	  require_once("banned.php");
      exit();
      } else {
      $chbactive= "False";
      }


   } else {
	  $chbactive= "False";
   }
} else {
   $chb = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM bans WHERE ip = '". $ip ."' AND type = 'ip'");
   if(mysqli_num_rows($chb) > 0) {
      $chbe = mysqli_fetch_assoc($chb);
      if($chbe['ban_expire'] > time()) {
      $chbtype= "IP";
	  $chbactive= "True";
	  require_once("banned.php");
      exit();
      } else {
      $chbactive= "False";
      }

   } else {
	  $chbactive= "False";
   }
}

$mantenimiento = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_mantenimiento");
$mantenimientoo = mysqli_fetch_assoc($mantenimiento);
$mant = $mantenimientoo['mantenimiento'];
define("MANTENIMIENTO", $mant);

?>