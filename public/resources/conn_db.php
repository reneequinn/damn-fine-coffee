<?php
require_once 'db_vars.php';

($link = @mysqli_connect($server, $user, $pass, $database)) or
  die('Connection failed: ' . mysqli_connect_error());

?>
