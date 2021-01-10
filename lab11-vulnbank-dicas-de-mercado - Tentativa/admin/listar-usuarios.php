<?php

include('../bd/conectar.php');
include("validate-session-admin.php");

$query = "SELECT * FROM usuarios";

$result_set = mysqli_query($conn_handler, $query);

while($row = $result_set->fetch_row()) {
    echo "Id: ".$row[0]."<br>";
    echo "Login: ".$row[1]."<br>";;
    echo "Senha: ".$row[2]."<br>";;
    echo "Nome: ".$row[3]."<br>";;
    echo "Email: ".$row[4]."<br>";;
    echo "Conta: ".$row[5]."<br>";;
    echo "Saldo: ".$row[6]."<br><br>";;
}

?>
