<?php
session_start();
$root = './';
$title = 'Home';
include_once './templates/header.php';
?>
<section class="flex flex-wrap w-full bg-coffee">
  <div class="w-full flex items-center justify-center flex-1 md:w-1/2">
    <div class="text-center w-3/4 my-10 lg:text-left">
      <h2 class="font-display mb-4 uppercase text-2xl lg:text-5xl leading-tight">
        The home of alternative coffee brewing
      </h2>
      <p class="italic font-semibold mb-10 lg:text-lg">
        Fine bean blends and accessories for brewing the perfect cup of
        coffee.
      </p>
      <a href="./pages/store.php" class="btn btn-lg btn-dark inline-block uppercase tracking-wide">Shop Now</a>
    </div>
  </div>
  <div class="flex-auto md:flex-1 w-full md:block md:w-1/2">
    <img src="img/coffee-brewing.jpg" alt="Pour over coffee being brewed" class="object-cover w-full" />
  </div>
</section>
<section class="container py-6 mx-auto">
  <h3 class="font-display text-3xl uppercase text-center mb-2">Featured Products</h3>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php
    require_once './resources/conn_db.php';
    $query =
      'select * from products where product_featured = 1 order by product_cost desc;';
    $result = mysqli_query($link, $query);
    while ($row = $result->fetch_assoc()) {

      $id = $row['product_id'];
      $name = $row['product_name'];
      $desc = $row['product_desc'];
      $img = $row['product_img'];
      $price = $row['product_cost'];
      ?>
    <div class="bg-white max-w-s m-4 rounded overflow-hidden shadow">
      <img src="img/<?= $img ?>" alt="<?= $name ?>" class="w-full">
      <div class="mx-4 mt-4 flex justify-between items-baseline">
        <span class="font-semibold text-lg"><?= $name ?></span>
        <span class="text-sm">$<?= $price ?></span>
      </div>
      <div class="px-4 w-full text-gray-800 mb-4 text-sm">
        <p class="truncate"><?= $desc ?></p>
      </div>
      <div class="px-4 mb-4 flex justify-between">
        <a href="./pages/product.php?id=<?= $id ?>" class="btn btn-sm btn-light inline">View More Info</a>
        <form action="./processes/add-to-cart.php" method="post">
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
<?php include_once './templates/footer.php'; ?>
</body>

</html>