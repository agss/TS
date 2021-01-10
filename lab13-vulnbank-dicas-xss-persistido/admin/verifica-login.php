<?php

#creates the connection handler.
include('../bd/conectar.php');

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$result_set = mysqli_query($conn_handler, "SELECT id, login, senha FROM admins WHERE login='".$login."' and senha='".$senha."' LIMIT 1");

if (!$result_set->num_rows == 0) {
    session_regenerate_id();
    $result_row = mysqli_fetch_assoc($result_set);
    $_SESSION['admin'] = true;
    $_SESSION['valor-login'] = $result_row['login'];
    $_SESSION['valor-senha'] = $result_row['senha'];
    header('location: home.php');
} else {
    echo "Você errou o login ou a senha, tente novamente!";
}

mysqli_close($conn_handler);

?>
