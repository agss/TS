<?php
include("validate-session-admin.php");
?>

<html>
  <body>
    <h1>Interface administrativa - gerenciamento de dicas</h1>
    <h2>Escolha uma opção </h2>
    <input type="button" onclick="location.href='cadastrar-dica.php';" value="Criar dica" />
    <input type="button" onclick="location.href='editar-dica.php';" value="Editar dica" />
    <input type="button" onclick="location.href='excluir-dica.php';" value="Excluir dica" />
  </body>
</html>
