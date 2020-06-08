<?php
session_start();

// Get session variables
$orderEmail = $_SESSION['orderEmail'];
$orderTotal = $_SESSION['orderTotal'];
/*  PHP Paypal IPN Integration Class Demonstration File
 *
 */
// Setup class
require_once '../resources/paypal.class.php'; // include the class file
$p = new paypal_class(); // initiate an instance of the class
$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // testing paypal url
//$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url

// setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
$this_script = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) {
  $_GET['action'] = 'process';
}

switch ($_GET['action']) {
  case 'process': // Process and order...
    // For example, after ensuring all the POST variables from your custom
    // order form are valid, you might have:
    //
    // $p->add_field('first_name', $_POST['first_name']);
    // $p->add_field('last_name', $_POST['last_name']);

    $p->add_field('business', 'test-business@damnfinecoffee.com');
    $p->add_field('return', $this_script . '?action=success');
    $p->add_field('cancel_return', $this_script . '?action=cancel');
    $p->add_field('notify_url', $this_script . '?action=ipn');
    $p->add_field('item_name', 'Order'); // edit to say total price
    $p->add_field('amount', $orderTotal); // get from session var
    $p->add_field('currency_code', 'AUD');
    $p->add_field('email', $orderEmail);
    // Add invoice id from db write

    $p->submit_paypal_post(); // submit the fields to paypal
    //$p->dump_fields();      // for debugging, output a table of all the fields
    break;

  case 'success': // Order was successful...
    // This is where you would have the code to
    // email an admin, update the database with payment status, activate a
    // membership, etc.

    // echo "<html><head><title>Success</title></head><body><h3>Thank you for your order.</h3>";
    // foreach ($_POST as $key => $value) { echo "$key: $value<br>"; }
    // echo "</body></html>";

    $invoiceId = $_POST['txn_id'];
    $_SESSION['invoiceId'] = $invoiceId;
    $_SESSION['orderStatus'] = 'received';
    header('Location: ./payment-success.php');
    exit();

    // You could also simply re-direct them to another page, or your own
    // order status page which presents the user with the status of their
    // order based on a database

    break;

  case 'cancel': // Order was canceled...
    // The order was canceled before being completed.

    header('Location: ../pages/payment.php');
    exit();
    break;

  case 'ipn': // Paypal is calling page for IPN validation...
    // It's important to remember that paypal calling this script.  There
    // is no output here.  This is where you validate the IPN data and if it's
    // valid, update your database to signify that the user has payed.  If
    // you try and use an echo or printf function here it's not going to do you
    // a bit of good.  This is on the "backend".  That is why, by default, the
    // class logs all IPN data to a text file.

    if ($p->validate_ipn()) {
      // Payment has been recieved and IPN is verified.  This is where you
      // update your database to activate or process the order, or setup
      // the database with the user's order details, email an administrator,
      // etc.  You can access a slew of information via the ipn_data() array.

      // For this example, we'll just email ourselves ALL the data.
      $subject = 'Instant Payment Notification - Recieved Payment';
      $to = 'renee-test-personal@tafesa.edu.au'; //  get from session var
      $body = "An instant payment notification was successfully recieved\n";
      $body .= 'from ' . $p->ipn_data['payer_email'] . ' on ' . date('m/d/Y');
      $body .= ' at ' . date('g:i A') . "\n\nDetails:\n";

      foreach ($p->ipn_data as $key => $value) {
        $body .= "\n$key: $value";
      }
      mail($to, $subject, $body);
    }
    break;
}

?>