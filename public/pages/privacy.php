<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dev Domain - Privacy</title>
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
      <h1 class="text-3xl mb-2">Privacy Policy</h1>
      <div class="bg-gray-900 py-4 px-6 rounded-md">
        <p class="mb-4">Last updated: May 20, 2020</p>
        <p class="mb-4">This Privacy Policy describes Our policies and procedures on the collection, use and disclosure
          of Your
          information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
        <p class="mb-4">We use Your Personal data to provide and improve the Service. By using the Service, You agree to
          the
          collection and use of information in accordance with this Privacy Policy. This Privacy Policy has been created
          with the help of the <a href="https://www.termsfeed.com/privacy-policy-generator/" target="_blank"
            class="underline text-purple-600 hover:text-purple-700">Privacy
            Policy Generator</a>.</p>
        <h2 class="text-2xl mb-2">Interpretation and Definitions</h2>
        <h3 class="text-lg mb-2">Interpretation</h3>
        <p class="mb-4">The words of which the initial letter is capitalized have meanings defined under the following
          conditions.
          The following definitions shall have the same meaning regardless of whether they appear in singular or in
          plural.</p>
        <h3 class="text-lg">Definitions</h3>
        <p class="mb-4">For the purposes of this Privacy Policy:</p>
        <ul class="mb-4 list-disc ml-6">
          <li class="mb-2">
            <p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal
              entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
          </li>
          <li class="mb-2">
            <p><strong>Company</strong> (referred to as either &quot;the Company&quot;, &quot;We&quot;, &quot;Us&quot;
              or &quot;Our&quot; in this Agreement) refers to Dev Domain, 120 Currie St, Adelaide SA 5000.</p>
          </li>
          <li class="mb-2">
            <p><strong>Affiliate</strong> means an entity that controls, is controlled by or is under common control
              with a party, where &quot;control&quot; means ownership of 50% or more of the shares, equity interest or
              other securities entitled to vote for election of directors or other managing authority.</p>
          </li>
          <li class="mb-2">
            <p><strong>Account</strong> means a unique account created for You to access our Service or parts of our
              Service.</p>
          </li>
          <li class="mb-2">
            <p><strong>Website</strong> refers to Dev Domain, accessible from <a href="devdomain.azurewebsites.net"
                rel="external nofollow noopener" target="_blank">devdomain.azurewebsites.net</a></p>
          </li>
          <li class="mb-2">
            <p><strong>Service</strong> refers to the Website.</p>
          </li>
          <li class="mb-2">
            <p><strong>Country</strong> refers to: South Australia, Australia</p>
          </li>
          <li class="mb-2">
            <p><strong>Service Provider</strong> means any natural or legal person who processes the data on behalf of
              the Company. It refers to third-party companies or individuals employed by the Company to facilitate the
              Service, to provide the Service on behalf of the Company, to perform services related to the Service or to
              assist the Company in analyzing how the Service is used.</p>
          </li>
          <li class="mb-2">
            <p><strong>Third-party Social Media Service</strong> refers to any website or any social network website
              through which a User can log in or create an account to use the Service.</p>
          </li>
          <li class="mb-2">
            <p><strong>Personal Data</strong> is any information that relates to an identified or identifiable
              individual.</p>
          </li>
          <li class="mb-2">
            <p><strong>Cookies</strong> are small files that are placed on Your computer, mobile device or any other
              device by a website, containing the details of Your browsing history on that website among its many uses.
            </p>
          </li>
          <li class="mb-2">
            <p><strong>Device</strong> means any device that can access the Service such as a computer, a cellphone or a
              digital tablet.</p>
          </li>
          <li class="mb-2">
            <p><strong>Usage Data</strong> refers to data collected automatically, either generated by the use of the
              Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>
          </li>
        </ul>
        <h2 class="text-2xl mb-2">Collecting and Using Your Personal Data</h2>
        <h3 class="text-lg mb-2">Types of Data Collected</h3>
        <h3 class="mb-2">Personal Data</h3>
        <p class="mb-4">While using Our Service, We may ask You to provide Us with certain personally identifiable
          information that
          can be used to contact or identify You. Personally identifiable information may include, but is not limited
          to:</p>
        <ul class="mb-4 list-disc ml-6">
          <li class="mb-2">
            <p>Email address</p>
          </li>
          <li class="mb-2">
            <p>First name and last name</p>
          </li>
          <li class="mb-2">
            <p>Phone number</p>
          </li>
          <li class="mb-2">
            <p>Usage Data</p>
          </li>
        </ul>
        <h4 class="mb-2">Usage Data</h4>
        <p class="mb-4">Usage Data is collected automatically when using the Service.</p>
        <p class="mb-4">Usage Data may include information such as Your Device's Internet Protocol address (e.g. IP
          address), browser
          type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time
          spent on those pages, unique device identifiers and other diagnostic data.</p>
        <p class="mb-4">When You access the Service by or through a mobile device, We may collect certain information
          automatically,
          including, but not limited to, the type of mobile device You use, Your mobile device unique ID, the IP address
          of Your mobile device, Your mobile operating system, the type of mobile Internet browser You use, unique
          device identifiers and other diagnostic data.</p>
        <p class="mb-4">We may also collect information that Your browser sends whenever You visit our Service or when
          You access the
          Service by or through a mobile device.</p>
        <h4 class="mb-2">Tracking Technologies and Cookies</h4>
        <p class="mb-4">We use Cookies and similar tracking technologies to track the activity on Our Service and store
          certain
          information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to
          improve and analyze Our Service.</p>
        <p class="mb-4">You can instruct Your browser to refuse all Cookies or to indicate when a Cookie is being sent.
          However, if
          You do not accept Cookies, You may not be able to use some parts of our Service.</p>
        <p class="mb-4">Cookies can be &quot;Persistent&quot; or &quot;Session&quot; Cookies. Persistent Cookies remain
          on your
          personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close
          your web browser. Learn more about cookies: <a href="https://www.termsfeed.com/blog/cookies/" target="_blank"
            class="underline text-purple-600 hover:text-purple-700">All About Cookies</a>.</p>
        <p class="mb-4">We use both session and persistent Cookies for the purposes set out below:</p>
        <ul class="mb-4 list-disc ml-6">
          <li class="mb-2">
            <p><strong>Necessary / Essential Cookies</strong></p>
            <p>Type: Session Cookies</p>
            <p>Administered by: Us</p>
            <p>Purpose: These Cookies are essential to provide You with services available through the Website and to
              enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user
              accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use
              these Cookies to provide You with those services.</p>
          </li>
          <li class="mb-2">
            <p><strong>Cookies Policy / Notice Acceptance Cookies</strong></p>
            <p>Type: Persistent Cookies</p>
            <p>Administered by: Us</p>
            <p>Purpose: These Cookies identify if users have accepted the use of cookies on the Website.</p>
          </li>
          <li class="mb-2">
            <p><strong>Functionality Cookies</strong></p>
            <p>Type: Persistent Cookies</p>
            <p>Administered by: Us</p>
            <p>Purpose: These Cookies allow us to remember choices You make when You use the Website, such as
              remembering your login details or language preference. The purpose of these Cookies is to provide You with
              a more personal experience and to avoid You having to re-enter your preferences every time You use the
              Website.</p>
          </li>
        </ul>
        <p class="mb-4">For more information about the cookies we use and your choices regarding cookies, please visit
          our Cookies
          Policy or the Cookies section of our Privacy Policy.</p>
        <h3 class="text-lg">Use of Your Personal Data</h3>
        <p class="mb-4">The Company may use Personal Data for the following purposes:</p>
        <ul class="mb-4 list-disc ml-6">
          <li class="mb-2"><strong>To provide and maintain our Service</strong>, including to monitor the usage of our
            Service.</li>
          <li class="mb-2"><strong>To manage Your Account:</strong> to manage Your registration as a user of the
            Service. The
            Personal Data You provide can give You access to different functionalities of the Service that are available
            to You as a registered user.</li>
          <li class="mb-2"><strong>For the performance of a contract:</strong> the development, compliance and
            undertaking of the
            purchase contract for the products, items or services You have purchased or of any other contract with Us
            through the Service.</li>
          <li class="mb-2"><strong>To contact You:</strong> To contact You by email, telephone calls, SMS, or other
            equivalent forms
            of electronic communication, such as a mobile application's push notifications regarding updates or
            informative communications related to the functionalities, products or contracted services, including the
            security updates, when necessary or reasonable for their implementation.</li>
          <li class="mb-2"><strong>To provide You</strong> with news, special offers and general information about other
            goods,
            services and events which we offer that are similar to those that you have already purchased or enquired
            about unless You have opted not to receive such information.</li>
          <li class="mb-2"><strong>To manage Your requests:</strong> To attend and manage Your requests to Us.</li>
        </ul>
        <p class="mb-4">We may share your personal information in the following situations:</p>
        <ul class="mb-4 list-disc ml-6">
          <li class="mb-2"><strong>With Service Providers:</strong> We may share Your personal information with Service
            Providers to
            monitor and analyze the use of our Service, to contact You.</li>
          <li class="mb-2"><strong>For Business transfers:</strong> We may share or transfer Your personal information
            in connection
            with, or during negotiations of, any merger, sale of Company assets, financing, or acquisition of all or a
            portion of our business to another company.</li>
          <li class="mb-2"><strong>With Affiliates:</strong> We may share Your information with Our affiliates, in which
            case we will
            require those affiliates to honor this Privacy Policy. Affiliates include Our parent company and any other
            subsidiaries, joint venture partners or other companies that We control or that are under common control
            with Us.</li>
          <li class="mb-2"><strong>With Business partners:</strong> We may share Your information with Our business
            partners to offer
            You certain products, services or promotions.</li>
          <li class="mb-2"><strong>With other users:</strong> when You share personal information or otherwise interact
            in the public
            areas with other users, such information may be viewed by all users and may be publicly distributed outside.
            If You interact with other users or register through a Third-Party Social Media Service, Your contacts on
            the Third-Party Social Media Service may see Your name, profile, pictures and description of Your activity.
            Similarly, other users will be able to view descriptions of Your activity, communicate with You and view
            Your profile.</li>
        </ul>
        <h3 class="text-lg mb-2">Retention of Your Personal Data</h3>
        <p class="mb-4">The Company will retain Your Personal Data only for as long as is necessary for the purposes set
          out in this
          Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal
          obligations (for example, if we are required to retain your data to comply with applicable laws), resolve
          disputes, and enforce our legal agreements and policies.</p>
        <p class="mb-4">The Company will also retain Usage Data for internal analysis purposes. Usage Data is generally
          retained for
          a shorter period of time, except when this data is used to strengthen the security or to improve the
          functionality of Our Service, or We are legally obligated to retain this data for longer time periods.</p>
        <h3 class="text-lg mb-2">Transfer of Your Personal Data</h3>
        <p class="mb-4">Your information, including Personal Data, is processed at the Company's operating offices and
          in any other
          places where the parties involved in the processing are located. It means that this information may be
          transferred to — and maintained on — computers located outside of Your state, province, country or other
          governmental jurisdiction where the data protection laws may differ than those from Your jurisdiction.</p>
        <p class="mb-4">Your consent to this Privacy Policy followed by Your submission of such information represents
          Your agreement
          to that transfer.</p>
        <p class="mb-4">The Company will take all steps reasonably necessary to ensure that Your data is treated
          securely and in
          accordance with this Privacy Policy and no transfer of Your Personal Data will take place to an organization
          or a country unless there are adequate controls in place including the security of Your data and other
          personal information.</p>
        <h3 class="text-lg mb-2">Disclosure of Your Personal Data</h3>
        <h4 class="mb-2">Business Transactions</h4>
        <p class="mb-4">If the Company is involved in a merger, acquisition or asset sale, Your Personal Data may be
          transferred. We
          will provide notice before Your Personal Data is transferred and becomes subject to a different Privacy
          Policy.</p>
        <h4 class="mb-2">Law enforcement</h4>
        <p class="mb-4">Under certain circumstances, the Company may be required to disclose Your Personal Data if
          required to do so
          by law or in response to valid requests by public authorities (e.g. a court or a government agency).</p>
        <h4 class="mb-2">Other legal requirements</h4>
        <p class="mb-4">The Company may disclose Your Personal Data in the good faith belief that such action is
          necessary to:</p>
        <ul class="mb-4 list-disc ml-6">
          <li>Comply with a legal obligation</li>
          <li>Protect and defend the rights or property of the Company</li>
          <li>Prevent or investigate possible wrongdoing in connection with the Service</li>
          <li>Protect the personal safety of Users of the Service or the public</li>
          <li>Protect against legal liability</li>
        </ul>
        <h3 class="text-lg">Security of Your Personal Data</h3>
        <p class="mb-4">The security of Your Personal Data is important to Us, but remember that no method of
          transmission over the
          Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means
          to protect Your Personal Data, We cannot guarantee its absolute security.</p>
        <h2 class="mb-2 text-2xl">Your California Privacy Rights (California's Shine the Light law)</h2>
        <p class="mb-4">Under California Civil Code Section 1798 (California's Shine the Light law), California
          residents with an
          established business relationship with us can request information once a year about sharing their Personal
          Data with third parties for the third parties' direct marketing purposes.</p>
        <p class="mb-4">If you'd like to request more information under the California Shine the Light law, and if you
          are a
          California resident, You can contact Us using the contact information provided below.</p>
        <h2 class="text-2xl mb-2">California Privacy Rights for Minor Users (California Business and Professions Code
          Section 22581)</h2>
        <p class="mb-4">California Business and Professions Code section 22581 allow California residents under the age
          of 18 who are
          registered users of online sites, services or applications to request and obtain removal of content or
          information they have publicly posted.</p>
        <p class="mb-4">To request removal of such data, and if you are a California resident, You can contact Us using
          the contact
          information provided below, and include the email address associated with Your account.</p>
        <p class="mb-4">Be aware that Your request does not guarantee complete or comprehensive removal of content or
          information
          posted online and that the law may not permit or require removal in certain circumstances.</p>
        <h2 class="mb-2 text-2xl">Links to Other Websites</h2>
        <p class="mb-4">Our Service may contain links to other websites that are not operated by Us. If You click on a
          third party
          link, You will be directed to that third party's site. We strongly advise You to review the Privacy Policy of
          every site You visit.</p>
        <p class="mb-4">We have no control over and assume no responsibility for the content, privacy policies or
          practices of any
          third party sites or services.</p>
        <h2 class="text-2xl mb-2">Changes to this Privacy Policy</h2>
        <p class="mb-4">We may update our Privacy Policy from time to time. We will notify You of any changes by posting
          the new
          Privacy Policy on this page.</p>
        <p class="mb-4">We will let You know via email and/or a prominent notice on Our Service, prior to the change
          becoming
          effective and update the &quot;Last updated&quot; date at the top of this Privacy Policy.</p>
        <p class="mb-4">You are advised to review this Privacy Policy periodically for any changes. Changes to this
          Privacy Policy
          are effective when they are posted on this page.</p>
        <h2 class="text-2xl mb-2">Contact Us</h2>
        <p class="mb-4">If you have any questions about this Privacy Policy, You can contact us:</p>
        <ul class="mb-4 list-disc ml-6">
          <li>By visiting this page on our website: <a href="devdomain.azurewebsites.net/contact"
              rel="external nofollow noopener" target="_blank"
              class="underline text-purple-600 hover:text-purple-700">devdomain.azurewebsites.net/contact</a></li>
        </ul>
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