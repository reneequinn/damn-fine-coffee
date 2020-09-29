<?php
session_start();
$root = '../';
$title = 'About';
include_once '../templates/header.php';
?>
<section class="container mx-auto py-12">
  <div class="max-w-4xl mx-auto p-4">
    <div class=" bg-white w-full rounded shadow overflow-hidden md:grid grid-cols-2 gap-4">
      <div class="flex flex-col justify-center p-4">
        <h2 class="font-display uppercase text-3xl mb-4">
          About Damn Fine Coffee Co.
        </h2>
        <p class="font-light italic text-xl mb-4">
          Australian, independently owned and operated.<br />Specialising in
          organic, fair-trade bean blends and alternative brewing accessories.
        </p>
        <p>
          Damn Fine Coffee Co. has been operating in Adelaide, South Australia
          for over 10 years. We specialise in bringing the finest quality bean
          blends to coffee lovers. We are committed to fair-trade and
          organically grown product for our blends.
        </p>
        <p>
          In addition to our coffee, we provide a select range of alternative
          brewing equipment and accessories. Our range includes pour-over,
          stove-top and French press methods. We also stock a range of
          accessories including serving-ware and mug for sharing that perfect
          cup.
        </p>
      </div>
      <div class="sm:flex justify-end">
        <img src="../img/coffee-beans.jpg" alt="Coffee beans in an industrial grinder" class="max-w-md" />
      </div>
    </div>
  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>