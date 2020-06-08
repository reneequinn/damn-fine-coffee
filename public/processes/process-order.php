<?php
session_start();
if (!isset($_SESSION['counter'])) {
  header('Location: ../pages/view-cart.php');
  exit();
}
include '../resources/cart_obj.php';
$cart = new Cart();
$counter = $_SESSION['counter'];

if ($counter == 0) {
  header('Location: ../pages/view-cart.php');
  exit();
} else {
  // Get relevant session variables
  $custId = $_SESSION['customer_id'];
  $orderTotal = $_SESSION['orderTotal'];
  $postage = $_SESSION['postage'];
  $status = 'payment pending';
  // Get cart details
  $cart = unserialize($_SESSION['cart']);
  $depth = $cart->get_depth();
  // Connect to database and create the order
  require_once '../resources/conn_db.php';
  $query = "INSERT INTO orders (order_date, order_status, order_postage, order_total, customer_id) VALUES (now(), '$status', '$postage', '$orderTotal', '$custId');";
  $result = mysqli_query($link, $query);

  if ($result) {
    // get auto_inc order id
    $orderId = mysqli_insert_id($link);
    // iterate over cart items and add to order_details
    for ($i = 0; $i < $depth; $i++) {
      $item = $cart->get_item($i);
      $itemId = $item->get_item_id();
      $qty = $item->get_qty();

      $query = "INSERT INTO order_details (order_id, product_id, product_quantity) VALUES ('$orderId', '$itemId', '$qty');";
      ($result = mysqli_query($link, $query)) or
        die('Error inserting into order_details');
    }
    // set status and order id to session
    $_SESSION['orderId'] = $orderId;
    $_SESSION['orderStatus'] = $status;
    // clear cart and session variables
    unset($_SESSION['cart']);
    unset($_SESSION['counter']);
    unset($_SESSION['postage']);
    unset($_SESSION['subTotal']);
    // redirect to payment page
    header('Location: ../pages/payment.php');
    exit();
  } else {

    // set up page to show error message to user
    $root = '../';
    $title = 'Order Status';
    include_once '../templates/header.php';

    // display error and advise to contact
    ?>
<section class="container py-12 mx-auto">
  <div class="max-w-4xl p-4 mx-auto">
    <h2 class="font-display uppercase text-3xl">Order Error</h2>
    <div class="bg-white w-full mx-auto rounded shadow p-4">
      <p class="my-4">There was an error processing your order.</p>
      <a href="../pages/contact.php" class="btn btn-sm btn-dark inline-block">Contact Us</a>
    </div>
  </div>
</section>
<?
      include_once '../templates/footer.php';
      ?>
</body>

</html>
<?php
  }
  mysqli_close($link);
}

?>