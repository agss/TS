<?php 

session_start();

if (!$_SESSION['admin'])  {
    header('Location: ../login.php');
} else {

    $host = $_GET['host'];
    if(isset($host)) {
        ?>
<html>
  <body>
    <h2>Ping: </h2>
    <div>
      <?php echo shell_exec('ping -c 4 '. $host); ?> 
    </div>
  </body>
</html>
        <?php
    } else {
?>

<html>
  <body>
    <h1>Interface de monitoração! </h1>
    <form action="monitor.php" method="GET">
      <h2>Digite o host para testar: </h2>
      <input type="text" id="host" name="host">
      <br>
      <input type="submit" value="ping">
    </form>
  </body>
</html>

<?php
    }
}
?>
