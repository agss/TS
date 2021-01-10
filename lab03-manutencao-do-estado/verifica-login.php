<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

if ($login == 'admin' && $senha == 'secreta123') {
    session_start();
    $_SESSION['esta-autenticado'] = "sim";
    $_SESSION['valor-login'] = $login;
    $_SESSION['valor-senha'] = $senha;
    header('Location: saldo.php');
}

else {
    echo "Você errou o login ou a senha, tente novamente!";
}

?>
