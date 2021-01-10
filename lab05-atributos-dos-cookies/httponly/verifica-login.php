<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

if ($login == 'admin' && $senha == 'secreta123') {
	header("Set-Cookie: meuCookieHttpOnly=valorDoCookie; HttpOnly; path=/");
?>

<html>
  <body>
    <a href="verifica-httponly.php">clique aqui para verificar se o cookie está acessível</a>
  </body>
</html>


<?php
}

else {
    echo "Você errou o login ou a senha, tente novamente!";
}

?>
