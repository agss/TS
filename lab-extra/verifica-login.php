<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

session_start();

if ($login == 'admin' && $senha == 'secreta123') {
    $_SESSION['esta-autenticado'] = "sim";
    $_SESSION['valor-login'] = $login;
    $_SESSION['valor-senha'] = $senha;
    header('Location: saldo.php');
}

else {
    echo "Você errou o login ou a senha, tente novamente!";
}

?>
