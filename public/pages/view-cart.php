<?php
session_start();
$root = '../';
$title = 'View Cart';
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
    <h2 class="font-display uppercase text-3xl mb-4">View Cart</h2>
    <div class="bg-white w-full mx-auto rounded shadow p-4">
      <?php if ($counter == 0) { ?>
      <p class="mb-4">Your cart is empty.</p>
      <a href="./store.php" class="btn btn-sm btn-dark inline-block mb-4">Start shopping</a>
      <?php } else {
        $cart = unserialize($_SESSION['cart']);
        $depth = $cart->get_depth();
        $subTotal = 0;
        $postage = 0;
        ?>

      <table class="table-auto w-full rounded overflow-hidden shadow">
        <tr class="bg-gray-200 border-b">
          <th class="text-left px-4 py-2">Item</th>
          <th class="px-4 py-2">Quantity</th>
          <th class="text-right px-4 py-2">Price</th>
        </tr>
        <?php for ($i = 0; $i < $depth; $i++) {

          $item = $cart->get_item($i);
          $itemId = $item->get_item_id();
          $itemName = $item->get_item_name();
          $qty = $item->get_qty();
          $price = $item->get_item_cost();
          $subTotal = $subTotal + $price;
          ?>

        <tr class="border-b">
          <td class="px-4 py-2 border-r flex justify-between items-center flex-wrap"><span
              class="hidden"><?= $i ?></span><?= $itemName ?>
            <form action="../processes/remove-from-cart.php" method="post">
              <input type="hidden" name="itemNo" value="<?= $i ?>">
              <input type="submit"
                class="text-sm font-semibold bg-gray-400 rounded-full px-3 py-1 hover:bg-gray-500 cursor-pointer my-1"
                value="Remove">
            </form>
          </td>
          <td class="px-4 py-2 border-r">
            <form action="../processes/update-cart.php" method="post"
              class="flex flex-no-wrap items-center justify-center">
              <input type="hidden" name="itemNo" value="<?= $i ?>">
              <input type="number" name="qty" min="0" max="10" value="<?= $qty ?>"
                class="qty py-1 px-2 rounded border-2 border-gray-600 mr-1">
              <input type="submit"
                class="text-sm font-semibold bg-gray-800 text-white rounded-full px-3 py-1 hover:bg-gray-900 cursor-pointer my-1"
                value="Update">
            </form>
          </td>
          <td class="text-right px-4 py-2">$<?= number_format($price, 2) ?></td>
        </tr>
        <?php
        } ?>
        <tr class="border-b">
          <td class="text-right px-4 py-2 border-r font-semibold italic" colspan="2">Subtotal</td>
          <td class="text-right px-4 py-2">$<?= number_format(
            $subTotal,
            2
          ) ?></td>
        </tr>
        <tr class="border-b">
          <td class="text-right px-4 py-2 border-r" colspan="2">Postage</td>
          <td class="text-right px-4 py-2">
            <?php
            // check order subtotal - postage is free if over $50
            if ($subTotal >= 50) {
              $postage = 0;
              echo 'Free';
            } else {
              $postage = 8.95;
              echo '$' . $postage;
            }
            $orderTotal = number_format($subTotal + $postage, 2);
            $_SESSION['subTotal'] = $subTotal;
            $_SESSION['postage'] = $postage;
            $_SESSION['orderTotal'] = $orderTotal;
            ?>
          </td>
        </tr>
        <tr>
          <td class="text-right font-bold px-4 py-2 border-r" colspan="2">Total</td>
          <td class="text-right px-4 py-2">$<?= $orderTotal ?></td>
        </tr>
      </table>
      <div class="my-4 flex justify-end">
        <a href="./store.php" class="btn btn-sm btn-light inline-block mr-2"><span
            class="fas fa-angle-left mr-1"></span>Continue Shopping</a>
        <a href="./checkout.php" class="btn btn-sm btn-dark inline-block">Checkout</a>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>