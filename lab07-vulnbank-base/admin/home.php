<?php 

session_start();

if (!$_SESSION['admin'])  {
    header('Location: login.php');
} else {
?>

<html>
  <body>
    <h1>Olá <?php echo($_SESSION['valor-login']) ?>, seja bem-vindo a interface administrativa! </h1>
    <h2>Escolha uma opção para navegar: </h2>
    <a href="gerenciar-usuarios.php">Gerenciar Usuários</a>
    <a href="listar-usuarios.php">Listar Usuários</a>
    <a href="logout.php">Sair</a>
  </body>
</html>

<?php
}
?>
