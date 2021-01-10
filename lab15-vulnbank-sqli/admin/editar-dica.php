<?php

include("validate-session-admin.php");
include('../bd/conectar.php');

if($_POST['acao'] == "submeter-edicao") {

    $id    = $_POST['dica'];
    $titulo  = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $query = "UPDATE dicas SET titulo='".$titulo."', descricao='".$descricao."' WHERE id=".$id;

    if(mysqli_query($conn_handler, $query)) {
        echo "Dica editada com sucesso!";
    } else {
        echo "Erro ao editar a dica!";
    }

} 

if ($_GET['acao'] == "editar") {
    $id_dica = $_GET['dica'];
    $query = "SELECT id, titulo, descricao FROM dicas WHERE id=".$id_dica;
    
    if($result_set = mysqli_query($conn_handler, $query)) {
         $row = $result_set->fetch_row();
?>

<html>
  <body>
    <form method="POST" action="editar-dica.php">
      <h2>Preencha os dados para cadastrar uma nova dica: </h2>
      <label>Tíulo:</label>
      <input type="text" name="titulo" id="titulo" value="<?php echo $row[1];  ?>" />
      <br>

      <label>Descrição:</label>
      <input type="text" name="descricao" id="descricao" value="<?php echo $row[2];  ?>" />
      <br>

      <input type="hidden" name="acao" value="submeter-edicao" />
      <input type="hidden" name="dica" value="<?php echo $row[0]; ?>" />
      <input type="submit" value="editar" />
    </form>
  </body>
</html>

<?php
    } else {
	echo $query."<br>";
        echo "Não foi possível recuperar a dica para edição";
    }

} 

if (!isset($_GET["acao"]) && !isset($_POST["acao"])) {

?>
<html>
  <body>
    <form method="GET" action="editar-dica.php">
      <h1>Interface administrativa - Edição de dicas</h1>
      <h2>Escolha a dica para editar: </h2>
      <label>Dica:</label>
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
        echo "Erro ao carregar os dicas";
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
