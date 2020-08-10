<?php
//Gabriel  CMR - Desenvolvimentos
//Plagio e Crime

include __DIR__.'/conteudo.menu.php';

$info_produto = $db->row('SELECT * FROM logs_itens WHERE nome_url="'.$_GET['pgp'].'"');
?>
<link rel="stylesheet" href="<?=$base;?>/assets/css/product.css">
<main id="main" class="main product" ap-type="content">
    <div class="pdp_wrap">
        <div class="pdp_inner prd_info_gap">
            <div class="prd_info_wrap">
                <div class="prd_img_wrap">
                    <div class="prd_img_pc"><img src="<?=$info_produto->imagem_item;?>" alt="<?=$info_produto->nome_item;?>"></div>
                    <div class="prd_img_mo">
                        <div class="prd_mo_carousel slick-initialized slick-slider slick-dotted">
                                    <img src="<?=$info_produto->imagem_item;?>" alt="<?=$info_produto->nome_item;?>" class="shape" style="width: 100%; display: inline-block;"></div>
                        </div>
                    </div>
                <div class="prd_primary_wrap">
                    <div class="prd_primary">    
                        <h1 class="prd_name"><?=$info_produto->nome_item;?></h1>
                        <div class="prd_name_en"></div>
                        <div class="capacity"><?=$info_produto->tamanho_item;?></div>
                        <h2 class="prd_desc"><?=$info_produto->descricao_item;?></h2>
                        
                        <div class="order_wrap">
                            <div class="typeinfo"></div>
                            <div class="go_review">
                                
                            </div>
                            <div class="go_APmall">
                                <div class="sticky_inner">
                                    <a href="<?=$info_produto->link_item;?>" target="_blank" ap-click-area="Product" ap-click-name="Click - <?=$info_produto->nome_item;?>" ap-click-data="<?=$info_produto->nome_item;?>"  class="cta_black">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

include __DIR__.'/conteudo.footer.php';