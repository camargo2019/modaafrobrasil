<header id="header" class="header" ap-type="header" style="">
        <div class="header-inner">
            <div class="l-header"> 
                <h1 class="logo">
                <a href="<?=$base;?>/Home" class="logo-a" ap-click-area="Header" ap-click-name="Click - Header" ap-click-data="NEGRX1 Logo">
                <img src="<?=$info_autoload->url_imagem_logo;?>">
<span class="a11y">NEGRX1</span></a></h1>
            </div>
            <nav id="gnb" class="gnb" role="navigation" ap-type="gnb">
                <div class="a11y">NEGRX1 GNB</div>
                <ul id="gnb-menu" class="gnb-menu">
                <?php 
                $row = $db->rows('SELECT * FROM logs_categoria');
                foreach($row as $info_cat){
                    if($info_cat->nome_url == $_GET['pgp']){
                        $active = "is-current is-active";
                    }else{
                        $active = "";
                    }
                ?>

                        <li class="d1 <?=$active;?>" style="">
                            <a href="<?=$base."/produtos/cat/".$info_cat->nome_url;?>" class="gnb-d1 is-on" ap-click-area="<?=$info_cat->nome;?>" ap-click-name="Click <?=$info_cat->nome;?>" ap-click-data="<?=$info_cat->nome;?>"><?=$info_cat->nome;?></a>
                        </li>
                <?php }
                
                if($_GET['pg'] == "sobre-nos"){
                    $sobre_nos = "is-current is-active";
                }elseif($_GET['pg'] == "contato"){
                    $contato = "is-current is-active";
                }
                
                ?>

                <li class="d1 <?=$sobre_nos;?>" style="">
                    <a href="<?=$base."/sobre-nos";?>" class="gnb-d1" ap-click-area="Sobre Nós" ap-click-name="Click Sobre Nós" ap-click-data="Sobre Nós">Sobre Nós</a>
                </li>
                <li class="d1 <?=$contato;?>" style="">
                    <a href="<?=$base."/contato";?>" class="gnb-d1" ap-click-area="Contato" ap-click-name="Click Contato" ap-click-data="Contato">Contato</a>
                </li>
                </ul>
            </nav>
            <div class="common-links">
                <a href="javascript:void(0)" class="open-sidenav">
                </a>
            </div>
        </div>
    </div>
 </div>
</header>
