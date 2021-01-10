<?php

include('bd/conectar.php');
session_start();

?>

<html>
  <body>
    <h1>Extremely Vulnerable Bank</h1>
    <a href="login.php">Logar</a>
    <h2>Dicas</h2>
    <form action="inicio.php" method=GET> 
        <input type="text" name="buscar" id="buscar" />
        <input type="submit" value="buscar">
    </form>
<?php

if (isset($_GET["buscar"])) {
    $restricao = $_GET["buscar"]; 
    $query     = "SELECT titulo, descricao FROM dicas WHERE titulo like '%".$restricao."%'";
?>
	<h2>Você buscou por: <?php echo htmlentities($_GET["buscar"], ENT_QUOTES); ?> </h2>
<?php
} else {
    $query = "SELECT titulo, descricao FROM dicas";
}

$result_set = mysqli_query($conn_handler, $query);

if ($result_set = mysqli_query($conn_handler, $query)) {
    while($row = mysqli_fetch_assoc($result_set)) {
        $titulo    = $row['titulo'];
	$descricao = $row['descricao'];

?>
	<h3><?php echo $titulo; ?></h3>
	<p><?php echo $descricao; ?></p>

<?php

    }
}

?>
  </body>
</html>

