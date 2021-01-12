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
define('SMTP_HOST', 'smtp.gmail.com'); # SMTP Host(Example: smtp.gmail.com for google gmail)
define('SMTP_PORT', '587'); # SMTP Port
define('SMTP_ENCRYPTION', ''); # SMTP Encryption(null/ssl/tls)
define('SMTP_USERNAME', '@gmail.com'); # SMTP Your mail
define('SMTP_PASSWORD', ''); # SMTP Password
	  
// Configuration
$Holo = array(
'panel'         =>     'housekeeping',
'htmllang'      =>     'fr-FR',
'name'          =>     'MawuCMS',
'debut_auto_dark'        =>     '21', # Start of night mode in hours(For automatic theme user)
'fin_auto_dark'          =>     '7', # End of night mode in hours(For automatic theme user)

// Links
'url'           =>     'http://localhost',
'client_url'    =>     'http://localhost/hotel',
'cameraurl'     =>     'http://localhost/WulezSWF/camera/',
'thumbsurl'     =>     'http://localhost/WulezSWF/camera/thumbnails/',
'avatar'        =>     'http://habbo.com.br/habbo-imaging/avatarimage?figure=',
'url_badges'    =>     'http://localhost/WulezSWF/c_images/album1584/',

// Register
'mision'        =>     '',
'monedas'       =>     '0',
'duckets'       =>     '0',
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
'me.yourbadges'      =>     'Alguns dos seus Emblemas',
'me.badgealert'      =>     '<b>Ei!</b> Estamos mostrando apenas <b>6</b> Emblemas, mas você tem atualmente:',
'me.smallbadges'     =>     'emblemas.',
'me.stats'           =>     'Suas estatísticas.',
'me.statsdesc'       =>     'Confira o que você possui no Hotel:.',
'me.stats1'          =>     'Moedas',
'me.stats2'          =>     'Duckets',
'me.stats3'          =>     'Diamantes',
'me.stats4'          =>     'Respeitos',
'me.stats5'          =>     'Emblemas',
'me.stats6'          =>     'Quartos',
'me.stats7'          =>     'Conquistas',

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
'gallery.timeah'     =>     'Postada há',
'gallery.visual'     =>     'Visualizações',
'gallery.roomby'     =>     'Foto tirada no quarto de',
'gallery.moreof'     =>     'Mais fotos de',

// Famous
'famous.titulo'      =>     'Famosos',
'famous.noshow'      =>     'você não vai aparecer nesta página porque você configurou sua conta para ficar <b>Oculta</b>!',
'famous.morediamonds'=>     'Com mais Diamantes',
'famous.diadesc'     =>     'Essa categoria mostra apenas as <b>Cinco</b> pessoas mais ricos de <font color="#0AA8EC">Diamantes</font> dentro do '.$Holo['name'].' Hotel.',
'famous.diamonds'    =>     'Diamantes',
'famous.moreduckets' =>     'Com mais Duckets',
'famous.duckdesc'    =>     'Essa categoria mostra apenas as <b>Cinco</b> pessoas mais ricos de <font color="#822273">Duckets</font> dentro do '.$Holo['name'].' Hotel.',
'famous.duckets'     =>     'Duckets',
'famous.morecredits' =>     'Com mais Moedas',
'famous.creditdesc'  =>     'Essa categoria mostra apenas as <b>Cinco</b> pessoas mais ricos de <font color="#FF9030">Moedas</font> dentro do '.$Holo['name'].' Hotel.',
'famous.credits'     =>     'Moedas',

// Team
'team.titulo'        =>     'Equipe',
'team.desc'          =>     'Nossos membros atuais',
'team.descinfo'      =>     'A Equipe é feita por membros a partir de Moderação até Criação geral, eles estão aqui dispostos a fazer tudo por vocês e pelo nosso Hotel.',
'team.hide1'         =>     '<b>Ei...</b> Como vimos que você é',
'team.hide2'         =>     'precisamos lhe informar que existem cargos ocultos aqui, sendo eles -',

// Maintenance
'maintenance.text1'  =>     '<b>ATENÇÃO!</b> '.$Holo['name'].' Hotel está temporariamente fechado para Manutenções, o motivo seria -',
'maintenance.text2'  =>     'Tentaremos voltar o mais rápido possível, prometemos!...',

// Banned
'banned.titulo'      =>     'Banimento',
'banned.youreban'    =>     'A sua conta está banida do '.$Holo['name'].'.',
'banned.text1'       =>     'Sua conta está banida até',
'banned.text2'       =>     'de',
'banned.text3'       =>     'pelo motivo:',
'banned.button'      =>     'Atualizar Página',

// Error
'error.titulo'       =>     'Erro',
'error.erro1'        =>     'Página não encontrada',
'error.erro2'        =>     'O link pode estar quebrado ou a página pode ter sido removida. Verifique se o link que você está tentando abrir está correto.',
'error.erro3'        =>     'Voltar a página inicial',
'error.erro4'        =>     'Voltar aonde estava',

// Footer
'footer.allrights'   =>     'Todos direitos reservados.',
'footer.devby'       =>     'Site desenvolvido por',
'footer.text'        =>     'Este site não está afiliada com, patrocinada por, apoiada por, ou principalmente aprovada pela Sulake Oy ou suas empresas Afiliadas, '.$Holo['name'].' pode utilizar as marcas registradas e outras propriedades intelectuais do Habbo, que estão permitidas sob a Política de Fã Sites Habbo.',

);
	
?>