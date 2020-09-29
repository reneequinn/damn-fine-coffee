<?php
session_start();
$root = '../';
$title = 'Shop';
include_once '../templates/header.php';
?>
<section class="container py-12 mx-auto">
  <div class="text-center mx-auto">
    <h2 class="font-display uppercase text-3xl mb-4">Shop</h2>
    <p>Browse our range of coffee bean blends, brewing equipment and accessories.</p>
  </div>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php
    require_once '../resources/conn_db.php';
    $query = 'select * from products order by product_name;';
    $result = mysqli_query($link, $query);
    while ($row = $result->fetch_assoc()) {

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
        <a href="./product.php?id=<?= $id ?>" class="btn btn-sm btn-light inline">View More Info</a>
        <form action="../processes/add-to-cart.php" method="post">
          <input type="hidden" value="<?= $id ?>" name="id">
          <input type="hidden" value="1" name="qty">
          <button class="btn btn-sm btn-dark inline">Add to Cart</button>
        </form>
      </div>
    </div>

    <?php
    }
    mysqli_close($link);
    ?>
  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>