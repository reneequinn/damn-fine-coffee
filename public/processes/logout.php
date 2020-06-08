<?php
session_start();
unset($_SESSION['customer_id']);
unset($_SESSION['first_name']);
unset($_SESSION['loggedIn']);
session_destroy();
header('Location: ../index.php');
exit();

?>