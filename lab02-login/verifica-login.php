<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

if ($login == 'admin' && $senha == 'secreta123') {
    echo "Bem vindo, admin! Seu saldo é de R$74,00!";
}
else {
    echo "Você errou o login ou a senha, tente novamente!";
}

?>
