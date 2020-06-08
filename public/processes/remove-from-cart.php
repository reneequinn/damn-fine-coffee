<?php
session_start();
include '../resources/cart_obj.php';

$itemNo = $_POST['itemNo'];

if ($itemNo != '') {
  $cart = new Cart();
  $counter = $_SESSION['counter'];
  $cart = unserialize($_SESSION['cart']);

  $cart->delete_item($itemNo);
  $_SESSION['counter'] = $counter - 1;

  $_SESSION['cart'] = serialize($cart);
  header('Location: ../pages/view-cart.php');
  exit();
}

?>