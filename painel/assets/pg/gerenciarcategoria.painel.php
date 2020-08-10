
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Gerenciar Categoria</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                  <a href="<?=$base;?>/painel/GerenciarCategoria/Adicionar" class="btn btn-primary">Adicionar</a>
                </div>
                <div class="card-body">
<?php
if($_GET['pga'] == "Adicionar"){
    if($_POST['nome'] && $_POST['nome_url']){
        $data = [
            'id' => NULL,
            'nome' => $_POST['nome'],
            'nome_url' => $_POST['nome_url']
        ];
        $db->insert('logs_categoria', $data);
        echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Adicionado com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarCategoria')
      });
    </script>";
    }
?>
<form action="<?=$url_atual;?>" method="POST">
<div class="row">
  
  <div class="col-md-6">
    <div class="form-group">
      <label class="bmd-label-floating">Nome</label>
      <input type="text" name="nome" required="" class="form-control">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="bmd-label-floating">Nome da URL</label>
      <input type="text" name="nome_url" id="nome_url" required="" class="form-control">
    </div>
  </div>

</div>

<script>
document.getElementById("nome_url").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM_-.".indexOf(chr) < 0)
           return false;
    };
</script>
<button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
                    <div class="clearfix"></div>
</form>
<?php
}elseif(strpos($_GET['pga'], 'Delete-id-') !== false){
    $id = str_replace('Delete-id-', '', $_GET['pga']);
    $where = ['id' => $id];
    $db->delete('logs_categoria', $where, null);
    $where2 = ['id_categoria' => $id];
    $db->delete('logs_imagem_cat', $where2, null);
    $where3 = ['id_categoria' => $id];
    $db->delete('logs_item_destaque_categoria', $where3, null);
    $where4 = ['id_categoria' => $id];
    $db->delete('logs_itens', $where4, null);
    echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Excluido com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarCategoria')
      });
    </script>";
}else{
$find_slid = $db->row('SELECT * FROM logs_categoria WHERE id="'.$_GET['pga'].'"');
if($find_slid){
    if($_POST){
        if($_POST['nome'] && $_POST['nome_url']){
          $count = $db->count('SELECT * FROM logs_categoria WHERE nome="'.$_POST['nome'].'"');
          
          $count2 = $db->count('SELECT * FROM logs_categoria WHERE nome_url="'.$_POST['nome_url'].'"');
          if($count > 1){
            echo "<script>
            Toast.fire({
                icon: 'error',
                title: 'Nome já existente!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/GerenciarCategoria')
              });
            </script>";
          }else{
            if($count2 > 1){
              echo "<script>
              Toast.fire({
                  icon: 'error',
                  title: 'Nome da URL já existente!'
                }).then((result) => {
                    window.location.replace('".$base."/painel/GerenciarCategoria')
                });
              </script>";
            }else{
            $data = [
                'nome' => $_POST['nome'],
                'nome_url' => $_POST['nome_url']
            ];
            $where = ['id' => $find_slid->id];
            $db->update('logs_categoria', $data, $where);
            echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Editado com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarCategoria')
      });
    </script>";
            }
          }
        }else{
            echo "<script>
            Toast.fire({
                icon: 'error',
                title: 'Não conseguimos atualizar!'
              }).then((result) => {
                  window.location.replace('".$base."/painel/GerenciarAlertas')
              });
            </script>";
        }
    }
?> 
<form action="<?=$url_atual;?>" method="POST">
<div class="row">
  
  <div class="col-md-6">
    <div class="form-group">
      <label class="bmd-label-floating">Nome</label>
      <input type="text" name="nome" required="" value="<?=$find_slid->nome;?>" class="form-control">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="bmd-label-floating">Nome da URL</label>
      <input type="text" name="nome_url" id="nome_url" required="" value="<?=$find_slid->nome_url;?>" class="form-control">
    </div>
  </div>

</div>

<script>
document.getElementById("nome_url").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM_-.".indexOf(chr) < 0)
           return false;
    };
</script>
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
        <th>Nome da Categoria</th>
        <th>Nome da URL</th>
        <th>Função</th>
    </thead>
           <?php
            $info = $db->rows('SELECT * FROM logs_categoria');

            foreach($info as $all){
               ?>
            <tr>
<td>
    <?=$all->id;?>
</td>
<td>
    <?=$all->nome;?>
</td>
<td>
    <?=$all->nome_url;?>
</td>
<td>
<button class="btn btn-primary btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarCategoria/<?=$all->id;?>')">Editar</button>
<button class="btn btn-danger btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarCategoria/Delete-id-<?=$all->id;?>')">Delete</button>
</td>
            </tr>
               <?php
            }
           ?>
        
    </tbody>
</table>
        <?php }
        } ?>
</div>
      </div>
</div>

<?php

include __DIR__.'/painel.footer.php';