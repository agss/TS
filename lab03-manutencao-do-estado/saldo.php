<?php

session_start(); 

if ($_SESSION['esta-autenticado'] == "sim") {
    echo("Seu saldo é de R$ R$74,00");
} else {
    echo("Você precisa se autenticar antes de consultar seu saldo!");
}

?>
