<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: home.php");	
    die("Não autenticado!"); 
}

?>
