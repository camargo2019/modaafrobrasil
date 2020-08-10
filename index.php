<?php
//Gabriel CMR - Desenvolvimentos
//Plagio e Crime

    require __DIR__.'/assets/php/autoload.php';


    $info_autoload = $db->row('SELECT * FROM logs_informacoes_site LIMIT 1');

    if($_GET['pg'] == "produtos"){
        if($_GET['pga'] == "detalhes"){
            $retorn = $db->row('SELECT * FROM logs_itens WHERE nome_url="'.$_GET['pgp'].'"');
            if($retorn){
                $info_autoload->titulo_site = $info_autoload->titulo_site." | Produto | ".$retorn->nome_item;
            }else{
                $info_autoload->titulo_site = $info_autoload->titulo_site." | Produtos ";
            }
        }elseif($_GET['pga'] == "cat"){
            $retorn = $db->row('SELECT * FROM logs_categoria WHERE nome_url="'.$_GET['pgp'].'"');
            if($retorn){
                $info_autoload->titulo_site = $info_autoload->titulo_site." | Produtos | Catégoria | ".$retorn->nome;
            }else{
                $info_autoload->titulo_site = $info_autoload->titulo_site." | Produtos ";
            }
        }else{
            $info_autoload->titulo_site = $info_autoload->titulo_site." | Produtos ";
        }
    }elseif($_GET['pg'] == "contato"){
		$info_autoload->titulo_site = $info_autoload->titulo_site." | Contato";
	}elseif($_GET['pg'] == "sobre-nos"){
		$info_autoload->titulo_site = $info_autoload->titulo_site." | Sobre Nós";
	}
    $url_atual = '//'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="<?=$base;?>">
    <meta charset="utf-8">
    <title><?=$info_autoload->titulo_site;?></title>
    <meta name="developer" content="Gabriel Camargo (@camargo.2018)">
    <meta name="author" content="Gabriel Camargo (@camargo.2018)">
    <meta http-equiv="x-ua-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?=$info_autoload->url_favicon;?>">
	<link rel="canonical" href="<?=$url_atual;?>">
	<meta name="description" content="<?=$info_autoload->description_site;?>">
	<meta name="title" content="<?=$info_autoload->titulo_site;?>">
    <meta name="keywords" content="<?=$info_autoload->keywords;?>">
	<meta property="og:title" content="<?=$info_autoload->titulo_site;?>">
	<meta property="og:description" content="<?=$info_autoload->description_site;?>">
	<meta property="og:image" content="<?=$info_autoload->url_imagem_logo;?>">
	<meta property="og:site_name" content="<?=$info_autoload->titulo_site;?>">
	<meta property="og:url" content="<?=$url_atual;?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?=$info_autoload->titulo_site;?>">
	<meta name="twitter:description" content="<?=$info_autoload->description_site;?>">
	<meta name="twitter:image" content="<?=$info_autoload->url_imagem_logo;?>">
	<meta name="twitter:site" content="<?=$info_autoload->titulo_site;?>">
	<meta name="twitter:url" content="<?=$url_atual;?>">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/main.css?<?=fileatime($base.'/assets/css/main.css');?>">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css?<?=fileatime($base.'/assets/css/style.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?=$base;?>/assets/js/gnb.js"></script>
    <script type="text/javascript">
    
    function videoPlay($videoSection, $videoWrap, $video, state, type) {
	if (!$video.length) {
		return false;
	}

	var video = $video[0];
	video.pause();

	state = state || 'play';

	switch (state) {
		case 'play':
			var startDuration = 0.8;
			var SET = {
				START: $videoSection.data('start') ? $videoSection.data('start') : 0,
				END: $videoSection.data('end') ? $videoSection.data('end') : (video && video.duration - startDuration),
				PLAYTIME: null
			}
			var dTime = video.duration;
			var eTime = ((SET.END <= 0) || (SET.START >= SET.END) || (SET.END >= dTime)) ? dTime : SET.END;

			SET.PLAYTIME = eTime - SET.START;

			$videoWrap.addClass("play");
			video.load();
			video.addEventListener('loadedmetadata',playing())

		function playing() {
			if (!video.paused) {
				video.currentTime = SET.START;
			}

			video.play();

			$video.on('timeupdate', function () {
				var cTime = this.currentTime;
				eTime = isNaN(eTime) ? video.duration : eTime;

				if (cTime >= eTime - startDuration) {
					cTime = SET.START;
				}
				if (video.currentTime >= eTime) {
					if(type == "infinite"){
						video.currentTime = SET.START;
						video.play();
					}else{
						$videoWrap.removeClass("play");
						video.pause();
					}
				}
			});

			if (video.paused) {
				return;
			};
		}
			break;
		case 'pause':
			video.pause();
			break;
		default:
	}

	}
    </script>
</head>
<body>
<?php
//Começar a Paginação

if($_GET['pg'] == "produtos"){
	if($_GET['pga'] == "cat"){
		$cat_produtos = $db->rows('SELECT * FROM logs_categoria');
		$i = 0;
		foreach($cat_produtos as $url_produtos){
			if($_GET['pgp'] == $url_produtos->nome_url){
				$i = 1;
			}
		}
		if($i >= 1){
			include __DIR__.'/assets/pg/pg.ver_cat.php';
		}else{
			include __DIR__.'/assets/pg/pg.inicio.php';
		}
	}elseif($_GET['pga'] == "detalhes"){
		$cat_produtos = $db->rows('SELECT * FROM logs_itens');
		$i = 0;
		foreach($cat_produtos as $url_produtos){
			if($_GET['pgp'] == $url_produtos->nome_url){
				$i = 1;
			}
		}
		if($i >= 1){
			include __DIR__.'/assets/pg/pg.ver_produtos.php';
		}else{
			include __DIR__.'/assets/pg/pg.inicio.php';
		}
	}else{
		include __DIR__.'/assets/pg/pg.inicio.php';
	}
}elseif($_GET['pg'] == "contato"){
    include __DIR__.'/assets/pg/pg.contato.php';
}elseif($_GET['pg'] == "sobre-nos"){
	include __DIR__.'/assets/pg/pg.sobrenos.php';
}else{
    include __DIR__.'/assets/pg/pg.inicio.php';
}

?>
</body>
</html>