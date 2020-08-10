<?php
//Gabriel CMR - Desenvolvimento
//Plagio e Crime

include __DIR__.'/conteudo.menu.php';

?>
<main id="main" class="main" aria-live="polite" ap-type="content">
    <header class="page-header">
    <h1 class="h">Sobre Nós</h1>
    </header>
    <div class="store-box" style="height:auto;">
        <?php
        $info_sobreNos = $db->row('SELECT * FROM logs_sobre LIMIT 1');
        echo $info_sobreNos->texto;
        ?>
        <img class="ImgSobreNos" src="<?=$info_sobreNos->imagem;?>">
    </div>
</main>

<?php

include __DIR__.'/conteudo.footer.php';