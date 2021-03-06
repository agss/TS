<?php

include("validate-session-admin.php");

if($_POST['acao'] == "cadastrar") {

    include('../bd/conectar.php');

    $nome  = htmlentities($_POST['nome'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $login = htmlentities($_POST['login'],ENT_QUOTES);
    $senha = htmlentities($_POST['senha'],ENT_QUOTES);
    $saldo = htmlentities($_POST['saldo'], ENT_QUOTES);
    $conta = htmlentities($_POST['conta'], ENT_QUOTES);

    $query = "INSERT INTO usuarios (nome, email, login, conta, saldo, senha) VALUES ('".$nome."', '".$email."', '".$login."', '".$conta."', ".$saldo.", '".$senha."')";
    
    if(mysqli_query($conn_handler, $query)) {
        echo "Novo usuário cadastrado!";
    } else {
        echo "Erro ao cadastrar usuário, tente novamente!";
    }

} else { 
?>

<html>
  <body>
    <form method="POST" action="cadastrar-usuario.php">
      <h2>Preencha os dados para cadastrar um novo usuário: </h2>
      <label>Nome:</label>
      <input type="text" name="nome" id="nome" />
      <br>

      <label>Email:</label>
      <input type="text" name="email" id="email" />
      <br>

      <label>Saldo:</label>
      <input type="text" name="saldo" id="saldo" />
      <br>

      <label>Login:</label>
      <input type="text" name="login" id="login" />
      <br>

      <label>Conta:</label>
      <input type="text" name="conta" id="conta" />
      <br> 

      <label>Senha:</label>
      <input type="password" name="senha" id="senha" />
      <br>

      <input type="hidden" name="acao" value="cadastrar" /> 
      <input type="submit" value="cadastrar" />
    </form>
  </body>
</html>

<?php 
}
?>

