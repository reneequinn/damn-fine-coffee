<?php
session_start();
$root = '../';
$title = 'Product Info';
include_once '../templates/header.php';
?>
<section ng-app="product" ng-controller="productCtrl" class="container py-12 mx-auto">
  <div class="max-w-4xl p-4 mx-auto">
    <a href="./store.php" class="btn btn-sm btn-light inline-block mb-4"><span
        class="fas fa-angle-left mr-1"></span>Return
      to store</a>
    <?php // if the product id is sent in the header
    if (isset($_GET['id'])) {
      require_once '../resources/functions.php';
      $id = checkInput($_GET['id']);
      require_once '../resources/conn_db.php';
      $query = "SELECT * FROM products WHERE product_id = '$id';";
      $result = mysqli_query($link, $query);

      if (mysqli_num_rows($result) == 1) {

        $row = $result->fetch_assoc();
        $name = $row['product_name'];
        $desc = $row['product_desc'];
        $img = $row['product_img'];
        $price = $row['product_cost'];
        ?>
    <div class="bg-white w-full mx-auto rounded overflow-hidden shadow grid md:grid-cols-2 gap-4">
      <img src="../img/<?= $img ?>" alt="<?= $name ?>" class="w-full">
      <form name="product" action="../processes/add-to-cart.php" method="post" class="flex items-center" novalidate>
        <div class="m-6">
          <h2 class="font-display uppercase text-xl mb-1"><?= $name ?></h2>
          <p class="text-2xl mb-2">$<?= $price ?></p>
          <p class="mb-4"><?= $desc ?></p>
          <div class="form-control">
            <label for="qty" class="w-auto mr-2">Quantity</label>
            <div class="flex items-center mb-1">

              <button aria-label="decrease quantity" ng-click="decQty()" type="button"
                class="btn btn-dark btn-sm py-1 mr-2"><span class="fas fa-minus"></span></button>
              <input type="number" name="qty" id="qty" pattern="^[0-9]*$" class="qty" min="1" max="10" ng-model="qty"
                required>
              <button aria-label="increase quantity" ng-click="incQty()" type="button"
                class="btn btn-dark btn-sm py-1 ml-2"><span class="fas fa-plus"></span></button>
            </div>
            <span ng-show="product.qty.$touched && product.qty.$error.required" class="block error-msg">Quantity is
              required.</span>
            <span ng-show="product.qty.$invalid && product.qty.$error.min" class="block error-msg">Quantity must be at
              least
              1.</span>
            <span ng-show="product.qty.$invalid && product.qty.$error.max" class="block error-msg">Quantity cannot be
              more
              than 10.</span>
          </div>
          <input type="hidden" name="id" value="<?= $id ?>">
          <input ng-disabled="product.$invalid" type="submit" value="Add to Cart"
            class="btn btn-md btn-dark inline-block mt-4 mb-2 w-full uppercase">
        </div>
      </form>
    </div>
    <?php
      } else {
         ?>
    <div class="max-w-4xl p-4 mx-auto text-center">
      <h2 class="font-display uppercase text-xl">Product info not found</h2>
    </div>
    <?php
      }
      mysqli_close($link);
    } else {
       ?>
    <div class="max-w-4xl p-4 mx-auto text-center">
      <h2 class="font-display uppercase text-xl">No product found</h2>
    </div>
    <?php
    } ?>
  </div>
</section>
<script src="../js/product-controller.js"></script>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>