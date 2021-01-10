<?php
session_start();

include('../bd/conectar.php');

if($_POST['acao'] == "submeter-edicao") {

    $id    = $_POST['usuario'];
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $saldo = $_POST['saldo'];

    $query = "UPDATE usuarios SET nome='".$nome."', email='".$email."', saldo=".$saldo.", senha='".$senha."' WHERE id=".$id;

    if(mysqli_query($conn_handler, $query)) {
        echo "Usuário editado com sucesso!";
    } else {
        echo "Erro ao editar o usuário!";
    }

} 

if ($_GET['acao'] == "editar") {
    $id_usuario = $_GET['usuario'];
    $query = "SELECT id, nome, email, login, senha, saldo, conta  FROM usuarios WHERE id=".$id_usuario;
    
    if($result_set = mysqli_query($conn_handler, $query)) {
         $row = $result_set->fetch_row();
?>

<html>
  <body>
    <form method="POST" action="editar-usuario.php">
      <h2>Preencha os dados para cadastrar um novo usuário: </h2>
      <label>Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $row[1];  ?>" />
      <br>

      <label>Email:</label>
      <input type="text" name="email" id="email" value="<?php echo $row[2];  ?>" />
      <br>

      <label>Login:</label>
      <input type="text" name="login" id="login" value="<?php echo $row[3];  ?>" disabled />
      <br>

      <label>Saldo:</label>
      <input type="text" name="saldo" id="saldo" value="<?php echo $row[5];  ?>" />
      <br>

      <label>Conta:</label>
      <input type="text" name="conta" id="conta" value="<?php echo $row[6];  ?>" disabled />
      <br>

      <label>Senha:</label>
      <input type="password" name="senha" id="senha" value="<?php echo $row[4];  ?>" />
      <br>
      <input type="hidden" name="acao" value="submeter-edicao" />
      <input type="hidden" name="usuario" value="<?php echo $row[0]; ?>" />
      <input type="submit" value="editar" />
    </form>
  </body>
</html>

<?php
    } else {
	echo $query."<br>";
        echo "Não foi possível recuperar o usuário para edição";
    }

} 

if (!isset($_GET["acao"]) && !isset($_POST["acao"])) {

?>
<html>
  <body>
    <form method="GET" action="editar-usuario.php">
      <h1>Interface administrativa - Edição de usuários</h1>
      <h2>Escolha o usuário para editar: </h2>
      <label>Nome:</label>
      <select name="usuario" id="usuario">
<?php

    $query = "SELECT id, login FROM usuarios";   
    
    if($result_set = mysqli_query($conn_handler, $query)) {
        while($row = $result_set->fetch_row()) {
?>
	<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
<?php
        } 
    } else {
        echo "Erro ao carregar os usuários";
    }
?>
      </select>
      <br>
      <input type="hidden" name="acao" value="editar" />
      <input type="submit" value="Editar" />
    </form>
  </body>
</html>

<?php
}
?>
