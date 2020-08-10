<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Notificação</h4>
                <p class="card-category">Notificação do Administrador</p>
        </div>
        <div class="card-body">
<?php
$find = $db->rows('SELECT * FROM logs_alertas ORDER BY id DESC');

foreach($find as $fow){
?>
<div class="alert <?=$fow->tipo_mensagem;?>">
    <span>
        <b> <?=$fow->informativo;?> - </b>
        <?=$fow->mensagem;?>
    </span>
</div>
<?php } ?>
        
        </div>
    </div>
</div>

<?php

include __DIR__.'/footer.painel.php';