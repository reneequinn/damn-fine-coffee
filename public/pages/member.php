<?php
session_start();
$root = '../';
$title = 'Member';

include_once '../templates/header.php';
?>

<section class="container py-12 mx-auto max-w-4xl px-4">
  <?php // if loggedIn and customer_id are set
  if (isset($_SESSION['loggedIn']) && isset($_SESSION['customer_id'])) {
    $first_name = $_SESSION['first_name']; ?>

  <h2 class="font-display uppercase text-3xl mb-4">Welcome <?= $first_name ?></h2>
  <div class="grid md:grid-cols-2 gap-4">
    <div class="bg-white max-w-s p-4 rounded shadow text-center">
      <div class="w-full flex items-center justify-center p-4 text-gray-800">
        <span class="far fa-list-alt fa-5x text-gray-900"></span>
      </div>
      <a href="view-orders.php" class="btn btn-sm btn-light inline-block mt-4">View Orders</a>
    </div>
    <div class="bg-white max-w-s p-4 rounded shadow text-center">
      <div class="w-full flex items-center justify-center p-4 text-gray-800">
        <span class="fas fa-sign-out-alt fa-5x text-gray-900"></span>
      </div>
      <a href="../processes/logout.php" class="btn btn-sm btn-light inline-block mt-4">Log Out</a>
    </div>
  </div>
  <?php
  } else {
    // Redirect to log in page
    header('Location: login.php');
  } ?>
</section>

<?php include_once '../templates/footer.php'; ?>
</body>

</html>