<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Zilla+Slab:700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $root ?>css/tailwind.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
  <script src="<?= $root ?>js/product-search.js">
  </script>
  <title>Damn Fine Coffee Co. | <?= $title ?></title>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
  <header class="sticky top-0 shadow">
    <div class="bg-black text-white text-sm flex items-center justify-between py-3 px-4 font-bold">
      <?php if (
        isset($_SESSION['loggedIn']) &&
        isset($_SESSION['customer_id'])
      ) { ?>
      <div class="flex items-center justify-between">
        <a href="<?= $root ?>pages/member.php"
          class="px-3 py-1 mr-4 rounded block bg-gray-800 hover:bg-gray-900">Profile</a>
        <a href="<?= $root ?>processes/logout.php" class="px-3 py-1 rounded block bg-gray-800 hover:bg-gray-900">Log
          Out</a>
      </div>
      <?php } else { ?>
      <div class="flex items-center justify-between">
        <a href="<?= $root ?>pages/login.php" class="px-3 py-1 mr-4 rounded block bg-gray-800 hover:bg-gray-900">Log
          In</a>
        <a href="<?= $root ?>pages/register.php"
          class="px-3 py-1 rounded block bg-gray-800 hover:bg-gray-900">Register</a>
      </div>
      <?php } ?>
      <a href="<?= $root ?>pages/view-cart.php"
        class="px-3 py-1 rounded block lg:inline-block bg-gray-800 hover:bg-gray-900" title="View Cart">
        <span class="fas fa-shopping-cart mr-2"></span><span>View Cart</span>
      </a>
    </div>
    <div class="bg-white px-4 lg:flex lg:py-3 lg:items-center">
      <div class="flex items-center justify-between py-3">
        <div class="mr-4">
          <a href="<?= $root ?>index.php" class="flex items-center">
            <h1 class="font-display uppercase text-xl">
              Damn Fine Coffee Co.
            </h1>
          </a>
        </div>
        <div class="lg:hidden">
          <button id="menuBtn" type="button" class="block">
            <span id="menuIcon" class="fas fa-bars h-6 w-6"></span>
          </button>
        </div>
      </div>
      <nav id="nav" class="px-2 pt-2 pb-4 font-semibold hidden lg:block lg:flex lg:p-0 lg:justify-between flex-grow">
        <div class="lg:flex lg:items-center">
          <a class="block px-2 py-1" href="<?= $root ?>index.php">Home</a>
          <a class="block px-2 py-1 mt-1 md:mt-0 lg:ml-2" href="<?= $root ?>pages/store.php">
            Shop
          </a>
          <a class="block px-2 py-1 mt-1 lg:mt-0 lg:ml-2" href="<?= $root ?>pages/about.php">About</a>
          <a class="block px-2 py-1 mt-1 lg:mt-0 lg:ml-2" href="<?= $root ?>pages/contact.php">Contact</a>
        </div>
        <div class="lg:flex lg:items-center">
          <form autocomplete="off" class="relative" action="<?= $root ?>processes/search-products.php" method="post">
            <input type="text" aria-label="search for product"
              class="my-1 px-2 py-1 rounded border-2 border-gray-400 w-full lg:w-auto focus:border-blue-300"
              placeholder="Search..." id="search" name="search" title="Enter your search term" onkeyup="showHint()" />
            <label for="search" class="hidden">
              Search
            </label>
            <button aria-label="search" class="absolute right-0 top-0 p-2" title="Search">
              <span class="fas fa-search"></span>
            </button>
            <div class="absolute py-2 px-4 bg-white rounded shadow w-full" id="search-result" onclick="removeHint()">
            </div>
          </form>
        </div>
      </nav>
    </div>
  </header>

  <main class="shadow flex-grow">