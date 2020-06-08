<?php
$referer = $_SERVER['HTTP_REFERER'];
if (strpos($referer, 'index')) {
  $root = './';
} else {
  $root = '../';
}
require_once '../resources/conn_db.php';
$productList = [];
$query = 'SELECT product_name FROM products;';
$result = mysqli_query($link, $query);
while ($row = $result->fetch_assoc()) {
  $productList[] = $row['product_name'];
}

// Get the fname parameter from URL
$searchParam = $_GET['searchParam'];
$hint = '';

// lookup all hints from array if fname not empty
if ($searchParam != '') {
  // convert to lower case
  $searchParam = strtolower($searchParam);
  $len = strlen($searchParam);
  // search the array
  foreach ($productList as $product) {
    // if matching name found
    $query = "SELECT product_id FROM products WHERE product_name = '$product';";
    $result = mysqli_query($link, $query);
    $row = $result->fetch_assoc();
    $productId = $row['product_id'];
    if (stristr($searchParam, substr($product, 0, $len))) {
      // if hit is blank
      if ($hint == '') {
        $hint =
          '<a href="' .
          $root .
          'pages/product.php?id=' .
          $productId .
          '" class="my-2">' .
          $product .
          '</a>';
      } else {
        // if hit already has records
        // build result set by appending the name
        $hint .=
          '<br><a href="' .
          $root .
          'pages/product.php?id=' .
          $productId .
          '" class="my-2">' .
          $product .
          '</a>';
      }
    }
  }
}

// output no suggestion if no hints found
// or output the correct values
if ($hint == '') {
  echo 'No suggestion';
} else {
  echo $hint;
}
?>