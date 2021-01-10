<?php 

session_start();

if (!isset($_SESSION['valor-login']))  {
    header('Location: login.php');
} else {
?>

<html>
  <body>
    <h1>Olá <?php echo($_SESSION['valor-login']) ?>, seja bem-vindo! </h1>
    <h2>Escolha uma opção para navegar: </h2>
    <a href="perfil.php">Meu perfil</a>
    <a href="saldo.php">Ver saldo</a>
    <a href="visitar-perfis.php">Visitar perfis</a>
    <a href="logout.php">Sair</a>
  </body>
</html>

<?php
}
?>
