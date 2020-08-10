<?php

$info = $db->row('SELECT * FROM logs_sobre LIMIT 1');

if($_POST['conteudo'] && $_POST['imagem_conteudo']){
            $array = [
                'texto' => $_POST['conteudo'],
                'imagem' => $_POST['imagem_conteudo']
            ];
            
        $where = ['id' => 1];
        $db->update('logs_sobre', $array, $where);
        echo "<script>
            Toast.fire({
                icon: 'success',
                title: 'Atualizado com sucesso!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/SobreGerenciar')
              });
            </script>";
}
?>
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Gerenciar Sobre Nós</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                </div>
                <div class="card-body">
                <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
 <form action="<?=$url_atual;?>" method="POST">
        
 <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Imagem</label>
                    <input type="text" class="form-control"  name="imagem_conteudo" required="" value="<?=$info->imagem;?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <textarea name="conteudo" required=""><?=$info->texto;?></textarea>
                <script>
                        CKEDITOR.replace('conteudo');
                </script>
                    </div>
                </div>
            </div>
                    <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                    <div class="clearfix"></div>
</form>
                </div>
      </div>
</div>

<?php

include __DIR__.'/painel.footer.php';