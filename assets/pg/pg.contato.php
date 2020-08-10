<?php
//Gabriel CMR - Desenvolvimento
//Plagio e Crime

include __DIR__.'/conteudo.menu.php';

$url_atual = '//'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
    $info_redesocial = $db->row('SELECT * FROM logs_redessocial LIMIT 1');
if($_POST['nome'] && $_POST['telefone'] && $_POST['pedido']){
    $from = "info@camargohost.org";
    $to = $info_redesocial->email;
    $subject = "Nova Mensagem de Contato!";
    $message = "
    Nome: ".$_POST['nome']." <br/>
    Telefone: ".$_POST['telefone']." <br />
    Mensagem: ".$_POST['pedido']." <br />
    ";
    $headers = "De:". $from;
    mail($to, $subject, $message, $headers);
}
?>
<main id="main" class="main" aria-live="polite" ap-type="content">
    <header class="page-header">
    <h1 class="h">Contato</h1>
    </header>
    <div class="store-box">
        <form action="<?=$url_atual;?>" class="formContato" method="POST">

        <input type="text" name="nome" placeholder="Nome Completo">

        <input type="text" name="telefone" placeholder="Telefone">

        <textarea name="pedido"></textarea>

        <button>Enviar</button>
        </form>
    
        <div class="informacao_contato">

            <div class="whatsapp"><i class="fab fa-whatsapp"></i> <div class="mensagem_contato"><?=$info_redesocial->whatsapp;?></div></div>
            <div class="email"><i class="far fa-envelope-open"></i> <div class="mensagem_contato"><?=$info_redesocial->email;?></div></div>
            <div class="instagram"><i class="fab fa-instagram"></i> <div class="mensagem_contato">@<?=$info_redesocial->instagram;?></div></div>

        </div>
    </div>
</main>

<?php

include __DIR__.'/conteudo.footer.php';