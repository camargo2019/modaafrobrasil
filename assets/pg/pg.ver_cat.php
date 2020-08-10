<?php
//Gabriel  CMR - Desenvolvimentos
//Plagio e Crime

include __DIR__.'/conteudo.menu.php';
?>
<main id="main" class="main main--flat" aria-live="polite" ap-type="content">
    <?php 
    $info_cat = $db->row('SELECT * FROM logs_categoria WHERE nome_url="'.$_GET['pgp'].'"');
    $info_cat_imagem = $db->row('SELECT * FROM logs_imagem_cat WHERE id_categoria="'.$info_cat->id.'"');

    ?>

    <section class="product-home">
        <h1 class="a11y"><?=$info_cat->nome;?></h1>
            <div class="visual main-visual">
                <div class="product-main theme--invert">
                        <div class="sub-main-visual">
                             <img class="img-pc" data-rwd="<?=$info_cat_imagem->imagem;?>" src="<?=$info_cat_imagem->imagem;?>" alt="" data-responsive="true" style="visibility: inherit; opacity: 1;">
                             <img class="img-mobile" data-rwd="<?=$info_cat_imagem->imagem_mobile;?>" src="<?=$info_cat_imagem->imagem_mobile;?>" alt="" data-responsive="true" style="visibility: inherit; opacity: 1;">
                        </div>
                        
                        <div class="product-main-cell">
                            <div class="product-main-desc">
                                <h2 class="h"><?=$info_cat_imagem->nome_imagem;?></h2>
                                <p class="p"><?=$info_cat_imagem->descricao_imagem;?></p>
                                <div class="product-func">
                                    <a href="<?=$info_cat_imagem->link_imagem;?>" class="btn btn--invert" ap-click-area="<?=$info_cat_imagem->nome_imagem;?>" ap-click-name="Click - <?=$info_cat_imagem->nome_imagem;?>" ap-click-data="<?=$info_cat_imagem->nome_imagem;?>">
                                        <span class="a11y"><?=$info_cat_imagem->nome_imagem;?></span>
                                        <span class="btn-text">Ver</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>






            <div class="product-catalog">

                <div class="catalog-frame">     
                <?php
                $info_catalogo = $db->rows('SELECT * FROM logs_item_destaque_categoria WHERE id_categoria="'.$info_cat->id.'"');
                foreach($info_catalogo as $infoCat){
                    ?>
                    <div class="q-catalog-main catalog-main-item" style="margin-left: 10px;">
                        <div class="catalog-main" data-start="" data-end="">
                            <a href="<?=$infoCat->link;?>" class="catalog-link" ap-click-area="Product" ap-click-name="Click - <?=$infoCat->item_nome;?>" ap-click-data="<?=$infoCat->item_nome;?>">
                                <div class="thumb">
                                    <img src="<?=$infoCat->item_imagem;?>" alt="">
                                </div>
                                <div class="thumb-layer">
                                    <div class="thumb-layer-cell">
                                        <h2>
                                            <strong><?=$infoCat->item_nome;?></strong>
                                            <p><?=$infoCat->item_descricao;?></p>
                                        </h2>
                                        <div class="btn btn--ghost">
                                            <span>Ver</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php } ?>
                </div>
            </div>



            <!--list produtos-->
            <div class="product-category">
                <div class="category-frame">
                    <div class="h h2">Mais <?=$info_cat->nome;?></div>
                    <div class="category-slide">
                    <?php 
                        $info_items = $db->rows('SELECT * FROM logs_itens WHERE id_categoria="'.$info_cat->id.'"');
                        foreach($info_items as $itens){
                    ?>
                        <div class="parbase category-product product-category">
                            <div class="category-item">
                                <a href="<?=$base;?>/produtos/detalhes/<?=$itens->nome_url;?>" class="category-link" ap-click-area="Product" ap-click-name="Click - <?=$itens->nome_item;?>" ap-click-data="<?=$itens->nome_item;?>">
                                    <div class="thumb">
                                        <img src="<?=$itens->imagem_item;?>" alt="">
                                    </div>
                                    <div class="category"><h2><?=$itens->nome_item;?> - <?=$info_cat->nome;?></h2> <span class="a11y">Detalhes</span></div>
                                </a>
                            </div>
                        </div>
                    <?php
                          }  
                        ?>
                    </div>
                </div>
            </div>



            
        </section>

    </main>
<?php

include __DIR__.'/conteudo.footer.php';