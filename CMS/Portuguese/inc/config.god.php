<?php class Conexion {
	
public function MySQL() {
	
		$mysqld = array (
			'host'  =>  'localhost',
			'user'  =>  'root',
			'pass'  =>  'YOUR DATABASE PASSWORD',
			'db'    =>  'YOUR DATABASE NAME'
			);

		mysql_connect($mysqld['host'], $mysqld['user'], $mysqld['pass']) or die(mysql_error());
		mysql_select_db($mysqld['db']) or die(mysql_error());
	}
}

Conexion::MySQL();

$Holo = array(
	'ip'           =>     '127.0.0.1',
	'url'          =>     'http://localhost',
	'client_url'   =>     'http://localhost/hotel',
	'panel'        =>     'housekeeping',
	'name'         =>     'Habbo',
    'mision'       =>     'HenCMS a Melhor.',
    'monedas'      =>     '1000',
	'minrank'      =>     '6',
	'maxrank'      =>     '10',
	'minhkr'       =>     '7',
	'gender'       =>     'M',
	'look'         =>     'hr-115-42.hd-195-19.ch-3030-82.lg-275-1408.fa-1201.ca-1804-64',
	'contactemail' =>     'YOUR E-MAIL HERE',
	'facebook'     =>     '',
	'twitter'      =>     '',
	'discordinvl'  =>     '', #URL do Convite para o Grupo do Discord
	'discordwid'   =>     '494878296010391553', #ID do Widget do Discord
	'cameraurl'    =>     'http://localhost/camera/',
	'thumbsurl'    =>     'http://localhost/camera/thumbnails/',
	'avatar'       =>     'https://habbo.com.br/habbo-imaging/avatarimage?figure=',
	'url_badges'   =>     'http://localhost/c_images/album1584/',
	'recaptcha'    =>     '6Lf6ZZUUAAAAACUAysW1Q-ggfDqfn9-Bd68ISEbi');
	
?>