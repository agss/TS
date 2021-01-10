<?php

include("validate-session-admin.php");

if($_POST['acao'] == "cadastrar") {

    include('../bd/conectar.php');

    $titulo  = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $query = "INSERT INTO dicas (titulo, descricao) VALUES ('".$titulo."', '".$descricao."')";
    
    if(mysqli_query($conn_handler, $query)) {
        echo "Nova dica cadastrada!";
    } else {
        echo "Erro ao cadastrar dica, tente novamente!";
    }

} else { 
?>

<html>
  <body>
    <form method="POST" action="cadastrar-dica.php">
      <h2>Preencha os dados para cadastrar uma nova dica: </h2>
      <label>Título:</label>
      <input type="text" name="titulo" id="titulo" />
      <br>

      <label>Descrição:</label>
      <input type="text" name="descricao" id="descricao" />
      <br>

      <input type="hidden" name="acao" value="cadastrar" /> 
      <input type="submit" value="cadastrar" />
    </form>
  </body>
</html>

<?php 
}
?>

