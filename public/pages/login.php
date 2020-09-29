<?php
session_start();
$root = '../';
$title = 'Log In';
include_once '../templates/header.php';
?>
<section ng-app="login" ng-controller="loginCtrl" class="container py-12 mx-auto max-w-2xl px-4" novalidate>
  <div class="bg-white p-6 shadow rounded">
    <h2 class="font-display uppercase text-3xl mb-1">Log In</h2>
    <form method="post" name="loginForm" action="../processes/process-login.php" id="loginForm">
      <div class="form-control">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Your registered email" ng-model="email" required />
        <span ng-show="loginForm.email.$touched && loginForm.email.$error.required" class="error-msg">Email is
          required.</span>
        <span ng-show="loginForm.email.$dirty && loginForm.email.$invalid" class="error-msg">Please enter a valid
          email.</span>
      </div>
      <div class="form-control">
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" ng-model="pass" required />
        <span ng-show="loginForm.pass.$touched && loginForm.pass.$error.required" class="error-msg">Password is
          required</span>
      </div>
      <div class="my-3" ng-show="loginForm.$dirty && loginForm.$invalid"><span
          class="text-red-600 font-semibold text-sm">Please fill out the form correctly before submitting</span></div>
      <input type="submit" name="login" value="Log In" class="btn btn-md btn-dark mt-2"
        ng-disabled="loginForm.$invalid" />
    </form>
    <small class="block mt-4"><a href="#" class="text-blue-800 underline">Forgot your password?</a></small>
  </div>
</section>
<script src="../js/login-controller.js"></script>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>