<?php

#creates the connection handler.
include('bd/conectar.php');

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$query = "SELECT id, login, senha FROM usuarios WHERE login='".$login."' and senha='".$senha."' LIMIT 1";


$result_set = mysqli_query($conn_handler, $query);

if (!$result_set->num_rows == 0) {
    header('location: home.php');
} else {
    echo "Você errou o login ou a senha, tente novamente!";
}

mysqli_close($conn_handler);

?>
