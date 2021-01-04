<?php class connect {
	
public static function cxn_mysqli() {
	
		$mysqld = array (
			'host'  =>  '',
			'user'  =>  '',
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
      
      define('PASSWORD_SALT', '03Wvr3ab4yQI9o3oHK9i1NziG80YO13hEQic0e72gV6FQvRW9q');
      define('PASSWORD_SALT2', '3ffMz4pVhda0EW83Xsxx0I8liYW9nCyO7n82Tu2VMOL6s2C413');
	  define('SSO_SALT', 'B2sRT8T10j4VE984sUSis2di3HuqZi');
	  define('SSO_SALT2', 'o39XkY1JEOi5lKdyRXr916z38gh5IO');

$Holo = array(
	'ip'                     =>     '127.0.0.1',
	'url'                    =>     'http://localhost',
	'debut_auto_dark'        =>     '20',
	'fin_auto_dark'          =>     '6',
	'client_url'             =>     'http://localhost/hotel',
	'panel'                  =>     'housekeeping',
	'name'                   =>     'Mawu',
	'hotelvers'              =>     Onlinescombined(),
    'mision'                 =>     'Bem vind@.',
    'monedas'                =>     '1000',
	'minrank'                =>     '5',
	'maxrank'                =>     '10',
	'minhkr'                 =>     '5',
	'gender'                 =>     'M',
	'look'                   =>     'ch-215-82.hr-100-42.lg-270-1408.ha-1003-64.hd-180-1370',
	'contactemail'           =>     '',
	'facebook'               =>     '',
	'twitter'                =>     '',
	'discordinvl'            =>     '',
	'discordwid'             =>     '',
	'cameraurl'              =>     'http://localhost/swf/camera/',
	'thumbsurl'              =>     'http://localhost/swf/camera/thumbnails/',
	'avatar'                 =>     'https://habbo.com.br/habbo-imaging/avatarimage?figure=',
	'url_badges'             =>     'http://localhost/swf/c_images/album1584/',
	'recaptcha'              =>     '');
	
?>