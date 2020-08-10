<?php

if($_POST['email'] && $_POST['senha']){
    $info = $db->row('SELECT * FROM logs_usuario WHERE email="'.base64_encode($_POST['email']).'" AND senha="'.base64_encode($_POST['senha']).'"');
    if($info){
        session_destroy();
        session_start();
        $_SESSION['email'] = base64_encode($_POST['email']);
        $_SESSION['senha'] = base64_encode($_POST['senha']);
        echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Logado com sucesso!'
        }).then((result) => {
            window.location.replace('".$base."/painel/Home');
          });
        </script>";
    }else{
        echo "<script>
        Toast.fire({
          icon: 'error',
          title: 'E-mail ou Senha incorretos!'
        })</script>";
    }
}

?>
<div class="card" style="width: 50%;margin-left: 25%;margin-top: 50px;">
<div class="card-header">
<div class="card-title">Login - Painel Administrativo</div>
</div>
  <div class="card-body">
    <form method="POST" action="<?=$base;?>/painel/Login">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" required="" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="E-mail">
        <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com mais ninguém.</small>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" required="" class="form-control" name="senha" id="senha" placeholder="Senha">
      </div>

      <button type="submit" class="btn btn-primary">Logar</button>
    </form>
  </div>
</div>

