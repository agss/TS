<?php

include('bd/conectar.php');
session_start();

if (isset($_SESSION['valor-login'])) {

    if($_GET['detalhes'] == "1") {
        $id    = $_GET['id'];
	$query = "SELECT id, nome, email FROM usuarios WHERE id=".$id;

	$result_set = mysqli_query($conn_handler, $query) or die();
	$row        = mysqli_fetch_assoc($result_set);
        $nome       = $row['nome'];
	$email      = $row['email'];
?>
<html>
    <body>
	<h1>Detalhes do usuário:</h1>
	<h2>Nome: <?php echo htmlentities($nome, ENT_QUOTES);?></h2>
        <h2>Email: <?php echo htmlentities($email, ENT_QUOTES);?></h2>
    </body>
</html>
<?php

    } else {
        $query = "SELECT id, nome FROM usuarios";
?>
<html>
    <body>
	<h1>Uuários presentes no sistema</h1>
        <h2>Clique no usuário para ver os detalhes</h2>
<?php
	$result_set = mysqli_query($conn_handler, $query) or die();
	
	while ($row = mysqli_fetch_assoc($result_set))  {
            $id    = $row['id'];
            $nome  = $row['nome'];
?>
	<a href="visitar-perfis.php?detalhes=1&id=<?php echo htmlentities($id, ENT_QUOTES); ?>"><?php echo htmlentities($nome, ENT_QUOTES); ?></a> <br>
<?php
	}
?>
    </body>
</html>
<?php
    }
?>

<?php
} else {
    header("Location: home.php");
}
?>
