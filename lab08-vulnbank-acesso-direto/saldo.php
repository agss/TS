<?php

include('bd/conectar.php');

session_start(); 

if (isset($_SESSION['valor-login'])) {
    $id = $_GET['usuario'];

    $query = "SELECT saldo FROM usuarios WHERE id=".$id." LIMIT 1";

    $result_set = mysqli_query($conn_handler, $query);

    if ($result_set = mysqli_query($conn_handler, $query)) {
        $row = mysqli_fetch_assoc($result_set);
	$saldo = $row['saldo'];
        echo("Seu saldo é de R$ ". $saldo);
    } else {
         echo "<br>Não foi possível recuperar seu saldo";
    }
} else {
    echo("Você precisa se autenticar antes de consultar seu saldo!");
}

?>
