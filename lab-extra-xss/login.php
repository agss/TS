<?php
session_start();
?>

<html>
  <body>
    <form method="POST" action="verifica-login.php">
       <h2>Digite login e senha para se autenticar:</h2>
       <input type="text" name="login" id="login" value='<?php echo $_GET['login'] ?>' />
       <br/>
       <input type="password" name="senha" id="senha" />  
       </br>
       <input onmouseover=javascript:alert(1) type="submit" value="login" />
    </form>
  </body>
</html>
