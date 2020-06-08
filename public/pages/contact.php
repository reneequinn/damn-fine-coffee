<?php
session_start();
$root = '../';
$title = 'Contact';
include_once '../templates/header.php';
?>
<section ng-app="contact" ng-controller="contactCtrl" class="container mx-auto py-12 px-4 max-w-2xl">
  <div class="bg-white p-6 shadow rounded">
    <div class="text-center mx-2 mb-10">
      <h2 class="font-display uppercase text-3xl">Contact Us</h2>
      <p>
        Want to get in touch? Use this form to contact us via email or
        call (08) 8100 2000 Monday - Friday 9.00am - 5.00pm CST
      </p>
    </div>
    <form name="contact" id="contact-form" ng-submit="handleSubmit()" novalidate class="my-2">
      <div class="form-control">
        <label for="name">Name</label><span> (required)</span>
        <input type="text" name="name" id="name" placeholder="Your name" ng-model="name" ng-maxlength="30" required />
        <span ng-show="contact.name.$touched && contact.name.$error.required" class="error-msg">Name is required.</span>
        <span ng-show="contact.name.$dirty && contact.name.$error.maxlength" class="error-msg">Name cannot be more than
          30 characters</span>
      </div>
      <div class="form-control">
        <label for="email">Email<span> (required)</span></label>
        <input type="email" name="email" id="email" placeholder="Your email address" ng-model="email" required />
        <span ng-show="contact.email.$touched && contact.email.$error.required" class="error-msg">Email is
          required.</span>
        <span ng-show="contact.email.$dirty && contact.email.$invalid" class="error-msg">Please enter a valid
          email.</span>
      </div>
      <div class="form-control">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" placeholder="Your message subject" ng-model="subject"
          ng-maxlength="30" />
        <span ng-show="contact.subject.$dirty && contact.$error.maxlength" class="error-msg">Subject cannot be more than
          30 characters.</span>
      </div>
      <div class="form-control">
        <label for="message">Message<span> (required)</span></label>
        <textarea name="message" id="message" placeholder="Your message" rows="5" ng-model="message"
          required></textarea>
        <span ng-show="contact.message.$touched && contact.message.$error.required" class="error-msg">Message is
          required.</span>
      </div>
      <input type="submit" value="Submit" class="btn btn-md btn-dark mt-2" ng-disabled="contact.$invalid" />
    </form>
    <div ng-show="success">
      <p class="font-semibold text-sm bg-gray-300 rounded-full px-3 py-1 mt-4">Message sent! We will be in touch
        shortly.</p>
    </div>
  </div>
</section>
<script src="../js/contact-controller.js"></script>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>