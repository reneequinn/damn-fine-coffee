<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dev Domain - About</title>
  <link rel="stylesheet" href="../css/tailwind.css" />
  <link rel="stylesheet" href="../css/custom.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
</head>

<body class="flex flex-col min-h-screen">
  <header>
    <div class="flex items-center justify-between flex-wrap bg-gray-900 p-6">
      <div class="flex items-center mr-6">
        <a href="../index.php">
          <img src="../assets/img/logo.svg" alt="Dev Domain" />
        </a>
      </div>
      <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 text-white" id="menuBtn">
          <svg class="icon fill-current w-6 h-6">
            <use xlink:href="../assets/img/icons.svg#icon-menu"></use>
          </svg>
        </button>
      </div>
      <nav class="w-full block flex-grow hidden lg:flex lg:items-center lg:w-auto" id="nav">
        <div class="text-center lg:flex-grow lg:text-left">
          <a href="../index.php" class="block mt-4 p-2 lg:inline-block lg:mt-0 lg:mr-4 lg:p-0">Home</a>
          <a href="./about.php" class="block mt-4 p-2 lg:inline-block lg:mt-0 lg:mr-4 lg:p-0">About</a>
          <a href="./news.php" class="block mt-4 p-2 lg:inline-block lg:mt-0 lg:mr-4 lg:p-0">News</a>
          <a href="./events.php" class="block mt-4 p-2 lg:inline-block lg:mt-0 lg:mr-4 lg:p-0">Events</a>
          <a href="./contact.php" class="block mt-4 p-2 lg:inline-block lg:mt-0 lg:mr-4 lg:p-0">Contact</a>
        </div>
        <?php
          if (isset($_SESSION['username']) && $_SESSION['loggedIn']) {
            ?>
        <div class="text-center">
          <a href="./member.php" class="btn btn-outline block lg:inline-block mt-4 mx-2 lg:m-0">Member Dashboard</a>
          <a href="./logout.php" class="btn btn-purple block lg:inline-block mt-4 mx-2 lg:mt-0">Log Out</a>
        </div>
        <?php
          } else {
            ?>
        <div class="text-center">
          <a href="./register.php" class="btn btn-outline block lg:inline-block mt-4 mx-2 lg:m-0">Sign Up</a>
          <a href="./login.php" class="btn btn-purple block lg:inline-block mt-4 mx-2 lg:mt-0">Log In</a>
        </div>
        <?php
          }
          ?>
      </nav>
    </div>
  </header>
  <main class="flex-grow">
    <section class="container my-4 px-4 lg:p-0 mx-auto max-w-4xl">
      <h1 class="text-3xl mb-2">About Us</h1>
      <div class="bg-gray-900 p-4 rounded-md">
        <p class="my-4">Dev Domain has been connecting developers with each other since 2012. Starting in Adelaide,
          South Australia, and spreading worldwide, our members have a variety of experience, from beginner to seasoned
          developer. We have over 100,000 members in 160 countries, and with 13,000 meetup groups, there is bound to be
          a Dev Domain chapter near you.</p>
        <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias expedita numquam impedit
          minus ab a, fugiat incidunt molestiae voluptas? Sint, veritatis? Modi iste aut aspernatur voluptatum sed
          laboriosam placeat! Deserunt?</p>
        <p class="my-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, ipsum! Non ipsam quos optio ipsa
          asperiores temporibus provident corrupti quidem commodi quisquam distinctio atque esse, sunt voluptate!
          Exercitationem deserunt quam dolorem, nulla eum minus ipsa alias quaerat ea facilis a dicta debitis tenetur
          officia omnis?</p>
        <a href="./register.php" class="btn btn-purple my-4 inline-block">Sign Up Here</a>
      </div>
    </section>
  </main>
  <footer class="bg-gray-900">
    <div class="md:flex justify-between container items-top py-4 text-left px-4 sm:px-0 mt-2 mx-auto">
      <div class="flex-1 md:w:1/3 flex justify-around md:justify-start my-4">
        <ul class="leading-8 mr-8">
          <li>
            <a href="../index.php">Home</a>
          </li>
          <li>
            <a href="./about.php">About</a>
          </li>
          <li>
            <a href="./news.php">News</a>
          </li>
          <li>
            <a href="./events.php">Events</a>
          </li>
        </ul>
        <ul class="leading-8">
          <li>
            <a href="./contact.php">Contact</a>
          </li>
          <li>
            <a href="./privacy.php">Privacy Policy</a>
          </li>
          <li>
            <a href="./register.php">Sign Up</a>
          </li>
          <li>
            <a href="./login.php">Log In</a>
          </li>
        </ul>
      </div>
      <div class="flex-1 md:w-1/3 text-center md:text-left my-4">
        <form action="">
          <label for="newsletter-email" class="block mb-2">Sign up for our newsletter</label>
          <div class="flex items-baseline">
            <input type="email" class="inline mr-3" placeholder="example@email.com" />
            <input type="submit" value="Submit" class="btn btn-purple inline" disabled />
          </div>
        </form>
        <div class="mt-1">
          <h6 class="">Keep in touch</h6>
          <div class="flex items-center justify-center md:justify-start">
            <a href="#"><svg class="icon fill-current text-purple-600 h-8 w-8 m-1 ml-0 hover:text-purple-700">
                <use xlink:href="../assets/img/icons.svg#icon-facebook"></use>
              </svg></a>
            <a href="#"><svg class="icon fill-current text-purple-600 h-8 w-8 m-1 hover:text-purple-700">
                <use xlink:href="../assets/img/icons.svg#icon-twitter-square"></use>
              </svg></a>
            <a href="#"><svg class="icon fill-current text-purple-600 h-8 w-8 m-1 hover:text-purple-700">
                <use xlink:href="../assets/img/icons.svg#icon-instagram"></use>
              </svg></a>
          </div>
        </div>
      </div>
      <div class="flex-1 md:w-1/3 text-center md:text-right my-2">
        <img src="../assets/img/logo.svg" alt="Dev Domain" class="mx-auto md:ml-auto md:mr-0 mb-1" />
        <p class="mb-3 leading-tight">
          120 Currie St<br />
          Adelaide SA 5000<br />
          hello@domain.com<br />
          08 8100 2000
        </p>
        <span class="text-sm">&copy; 2020 Renee Quinn</span>
      </div>
    </div>
  </footer>
  <script src="../js/navbar.js"></script>
</body>

</html>