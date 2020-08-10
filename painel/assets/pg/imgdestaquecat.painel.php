
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Imagens Destaque</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                  <a href="<?=$base;?>/painel/ImgDestaqueCat/Adicionar" class="btn btn-primary">Adicionar</a>
                </div>
                <div class="card-body">
                <div class="alert alert-info"><span><b> Atenção - </b>Você só pode adicionar um item destaque por categoria</span></div>

<?php
if($_GET['pga'] == "Adicionar"){
    if($_POST){
        if($_POST['imagem'] && $_POST['imagem_mobile'] && $_POST['nome_imagem'] && $_POST['descricao_imagem'] && $_POST['link_imagem'] && $_POST['id_categoria']){
            $data = [
                'id' => NULL,
                'imagem' => $_POST['imagem'],
                'imagem_mobile' => $_POST['imagem_mobile'],
                'nome_imagem' => $_POST['nome_imagem'],
                'descricao_imagem' => $_POST['descricao_imagem'],
                'link_imagem' => $_POST['link_imagem'],
                'id_categoria' => $_POST['id_categoria']
            ];
            $db->insert('logs_imagem_cat', $data);
            echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Adicionado com sucesso!'
          }).then((result) => {
              window.location.replace('".$base."/painel/ImgDestaqueCat')
          });
        </script>";
        }
    }
?>

<form action="<?=$url_atual;?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem (Desktop)</label>
                <input type="text" class="form-control" name="imagem" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem (Mobile)</label>
                <input type="text" name="imagem_mobile" required="" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Titulo</label>
                <input type="text" class="form-control" name="nome_imagem" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <input type="text" name="descricao_imagem" required="" class="form-control">
            </div>
        </div>
    </div>
                 
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link</label>
                <input type="text" class="form-control" name="link_imagem" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="id_categoria">Nome da Categoria</label>
        <select class="form-control" name="id_categoria" required="" id="id_categoria">
    <?php
    $list = $db->rows('SELECT * FROM logs_categoria');
    $i = 0;
    foreach($list as $info){
        $verifica = $db->row('SELECT * FROM logs_imagem_cat WHERE id_categoria="'.$info->id.'"');
        if($verifica != true){
    ?>
          <option value="<?=$info->id;?>"><?=$info->nome;?></option>
    <?php  $i++; } }
    if($i <= 0){
        ?>

<option value="">Nenhuma categoria disponivel</option>
        <?php
    }?>
        </select>
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
    $db->delete('logs_imagem_cat', $where, null);
    echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Excluido com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/ImgDestaqueCat')
      });
    </script>";
}else{
    $find = $db->row('SELECT * FROM logs_imagem_cat WHERE id="'.$_GET['pga'].'"');
    if($find){
        if($_POST){
            if($_POST['imagem'] && $_POST['imagem_mobile'] && $_POST['nome_imagem'] && $_POST['descricao_imagem'] && $_POST['link_imagem']){
                $data = [
                    'imagem' => $_POST['imagem'],
                    'imagem_mobile' => $_POST['imagem_mobile'],
                    'nome_imagem' => $_POST['nome_imagem'],
                    'descricao_imagem' => $_POST['descricao_imagem'],
                    'link_imagem' => $_POST['link_imagem']
                ];
                $where = ['id' => $find->id];
                $db->update('logs_imagem_cat', $data, $where);
                echo "<script>
            Toast.fire({
                icon: 'success',
                title: 'Atualizado com sucesso!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/ImgDestaqueCat')
              });
            </script>";
            }
        }
        ?>
<form action="<?=$url_atual;?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem (Desktop)</label>
                <input type="text" class="form-control" name="imagem" value="<?=$find->imagem;?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem (Mobile)</label>
                <input type="text" name="imagem_mobile" required="" value="<?=$find->imagem_mobile;?>" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Titulo</label>
                <input type="text" class="form-control" name="nome_imagem" value="<?=$find->nome_imagem;?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <input type="text" name="descricao_imagem" value="<?=$find->descricao_imagem;?>" required="" class="form-control">
            </div>
        </div>
    </div>
                 
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link</label>
                <input type="text" class="form-control" name="link_imagem" value="<?=$find->link_imagem;?>" required="">
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
        <th>Nome da Categoria</th>
        <th>Função</th>
    </thead>
           <?php
            $info = $db->rows('SELECT * FROM logs_imagem_cat');

            foreach($info as $all){
                $info_cat = $db->row('SELECT * FROM logs_categoria WHERE id="'.$all->id_categoria.'"')
               ?>
            <tr>
<td>
    <?=$all->id;?>
</td>
<td>
    <?=$all->nome_imagem;?>
</td>
<td>
    <?=$info_cat->nome;?>
</td>
<td>
<button class="btn btn-primary btn-block" onclick="window.location.replace('<?=$base;?>/painel/ImgDestaqueCat/<?=$all->id;?>')">Editar</button>
<button class="btn btn-danger btn-block" onclick="window.location.replace('<?=$base;?>/painel/ImgDestaqueCat/Delete-id-<?=$all->id;?>')">Delete</button>
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