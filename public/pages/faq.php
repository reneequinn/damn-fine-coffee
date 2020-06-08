<?php
session_start();
$root = '../';
$title = 'FAQ';
include_once '../templates/header.php';
?>
<section class="container mx-auto py-6 px-4">
  <div class="text-center max-w-4xl mx-auto mb-4">
    <h2 class="font-display uppercase text-3xl mb-2">
      Frequently Asked Questions
    </h2>
    <p class="mb-2">
      For any questions regarding payment or shipping, please read our
      FAQs below. If you don't find the answer you are looking for please
      contact us.<br />Our team is available Monday - Friday 9.00am -
      5.00pm CST.
    </p>
    <p class="mb-1"><strong>Email </strong>customercare@example.com</p>
    <p><strong>Phone </strong>(08) 8100 2000</p>
  </div>
  <div class="max-w-4xl mx-auto">
    <h3 class="text-lg uppercase font-bold mb-2">
      Do you ship internationally?
    </h3>
    <p class="mb-4">
      Unfortunately, no. We only ship to addresses within Australia.
    </p>
    <h3 class="text-lg uppercase font-bold mb-2">
      What shipping options are available?
    </h3>
    <p class="mb-4">
      We ship all of our orders through Australia Post. Regular and
      Express Parcel Post is available.
    </p>
    <h3 class="text-lg uppercase font-bold mb-2">
      When will my order ship?
    </h3>
    <p class="mb-4">
      We endeavour to ship all in stock items within one business day of
      payment. Back ordered items take longer and are labelled as such in
      the product information and on the cart page. We will send you an
      email notification when your purchase has been shipped.
    </p>
    <h3 class="text-lg uppercase font-bold mb-2">
      What payment options are available?
    </h3>
    <p class="mb-4">
      We accept PayPal for payments.
    </p>
  </div>
</section>
<?php include_once '../templates/footer.php'; ?>
</body>

</html>