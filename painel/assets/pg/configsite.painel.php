<?php 


$user = $db->row('SELECT * FROM logs_usuario WHERE email="'.$_SESSION['email'].'" AND senha="'.$_SESSION['senha'].'"');

$info_site = $db->row('SELECT * FROM logs_informacoes_site LIMIT 1');
$info_redes = $db->row('SELECT * FROM logs_redessocial LIMIT 1');
if($_POST){
    if($_POST['titulo_site'] && $_POST['description_site'] && $_POST['keywords'] && $_POST['url_imagem_logo'] && $_POST['url_favicon'] && $_POST['facebook'] && $_POST['instagram'] && $_POST['tiktok'] && $_POST['email'] && $_POST['whatsapp']){
        $data = [
            'titulo_site' => $_POST['titulo_site'],
            'description_site' => $_POST['description_site'],
            'keywords' => $_POST['keywords'],
            'url_imagem_logo' => $_POST['url_imagem_logo'],
            'url_favicon' => $_POST['url_favicon']
        ];
        $where = ['id' => 1];
    $db->update('logs_informacoes_site', $data, $where);
    $data2 = [
        'facebook' => $_POST['facebook'],
        'instagram' => $_POST['instagram'],
        'tiktok' => $_POST['tiktok'],
        'email' => $_POST['email'],
        'whatsapp' => $_POST['whatsapp']
    ];
    $where2 = ['id' => 1];
    $db->update('logs_redessocial', $data2, $where2);
    echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Dados Atualizado com sucesso!'
          }).then((result) => {
              window.location.replace('".$base."/painel/ConfigdoSite')
          });
        </script>";
    }
}
?>
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Configuração do Site</h4>
                  <p class="card-category">Atenção não deixe os campos vazio!</p>
                </div>
                <div class="card-body">
                  <form action="<?=$url_atual;?>" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Titulo do Site</label>
                          <input type="text" class="form-control" name="titulo_site" required="" value="<?=$info_site->titulo_site;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">URL da Imagem (Logo)</label>
                          <input type="text" id="url_imagem_logo" name="url_imagem_logo" required="" class="form-control" value="<?=$info_site->url_imagem_logo;?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                          <label class="bmd-label-floating">URL da Imagem(Icone)</label>
                          <input type="text" class="form-control" name="url_favicon" required="" value="<?=$info_site->url_favicon;?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Keywords</label>
                          <textarea class="form-control" name="keywords"><?=$info_site->keywords;?></textarea>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Descrição</label>
                          <input type="text" class="form-control" name="description_site" value="<?=$info_site->description_site;?>">
                        </div>
                      </div>
                    </div>
                    

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Facebook</label>
                          <input type="text" class="form-control" name="facebook" value="<?=$info_redes->facebook;?>">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Instagram</label>
                          <input type="text" class="form-control" name="instagram" value="<?=$info_redes->instagram;?>">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">TikTok</label>
                          <input type="text" class="form-control" name="tiktok" value="<?=$info_redes->tiktok;?>">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input type="text" class="form-control" name="email" value="<?=$info_redes->email;?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">WhatsApp</label>
                          <input type="text" class="form-control" name="whatsapp" value="<?=$info_redes->whatsapp;?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
        </div>
      </div>

<script>
document.getElementById("email").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM_-@.".indexOf(chr) < 0)
           return false;
    };
    document.getElementById("senha").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM_-@".indexOf(chr) < 0)
           return false;
    };
</script>

<?php

include __DIR__.'/painel.footer.php';