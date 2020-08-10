<?php 


$user = $db->row('SELECT * FROM logs_usuario WHERE email="'.$_SESSION['email'].'" AND senha="'.$_SESSION['senha'].'"');

if($_POST){
    if($_POST['senha'] && $_POST['email'] && $_POST['nome']){
    $data = [
        'nome' => $_POST['nome'],
        'senha' => base64_encode($_POST['senha']),
        'email' => base64_encode($_POST['email'])
    ];
    $where = ['id' => $user->id];
    $db->update('logs_usuario', $data, $where);
    echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Dados Atualizado com sucesso!'
          }).then((result) => {
              window.location.replace('".$base."/painel/MinhaConta')
          });
        </script>";
    }else{
        echo "<script>
        Toast.fire({
            icon: 'error',
            title: 'Infelizmente não conseguimos atualizar os dados!'
          }).then((result) => {
              window.location.replace('".$base."/painel/MinhaConta')
          });
        </script>";
    }
}
?>
<div class="content">
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editar Perfil</h4>
                  <p class="card-category">Atenção não deixe os campos vazio!</p>
                </div>
                <div class="card-body">
                  <form action="<?=$url_atual;?>" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome</label>
                          <input type="text" class="form-control" name="nome" required="" value="<?=$user->nome;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Senha</label>
                          <input type="password" id="senha" name="senha" required="" minlenght="8" class="form-control" value="<?=base64_decode($user->senha);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input type="email" id="email" name="email" required="" class="form-control" value="<?=base64_decode($user->email);?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Atualizar Perfil</button>
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