<?php

include("validate-session-admin.php");
include('../bd/conectar.php');

if($_POST['acao'] == "excluir") {

    $id    = $_POST['dica'];
    $query = "DELETE FROM dicas WHERE id=".$id;

    if(mysqli_query($conn_handler, $query)) {
        echo "Dica excluída com sucesso!";
    } else {
        echo "Erro ao excluir a dica!";
    }
} 

if (!isset($_POST["acao"])) {

?>
<html>
  <body>
    <form method="POST" action="excluir-dica.php">
      <h1>Interface administrativa - Edição de dicas</h1>
      <h2>Escolha a dica para excluir: </h2>
      <label>Título:</label>
      <select name="dica" id="dica">
<?php

    $query = "SELECT id, titulo FROM dicas";   
    
    if($result_set = mysqli_query($conn_handler, $query)) {
        while($row = $result_set->fetch_row()) {
?>
	<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
<?php
        } 
    } else {
        echo "Erro ao carregar as dicas.";
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
