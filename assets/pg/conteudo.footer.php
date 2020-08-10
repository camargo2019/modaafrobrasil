<footer id="footer" class="footer" ap-type="footer">
    <div class="l-footer">
    <?php
    $info_redesocial = $db->row('SELECT * FROM logs_redessocial LIMIT 1');
    ?>
        <div class="footer-common">
            <a href="<?=$info_redesocial->facebook;?>" class="footer-common-item" title="New Window" target="_blank" ap-click-area="Footer" ap-click-name="Click - SNS Link" ap-click-data="<?=$info_redesocial->facebook;?>">
                <img src="<?=$base;?>/assets/img/sns_facebook_renew.png" alt="facebook icon" style="height: 40px!important;">
            </a>
            <a href="<?=$info_redesocial->tiktok;?>" class="footer-common-item" title="New Window" target="_blank" ap-click-area="Footer" ap-click-name="Click - SNS Link" ap-click-data="<?=$info_redesocial->tiktok;?>">
                <img src="<?=$base;?>/assets/img/tiktok_icon.png" style="height: 40px!important;transform: scale(1.5);" alt="tiktok icon">
            </a>
            <a href="https://www.instagram.com/<?=$info_redesocial->instagram;?>" class="footer-common-item" title="New Window" target="_blank" ap-click-area="Footer" ap-click-name="Click - SNS Link" ap-click-data="<?=$info_redesocial->instagram;?>">
                <img src="<?=$base;?>/assets/img/sns_instagram_renew.png"  style="height: 40px!important;"  alt="instagram icon">
            </a>
        </div>
        </div>
        <p><small class="copyright">©NEGRX1. Todos os direitos reservados. <a href="//gabrielcmr.com.br" target="_blank">Gabriel CMR - Desenvolvimentos</a></small></p>
    </div>
</footer>




<!--Versão mobile-->
<nav id="sidenav" class="sidenav" role="navigation">
    <div class="l-sidenav">
        <div class="sidenav-logo">
            <a href="<?=$base;?>" class="logo-a">
            <img src="<?=$info_autoload->url_imagem_logo;?>">
                <span class="a11y">NEGRX1</span>
            </a>
        </div>
        <div class="sidenav-common">
            <button type="button" class="close-sidenav">
            </button>
        </div>
        <ul class="sidenav-menu">
            
        <?php 
                $row = $db->rows('SELECT * FROM logs_categoria');
                foreach($row as $info_cat){
                ?>
                        <li class="d1" style="">
                            <a href="<?=$base."/produtos/cat/".$info_cat->nome_url;?>" class="gnb-d1" ap-click-area="<?=$info_cat->nome;?>" ap-click-name="Click <?=$info_cat->nome;?>" ap-click-data="<?=$info_cat->nome;?>"><?=$info_cat->nome;?></a>
                        </li>
                <?php } ?>

                <li class="d1" style="">
                    <a href="<?=$base."/sobre-nos";?>" class="gnb-d1" ap-click-area="Sobre Nós" ap-click-name="Click Sobre Nós" ap-click-data="Sobre Nós">Sobre Nós</a>
                </li>
                <li class="d1" style="">
                    <a href="<?=$base."/contato";?>" class="gnb-d1" ap-click-area="Contato" ap-click-name="Click Contato" ap-click-data="Contato">Contato</a>
                </li>
            
            
            
        </ul>
        <div class="sidenav-utils">
            
            <p><small class="copyright">©NEGRX1. Todos os direitos reservados. <a href="//gabrielcmr.com.br" target="_blank">Gabriel CMR - Desenvolvimentos</a></small></p>
        </div>
    </div>
</nav>

<script>
    $('.open-sidenav').click(function(){
        $('#sidenav').attr('style', 'right: 100%;max-width:100%;');
    });
    $('.close-sidenav').click(function(){
        $('#sidenav').attr('style', 'right: 0;');
    });
</script>