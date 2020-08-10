
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Item em Destaque Categoria</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                  <a href="<?=$base;?>/painel/GerenciarItens/Adicionar" class="btn btn-primary">Adicionar</a>
                </div>
                <div class="card-body">
                <div class="alert alert-info"><span><b> Atenção - </b> Recomendamos adicionar somente 3 itens por categoria</span></div>

<?php
if($_GET['pga'] == "Adicionar"){
    if($_POST){
        if($_POST['imagem_item'] && $_POST['nome_item'] && $_POST['descricao_item'] && $_POST['link_item'] && $_POST['id_categoria']){
            $url_produto = strtolower(preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($_POST['nome_item'])), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
            $url_item_token = $url_produto.time();
            $data = [
                'id' => NULL,
                'imagem_item' => $_POST['imagem_item'],
                'nome_item' => $_POST['nome_item'],
                'descricao_item' => $_POST['descricao_item'],
                'link_item' => $_POST['link_item'],
                'nome_url' => $url_item_token,
                'id_categoria' => $_POST['id_categoria']
            ];
            $db->insert('logs_itens', $data);
            echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Adicionado com sucesso!'
          }).then((result) => {
              window.location.replace('".$base."/painel/GerenciarItens')
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
                <input type="text" class="form-control" name="imagem_item" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Title</label>
                <input type="text" name="nome_item" required="" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <textarea class="form-control" name="descricao_item" required=""></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link (Redirecionamento)</label>
                <input type="text" name="link_item" required="" class="form-control">
            </div>
        </div>
    </div>
                
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Tamanho Item ou Valor do Item</label>
                <input type="text" class="form-control" name="tamanho_item"required="">
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
    $db->delete('logs_itens', $where, null);
    echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Excluido com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarItens')
      });
    </script>";
}else{
    $find = $db->row('SELECT * FROM logs_itens WHERE id="'.$_GET['pga'].'"');
    if($find){
        if($_POST){
            if($_POST['imagem_item'] && $_POST['nome_item'] && $_POST['descricao_item'] && $_POST['link_item'] && $_POST['tamanho_item']){
                $data = [
                    'imagem_item' => $_POST['imagem_item'],
                    'nome_item' => $_POST['nome_item'],
                    'descricao_item' => $_POST['descricao_item'],
                    'link_item' => $_POST['link'],
                    'tamanho_item' => $_POST['tamanho_item']
                ];
                $where = ['id' => $find->id];
                $db->update('logs_itens', $data, $where);
                echo "<script>
            Toast.fire({
                icon: 'success',
                title: 'Atualizado com sucesso!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/GerenciarItens')
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
                <input type="text" class="form-control" name="imagem_item" value="<?=$find->imagem_item;?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Title</label>
                <input type="text" name="nome_item" required="" value="<?=$find->nome_item;?>" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Descrição</label>
                <textarea class="form-control" name="item_descricao" required=""><?=$find->descricao_item;?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Link (Redirecionamento)</label>
                <input type="text" name="link_item" value="<?=$find->link_item;?>" required="" class="form-control">
            </div>
        </div>
    </div>
                
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Tamanho Item ou Valor do Item</label>
                <input type="text" class="form-control" name="tamanho_item" value="<?=$find->tamanho_item;?>" required="">
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
            $info = $db->rows('SELECT * FROM logs_itens');

            foreach($info as $all){
                $info_cat = $db->row('SELECT * FROM logs_categoria WHERE id="'.$all->id_categoria.'"')
               ?>
            <tr>
<td>
    <?=$all->id;?>
</td>
<td>
    <?=$all->nome_item;?>
</td>
<td>
    <?=$info_cat->nome;?>
</td>
<td>
<button class="btn btn-primary btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarItens/<?=$all->id;?>')">Editar</button>
<button class="btn btn-danger btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarItens/Delete-id-<?=$all->id;?>')">Delete</button>
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