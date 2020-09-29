<?php
session_start();
$root = '../';
$title = 'Product Search';
if (isset($_POST['search'])) {
  $search = $_POST['search'];
  require_once '../resources/conn_db.php';
  $query = "SELECT * from products WHERE product_name LIKE '%$search%';";
  $result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    $id = $row['product_id'];
    header('Location: ../pages/product.php?id=' . $id);
    exit();
  } elseif (mysqli_num_rows($result) > 0) {
    include_once '../templates/header.php'; ?>
<section class="container py-12 mx-auto">
  <div class="text-center mx-auto">
    <h2 class="font-display uppercase text-3xl mb-2">Product Search</h2>
    <p class="mb-4">Showing results for <span class="italic">"<?= $search ?>"</span></p>
  </div>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

    <?php while ($row = $result->fetch_assoc()) {

      $id = $row['product_id'];
      $name = $row['product_name'];
      $desc = $row['product_desc'];
      $img = $row['product_img'];
      $price = $row['product_cost'];
      ?>
    <div class="bg-white max-w-s m-4 rounded overflow-hidden shadow">
      <img src="../img/<?= $img ?>" alt="<?= $name ?>" class="w-full">
      <div class="mx-4 mt-4 flex justify-between items-baseline">
        <span class="font-semibold text-lg"><?= $name ?></span>
        <span class="text-sm">$<?= $price ?></span>
      </div>
      <div class="px-4 w-full text-gray-800 mb-4 text-sm">
        <p class="truncate"><?= $desc ?></p>
      </div>
      <div class="px-4 mb-4 flex justify-between">
        <a href="../pages/product.php?id=<?= $id ?>" class="btn btn-sm btn-light inline">View More Info</a>
        <form action="./add-to-cart.php" method="post">
          <input type="hidden" value="<?= $id ?>" name="id">
          <input type="hidden" value="1" name="qty">
          <button class="btn btn-sm btn-dark inline">Add to Cart</button>
        </form>
      </div>
    </div>
    <?php
    } ?>

  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>
<?php
  } else {
    header('Location: ../pages/store.php');
    exit();
  }
  mysqli_close($link);
} ?>
