<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

if ($login == 'admin' && $senha == 'secreta123') {
    session_start();
    session_regenerate_id();
    $_SESSION['esta-autenticado'] = "sim";
    $_SESSION['valor-login'] = $login;
    $_SESSION['valor-senha'] = $senha;
    header('location: home.php');
}

else {
    echo "Você errou o login ou a senha, tente novamente!";
}

?>
