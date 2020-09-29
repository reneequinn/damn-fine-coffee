<?php
session_start();
$root = '../';
$title = 'View Orders';
include_once '../templates/header.php';
?>
<section class="container mx-auto max-w-4xl py-12 px-4">
  <?php if (isset($_SESSION['loggedIn']) && isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id']; ?>
  <h2 class="font-display uppercase text-3xl mb-4">Your Orders</h2>
  <div class="bg-white rounded shadow w-full p-4">
    <?php
    require_once '../resources/conn_db.php';
    $query = "SELECT * FROM orders WHERE customer_id = '$customer_id';";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = $result->fetch_assoc()) {

        $order_id = $row['order_id'];
        $order_date = $row['order_date'];
        $order_status = $row['order_status'];
        $order_ship_date = $row['order_ship_date'];
        ?>
    <div class="rounded shadow my-2 p-4">
      <div class="flex justify-between mb-1">
        <h3 class="font-bold">Order #<?= $order_id ?></h3>
        <p>Placed <?= date_format(new DateTime($order_date), 'd/m/Y') ?></p>
        <p><?= ucfirst($order_status) ?>
          <?php if ($order_ship_date != null) {
            echo ' ' . date_format(new DateTime($order_ship_date), 'd/m/Y');
          } ?>
        </p>
      </div>
      <hr>
      <?php
      $detailsQuery = "SELECT order_details.*, products.product_name FROM order_details LEFT JOIN products ON order_details.product_id = products.product_id WHERE order_details.order_id = '$order_id';";
      $detailsResult = mysqli_query($link, $detailsQuery);
      ?>
      <table class="table-auto w-full text-sm mt-2">
        <tr class="border-b">
          <th class="text-left px-4 py-2 font-semibold">Product ID</th>
          <th class="text-left px-4 py-2 font-semibold">Product</th>
          <th class="text-right px-4 py-2 font-semibold">Quantity</th>
        </tr>
        <?php while ($row = $detailsResult->fetch_assoc()) {

          $product_id = $row['product_id'];
          $product_name = $row['product_name'];
          $qty = $row['product_quantity'];
          ?>
        <tr>
          <td class="text-left px-4 py-2"><?= $product_id ?></td>
          <td class="text-left px-4 py-2"><?= $product_name ?></td>
          <td class="text-right px-4 py-2"><?= $qty ?></td>
        </tr>
        <?php
        } ?>
      </table>
    </div>
    <?php
      }
    } else {
       ?>
    <p>You have no orders</p>
    <a href="./store.php" class="btn btn-sm btn-dark inline-block mt-2">Start Shopping</a>
    <?php
    }
    ?>
  </div>
  <?php mysqli_close($link);
  } else {
    header('Location: login.php');
  } ?>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>