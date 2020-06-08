<?php
session_start();
$root = '../';
$title = 'Process Registration';

include_once '../templates/header.php';
require_once '../resources/functions.php';

$address1 = checkInput($_POST['address1']);
if (isset($_POST['address2'])) {
  $address2 = checkInput($_POST['address2']);
} else {
  $address2 = '';
}
$suburb = checkInput($_POST['suburb']);
$state = $_POST['state'];
$postcode = checkInput($_POST['postcode']);
$phone = checkInput($_POST['phone']);
$error = '';
$error_links = '';
$contact_link =
  '<a href="../pages/contact.php" class="btn btn-md btn-light inline-block mr-4">Contact Us</a>';
$register_link =
  '<a href="../pages/register.php" class="btn btn-md btn-dark inline-block">Return to Registration</a>';
?>
<section class="container py-12 mx-auto max-w-2xl px-4">
  <div>
    <p class="text-red-800 font-semibold mb-4"><?= $error ?></p>
    <?= $error_links ?>
  </div>
  <?php if (
    empty($address1) or
    empty($suburb) or
    empty($state) or
    empty($postcode) or
    empty($phone)
  ) {
    $error = 'Error: please complete all required fields.';
    $error_links = $register_link;
  } elseif (!preg_match('/[0-9]{4}/', $postcode)) {
    $error = 'Error: postcode must be 4 numbers only.';
    $error_links = $register_link;
  } elseif (
    !preg_match(
      '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
      $phone
    )
  ) {
    $error = 'Error: please enter a valid phone number.';
    $error_links = $register_link;
  } else {
    require_once '../resources/conn_db.php';
    $email = $_SESSION['email'];

    $query = "UPDATE customers SET customer_address1 = '$address1', customer_address2 = '$address2', customer_suburb = '$suburb', customer_state = '$state', customer_postcode = '$postcode', customer_phone = '$phone' WHERE customer_email = '$email'";
    $result = mysqli_query($link, $query);
    $rows_affected = mysqli_affected_rows($link);

    if (!$result) {
      $error =
        'Error: could not register to the database: ' . mysqli_error($link);
      $error_links = $contact_link;
      $error_links .= $register_link;
    } else {

      $error = '';
      $error_links = '';
      unset($_SESSION['email']);
      session_destroy();
      ?>

  <h2 class="font-display uppercase text-3xl mb-1">Registration Success</h2>
  <p class="font-semibold mb-4">Registration successful!</p>
  <a href="../pages/login.php" class="btn btn-md btn-dark inline-block">Log In</a>

  <?php
    }
    mysqli_close($link);
  } ?>
</section>

<?php include_once '../templates/footer.php'; ?>
</body>

</html>