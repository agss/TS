<?php

session_start();

if (isset ($_SESSION['login']) == true) {
    echo("sessao ativa");
} else {
    echo("sessao inativa");
}

?>
