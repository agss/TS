<?php

session_start();

if (!$_SESSION['admin']) {
    header("Location: home.php");	
    die("Não autenticado!"); 
}

?>
