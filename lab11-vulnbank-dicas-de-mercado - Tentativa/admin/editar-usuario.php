<?php

include("validate-session-admin.php");
include('../bd/conectar.php');

if($_POST['acao'] == "submeter-edicao") {

    $id    = htmlentities($_POST['usuario'],ENT_QUOTES);
    $nome  = htmlentities($_POST['nome'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $login = htmlentities($_POST['login'],ENT_QUOTES);
    $senha = htmlentities($_POST['senha'],ENT_QUOTES);
    $saldo = htmlentities($_POST['saldo'], ENT_QUOTES);

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
      <input type="text" name="nome" id="nome" value="<?php echo  htmlentities($row[1], ENT_QUOTES);  ?>" />
      <br>

      <label>Email:</label>
      <input type="text" name="email" id="email" value="<?php echo  htmlentities($row[2], ENT_QUOTES); ?>" />
      <br>

      <label>Login:</label>
      <input type="text" name="login" id="login" value="<?php echo  htmlentities($row[3], ENT_QUOTES); ?>" disabled />
      <br>

      <label>Saldo:</label>
      <input type="text" name="saldo" id="saldo" value="<?php echo  htmlentities($row[5], ENT_QUOTES);  ?>" />
      <br>

      <label>Conta:</label>
      <input type="text" name="conta" id="conta" value="<?php echo htmlentities($row[6], ENT_QUOTES);  ?>" disabled />
      <br>

      <label>Senha:</label>
      <input type="password" name="senha" id="senha" value="<?php echo  htmlentities($row[4], ENT_QUOTES); ?>" />
      <br>
      <input type="hidden" name="acao" value="submeter-edicao" />
      <input type="hidden" name="usuario" value="<?php echo  htmlentities($row[0], ENT_QUOTES);?>" />
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
            <option value="<?php echo  htmlentities($row[0], ENT_QUOTES);?>"><?php echo htmlentities($row[1], ENT_QUOTES);?></option>
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
