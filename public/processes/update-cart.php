<?php
session_start();
include '../resources/cart_obj.php';

$itemNo = $_POST['itemNo'];
$qty = $_POST['qty'];

if ($itemNo != '') {
  $cart = new Cart();
  $counter = $_SESSION['counter'];
  $cart = unserialize($_SESSION['cart']);

  $cart->update_quantity($itemNo, $qty);

  $_SESSION['cart'] = serialize($cart);
  header('Location: ../pages/view-cart.php');
  exit();
}
?>