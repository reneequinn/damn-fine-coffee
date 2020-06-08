<?php
session_start();
$root = '../';
$title = 'Register';
include_once '../templates/header.php';
?>
<section ng-app="register" ng-controller="registerCtrl" class="container py-12 mx-auto max-w-2xl px-4">
  <div class="bg-white p-6 shadow rounded">
    <h2 class="font-display uppercase text-3xl mb-1">Register</h2>
    <p class="mb-4">
      Use this form to register as a customer and start shopping.
    </p>
    <form name="regForm" id="regForm" method="post" action="../processes/continue-register.php" novalidate>
      <div class="form-control">
        <label for="first-name">First Name<span> (required)</span></label>
        <input type="text" name="firstName" id="firsName" placeholder="Your first name" ng-model="firstName"
          ng-minlength="3" ng-maxlength="30" required />
        <span ng-show="regForm.firstName.$touched && regForm.firstName.$error.required" class="error-msg">First name is
          required.</span>
        <span
          ng-show="regForm.firstName.$dirty && (regForm.firstName.$error.minlength || regForm.firstName.$error.maxlength)"
          class="error-msg">First name must be between 3 and 30 characters.</span>
      </div>
      <div class="form-control">
        <label for="last-name">Last Name<span> (required)</span></label>
        <input type="text" name="lastName" id="lastName" placeholder="Your last name" ng-model="lastName"
          ng-minlength="3" ng-maxlength="30" required />
        <span ng-show="regForm.lastName.$touched && regForm.lastName.$error.required" class="error-msg">Last name is
          required.</span>
        <span
          ng-show="regForm.firstName.$dirty && (regForm.firstName.$error.minlength || regForm.firstName.$error.maxlength)"
          class="error-msg">Last name must be between 3 and 30 characters.</span>
      </div>
      <div class="form-control">
        <label for="email">Email<span> (required)</span></label>
        <input type="email" name="email" id="email" placeholder="Your email" ng-model="email" required />
        <span ng-show="regForm.email.$touched && regForm.email.$error.required" class="error-msg">Email is
          required.</span>
        <span ng-show="regForm.email.$touched && regForm.email.$invalid" class="error-msg">Please enter a valid
          email.</span>
      </div>
      <div class="form-control">
        <label for="pass">Password<span> (required)</span></label>
        <input type="password" name="pass" id="pass" ng-model="pass" required
          pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" />
        <span ng-show="regForm.pass.$touched && regForm.pass.$error.required" class="error-msg">Password
          is required.</span>
        <span ng-show="regForm.pass.$touched && regForm.pass.$invalid" class="error-msg">Password must
          contain a number, uppercase, lowercase, and
          special character and be at least 8 characters.</span>
      </div>
      <div class="form-control">
        <label for="pass2">Confirm password<span> (required)</span></label>
        <input type="password" name="pass2" id="pass2" ng-model="pass2" data-password-verify="pass" required
          pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" />
        <span ng-show="regForm.pass2.$touched && regForm.pass2.$error.required" class="error-msg">Confirm password is
          required.</span>
        <span ng-show="regForm.pass2.$touched && regForm.pass2.$error.passwordVerify">Passwords
          must match.</span>
      </div>
      <div class="my-3" ng-show="regForm.$invalid && regForm.$dirty"><span
          class="text-red-600 font-semibold text-sm">Please fill out the form correctly before submitting</span></div>
      <input type="submit" name="register" value="Register" id="register" class="btn btn-md btn-dark mt-2"
        ng-disabled="regForm.$invalid" />
    </form>
  </div>
</section>
<script src="../js/register-controller.js"></script>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>