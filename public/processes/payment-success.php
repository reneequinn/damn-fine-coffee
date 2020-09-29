<?php
session_start();
// if invoiceId has not been set in paypal process, redirect to payment
if (!isset($_SESSION['invoiceId'])) {
  header('Location: ../payment.php');
  exit();
}
$orderId = $_SESSION['orderId'];
$orderTotal = $_SESSION['orderTotal'];
$orderStatus = $_SESSION['orderStatus'];
$invoiceId = $_SESSION['invoiceId'];
$root = '../';
$title = 'Payment Received';
include_once '../templates/header.php';
?>
<section class="container py-12 mx-auto">
  <div class="max-w-4xl p-4 mx-auto">
    <h2 class="font-display uppercase text-3xl">Payment Received</h2>
    <div class="bg-white w-full mx-auto rounded shadow p-4">
      <h3 class="my-4 font-semibold text-xl">Your payment details</h3>
      <table class="max-w-s table-auto rounded shadow">
        <tr class="border-b">
          <th class="text-left px-4 py-2 border-r">Invoice Number</th>
          <td class="px-4 py-2"><?= $invoiceId ?></td>
        </tr>
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
      <a href="../pages/view-orders.php" class="btn btn-sm btn-light inline-block my-4 mr-2">View Orders</a>
      <a href="./logout.php" class="btn btn-sm btn-dark inline-block my-4">Log Out</a>
    </div>
  </div>
</section>
<?php
include_once '../templates/footer.php';
// unset session variables for privacy
unset($_SESSION['invoiceId']);
unset($_SESSION['orderId']);
unset($_SESSION['orderTotal']);
unset($_SESSION['orderStatus']);
?>
</body>

</html>