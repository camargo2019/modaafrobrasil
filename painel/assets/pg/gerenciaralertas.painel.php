
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Gerenciar Avisos</h4>
                  <p class="card-category">Atenção caso não aperecer nenhuma função você não tem permissão ou nós contate!</p>
                  <a href="<?=$base;?>/painel/GerenciarAlertas/Adicionar" class="btn btn-primary">Adicionar</a>
                </div>
                <div class="card-body">
<?php
if($_GET['pga'] == "Adicionar"){
    if($_POST['informativo'] && $_POST['mensagem'] && $_POST['tipo_mensagem']){
        $data = [
            'id' => NULL,
            'informativo' => $_POST['informativo'],
            'mensagem' => $_POST['mensagem'],
            'tipo_mensagem' => $_POST['tipo_mensagem']
        ];
        $db->insert('logs_alertas', $data);
        echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Adicionado com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarAlertas')
      });
    </script>";
    }
?>
 <form action="<?=$url_atual;?>" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Informativo</label>
                          <input type="text" name="informativo" required="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mensagem</label>
                          <input type="text" name="mensagem" required="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
    <label for="tipo_mensagem">Tipo Mensagem</label>
    <select class="form-control" id="tipo_mensagem" required="" name="tipo_mensagem">
      <option value="alert-info">Alert Info</option>
      <option value="alert-success">Alert Sucesso</option>
      <option value="alert-warning">Alert Warning</option>
      <option value="alert-danger">Alert Danger</option>
      <option value="alert-primary">Alert Primary</option>
    </select>
  </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Adicionar</button>
                    <div class="clearfix"></div>
</form>
<?php
}elseif(strpos($_GET['pga'], 'Delete-id-') !== false){
    $id = str_replace('Delete-id-', '', $_GET['pga']);
    $where = ['id' => $id];
    $db->delete('logs_alertas', $where);
    echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Excluido com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarAlertas')
      });
    </script>";
}else{
$find_slid = $db->row('SELECT * FROM logs_alertas WHERE id="'.$_GET['pga'].'"');
if($find_slid){
    if($_POST){
        if($_POST['informativo'] && $_POST['mensagem'] && $_POST['tipo_mensagem']){
            $data = [
                'informativo' => $_POST['informativo'],
                'mensagem' => $_POST['mensagem'],
                'tipo_mensagem' => $_POST['tipo_mensagem']
            ];
            $where = ['id' => $find_slid->id];
            $db->update('logs_alertas', $data, $where);
            echo "<script>
    Toast.fire({
        icon: 'success',
        title: 'Editado com sucesso!'
      }).then((result) => {
          window.location.replace('".$base."/painel/GerenciarAlertas')
      });
    </script>";
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
      <label class="bmd-label-floating">Informativo</label>
      <input type="text" name="informativo" required="" value="<?=$find_slid->informativo;?>" class="form-control">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="bmd-label-floating">Mensagem</label>
      <input type="text" name="mensagem" required="" value="<?=$find_slid->mensagem;?>" class="form-control">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
  <div class="form-group">
<label for="tipo_mensagem">Tipo Mensagem</label>
<select class="form-control" id="tipo_mensagem" required="" name="tipo_mensagem">
<option value="alert-info" <?=($find_slid->tipo_mensagem == 'alert-info')?'selected':''?> >Alert Info</option>
<option value="alert-success" <?=($find_slid->tipo_mensagem == 'alert-success')?'selected':''?> >Alert Sucesso</option>
<option value="alert-warning" <?=($find_slid->tipo_mensagem == 'alert-warning')?'selected':''?> >Alert Warning</option>
<option value="alert-danger" <?=($find_slid->tipo_mensagem == 'alert-danger')?'selected':''?> >Alert Danger</option>
<option value="alert-primary" <?=($find_slid->tipo_mensagem == 'alert-primary')?'selected':''?> >Alert Primary</option>
</select>
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
        <th>Informativo</th>
        <th>Mensagem</th>
        <th>Tipo Mensagem</th>
        <th>Função</th>
    </thead>
           <?php
            $info = $db->rows('SELECT * FROM logs_alertas');

            foreach($info as $all){
               ?>
            <tr>
<td>
    <?=$all->id;?>
</td>
<td>
    <?=$all->informativo;?>
</td>
<td>
    <?=$all->mensagem;?>
</td>
<td>
    <?=$all->tipo_mensagem;?>
</td>
<td>
<button class="btn btn-primary btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarAlertas/<?=$all->id;?>')">Editar</button>
<button class="btn btn-danger btn-block" onclick="window.location.replace('<?=$base;?>/painel/GerenciarAlertas/Delete-id-<?=$all->id;?>')">Delete</button>
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