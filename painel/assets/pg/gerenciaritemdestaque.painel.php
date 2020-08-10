
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Item em Destaque Categoria</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                  <a href="<?=$base;?>/painel/GerenciarItemDestaque/Adicionar" class="btn btn-primary">Adicionar</a>
                </div>
                <div class="card-body">
                <div class="alert alert-info"><span><b> Atenção - </b> Recomendamos adicionar somente 3 itens por categoria</span></div>

<?php
if($_GET['pga'] == "Adicionar"){
    if($_POST){
        if($_POST['item_imagem'] && $_POST['item_nome'] && $_POST['item_descricao'] && $_POST['link'] && $_POST['id_categoria']){
            $data = [
                'id' => NULL,
                'item_imagem' => $_POST['item_imagem'],
                'item_nome' => $_POST['item_nome'],
                'item_descricao' => $_POST['item_descricao'],
                'link' => $_POST['link'],
                'id_categoria' => $_POST['id_categoria']
            ];
            $db->insert('logs_item_destaque_categoria', $data);
            echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Adicionado com sucesso!'
          }).then((result) => {
              window.location.replace('".$base."/painel/GerenciarItemDestaque')
          });
        </script>";
        }
    }
?>

<form action="<?=$url_atual;?>" method="POST">
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label class="bmd-label-floating">Imagem</label>
                <input type="text" class="form-control" name="item_imagem" required="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Titulo</label>
                <input type="text" class="form-control" name="item_nome" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <input type="text" name="item_descricao" required="" class="form-control">
            </div>
        </div>
    </div>
                 
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link</label>
                <input type="text" class="form-control" name="link" required="">
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
    ?>
          <option value="<?=$info->id;?>"><?=$info->nome;?></option>
    <?php 
    } ?>
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
    $db->delete('logs_item_destaque_categoria', $where, null);
    echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Excluido com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarItemDestaque')
      });
    </script>";
}else{
    $find = $db->row('SELECT * FROM logs_item_destaque_categoria WHERE id="'.$_GET['pga'].'"');
    if($find){
        if($_POST){
            if($_POST['item_imagem'] && $_POST['item_nome'] && $_POST['item_descricao'] && $_POST['link']){
                $data = [
                    'item_imagem' => $_POST['item_imagem'],
                    'item_nome' => $_POST['item_nome'],
                    'item_descricao' => $_POST['item_descricao'],
                    'link' => $_POST['link']
                ];
                $where = ['id' => $find->id];
                $db->update('logs_item_destaque_categoria', $data, $where);
                echo "<script>
            Toast.fire({
                icon: 'success',
                title: 'Atualizado com sucesso!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/GerenciarItemDestaque')
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
                <input type="text" class="form-control" name="item_imagem" value="<?=$find->item_imagem;?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Nome</label>
                <input type="text" name="item_nome" required="" value="<?=$find->item_nome;?>" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <input type="text" class="form-control" name="item_descricao" value="<?=$find->item_descricao;?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link (Redirecionamento)</label>
                <input type="text" name="link" value="<?=$find->link;?>" required="" class="form-control">
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
            $info = $db->rows('SELECT * FROM logs_item_destaque_categoria');

            foreach($info as $all){
                $info_cat = $db->row('SELECT * FROM logs_categoria WHERE id="'.$all->id_categoria.'"')
               ?>
            <tr>
<td>
    <?=$all->id;?>
</td>
<td>
    <?=$all->item_nome;?>
</td>
<td>
    <?=$info_cat->nome;?>
</td>
<td>
<button class="btn btn-primary btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarItemDestaque/<?=$all->id;?>')">Editar</button>
<button class="btn btn-danger btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarItemDestaque/Delete-id-<?=$all->id;?>')">Delete</button>
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