<?php
session_start();

include_once '../resources/cart_obj.php';

$id = $_POST['id'];
$qty = $_POST['qty'];
$cart = new Cart();
$counter = 0;

if (isset($_SESSION['counter'])) {
  $counter = $_SESSION['counter'];
  if (isset($_SESSION['cart'])) {
    $cart = unserialize($_SESSION['cart']);
  }
} else {
  $_SESSION['counter'] = 0;
  $_SESSION['cart'] = '';
}

if ($id == '' or $qty < 1) {
  header('Location: ../pages/store.php');
  exit();
} else {
  require_once '../resources/conn_db.php';

  $query = "SELECT product_name, product_cost FROM products WHERE product_id = '$id';";
  ($result = mysqli_query($link, $query)) or die('Database error');

  if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    $itemName = $row['product_name'];
    $price = $row['product_cost'];
    $found = false;

    // if the cart is not empty
    if (isset($cart->items) && !empty($cart->items)) {
      // loop over array of items
      foreach ($cart->items as $itemIndex => $itemObj) {
        // if item to be added matches an item already in cart
        if ($itemObj->get_item_id() == $id) {
          // update the quantity
          $qty = $qty + $itemObj->get_qty();
          $cart->update_quantity($itemIndex, $qty);
          $found = true;
          break;
        }
      }
    }

    // if the item is not already in the cart, create a new item, add to cart and increment counter
    if (!$found) {
      $newItem = new Item($id, $itemName, $qty, $price);
      $cart->add_item($newItem);
      $counter++;
    }

    $_SESSION['counter'] = $counter;
    $_SESSION['cart'] = serialize($cart);

    header('Location: ../pages/view-cart.php');
    mysqli_close($link);
  } else {
    header('Location: ../pages/store.php');
    exit();
  }
}

?>