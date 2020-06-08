<?php
session_start();
$root = '../';
$title = 'Continue Registration';
include_once '../templates/header.php';

// Get checkInput function
require_once '../resources/functions.php';
// User input from register.php
$first_name = checkInput($_POST['firstName']);
$last_name = checkInput($_POST['lastName']);
$email = checkInput($_POST['email']);
$pass = checkInput($_POST['pass']);
$repass = checkInput($_POST['pass2']);
$error = '';
$error_links = '';
$login_link =
  '<a href="../pages/login.php" class="btn btn-md btn-light inline-block mr-4">Log In</a>';
$register_link =
  '<a href="../pages/register.php" class="btn btn-md btn-dark inline-block">Return to Registration</a>';
$contact_link =
  '<a href="../pages/contact.php" class="btn btn-md btn-light inline-block mr-4">Contact Us</a>';
?>

<section ng-app="register2" ng-controller="registerCtrl2" class="container py-12 mx-auto max-w-2xl px-4">
  <div>
    <p class="text-red-800 font-semibold mb-4"><?= $error ?></p>
    <?= $error_links ?>
  </div>
  <?php if (
    empty($first_name) or
    empty($last_name) or
    empty($email) or
    empty($pass) or
    empty($repass)
  ) {
    $error = 'Error: all fields are required.';
    $error_links = $register_link;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Error: invalid email.';
    $error_links = $register_link;
  } elseif (
    !preg_match(
      '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/',
      $pass
    )
  ) {
    $error =
      'Error: password must contain an uppercase, lowercase, number and special character and be at least 8 characters long.';
    $error_links = $register_link;
  } elseif ($pass != $repass) {
    $error = 'Error: passwords do not match';
    $error_links = $register_link;
  } else {
    require_once '../resources/conn_db.php';

    $check_query = "SELECT * FROM customers WHERE customer_email='$email'";
    $check_res = mysqli_query($link, $check_query);

    if (mysqli_num_rows($check_res) > 0) {
      $error = 'Error: the email you have entered is already registered.';
      $error_links = $login_link;
      $error_links .= $register_link;
    } else {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      $insert_query = "INSERT INTO customers (customer_email, customer_password, customer_first_name, customer_last_name) VALUES ('$email', '$pass', '$first_name', '$last_name')";
      $insert_res = mysqli_query($link, $insert_query);

      if (!$insert_res) {
        $error =
          'Error: could not register to the database: ' . mysqli_error($link);
        $error_links = $contact_link;
        $error_links .= $register_link;
      } else {

        $error = '';
        $error_links = '';
        $_SESSION['email'] = $email;
        ?>
  <!-- Start step 2 of registration -->
  <h2 class="font-display uppercase text-3xl mb-1">Register Your Address and Phone Number</h2>
  <p class="mb-4">Enter your shipping details and phone number</p>
  <div class="bg-white p-6 shadow rounded">
    <form name="regCont" id="regCont" method="post" action="./process-register.php" novalidate>
      <div class="form-control">
        <label for="address1">Address Line 1<span> (required)</span></label>
        <input type="text" name="address1" id="address1" placeholder="Your first address line" ng-model="address1"
          ng-minlength="3" required>
        <span ng-show="regCont.address1.$touched && regCont.address1.$error.required" class="error-msg">Address line 1
          is
          required.</span>
        <span ng-show="regCont.address1.$dirty && regCont.address1.$error.minlength" class="error-msg">Address line 1
          must be at least 3 characters.</span>
      </div>
      <div class="form-control">
        <label for="address2">Address Line 2</label>
        <input type="text" name="address2" id="address2" placeholder="Your second address line" ng-model="address2"
          ng-minlength="3">
        <span ng-show="regCont.address2.$dirty && regCont.address2.$error.minlength" class="error-msg">Address line 2
          must be at least 3 characters.</span>
      </div>
      <div class="form-control">
        <label for="suburb">Suburb<span> (required)</span></label>
        <input type="text" name="suburb" id="suburb" placeholder="Your suburb" ng-model="suburb" ng-minlength="3"
          required>
        <span ng-show="regCont.suburb.$touched && regCont.suburb.$error.required" class="error-msg">Suburb is
          required.</span>
        <span ng-show="regCont.suburb.$dirty && regCont.suburb.$error.minlength" class="error-msg">Suburb must be at
          least 3 characters.</span>
      </div>
      <div class="form-control">
        <label for="state">State<span> (required)</span></label>
        <select name="state" id="state" ng-model="state" required>
          <option value="" selected disabled>Select Your State</option>
          <option value="ACT">ACT</option>
          <option value="NSW">NSW</option>
          <option value="NT">NT</option>
          <option value="QLD">QLD</option>
          <option value="SA">SA</option>
          <option value="TAS">TAS</option>
          <option value="VIC">VIC</option>
          <option value="WA">WA</option>
        </select>
        <span ng-show="regCont.state.$touched && regCont.state.$error.required" class="error-msg">State is
          required.</span>
      </div>
      <div class="form-control">
        <label for="postcode">Postcode<span> (required)</span></label>
        <input type="text" name="postcode" id="postcode" ng-model="postcode" required pattern="[0-9]{4}">
        <span ng-show="regCont.postcode.$touched && regCont.postcode.$error.required" class="error msg">Postcode is
          required.</span>
        <span ng-show="regCont.postcode.$dirty && regCont.postcode.$invalid" class="error-msg">Please enter a valid
          postcode.</span>
      </div>
      <div class="form-control">
        <label for="phone">Phone Number<span> (required)</span></label>
        <input type="text" name="phone" id="phone" ng-model="phone" required
          pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$">
        <span ng-show="regCont.phone.$touched && regCont.phone.$error.required" class="error-msg">Phone number is
          required.</span>
        <span ng-show="regCont.phone.$dirty && regCont.phone.$invalid" class="error-msg">Please enter a valid phone
          number.</span>
      </div>
      <div class="my-3" ng-show="regCont.$invalid && regCont.$dirty"><span
          class="text-red-600 font-semibold text-sm">Please fill out the form correctly before submitting</span></div>
      <input type="submit" name="register-address" value="Complete Registration" id="register-address"
        class="btn btn-md btn-dark mt-2" ng-disabled="regCont.$invalid">
    </form>
  </div>
  <?php
      }
    }
    mysqli_close($link);
  } ?>
</section>
<script src="../js/register2-controller.js"></script>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>