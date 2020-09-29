<?php
session_start();
$root = '../';
$title = 'Checkout';
include_once '../templates/header.php';
include '../resources/cart_obj.php';
$cart = new Cart();
if (!isset($_SESSION['counter'])) {
  $_SESSION['counter'] = 0;
}
$counter = $_SESSION['counter'];
?>
<section class="container py-12 mx-auto">
  <div class="max-w-4xl p-4 mx-auto">
    <h2 class="font-display uppercase text-3xl">Checkout</h2>
    <div class="bg-white w-full mx-auto rounded shadow p-4">
      <?php if ($counter == 0) { ?>
      <p class="mb-4">Your cart is empty.</p>
      <a href="./store.php" class="btn btn-sm btn-dark inline-block mb-4">Start shopping</a>
      <?php } else {if (
          !isset($_SESSION['loggedIn']) &&
          !isset($_SESSION['customer_id'])
        ) { ?>
      <p class="mb-4">You must register as a customer and be logged in to make purchases. Your cart details will be
        saved.</p>
      <a href="./login.php" class="btn btn-sm btn-light inline-block mr-2">Log In</a>
      <a href="./register.php" class="btn btn-sm btn-dark inline-block">Register</a>
      <?php } else {$customer_id = $_SESSION['customer_id'];
          $cart = unserialize($_SESSION['cart']);
          $depth = $cart->get_depth();
          $subTotal = $_SESSION['subTotal'];
          $postage = $_SESSION['postage'];
          $orderTotal = $_SESSION['orderTotal'];
          require_once '../resources/conn_db.php';
          $query = "SELECT * FROM customers WHERE customer_id = '$customer_id';";
          $result = mysqli_query($link, $query);
          if (mysqli_num_rows($result) == 1) {

            $row = $result->fetch_assoc();
            $fName = $row['customer_first_name'];
            $lName = $row['customer_last_name'];
            $address1 = $row['customer_address1'];
            $address2 = $row['customer_address2'];
            $suburb = $row['customer_suburb'];
            $state = $row['customer_state'];
            $postcode = $row['customer_postcode'];
            $phone = $row['customer_phone'];
            $email = $row['customer_email'];
            $_SESSION['orderEmail'] = $email;
            ?>
      <div class="grid md:grid-cols-2 gap-4 my-2">
        <div>
          <h3 class="text-l font-semibold mb-2">Confirm Your Details</h3>
          <table class="table-auto w-full rounded shadow">
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">First name</th>
              <td class="px-4 py-2"><?= $fName ?></td>
            </tr>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">Last name</th>
              <td class="px-4 py-2"><?= $lName ?></td>
            </tr>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">Phone</th>
              <td class="px-4 py-2"><?= $phone ?></td>
            </tr>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">Address</th>
              <td class="px-4 py-2"><?= $address1 ?></td>
            </tr>
            <?php if ($address2 != '' or $address2 != null) { ?>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">Address line 2</th>
              <td class="px-4 py-2"><?= $address2 ?></td>
            </tr>
            <?php } ?>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">Suburb</th>
              <td class="px-4 py-2"><?= $suburb ?></td>
            </tr>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">State</th>
              <td class="px-4 py-2"><?= $state ?></td>
            </tr>
            <tr class="border-b">
              <th class="text-left px-4 py-2 border-r">Suburb</th>
              <td class="px-4 py-2"><?= $postcode ?></td>
            </tr>
          </table>
        </div>
        <div>
          <h3 class="text-l font-semibold mb-2">Order Details</h3>
          <table class="table-auto w-full rounded shadow">
            <?php for ($i = 0; $i < $depth; $i++) {

              $item = $cart->get_item($i);
              $itemName = $item->get_item_name();
              $qty = $item->get_qty();
              $price = $item->get_item_cost();
              ?>
            <tr class="border-b">
              <td class="px-4 py-2 border-r"><?= $qty ?> x <?= $itemName ?></td>
              <td class="px-4 py-2 text-right">$<?= number_format(
                $price,
                2
              ) ?></td>
            </tr>
            <?php
            } ?>
            <tr class="border-b">
              <td class="px-4 py-2 text-right font-semibold italic border-r">Subtotal</td>
              <td class="px-4 py-2 text-right">$<?= number_format(
                $subTotal,
                2
              ) ?></td>
            </tr>
            <tr class="border-b">
              <td class="px-4 py-2 text-right border-r">Postage</td>
              <td class="px-4 py-2 text-right">
                <?php if ($postage == 0) {
                  echo 'Free';
                } else {
                  echo '$' . $postage;
                } ?></td>
            </tr>
            <tr>
              <td class="px-4 py-2 text-right font-bold border-r">Total</td>
              <td class="px-4 py-2 text-right">$<?= $orderTotal ?></td>
            </tr>
          </table>

          <div class="mt-4 flex justify-between md:justify-end">
            <a href="./view-cart.php" class="btn btn-sm btn-light inline-block mr-2"><span
                class="fas fa-angle-left mr-1"></span>Return to Cart</a>
            <a href="../processes/process-order.php" class="btn btn-sm btn-dark inline-block">Continue to Payment</a>
          </div>
        </div>
      </div>
      <?php
          }}} ?>
    </div>
  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>