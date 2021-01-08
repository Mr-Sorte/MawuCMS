<?php

// Php 
date_default_timezone_set('Europe/Paris'); # Time zone
ini_set('display_errors', 0);

// Hashs
define('PASSWORD_SALT', 'ChAnGEItFoRRaNdOm');
define('PASSWORD_SALT2', '2ChAnGEItFoRRaNdOm2');
define('PASSSTAFF_SALT', '3ChAnGEItFoRRaNdOm3');
define('PASSSTAFF_SALT2', '4ChAnGEItFoRRaNdOm4');
	  
// Mail
define('SMTP_HOST', 'smtp.example.com'); # SMTP Host(Example: smtp-relay.gmail.com for google gmail)
define('SMTP_PORT', '25'); # SMTP Port
define('SMTP_ENCRYPTION', 'null'); # SMTP Encryption(null/ssl/tls)
define('SMTP_USERNAME', 'yourmail@server.com'); # SMTP Your mail
define('SMTP_PASSWORD', 'YoUrPass'); # SMTP Password
	  
// Configuration
$Holo = array(
'panel'         =>     'housekeeping',
'htmllang'      =>     '', # EN or pt-BR
'name'          =>     'Mawu',
'debut_auto_dark'        =>     '18', # Start of night mode in hours(For automatic theme user)
'fin_auto_dark'          =>     '6', # End of night mode in hours(For automatic theme user)

// Links
'url'           =>     'http://localhost',
'client_url'    =>     'http://localhost/hotel',
'cameraurl'     =>     'http://localhost/swf/camera/',
'thumbsurl'     =>     'http://localhost/swf/camera/thumbnails/',
'avatar'        =>     'http://habbo.com.br/habbo-imaging/avatarimage?figure=',
'url_badges'    =>     'http://localhost/swf/c_images/album1584/',

// Register
'mision'        =>     '',
'monedas'       =>     '1000',
'duckets'       =>     '160',
'diamants'      =>     '0',
'gender'        =>     'M',
'look'          =>     'ch-215-82.hr-100-42.lg-270-1408.ha-1003-64.hd-180-1370',

// Social
'contactemail'  =>     'contactmail@your.server',
'facebook'      =>     '',
'twitter'       =>     '',
'discordinvl'   =>     '',
'discordwid'    =>     '',

// Security
'minrank'       =>     '5',
'maxrank'       =>     '10',
'minhkr'        =>     '6',
'recaptcha_on'  =>     'true',
'recaptcha'     =>     '');

// Flash Client
$_config['client'] = array(
'host' 				 				=> '127.0.0.1',
'port' 				 				=> '30000',
'client_starting' 		 		 	=> 'Patience '.$Holo['name'].' ! Chargement en cours...',
'client_starting_revolving' 		=> "Le temps n'est qu'une illusion.\/Chargement de l'univers...\/Comment cava aujourd'hui?\/Suivez le canard jaune.\/Chargement des citations de l'humanité...",
'external_variables' 			 	=> ''.$Holo['url'].'/swf/gamedata/external_variables.txt',
'external_variables_override' 		=> ''.$Holo['url'].'/swf/gamedata/override/external_override_variables.txt',
'external_flash_texts'  			=> ''.$Holo['url'].'/swf/gamedata/external_flash_texts.txt',
'external_flash_texts_override' 	=> ''.$Holo['url'].'/swf/gamedata/override/external_flash_override_texts.txt',
'productdata' 			 			=> ''.$Holo['url'].'/swf/gamedata/productdata.txt',
'furnidata' 			 			=> ''.$Holo['url'].'/swf/gamedata/furnidata.xml',	
'external_figurepartlist' 			=> ''.$Holo['url'].'/swf/gamedata/figuredata.xml',	
'avatareditor_promohabbos' 			=> ''.$Holo['url'].'/swf/gamedata/hotlooks.xml',	
'flash_client_url' 	 				=> ''.$Holo['url'].'/swf/gordon/PRODUCTION-202006192205-424220153/',
'habbo_swf' 		 				=> 'Habbo.swf');

// Language
$Lang = array(

// Logo
'logo.tag'           =>     'BETA',

// Menu
'menu.index'         =>     'Início',
'menu.login'         =>     'Entrar',
'menu.loginbutton'   =>     'Entrar na sua Conta',
'menu.register'      =>     'Registrar',
'menu.articles'      =>     'Notícias',
'menu.gallery'       =>     'Galeria',
'menu.famous'        =>     'Famosos',
'menu.team'          =>     'Equipe',
'menu.shop'          =>     'Loja',
'menu.support'       =>     'Suporte',
'menu.hotel'         =>     'Entrar no Hotel',
'menu.myprofile'     =>     'Ver meu Perfil',
'menu.settings'      =>     'Configurações',
'menu.logout'        =>     'Desconectar',
'menu.onlines'       =>     'Onlines no Hotel',
'menu.back'          =>     'Voltar',

// Lyrics
'lyrics.1'           =>     'Crie uma conta agora mesmo.',
'lyrics.2'           =>     'O tempo é apenas uma ilusão.',
'lyrics.3'           =>     'Quando você menos esperar...',
'lyrics.4'           =>     'Chame os seus amigos.',
'lyrics.5'           =>     'Carregando mensagem divertida...',
'lyrics.6'           =>     'Já comeu pudim hoje?',
'lyrics.7'           =>     'Você quer batatas fritas?',
'lyrics.8'           =>     'O que acha que ser rico?',
'lyrics.9'           =>     'Olhe para um lado. Olhe para o outro.',
'lyrics.10'          =>     'Siga o pato amarelo.',
'lyrics.11'          =>     'Eu gosto da sua camiseta.',
'lyrics.12'          =>     'Ganhe lindos emblemas.',
'lyrics.13'          =>     'Carregando o universo de pixels.',
'lyrics.14'          =>     'Seja destaque em nosso Hotel.',
'lyrics.15'          =>     'Não é você, sou eu.',

// Index
'index.titulo'       =>     'Início',
'index.noticias'     =>     'Notícias',
'index.alertnews'    =>     '<b>Atenção!</b> Você consegue ler as nossas notícias, mas para quaisquer interações, você precisa estar conectado(a) em sua conta!',
'index.latestusers'  =>     'Recentemente chegados no '.$Holo['name'].'',
'index.aboutlastusr' =>     '<b>Curiosidade:</b> Aqui você pode conferir os últimos <b>Quinze</b> registrados no '.$Holo['name'].', será que quem você chamou está aqui?',
'index.gallery'      =>     'Galeria de Fotos',
'index.alertphotos'  =>     '<b>Psiu!</b> Quer publicar uma foto ou conferir mais fotos? Conecte em sua conta agora mesmo.',

// Login
'login.titulo'       =>     'Entrar',
'login.username'     =>     'Nome de Usuário(a):',
'login.password'     =>     'Sua Senha:',
'login.human'        =>     'Você é Humano?',
'login.confirm'      =>     'Acessar',
'login.register'     =>     'Criar uma nova Conta',
'login.forgot'       =>     'Esqueceu a sua senha?',
'login.error1'       =>     'Não deixe campos vazios.',
'login.error2'       =>     'Nome de usuário inválido.',
'login.error3'       =>     'Você não é um robô? Verifique sua identidade.',

// Forgot
'forgot.titulo'      =>     'Esqueci minha Senha',
'forgot.'       =>     '',

// Register
'register.titulo'    =>     'Criar nova Conta',
'register.yourname'  =>     'Escolha um Nome:',
'register.nameinfo'  =>     'Seu nome pode conter letras maiúsculas, minúsculas, números e caracteres especiais como _-=?!@:.,',
'register.pass'      =>     'Crie uma Senha:',
'register.repass'    =>     'Repita a sua senha:',
'register.passtext'  =>     'Utilize, pelo menos, 6 caracteres. Inclua, pelo menos, uma letra, um número e um caracter especial.',
'register.yourmail'  =>     'Seu E-mail:',
'register.mailtext'  =>     'Você vai precisar deste endereço de e-mail para realizar ações importantes no '.$Holo['name'].'. Por favor, utilize email válido.',
'register.captcha'   =>     'Você é Humano?',
'register.confirm'   =>     'Criar nova Conta',
'register.haveone1'  =>     'Já tem uma conta?',
'register.haveone2'  =>     'Entre agora',
'register.error1'    =>     'Algo deu errado, tente novamente e verifique todos os dados.',
'register.error2'    =>     'Você precisa escolher um nome.',
'register.error3'    =>     'Você precisa escolher um e-mail.',
'register.error4'    =>     'As senhas não são as mesmas, verifique e tente novamente.',
'register.error5'    =>     'Seu nome de usuário é muito curto.',
'register.error6'    =>     'Algo de errado está acontecendo com seu nome, tente outro nome.',
'register.error7'    =>     'Você não é um robô? Verifique sua identidade.',

// Me
'me.titulo'          =>     'Início',
'me.rooms'           =>     'Quartos destaques',
'me.roomby'          =>     'Criado por',
'me.roomwith'        =>     'Com',
'me.roomhave'        =>     'Tem',
'me.roomlikes'       =>     'curtidas',
'me.roomusers'       =>     'pessoas nele',
'me.roomtext'        =>     '<b>Confuso?</b> Os seis quartos com mais Curtidas vão sempre aparecer destacados aqui.',
'me.news'            =>     'Notícias',
'me.achievements'    =>     'Com mais Conquistas',
'me.respects'        =>     'Com mais Respeitos',
'me.lastphoto'       =>     'Última foto',
'me.photoby'         =>     'Foto de',
'me.seephotos'       =>     'Ver todas',
'me.achievepoints'   =>     'Pontos de Conquista.',
'me.respectreceived' =>     'Respeitos recebidos.',
'me.respectgiven'    =>     'Respeitos dados.',

// News
'news.titulo'        =>     'Notícias',
'news.categorys'     =>     'Categorias',
'news.cat1'          =>     'Promoções',
'news.cat2'          =>     'Coisas grátis',
'news.cat3'          =>     'Mobis',
'news.cat4'          =>     ''.$Holo['name'].' Hotel',
'news.cat5'          =>     'Sistema',
'news.cat6'          =>     'AO VIVO',
'news.whatis'        =>     'Que isso?...',
'news.newstext'      =>     'Aqui vai ser mostrado até <b>45</b> Últimas notícias postadas, sejam elas Promoções, Eventos ou Informativos.',
'news.winbadge'      =>     'Ganhe este Emblema',
'news.category'      =>     'Categoria',
'news.have1'         =>     'Existem',
'news.have2'         =>     'notícias nesta categoria.',

// Gallery
'gallery.titulo'     =>     'Galeria',
'gallery.desc'       =>     'Entrar no Hotel e usar a Câmera',
'gallery.whatis'     =>     'Que isso?...',
'gallery.whatdesc'   =>     'As últimas <b>45</b> fotos tiradas e publicadas dentro do Hotel, vão aparecer nesta página, inclusive ver as suas.',
'gallery.aleatorys'  =>     'Foto aleatória',
'gallery.fixed'      =>     'Essa é uma boa foto!',
'gallery.photoby'    =>     'Foto de',
'gallery.moderation' =>     'Moderação:',
'gallery.moddelete'  =>     'Deletar essa foto.',
'gallery.error1'     =>     '<b>Sucesso!</b> A foto foi apagada.',
'gallery.error2'     =>     '<b>Ei:</b> Ou essa foto não existe, ou ela já foi apagada...',
'gallery.error3'     =>     '<b>Ops!</b> O ID dessa foto não é válido.',
'gallery.error4'     =>     '<b>Ops!</b> Seu código de segurança está invalido, cuidado e tente novamente.',

// Footer
'footer.allrights'   =>     'Todos direitos reservados.',
'footer.devby'       =>     'Site desenvolvido por',
'footer.text'        =>     'Este site não está afiliada com, patrocinada por, apoiada por, ou principalmente aprovada pela Sulake Oy ou suas empresas Afiliadas, '.$Holo['name'].' pode utilizar as marcas registradas e outras propriedades intelectuais do Habbo, que estão permitidas sob a Política de Fã Sites Habbo.',
);
	
?>