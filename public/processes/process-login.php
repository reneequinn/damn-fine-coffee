<?php
session_start();
$root = '../';
$title = 'Process Login';
include_once '../templates/header.php';
?>

<section class="container py-12 mx-auto max-w-2xl px-4">
  <?php
  require_once '../resources/functions.php';

  if (isset($_POST['login'])) {
    $email = checkInput($_POST['email']);
    $pass = checkInput($_POST['pass']);

    if (empty($email) or empty($pass)) {
      header('Location: login.php');
      exit();
    } else {
      require_once '../resources/conn_db.php';
      $query = "SELECT * FROM customers WHERE customer_email = '$email'";
      $result = mysqli_query($link, $query);

      if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_array();
        if (!password_verify($pass, $row['customer_password'])) {
          echo 'Password does not match';
        } else {
          $customer_id = $row['customer_id'];
          $first_name = $row['customer_first_name'];
          mysqli_close($link);
          $_SESSION['customer_id'] = $customer_id;
          $_SESSION['first_name'] = $first_name;
          $_SESSION['loggedIn'] = true;
          header('Location: ../pages/member.php');
          exit();
        }
      } else {
        echo 'Error: user not found or password incorrect';
      }
    }
  }
  ?>
</section>

<?php include_once '../templates/footer.php'; ?>
</body>

</html>