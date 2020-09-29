<?php
session_start();
// if the order id has not been set
if (!isset($_SESSION['orderId'])) {
  // redirect to view cart
  header('Location ./pages/view-cart.php');
  exit();
}
// get relevant session vars
$orderId = $_SESSION['orderId'];
$orderTotal = $_SESSION['orderTotal'];
$orderStatus = $_SESSION['orderStatus'];
$root = '../';
$title = 'Payment Method';
include_once '../templates/header.php';
?>
<section class="container py-12 mx-auto">
  <div class="max-w-4xl p-4 mx-auto">
    <h2 class="font-display uppercase text-3xl">Payment</h2>
    <div class="bg-white w-full mx-auto rounded shadow p-4">
      <h3 class="my-4 font-semibold text-xl">Order Placed</h3>
      <table class="max-w-s table-auto rounded shadow border-gray-100">
        <tr class="border-b">
          <th class="text-left px-4 py-2 border-r">Order Number</th>
          <td class="px-4 py-2"><?= $orderId ?></td>
        </tr>
        <tr class="border-b">
          <th class="text-left px-4 py-2">Status</th>
          <td class="px-4 py-2"><?= ucfirst($orderStatus) ?></td>
        </tr>
        <tr class="border-b">
          <th class="text-left px-4 py-2">Order Total <span class="text-sm">(includes postage and GST)</span></th>
          <td class="px-4 py-2">$<?= $orderTotal ?></td>
        </tr>
      </table>
      <!-- Disclaimer for publishing a live demo to portfolio -->
      <p class="my-4">Note: This is only a demo site, with PayPal enabled in sandbox mode. We cannot accept payments or
        orders, so please do not enter your actual payment details.</p>
      <a href="../processes/process-payment.php" class="btn btn-sm btn-dark inline-block">Proceed to PayPal</a>
    </div>
  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>