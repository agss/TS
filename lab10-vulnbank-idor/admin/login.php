<?php
session_start();
?>

<html>
  <body>
    <form method="POST" action="verifica-login.php">
       <h2>Digite login e senha para se autenticar:</h2>
       <input type="text" name="login" id="login" />
       <br/>
       <input type="password" name="senha" id="senha" />  
       </br>
       <input type="submit" value="login" />
    </form>
  </body>
</html>
