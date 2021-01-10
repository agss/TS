<?php
session_start();

include('../bd/conectar.php');

if($_POST['acao'] == "excluir") {

    $id    = $_POST['usuario'];
    $query = "DELETE FROM usuarios WHERE id=".$id;

    if(mysqli_query($conn_handler, $query)) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir o usuário!";
    }
} 

if (!isset($_POST["acao"])) {

?>
<html>
  <body>
    <form method="POST" action="excluir-usuario.php">
      <h1>Interface administrativa - Edição de usuários</h1>
      <h2>Escolha o usuário para excluir: </h2>
      <label>Nome:</label>
      <select name="usuario" id="usuario">
<?php

    $query = "SELECT id, login FROM usuarios";   
    
    if($result_set = mysqli_query($conn_handler, $query)) {
        while($row = $result_set->fetch_row()) {
            echo "DADO: ".$row[0];
            echo "DADO: ".$row[1]."<br>";
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
      <input type="hidden" name="acao" value="excluir" />
      <input type="submit" value="Excluir" />
    </form>
  </body>
</html>

<?php
}
?>
