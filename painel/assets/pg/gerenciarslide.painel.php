
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Gerenciar Slide</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                  <a href="<?=$base;?>/painel/GerenciarSlide/Adicionar" class="btn btn-primary">Adicionar</a>
                </div>
                <div class="card-body">

<?php
if($_GET['pga'] == "Adicionar"){
    if($_POST){
        if($_POST['imagem'] && $_POST['titulo'] && $_POST['descricao'] && $_POST['url']){
            $data = [
                'id' => NULL,
                'imagem' => $_POST['imagem'],
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'url' => $_POST['url']
            ];
            $db->insert('logs_slide', $data);
            echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Adicionado com sucesso!'
          }).then((result) => {
              window.location.replace('".$base."/painel/GerenciarSlide')
          });
        </script>";
        }
    }
?>

<form action="<?=$url_atual;?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem</label>
                <input type="text" class="form-control" name="imagem" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Titulo</label>
                <input type="text" class="form-control" name="titulo" required="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <input type="text" name="descricao" required="" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link</label>
                <input type="text" class="form-control" name="url" required="">
            </div>
        </div>
    </div>
    
    
                    <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
                    <div class="clearfix"></div>
                  </form>

<?php
}elseif(strpos($_GET['pga'], 'Delete-id-') !== false){
    $id = str_replace('Delete-id-', '', $_GET['pga']);
    $where = ['id' => $id];
    $db->delete('logs_slide', $where, null);
    echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Excluido com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarSlide')
      });
    </script>";
}else{
    $find = $db->row('SELECT * FROM logs_slide WHERE id="'.$_GET['pga'].'"');
    if($find){
        if($_POST){
            if($_POST['imagem'] && $_POST['titulo'] && $_POST['descricao'] && $_POST['url']){
                $data = [
                    'imagem' => $_POST['imagem'],
                    'titulo' => $_POST['titulo'],
                    'descricao' => $_POST['descricao'],
                    'url' => $_POST['url']
                ];
                $where = ['id' => $find->id];
                $db->update('logs_slide', $data, $where);
                echo "<script>
            Toast.fire({
                icon: 'success',
                title: 'Atualizado com sucesso!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/GerenciarSlide')
              });
            </script>";
            }
        }
        ?>
<form action="<?=$url_atual;?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem</label>
                <input type="text" class="form-control" name="imagem" value="<?=$find->imagem;?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Titulo</label>
                <input type="text" class="form-control" name="titulo" value="<?=$find->titulo;?>" required="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <input type="text" name="descricao" value="<?=$find->descricao;?>" required="" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link</label>
                <input type="text" class="form-control" name="url" value="<?=$find->url;?>" required="">
            </div>
        </div>
    </div>
    
    
                    <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                    <div class="clearfix"></div>
                  </form>
        <?php
    }else{
?>
<table class="table">
    <tbody>
    <thead class="text-primary">
        <th>#</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Função</th>
    </thead>
           <?php
            $info = $db->rows('SELECT * FROM logs_slide');

            foreach($info as $all){
               ?>
            <tr>
<td>
    <?=$all->id;?>
</td>
<td>
    <?=$all->titulo;?>
</td>
<td>
    <?=$all->descricao;?>
</td>
<td>
<button class="btn btn-primary btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarSlide/<?=$all->id;?>')">Editar</button>
<button class="btn btn-danger btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarSlide/Delete-id-<?=$all->id;?>')">Delete</button>
</td>
            </tr>
               <?php
            }
           ?>
        
    </tbody>
</table> 
        <?php } } ?>




</div>
      </div>
</div>

<?php

include __DIR__.'/painel.footer.php';